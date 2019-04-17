<h1 align="center"> laravel-idcard-validator </h1>

[![Build Status](https://travis-ci.org/godruoyi/laravel-idcard-validator.svg?branch=master)](https://travis-ci.org/godruoyi/laravel-idcard-validator)
[![StyleCI](https://github.styleci.io/repos/181809132/shield?branch=master)](https://github.styleci.io/repos/181809132)
[![Latest Stable Version](https://poser.pugx.org/godruoyi/laravel-idcard-validator/v/stable)](https://packagist.org/packages/godruoyi/laravel-idcard-validator)
[![Latest Unstable Version](https://poser.pugx.org/godruoyi/laravel-idcard-validator/v/unstable)](https://packagist.org/packages/godruoyi/laravel-idcard-validator)
[![Total Downloads](https://poser.pugx.org/godruoyi/laravel-idcard-validator/downloads)](https://packagist.org/packages/godruoyi/laravel-idcard-validator)
[![License](https://poser.pugx.org/godruoyi/laravel-idcard-validator/license)](https://packagist.org/packages/godruoyi/laravel-idcard-validator)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/godruoyi/laravel-idcard-validator/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/godruoyi/laravel-idcard-validator/?branch=master) 

## 安装

```shell
$ composer require godruoyi/laravel-idcard-validator -vvv
```

## 使用

Laravel 版本小于 5.5 时，需要手动在 `app\config.php` 添加 service provider：

```php
Godruoyi\LaravelIdCard\ServiceProvider::class,
```

通过 Validator 面门使用：

```php
Validator::make([
    'idcard' => '110101199801012385',
], [
    'idcard' => 'required|string|idcard',
]);
```

通过 FormRequest 使用：

```php
class UserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'idcard' => 'required|idcard',

            // 或者
            'idcard' => ['required', new \Godruoyi\LaravelIdCard\Rule],
        ];
    }
}
```

验证不通过时，默认返回 `无效的身份证号码`。

## License

MIT