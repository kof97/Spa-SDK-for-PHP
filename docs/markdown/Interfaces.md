# TSA PHP SDK 接口请求实体类 Tsa\Object\Interfaces\

Tsa\Object\Interfaces\ 命名空间下是各个接口的请求实体类

---

# Tsa\Object\Interfaces\

## 如何调用

```
    $conf = array(
        'appid'  => '{appid}',
        'appkey' => '{appkey}'
    );

    $tsa = new Tsa\Tsa($conf);

    // 获取模块集合
    $modules = $tsa->getModules();

    // 选择模块 -> 选择接口 -> 发送请求
    $modules->advertiser->signup->send({$params}, {$headers});
```

---

## 提供的方法

### send()

```
    public Tsa\Response send(
        $params = array(),
        $headers = array()
    )
```

```
    // 选择模块 -> 选择接口 -> 发送请求
    $response = $tsa->getModules()->advertiser->signup->send({$params}, {$headers});
```

> 用于快速的构造请求，通过 `$tsa->getModules()` 直接选择 `module` 和 `interface` 来进行发送请求

---

### sendWithAccessToken()

```
    public Tsa\Response sendWithAccessToken(
        $params = array(),
        $headers = array(),
        $access_token = null
    )
```

```
    // 选择模块 -> 选择接口 -> 发送请求
    $response = $tsa->getModules()->advertiser->signup->sendWithAccessToken({$params}, {$headers}, {$access_token});
```

> 也用于快速的构造请求,可用于使用特定的 `access_token` 来进行临时请求，若不填，则使用 `$conf` 中配置的信息生成

---

### fieldInfo()

```
    public array fieldInfo()
```

用于获取该接口下的所有字段结构以及验证规则，包括 `struct` 和 `array` 下的递归嵌套的结构类型

