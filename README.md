# ReactI18NextTranslationBundle

#### Installation
```bash
composer require mastox/react-i18-next-translation-bundle:@dev
```

#### Register route
```yaml
#/config/routes/annotations.yaml
react_i18_next_translation:
    resource: "@ReactI18NextTranslationBundle/Resources/config/routes/routes.xml"
```
#### Register bundle
```php
#/config/bundles.php
return [
    /* */
    Mastox\ReactI18NextTranslationBundle\ReactI18NextTranslationBundle::class => ['all' => true],
    /* */
];
```
To change file extension of your translation files if you have .php
create a file react_i18_next_translation.yaml
php and yaml are supported at the moment.
```yaml
#config/packages/dev || server/config/prod || server/config/
react_i18_next_translation:
  file_extension: 'xlf'
```
#### Usage

localhost/react_i18_next_translation/locales/{LANG-KEY}/{NAMESPACE}.json

localhost/react_i18_next_translation/locales/fr/messages.json