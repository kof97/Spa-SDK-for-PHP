# SPA PHP SDK 接口请求实体类 Tsa\Object\Enum\

Tsa\Object\Enum\ 命名空间下是各个接口的参数枚举类

---

# Tsa\Object\Enum\

## 如何调用

> 通过枚举类快速进行参数的构建
> 在 `Tsa\Object\Enum\` 下定义了各个模块中各个接口参数的枚举类

```
    // Tsa\Object\Enum\ {mod_class} \ {interface_enum_class}
    use Tsa\Object\Enum\Advertiser\SignupEnum;

    $params = array(
        SignupEnum::LOGIN_NAME       => '',
        SignupEnum::ADVERTISER_NAME  => '',
        SignupEnum::CORPORATION_NAME => '',
        SignupEnum::ADDRESS          => '',
    );
```

上述示例等同于：

```
    $params = array(
        'login_name'       => '',
        'advertiser_name'  => '',
        'corporation_name' => '',
        'address'          => '',
    );
```