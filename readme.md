## Установка

Для установки сборки клонируйте сборку, скопируйте `.env.example` в `.env`
- Замените данные для подключения к базе данных
- Установите имя хоста `ES_HOST` и индекса `ES_INDEX` для ElasticSearch
- Выгрузите миграции `php artisan migrate`
- Сгенерируйте данные `php artisan db:seed`
- Создайте индекс `php artisan vacancy:init-index`

## Доп функции

- Для пересоздания индекса используйте `php artisan vacancy:rebuild-index`
- Для удаления используйте `php artisan vacancy:drop-index`