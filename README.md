<h1 align="center"> laravel-idcard-validator </h1>

<p align="center"> .</p>


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