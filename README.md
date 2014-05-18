# Landmarx Node Library

Landmark node mapping library for the landmarx system.

1. installation
2. usage
3. advanced

## Installation
# Composer
Add this to your `composer.json` file:
```js
"landmarx\library": "@dev"
```

Then run the following command:
```bash
$ php composer.phar update "landmarx\library"
```

## Usage

```php
$mtn_rng = new LandmarkType('mountain range');
$landmark = new Landmark('appalachian mountain range');
$landmark->setLatitude(74.00)->setLongitude(-47.98);
$landmark->setType($mtn_rng);

$mtn = new LandmarkType('mountain');
$mtn->setParent($mtn_rng);

$child = new Landmark('katahdin');
$child->setLatitude(79.76)->setLongitude(-40.99);
$child->setType($mtn)->setParent($landmark);

$landmark->render();
```

## Advanced Usage

```php
$list = new ListRenderer();
$landmark->setRenderer($list);
$landmark->renderer->setTemplate($template);
```