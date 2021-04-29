# ОБЩЕЕ ОПИСАНИЕ ПРОЕКТА

Реализация проекта по [тестовому заданию](https://github.com/goodmartian/test-pulttaxi/wiki/Тестовое-задание).

# ИНСТАЛЯЦИЯ

Склонируйте проект в директорию с сервером:

`git clone https://github.com/goodmartian/test-pulttaxi.git`

Затем, открыв из папки проекта консоль, введите команду для установки пакетов Laravel:

`composer install`

Создайте базу данных на сервере и заполните поля файла .env, находящийся в папке проекта по примеру:

`DB_CONNECTION=mysql`

`DB_HOST=127.0.0.1`

`DB_PORT=3306`

`DB_DATABASE=backendTest`

`DB_USERNAME=root`

`DB_PASSWORD=null`

В открытой консоли директории проекта введите команду для генерации таблиц базы данных:

`php artisan migrate --seed`

В той же консоли для запуска сайта по адресу `http://localhost:8000` введите команду:

`php artisan serve`

Откройте сайт в браузере по адресу  `http://localhost:8000`

Или же вы можете поднять проект с помощью Sail
