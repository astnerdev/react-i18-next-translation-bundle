<?php
namespace Mastox\ReactI18NextTranslationBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;

class ReactI18NextTranslationExtension extends Extension {
    public function load(array $configs, ContainerBuilder $container) {

        $loader = new XmlFileLoader($container, new FileLocator(dirname(__DIR__) . '/Resources/config'));
        $loader->load('services.xml');

        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        if (isset($config['file_extension'])) {
            $container->setParameter('react_i18_next_translation.file_extension', $config['file_extension']);
        }

    }
}