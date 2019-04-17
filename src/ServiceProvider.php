<?php

/*
 * This file is part of the godruoyi/laravel-idcard-validator.
 *
 * (c) Godruoyi <godruoyi@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Godruoyi\LaravelIdCard;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        Validator::extend('idcard', function ($attribute, $value, $parameters, $validator) {
            return IdCard::passes($value);
        });

        Validator::replacer('idcard', function ($message, $attribute, $rule, $parameters) {
            return '无效的身份证号码';
        });
    }
}
