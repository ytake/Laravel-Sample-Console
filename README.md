# Laravel-Sample-Console

このリポジトリは書籍[Laravelリファレンス](http://book.impress.co.jp/books/1114101107)

[アドベントカレンダー](http://www.adventar.org/calendars/941)のArtisanサンプルです。

# インストール
packagistに登録していませんので、動作させたい場合はcomposer.jsonに下記のように記述してください。

```json
  "repositories": [
    {
      "type": "git",
      "url": "git@github.com:ytake/Laravel-Sample-Console.git"
    }
  ],
  "require": {
    "php": ">=5.5.9",
    "laravel/framework": "5.1.*",
    "ytake/laravel-sample-console": "dev-master"
  },
```

最後にconfig/app.phpのprovidersに、下記のサービスプロバイダを追記してください。

```php
Ytake\Laravel\SampleConsole\PackageServiceProvider::class,
```

