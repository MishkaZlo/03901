- php v7.4.3
- mysql  v8.0.29
- utf8

1. Install migrations:
   - php artisan migrate --seed

2. подключить в .env БД (mysql)

3. Уствновить в .env API токен: 
   - API_TOKEN=key

Postman-коллекция в корне проекта:
03901-carSharingSearch.postman_collection.json

Авторизация для Postman:
 по токену: x-api-key = key


Спроектирвоана структура хранения данных по аренде автомобилей.
Связь водителей и автомобилей реализована через pivot таблицу car_driver с дополнительными атрибутами времени начала и окончания аренды (null если автомобиль еще в аренде)

Разраблтан api-метод getCars()
Выводит все автомобили парка со списком водителей, которые когда либо брали в аренду автомобиль
параметры запроса:
- фильтр only_using - выведет автомобили, которые сейчас взяты в аренду ('Y')
- параметр query - строка для поиска, в реализации обязательна, если указаны поля для поиска query_params ('nissan'')
- параметр query_params - массив, определяющий по каким полям осуществлять поиск, обязательный, если указан параметр query (['mark', 'model', 'driver_name'])
- параметр sort - (доступные варианты mark, model, start_time) - параметр для сортировки
- параметр sort_mode - направление сортировки (asc/desc)
