# SPA PHP SDK token 类 Spa\Authentication\AccessToken

Spa\Authentication\AccessToken 类提供了 access token 相关的操作

---

# Spa\Authentication\AccessToken

## 实例介绍

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

    $spaApp = $spa->getApp();

    $accessToken = $spaApp->getAccessToken();
```

或直接创建

```
    $accessToken = new Spa\Authentication\AccessToken({$uid}, {$appid}, {$appkey});
```

## 主要方法

---

### getValue()

```
    public string getValue()
```

返回 access token 的值

---

PS：当该类作为字符串处理时，会自动进行类型转换，返回 access token 的值
