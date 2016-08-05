# SPA PHP SDK 请求端实例类 Spa\Client

Spa\Client 类用于发起请求

---

# Spa\Client

## 实例介绍

### Spa\Client

```
    new Spa\Client(
        ClientInterface $httpClient = null, 
        $version = null
    )
```

> **$httpClient :** `Spa\HttpClients\ClientInterface` 的实例，用于发起请求
> **$version :** 请求的 api 版本，默认 v3，目前只支持 v3



一般由 `Spa\Spa` 类初始化，可以直接通过 `Spa\Spa` 的 `getClient()` 方法获取实例

例：

```
    $conf = array(
        'uid'               => '{uid}',
        'appid'             => '{appid}',
        'appkey'            => '{appkey}',
        'http_client_type'  => 'curl',
        'version'           => 'v3'
    );

    $spa = new Spa\Spa($conf);

    $spaClient = $spa->getClient();
```

或是直接创建

```
    $spaClient = new Spa\Client({$httpClient}, {$version});
```

## 方法介绍

---

### setHttpClient()

```
    public void setHttpClient(Spa\HttpClients\ClientInterface $httpClient)
```

设置 `$httpClient`，用于发起 http 请求

---

### getHttpClient()

```
    public Spa\HttpClients\ClientInterface getHttpClient()
```

获取 `Spa\HttpClients\ClientInterface` 对象实例

---

### sendRequest()

```
    public Spa\Response sendRequest(Spa\Request $request)
```

参数为 `Spa\Request` 的对象

发起一个请求，返回值为 `Spa\Response` 的对象

如果出错，则抛出 `SpaSDKException` 错误
