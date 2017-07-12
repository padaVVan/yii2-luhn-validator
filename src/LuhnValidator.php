<?php

namespace padavvan\validators;

use Yii;
use yii\validators\Validator;

/**
 * Yii2 validator
 * @see https://en.wikipedia.org/wiki/Luhn_algorithm
 */
class LuhnValidator extends Validator
{
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        if ($this->message === null) {
            $this->message = Yii::t('yii', '{attribute} not valid Luhn number.');
        }
    }

    /**
     * @inheritdoc
     * @param mixed $value
     * @return array|null
     */
    protected function validateValue($value)
    {
        if (self::check($value)) {
            return null;
        }
        return [$this->message, []];
    }

    /**
     * @param $digits
     * @return bool
     */
    public static function check($digits)
    {
        $odd = strlen($digits) % 2;
        $sum = 0;

        foreach (str_split($digits) as $key => $digit) {
            if ($key%2 == $odd) {
                $digit *= 2;
                if ($digit > 9) {
                    $digit -= 9;
                }
            }
            $sum += $digit;
        }

        return !($sum % 10);
    }
}
