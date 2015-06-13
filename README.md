# Yii2 Font Awesome
Asset Bundle to include Font Awesome on your Yii 2 project:<br>
https://github.com/FortAwesome/Font-Awesome

Installation
------------

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

Add in the view

```
use cinghie\fontawesome\FontawesomeBundle;

FontawesomeBundle::register($this);
```
