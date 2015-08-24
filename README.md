# Yii2 Font Awesome
Asset Bundle to include Font Awesome on your Yii 2 project:<br>
https://github.com/FortAwesome/Font-Awesome

Installation
-----------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist cinghie/yii2-fontawesome "*"
```

or add this line to the require section of your `composer.json` file.

```
"cinghie/yii2-fontawesome": "*"
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

Changelog
-----------------

<ul>
  <li>Version 1.2.1 - Adding Bootstrap Depends</li>
  <li>Version 1.2.0 - Separating normal and minified CSS</li>
  <li>Version 1.1.1 - Updated Version</li>
  <li>Version 1.1.0 - Changed Bundle Name</li>
  <li>Version 1.0.1 - Update Composer</li>
  <li>Version 1.0 - Initial Release</li>
</ul>
