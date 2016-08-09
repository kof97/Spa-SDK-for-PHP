# SPA PHP SDK 请求实例类 Spa\Request

Spa\Request 类存储处理请求信息

---

# Spa\Request

## 实例介绍

### Spa\Request

```
    new Spa\Request(
        $app,
        $method,
        $url,
        $params,
        $headers,
        $access_token
    )
```

> `$app`: {App|null} Spa\App 实例
> `$method`: {string|null} 请求的方式，GET / POST
> `$url`: {string|null} 请求的 URL
> `$params`: {array|array()} 请求参数
> `$headers`: {array|array()} 请求头信息
> `$access_token`: {AccessToken|string|null} access token




用于收集并处理请求信息

初始化实例：

```
    $spaApp = new Spa\App({$appid}, {$appkey});

    $spa_request = new Spa\Request($spaApp, 'GET', '/advertiser/read');
```

或通过 `Spa\Spa` 类初始化

```
    $conf = array(
        'appid'            => '{appid}',
        'appkey'           => '{appkey}',
        'http_client_type' => 'curl',
        'version'          => 'v3'
    );

    $spa = new Spa\Spa($conf);

    $spa_request = $spa->request('GET', '/advertiser/read');
```

发送请求信息

```
    $response = $spa->getClient()->sendRequest($spa_request);
```

---

## 方法介绍

---

### setApp()

```
    public Spa\Request setApp(App $app = null)
```

用于设置 `Spa\App` 对象，返回 `Spa\Request` 对象，可以使用链式操作

---

### getApp()

```
    public Spa\App getApp()
```

获取 `Spa\App` 实例

---

### setMethod()

```
    public Spa\Request setMethod(string $method)
```

设置 `method`，返回 `Spa\Request` 对象，可以使用链式操作

---

### getMethod()

```
    public string getMethod()
```

返回请求的 `method`

---

### setUrl()

```
    public Spa\Request setUrl(string $url)
```

设置请求 `URL`，返回 `Spa\Request` 对象，可以使用链式操作

---

### getUrl()

```
    public string getUrl()
```

获取请求 `URL`

获取的同时会对 `method` 进行验证，对 `url` 进行处理，返回处理后的 `url`

验证处理过程中如果出错则会抛出 `SpaSDKException` 错误

---

### setParams()

```
    public Spa\Request setParams(array $params)
```

设置请求参数，返回 `Spa\Request` 对象，可以使用链式操作

---

### getParams()

```
    public array getParams()
```

获取请求参数

---

### getPostParams()

```
    public array getPostParams()
```

获取 `post` 请求参数

---

### setHeaders()

```
    public Spa\Request setHeaders(array $headers)
```

设置请求头信息，返回 `Spa\Request` 对象，可以使用链式操作

---

### getHeaders()

```
    public array getHeaders()
```

获取请求头信息，同时会对 access token 进行验证，若不通过则会抛出 `SpaSDKException` 错误

---

### setAccessToken()

```
    public Spa\Request setAccessToken(AccessToken|string $access_token)
```

设置 access token，返回 `Spa\Request` 对象，可以使用链式操作

---

### getAccessToken()

```
    public AccessToken|string getAccessToken()
```

获取 access token

---

### validateAccessToken()

```
    public void validateAccessToken()
```

验证实例中的 `access token`，验证失败则抛出 `SpaSDKException` 错误

---

### validateMethod()

```
    public void validateMethod()
```

验证实例中的 `method`，验证失败则抛出 `SpaSDKException` 错误
