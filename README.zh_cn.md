# Identicon 生成器 PHP 版

[![Build Status](https://secure.travis-ci.org/yzalis/Identicon.png)](http://travis-ci.org/yzalis/Identicon)
[![codecov.io](https://codecov.io/github/yzalis/Identicon/coverage.svg?branch=master)](https://codecov.io/github/yzalis/Identicon?branch=master)

**Identicon** 是一个基于字符串生成一个 [identicon](http://en.wikipedia.org/wiki/Identicon) 图像的库。

以下是一些精彩的输出例子！

![Identicon example #1](doc/benjaminAtYzalisDotCom.png)&nbsp;&nbsp;
![Identicon example #2](doc/Benjamin.png)&nbsp;&nbsp;
![Identicon example #3](doc/8.8.8.8.png)&nbsp;&nbsp;
![Identicon example #4](doc/8.8.4.4.png)&nbsp;&nbsp;
![Identicon example #5](doc/yzalis.png)

## 安装

推荐通过 composer 安装 Identicon。

只需要在你的项目中引入本库：

``` bash
composer require yzalis/identicon
```

## 使用

生成的图像都是透明背景的 PNG 格式。

字符串可以是邮箱，IP 地址，用户名，ID 或者其他的东西。

### 生成一个 identicon

创建一个 ```Identicon``` 对象。

``` php
$identicon = new \Identicon\Identicon();
```

然后你可以生成或者显示一张图像

``` php
$identicon->displayImage('foo');
```

或者生成并获取图像的信息

``` php
$imageData = $identicon->getImageData('bar');
```

或者生成并获取 base 64 图片的 uri 以便整合到 HTML 的 img 标签中。

``` php
$imageDataUri = $identicon->getImageDataUri('bar');
```
``` php
<img src="<?php echo $imageDataUri; ?>" alt="bar Identicon" />
```


### 修改图像大小

默认的大小是 64 像素。如果你想改变图像大小，只需要添加第二个参数。在这个例子中是 512 x 512px。

``` php
$identicon->displayImage('foo', 512);
```

### 颜色

图像颜色是由字符串的哈希值自动生成的，但是你可以添加第三个参数指定一个颜色。

颜色值可以使用一个 6 字符的十六进制字符串

``` php
$identicon->displayImage('bar', 64, 'A87EDF');

$identicon->displayImage('bar', 64, '#A87EDF');
```

也可以使用由红(R)、绿(G)、蓝(B)数值组成的数组

``` php
$identicon->displayImage('foo', 64, array(200, 100, 150));
```

就是这样！

### 生成一个 SVG 格式的 identicon

你只需要修改一个地方：
``` php
$identicon = new \Identicon\Identicon(new SvgGenerator());
$imageDataUri = $identicon->getImageDataUri('bar');
```
``` php
<img src="<?= $imageDataUri; ?>" alt="bar Identicon" />
```

### 边距

默认是没有边距的，如果你想要带边距的图像，你可以添加第五个参数。推荐使用图像的大小的十分之一。

在这个例子中，我们设置了灰色的背景，这样你可以很明显的看到边距：

![Identicon example #6](doc/benjaminAtYzalisDotCom_with_margin.png)&nbsp;&nbsp;
![Identicon example #7](doc/Benjamin_with_margin.png)&nbsp;&nbsp;
![Identicon example #8](doc/8.8.8.8_with_margin.png)&nbsp;&nbsp;
![Identicon example #9](doc/8.8.4.4_with_margin.png)&nbsp;&nbsp;
![Identicon example #10](doc/yzalis_with_margin.png)

```php
$identicon->displayImage('foo', 100, null, '#f0f0f0', 10);
```

## 单元测试

为了运行单元测试，你需要一组依赖，它们可以通过 Composer 安装：

```
php composer.phar install
```

一旦安装，就可以使用下面的命令：

```
./vendor/bin/phpunit
```

应该一切都好了。


## 贡献者名单

* Benjamin Laugueux <benjamin@laugueux.org>
* [所有贡献者](https://github.com/yzalis/Identicon/graphs/contributors)

灵感来自于一篇关于 Identicon 的 Github [博客](https://github.com/blog/1586-identicons)。 


## 证书

Identicon 是根据 MIT 许可证发布的。详细信息请参见附带的 LICENSE 文件。
