<?php

/*
 * This file is part of the godruoyi/laravel-idcard-validator.
 *
 * (c) Godruoyi <godruoyi@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Godruoyi\LaravelIdCard;

use Illuminate\Contracts\Validation\Rule as BaseRule;

class Rule implements BaseRule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed  $value
     *
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return IdCard::passes($value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return '无效的身份证号码';
    }
}
