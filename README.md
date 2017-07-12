# Standalone Luhn validator for Yii2

Checking the number by Luhn algorithm. Look more about [Luhn algorithm](luhn) at wikipedia.

For license information check the [LICENSE](license)-file.

## Installation

The preferred way to install this extension is through [composer].

Either run
```bash
php composer.phar require padavvan/yii2-luhn-validator
```
or add
```
"padavvan/yii2-luhn-validator": "~1.0.2"
```
to the require section of your composer.json file.

## Usage
Look more about [Yii2 validators](http://www.yiiframework.com/doc-2.0/guide-input-validation.html)

```php
public function rules() {
  return [
    ['creditCard', LuhnValidator::className()]
  ];
}

// OR
$model = \yii\base\DynamicModel::validateData(['digits' => '...'], [
    ['digits', LuhnValidator::className()]
]);

// OR
LuhnValidator::check($digits); // return true or false
```

## Tests
```bash
cd vendor/padavvan/yii2-luhn-validator
php ../../bin/codecept run
```

[composer]: https://getcomposer.org/download/
[luhn]: https://en.wikipedia.org/wiki/Luhn_algorithm
[license]: https://github.com/padaVVan/yii2-luhn-validator/blob/master/LICENSE