<?php

use padavvan\validators\LuhnValidator;

class LuhnTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    private function check($digits)
    {
        return LuhnValidator::check($digits);
    }

    public function testEvenCurrentDigits()
    {
        $this->assertTrue($this->check('1115'));
    }

    public function testEvenNotCurrentDigits()
    {
        $this->assertFalse($this->check('1114'));
    }

    public function testOddCurrentDigits()
    {
        $this->assertTrue($this->check('117'));
    }

    public function testOddNotCurrentDigits()
    {
        $this->assertFalse($this->check('116'));
    }

    public function testEmpty()
    {
        $this->assertTrue($this->check(''));
    }

//    public function testValidator()
//    {
//        $model = \yii\base\DynamicModel::validateData(['digits' => 116], [
//            ['digits', LuhnValidator::className()]
//        ]);
//
//        $this->assertArrayHasKey('digits', $model->getErrors());
//        $this->assertEquals($model->getErrors('digits'), ['Digits not valid Luhn number.']);
//
//        $model = \yii\base\DynamicModel::validateData(['digits' => 117], [
//            ['digits', LuhnValidator::className()]
//        ]);
//
//        $this->assertArrayNotHasKey('digits', $model->getErrors());
//    }
}