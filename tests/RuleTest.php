<?php

/*
 * This file is part of the godruoyi/laravel-idcard-validator.
 *
 * (c) Godruoyi <godruoyi@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Tests;

use Orchestra\Testbench\TestCase;

class RuleTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return ['Godruoyi\LaravelIdCard\ServiceProvider'];
    }

    public function testBasic()
    {
        $app = $this->createApplication();

        $this->assertInstanceOf('Illuminate\Foundation\Application', $app);
    }

    public function testValidate()
    {
        $app = $this->createApplication();
        $factory = $app->make('Illuminate\Validation\Factory');

        $validator = $factory->make([
            'idcard' => '110101199801012385',
        ], [
            'idcard' => 'required|string|idcard',
        ]);

        $this->assertInstanceOf('Illuminate\Validation\Validator', $validator);
        $this->assertTrue($validator->passes());

        $validator = $factory->make([
            'idcard' => '11010119980101238x',
        ], [
            'idcard' => 'required|string|idcard',
        ]);

        $this->assertFalse($validator->passes());
        $this->assertContains($validator->errors()->first(), '无效的身份证号码');
    }
}
