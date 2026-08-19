# Yii2 Font Awesome

![License](https://img.shields.io/packagist/l/cinghie/yii2-fontawesome.svg)
![Latest Stable Version](https://img.shields.io/github/release/cinghie/yii2-fontawesome.svg)
![Latest Release Date](https://img.shields.io/github/release-date/cinghie/yii2-fontawesome.svg)
![Latest Commit](https://img.shields.io/github/last-commit/cinghie/yii2-fontawesome.svg)
[![Total Downloads](https://img.shields.io/packagist/dt/cinghie/yii2-fontawesome.svg)](https://packagist.org/packages/cinghie/yii2-fontawesome)

Yii2 AssetBundle integration for **Font Awesome 5.15.x**.

## Requirements

- PHP 7.4 or newer
- Yii 2.0.14 or newer within the Yii 2.x line
- Font Awesome 5.15.x (`bower-asset/fontawesome`)

The CI suite verifies both the lowest supported dependency set and current compatible dependencies across PHP 7.4 through PHP 8.5.

Because Yii2 and this package use `bower-asset/*` packages, Composer must be able to resolve Asset Packagist packages. The project CI configures Asset Packagist explicitly before dependency installation.

## Installation

The preferred way to install this extension is through Composer.

Either run

```
php composer.phar require cinghie/yii2-fontawesome "^1.5.0"
```

or add this line to the require section of your `composer.json` file:

```
"cinghie/yii2-fontawesome": "^1.5.0"
```

## Configuration

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

## Versioning

- Font Awesome 5: from release 1.4.3
- Font Awesome 4: last release 1.3.4
- Font Awesome 6 is not part of the current compatibility contract and should be introduced only through a dedicated compatibility release.
