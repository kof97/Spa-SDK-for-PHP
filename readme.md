# TSA SDK for PHP

环境：`PHP5.3` 以上






使用：引入 `autoload.php` 即可使用

```
    require_once __DIR__ . './src/Tsa/autoload.php';
```

## 快速调用

### 初始化实例

```
    $conf = array(
        'appid'            => '{appid}',   // 必填
        'appkey'           => '{appkey}',  // 必填
        'http_client_type' => 'curl',      // 可不填
        'version'          => 'v3'         // 可不填
    );

    $tsa = new Tsa\Tsa($conf);

    // 获取模块集合
    $modules = $tsa->getModules();
```

### 选择请求的模块和接口并发送请求

```
    // 选择模块 -> 选择接口 -> 发送请求
    $modules->advertiser->signup->send({$params}, {$headers});
```

### 详细解说

首先是对于模块（module）和接口（interface）的选择

```
    // 返回了 advertiser 模块
    $advertiser = $modules->advertiser;

    // 返回接口 signup 的请求实体
    $signup = $advertiser->signup;

    // 向 advertiser/signup 发送请求
    $signup->send({$params}, {$headers});
```

也支持链式操作

```
    // 选择模块 -> 选择接口 -> 发送请求
    $response = $tsa->getModules()->advertiser->signup->send({$params}, {$headers});
```

接下来是数据的拼接，在 `Tsa\Object\Enum\` 下定义了各个模块中各个接口参数的枚举类

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

上述例子等同于：

```
    $params = array(
        'login_name'       => '',
        'advertiser_name'  => '',
        'corporation_name' => '',
        'address'          => '',
    );
```

---

## 传统调用：

### 初始化实例

```
    $conf = array(
        'appid'            => '{appid}',
        'appkey'           => '{appkey}',
        'http_client_type' => 'curl',
        'version'          => 'v3'
    );

    $tsa = new Tsa\Tsa($conf);
```

### 发送 get 请求

```
    $response = $tsa->get('/advertiser/read?advertiser_id=123', {$headers});
```

### 发送 post 请求

```
    $response = $tsa->post('/advertiser/signup', {$params}, {$headers});
```

### 发送 request 请求

```
    $response = $tsa->sendRequest('post', '/advertiser/signup', {$params}, {$headers});
```

