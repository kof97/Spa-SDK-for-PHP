# SPA PHP SDK 主要服务类 Spa\Spa

Spa\Spa 类提供了主要功能的接口入口

---

# Spa\Spa

## 快速调用

### 初始化实例

```
    $conf = array(
        'uid'               => '{uid}',     // 必填
        'appid'             => '{appid}',   // 必填
        'appkey'            => '{appkey}',  // 必填
        'http_client_type'  => 'curl',      // 可不填
        'version'           => 'v3'         // 可不填
    );

    $spa = new Spa\Spa($conf);

    // 获取模块集合
    $modules = $spa->getModules();
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
    $response = $spa->getModules()->advertiser->signup->send({$params}, {$headers});
```

接下来是数据的拼接，在 `Spa\Object\Enum\` 下定义了各个模块中各个接口参数的枚举类

```
    // Spa\Object\Enum\ {mod_class} \ {interface_enum_class}
    use Spa\Object\Enum\Advertiser\SignupEnum;

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
        'uid'               => '{uid}',
        'appid'             => '{appid}',
        'appkey'            => '{appkey}',
        'http_client_type'  => 'curl',
        'version'           => 'v3'
    );

    $spa = new Spa\Spa($conf);
```

### 发送 get 请求

```
    $response = $spa->get('/advertiser/read?advertiser_id=123', {$headers});
```

### 发送 post 请求

```
    $response = $spa->post('/advertiser/signup', {$params}, {$headers});
```

### 发送 request 请求

```
    $response = $spa->sendRequest('post', '/advertiser/signup', {$params}, {$headers});
```

## 详细介绍：

### 初始化配置 $conf

> `uid`: 授权客户的id（即：若是代理商授权，则此处为代理商账户id，若为广告主授权则为广告主账户id），通常与 `appid` 一致，在广点通开通账户后获得；
> `appid`: API授权接入方唯一身份标识，目前为申请API接入的直客或代理商id；
> `appkey`: 开通API授权后获得的私钥，在开通授权邮件中会与app_id一块提供；
> `http_client_type`: 选填项，目前只支持 `curl`，（选填）
> `version`: api 版本，默认 `v3`，目前只支持 `v3`，（选填）

## Spa 类提供的方法

---

### getApp()

```
    public Spa\App getApp()
```

返回在本次请求中 `Spa\App` 的实例

---

### getClient()

```
    public Spa\Client getClient()
```

返回在本次请求中 `Spa\Client` 的实例

---

### get()

```
    public Spa\Response get(
        string $url, // 请求的 url，（必填）
        array|array() $headers = array(), // 请求要传的请求头信息，（选填）
        AccessToken|string|null $accessToken = null // access token，不填的话自动从 $conf 中的配置信息生成，（选填）
    )
```

发起一个 `get` 请求，返回值为 `Spa\Response` 对象

---

### post()

```
    public Spa\Response post(
        string $url, // 请求的 url，（必填）
        array|array() $params = array(), // 请求要传的请求头信息，（选填）
        array|array() $headers = array(), // post 请求参数信息，（选填）
        AccessToken|string|null $accessToken = null // access token，不填的话自动从 $conf 中的配置信息生成，（选填）
    )
```

发起一个 `post` 请求，返回值为 `Spa\Response` 对象

---

### sendRequest()

```
    public Spa\Response sendRequest(
        string $method, // 请求方式 GET/POST
        string $url, // 请求的 url，（必填）
        array|array() $params = array(), // 请求参数信息，（选填）
        array|array() $headers = array(), // 请求要传的请求头信息，（选填）
        AccessToken|string|null $accessToken = null // access token，不填的话自动从 $conf 中的配置信息生成，（选填）
    )
```

发送 `request` 请求，自己指定请求方式，只支持 `GET / POST`，返回值为 `Spa\Response` 对象

---

### request()

```
    public Spa\Request request(
        string $method, // 请求方式 GET/POST
        string $url, // 请求的 url，（必填）
        array|array() $params = array(), // 请求参数信息，（选填）
        array|array() $headers = array(), // 请求要传的请求头信息，（选填）
        AccessToken|string|null $accessToken = null // access token，不填的话自动从 $conf 中的配置信息生成，（选填）
    )
```

收集处理 `request` 请求信息，返回值为 `Spa\Request` 对象

---

### getModules()

```
    public Spa\Object\Modules getModules()
```

返回模块的集合，用于选择要请求的模块

```
    $response = $spa->getModules()->advertiser->signup->send({$params}, {$headers});
```
