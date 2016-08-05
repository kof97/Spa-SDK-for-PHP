# SPA PHP SDK 接口请求实体类 Spa\Object\Interfaces\

Spa\Object\Interfaces\ 命名空间下是各个接口的请求实体类

---

# Spa\Object\Interfaces\

## 如何调用

```
	$conf = array(
        'uid'    => '{uid}',  
        'appid'  => '{appid}',
        'appkey' => '{appkey}'
    );

    $spa = new Spa\Spa($conf);

    // 获取模块集合
    $modules = $spa->getModules();

    // 选择模块 -> 选择接口 -> 发送请求
    $modules->advertiser->signup->send({$params}, {$headers}, {$access_token});
```

## 提供的方法

### send()

```
	public Spa\Response send(
        $params = array(),
        $headers = array(),
        $access_token = null
    )
```