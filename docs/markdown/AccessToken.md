# SPA PHP SDK token 类 Tsa\Authentication\AccessToken

Tsa\Authentication\AccessToken 类提供了 access token 相关的操作

---

# Tsa\Authentication\AccessToken

## 实例介绍

### 初始化实例

```
    $conf = array(
        'appid'            => '{appid}',
        'appkey'           => '{appkey}',
        'http_client_type' => 'curl',
        'version'          => 'v3'
    );

    $tsa = new Tsa\Tsa($conf);

    $tsa_app = $tsa->getApp();

    $accessToken = $tsa_app->getAccessToken();
```

或直接创建

```
    $accessToken = new Tsa\Authentication\AccessToken({$appid}, {$appkey});
```

---

## 主要方法

---

### getValue()

```
    public string getValue()
```

返回 access token 的值

---

PS：当该类作为字符串处理时，会自动进行类型转换，返回 access token 的值
