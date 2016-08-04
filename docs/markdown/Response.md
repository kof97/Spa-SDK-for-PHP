# SPA PHP SDK 请求响应类 Spa\Response

Spa\Response 类返回了本次请求的响应信息

---

# Spa\Response

## 实例介绍

### Spa\Response

```
    $conf = array(
        'uid'               => '{uid}',
        'appid'             => '{appid}',
        'appkey'            => '{appkey}',
        'http_client_type'  => 'curl',
        'version'           => 'v3'
    );

    $spa = new Spa\Spa($conf);

    $response = $spa->get('/advertiser/read?advertiser_id=123');

    $response = $spa->post('/advertiser/signup');

    $response = $spa->sendRequest('post', '/advertiser/signup');
```

发起请求之后返回 `Spa\Response` 对象

## Spa\Response 类提供的方法

---

### getRequest()

```
    public Spa\Request getRequest()
```

返回本次请求的 `Spa\Request` 实例

---

### getApp()

```
    public Spa\App getApp()
```

返回本次请求的 `Spa\App` 实例

---

### getAccessToken()

```
    public string getAccessToken()
```

返回 access token 信息

---

### getHttpStatusCode()

```
    public int getHttpStatusCode()
```

返回本次请求返回的状态码

---

### getHeaders()

```
    public array getHeaders()
```

返回本次请求返回的响应头信息

---

### getBody()

```
    public json getBody()
```

返回本次请求的 `body` 信息（json 格式）
