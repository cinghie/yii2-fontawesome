# Yii2 Font Awesome
Asset Bundle to include Font Awesome on your Yii 2 project: https://github.com/FortAwesome/Font-Awesome

Installation
-----------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require cinghie/yii2-fontawesome "^1.4.2"
```

or add this line to the require section of your `composer.json` file.

```
"cinghie/yii2-fontawesome": "^1.4.2"
```

Configuration
-----------------

Add in the view for normal CSS and JS

```
use cinghie\fontawesome\FontAwesomeAsset;

FontAwesomeAsset::register($this);
```

Add in the view for minify CSS and JS

```
use cinghie\fontawesome\FontAwesomeMinifyAsset;

FontAwesomeMinifyAsset::register($this);
```

Versioning
-----------------

 - Fontawesome 5: from version Release 1.4.1  
 - Fontawesome 4: last version Release 1.3.4
