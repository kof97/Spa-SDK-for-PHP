# TSA PHP SDK 请求端实例类 Tsa\Client

Tsa\Client 类用于发起请求

---

# Tsa\Client

## 实例介绍

### Tsa\Client

```
    new Tsa\Client(
        ClientInterface $http_client = null, 
        $version = null
    )
```

> **$http_client :** `Tsa\HttpClients\ClientInterface` 的实例，用于发起请求
> **$version :** 请求的 api 版本，默认 v3，目前只支持 v3



一般由 `Tsa\Tsa` 类初始化，可以直接通过 `Tsa\Tsa` 的 `getClient()` 方法获取实例

例：

```
    $conf = array(
        'appid'            => '{appid}',
        'appkey'           => '{appkey}',
        'http_client_type' => 'curl',
        'version'          => 'v3'
    );

    $tsa = new Tsa\Tsa($conf);

    $tsa_client = $tsa->getClient();
```

或是直接创建

```
    $tsa_client = new Tsa\Client({$http_client}, {$version});
```

---

## 方法介绍

---

### setHttpClient()

```
    public void setHttpClient(Tsa\HttpClients\ClientInterface $http_client)
```

设置 `$http_client`，用于发起 http 请求

---

### getHttpClient()

```
    public Tsa\HttpClients\ClientInterface getHttpClient()
```

获取 `Tsa\HttpClients\ClientInterface` 对象实例

---

### sendRequest()

```
    public Tsa\Response sendRequest(Tsa\Request $request)
```

参数为 `Tsa\Request` 的对象

发起一个请求，返回值为 `Tsa\Response` 的对象

如果出错，则抛出 `TsaSDKException` 错误
