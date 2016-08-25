# TSA PHP SDK 请求响应类 Tsa\Response

Tsa\Response 类返回了本次请求的响应信息

---

# Tsa\Response

## 实例介绍

### Tsa\Response

```
    $conf = array(
        'appid'            => '{appid}',
        'appkey'           => '{appkey}',
        'http_client_type' => 'curl',
        'version'          => 'v3'
    );

    $tsa = new Tsa\Tsa($conf);

    $response = $tsa->get('/advertiser/read?advertiser_id=123');

    $response = $tsa->post('/advertiser/signup');

    $response = $tsa->sendRequest('post', '/advertiser/signup');
```

发起请求之后返回 `Tsa\Response` 对象

---

## Tsa\Response 类提供的方法

---

### getRequest()

```
    public Tsa\Request getRequest()
```

返回本次请求的 `Tsa\Request` 实例

---

### getApp()

```
    public Tsa\App getApp()
```

返回本次请求的 `Tsa\App` 实例

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

---

### getProperty()

```
    public array getProperty($key = '')
```

> $key string 用户要取的字段名，如果为空，以数组的形式返回所有的键值对，默认空

获取响应的某个字段的值



