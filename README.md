# Landmarx Node Mapping Library

Landmark node mapping library for the landmarx system.

1. installation
2. usage

## Installation
### Composer
Add this to your `composer.json` file:
```js
"landmarx\library": "@dev"
```

Then run the following command:
```bash
$ php composer.phar update "landmarx\library"
```

## Usage
#Basic usage:
```php
use Landmarx\Factory\LandmarkFactory;
use Landmarx\Model\Type as LandmarkType;
use Landmarx\Renderer\ListRenderer;

$factory = new LandmarkFactory();

$mtn_rng = new LandmarkType('mountain range');
$mtn = new LandmarkType('mountain');
$mtn->setParent($mtn_rng);

// Landmark created by name only
$landmark = new Landmark('appalachian mountain range');
$landmark->setLatitude(74.00)->setLongitude(-47.98);
$landmark->setType($mtn_rng);

// Child landmark
$child = new Landmark('katahdin');
$child->setLatitude(79.76)->setLongitude(-40.99);
$child->setType($mtn)->setParent($landmark);

// render landarks
$renderer = new ListRenderer();
$renderer->render($landmark);
```
This would output a nest unordered list.

#Advanced Usage
