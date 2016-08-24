# SPA PHP SDK 应用实例类 Tsa\App

Tsa\App 类存储了应用实例的基本信息

---

# Tsa\App

## 实例介绍

### Tsa\App

```
    new Tsa\App({$appid}, {$appkey})
```

初始化要提供用户的 `appid` `appkey`

一般由 `Tsa\Tsa` 类初始化，可以直接通过 `Tsa\Tsa` 的 `getApp()` 方法获取实例

例：

```
    $conf = array(
        'appid'            => '{appid}',
        'appkey'           => '{appkey}',
        'http_client_type' => 'curl',
        'version'          => 'v3'
    );

    $tsa = new Tsa\Tsa($conf);

    $tsaApp = $tsa->getApp();
```

---

## 方法介绍

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
    public Tsa\Authentication\AccessToken getAccessToken()
```

返回 `Tsa\Authentication\AccessToken` 的实例
