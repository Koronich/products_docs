## Подъем проекта:

1. Заполнить DB_* параметры в env
2. Запустить `composer install`
3. Запустить миграции `php artisan migrate`
4. Для хостинга выполнить `php artisan serve`

## Принятые Решения:

1. Для корректности механизма учёта была упразднена возможность изменять количество товара при редактировании. Все
   изменения количества товара реализуются через документы.
2. Для ускорения разработки, был использован JQuery и допущен ряд инженерных упрощений.
3. В рамках предоставленного тз, для ускорения разработки было допущено нарушение третьей нормальной формы модели БД,
   вследствие чего тип документа хранится в таблице `documents` в enum-поле.
4. Взаимодействие с моделями было вынесено в простые сервисы и репозитории.
5. В проекте не предусмотрена регистрация, вследствие и авторизация, что не противоречит ТЗ.
