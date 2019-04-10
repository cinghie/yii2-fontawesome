# Yii2 Font Awesome

![Latest Stable Version](https://img.shields.io/packagist/v/cinghie/yii2-fontawesome.svg)
![License](https://img.shields.io/packagist/l/cinghie/yii2-fontawesome.svg)
![Latest Release Date](https://img.shields.io/github/release-date/cinghie/yii2-fontawesome.svg)
![Latest Commit](https://img.shields.io/github/last-commit/cinghie/yii2-fontawesome.svg)
[![Total Downloads](https://img.shields.io/packagist/dt/cinghie/yii2-fontawesome.svg)](https://packagist.org/packages/cinghie/yii2-fontawesome)

Asset Bundle to include Font Awesome on your Yii 2 project: https://github.com/FortAwesome/Font-Awesome

Installation
-----------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require cinghie/yii2-fontawesome "1.3.4"
```

or add this line to the require section of your `composer.json` file.

```
"cinghie/yii2-fontawesome": "1.3.4"
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
