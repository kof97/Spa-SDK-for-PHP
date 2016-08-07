# SPA PHP SDK 应用实例类 Spa\App

Spa\App 类存储了应用实例的基本信息

---

# Spa\App

## 实例介绍

### Spa\App

```
    new Spa\App({$uid}, {$appid}, {$appkey})
```

初始化要提供用户的 `uid` `appid` `appkey`

一般由 `Spa\Spa` 类初始化，可以直接通过 `Spa\Spa` 的 `getApp()` 方法获取实例

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

    $spaApp = $spa->getApp();
```

---

## 方法介绍

---

### getUid()

```
    public string getUid()
```

获取用户 `uid`

---

### getAppid()

```
    public string getAppid()
```

获取用户 `appid`

---

### getAppkey()

```
    public string getAppkey()
```

获取用户 `appkey`

---

### getAccessToken()

```
    public Spa\Authentication\AccessToken getAccessToken()
```

返回 `Spa\Authentication\AccessToken` 的实例
