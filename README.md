# Yii2 Font Awesome

![License](https://img.shields.io/packagist/l/cinghie/yii2-fontawesome.svg)
![Latest Stable Version](https://img.shields.io/github/release/cinghie/yii2-fontawesome.svg)
![Latest Release Date](https://img.shields.io/github/release-date/cinghie/yii2-fontawesome.svg)
![Latest Commit](https://img.shields.io/github/last-commit/cinghie/yii2-fontawesome.svg)
[![Total Downloads](https://img.shields.io/packagist/dt/cinghie/yii2-fontawesome.svg)](https://packagist.org/packages/cinghie/yii2-fontawesome)

Asset Bundle to include Font Awesome on your Yii 2 project: https://github.com/FortAwesome/Font-Awesome

Installation
-----------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require cinghie/yii2-fontawesome "^1.4.5"
```

or add this line to the require section of your `composer.json` file.

```
"cinghie/yii2-fontawesome": "^1.4.5"
```

Configuration
-----------------

Register the standard CSS asset bundle in your view:

```
use cinghie\fontawesome\FontAwesomeAsset;

FontAwesomeAsset::register($this);
```

Register the minified CSS asset bundle in your view:

```
use cinghie\fontawesome\FontAwesomeMinifyAsset;

FontAwesomeMinifyAsset::register($this);
```

Versioning
-----------------

- Font Awesome 5: from release 1.4.3
- Font Awesome 4: last release 1.3.4
