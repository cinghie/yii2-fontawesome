# Changelog

All notable changes to this project will be documented in this file.

## 1.5.0 - 2026-08-19

### Added
- PHPUnit regression coverage for the standard and minified asset bundles.
- Yii2 best-practice regression checks for asset inheritance, source paths, imports, and Composer autoloading.
- Integration coverage for registering and publishing `FontAwesomeAsset` through Yii2 `View` and `AssetManager`.
- Distribution checks for the Font Awesome CSS and required webfont files.
- GitHub Actions CI across PHP 7.4 through PHP 8.5.
- Lowest-supported dependency testing with `--prefer-lowest --prefer-stable`.
- Composer security auditing and weekly Dependabot updates for Composer and GitHub Actions.

### Changed
- `FontAwesomeMinifyAsset` now extends `FontAwesomeAsset` and overrides only the minified CSS file.
- The package now explicitly requires PHP 7.4 or newer.
- Runtime support is documented as Yii 2.0.14+ within the Yii 2.x line and Font Awesome 5.15.x.
- GitHub Actions are pinned to immutable commit SHAs.
- CI explicitly configures Asset Packagist before resolving `bower-asset/*` dependencies.
- Public asset classes use normalized formatting and concise documentation.
- Composer metadata now uses the canonical HTTPS Gogodigital homepage.

### Removed
- The unnecessary `YiiAsset` dependency; registering Font Awesome no longer pulls in Yii JavaScript or jQuery indirectly.
- Stale hard-coded package version metadata from PHP source docblocks.

### Compatibility notes
- Applications that accidentally relied on `FontAwesomeAsset` to register `YiiAsset` must register `YiiAsset` explicitly where needed.
- PHP versions older than 7.4 are no longer supported by the package metadata.
- Font Awesome 6 is not included in the current compatibility contract.
