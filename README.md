# yii2_cors

Пример настройки CORS для фреймворка Yii2

Подключаем trait в controller и реализуем behaviors

```php
    use CorsFilter;

    public function behaviors()
    {
        $behaviors = parent::behaviors();

        return self::prepareCorsBehaviors($behaviors);
    }
```

Для включения CORS устанавливаем в переменные среды .env 

> ALLOWED_CREDENTIALS=true

и перечисляем через запятую наши домены

> ALLOWED_ORIGIN=http://localhost,http://localhost:8080,https://example.com

в CorsFilter.php рабочая последовательность которую удалось получить для Yii2

