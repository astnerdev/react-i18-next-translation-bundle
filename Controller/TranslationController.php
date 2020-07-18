<?php
namespace Mastox\ReactI18NextTranslationBundle\Controller;


use Symfony\Component\Config\Util\XmlUtils;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Yaml\Yaml;


class TranslationController {

    public function __construct(string $basePath, string $fileExtension) {
        $this->basePath = $basePath;
        $this->fileExtension = $fileExtension;
    }

    public function __invoke($lng, $ns) {

        $translationDir = $this->basePath . "/translations/";
        if (strpos($lng, '-')) {
            $ex = explode('-', $lng);
            $lng = $ex[0];
        }

        $file = vsprintf('%s%s.%s.%s', [$translationDir, $ns, $lng, $this->fileExtension]);

        // if file does not exist with param check for fallback english version
        if (!file_exists($file)) {
            $file = vsprintf('%s%s.%s.yaml', [$translationDir, $ns, 'en', $this->fileExtension]);
        }

        if (!file_exists($file)) {
            $fileNotFound = 'No translation file available';
        }

        $response = new Response();
        $response->headers->set('Content-Type', 'application/json; charset=utf-8');

        if (!empty($fileNotFound)) {
            $result = ['error' => $fileNotFound];
        } else {
            switch ($this->fileExtension) {
                case 'yaml':
                    $result = Yaml::parseFile($file);
                    break;
                case 'xlf':
                    /* @TODO later xlf file support */
                    $error = 'File extension not supportet';
                    break;
                case 'php':
                    $result = require $file;
                    break;
                default:
                    $error = sprintf("File extension %s not supportet", $this->fileExtension);
            }
        }

        if (!empty($error)) {
            $result = ['error' => $error];
        }

        return $response->setContent(json_encode($result));
    }
}