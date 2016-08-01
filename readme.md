# PHP SDK for SPA

环境：PHP5.3 以上

使用：引入 `autoload.php` 即可使用

```
	require_once __DIR__ . './src/Spa/autoload.php';
```

---

## 快速使用

### 实例化对象
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
    $response = $spa->get('/advertiser/read?advertiser_id=123');
```

### 发送 post 请求

```
    $response = $spa->post('/advertiser/signup');
```

### 发送 request 请求

```
    $response = $spa->sendRequest('post', '/advertiser/signup');
```

### response 处理

```
	// 获取请求响应状态码 (int)
	$httpStatusCode = $response->getHttpStatusCode();

	// 获取响应头信息 (array)
	$headers = $response->getHeaders();

	// 获取响应 body 信息 (json)
	$body = $response->getBody();
```

