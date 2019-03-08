## Установка

Для установки сборки клонируйте сборку, скопируйте `.env.example` в `.env`
- Установите зависимости `composer install`
- Замените данные для подключения к базе данных
- Установите имя хоста `ES_HOST` и индекса `ES_INDEX` для ElasticSearch
- Установите ключ безопасности `php artisan key:generate`
- Выгрузите миграции `php artisan migrate`
- Сгенерируйте данные `php artisan db:seed`
- Создайте индекс `php artisan vacancy:init-index`
- Запустите сервер `php artisan serve`

## Доп функции

- Для пересоздания индекса используйте `php artisan vacancy:rebuild-index`
- Для удаления индекса используйте `php artisan vacancy:drop-index`