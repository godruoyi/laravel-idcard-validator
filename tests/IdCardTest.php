<?php

/*
 * This file is part of the godruoyi/laravel-idcard-validator.
 *
 * (c) Godruoyi <godruoyi@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Tests;

use Godruoyi\LaravelIdCard\IdCard;

class IdCardTest extends TestCase
{
    public function testResolveMatchRuleForAreacode()
    {
        $areacode = IdCard::resolveMatchRuleForAreacode();

        $this->assertTrue('[1-9]\d{5}' === $areacode);
    }

    public function testResolveMatchRuleForMonths()
    {
        $this->assertTrue(IdCard::resolveMatchRuleForMonths() === '((0[1-9])|(10|11|12))');
    }

    public function testResolveMatchRuleForDays()
    {
        $this->assertTrue(IdCard::resolveMatchRuleForDays() === '(([0-2][1-9])|10|20|30|31)');
    }

    public function testResolveMatchRuleForRandoms()
    {
        $this->assertTrue(IdCard::resolveMatchRuleForRandoms() === '\d{3}');
    }

    public function testResolveMatchRuleForCheckcode()
    {
        $this->assertTrue(IdCard::resolveMatchRuleForCheckcode() === '[0-9xX]{1}');
    }

    public function testResolveMatchRuleForYears()
    {
        $year = IdCard::resolveMatchRuleForYears();
        $year = '/'.$year.'/';

        $this->assertTrue('/(17|18|19|20|21)\d{2}/' === $year);
        $this->assertTrue(1 === preg_match($year, '1830'));
        $this->assertTrue(1 === preg_match($year, '2000'));
        $this->assertFalse(1 === preg_match($year, '2200'));
    }

    public function testResolveMatchRule()
    {
        $rule = IdCard::resolveMatchRule();

        $defaultRule = '[1-9]\d{5}(17|18|19|20|21)\d{2}((0[1-9])|(10|11|12))(([0-2][1-9])|10|20|30|31)\d{3}[0-9xX]{1}';

        $this->assertTrue($rule === $defaultRule);
    }

    public function testPass()
    {
        // 假身份证
        $this->assertTrue(IdCard::passes('130203200101015873'));
        $this->assertTrue(IdCard::passes('500223200004069022'));
        $this->assertTrue(IdCard::passes('110101199801012385'));
        $this->assertFalse(IdCard::passes('2121'));
        $this->assertFalse(IdCard::passes('500223200004069021'));
        $this->assertFalse(IdCard::passes('11010119980101238X'));
    }
}
