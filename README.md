
Инструкция по развертыванию wrisp sibgmu
=============================================

**1**.Установить PHP (не ниже версии 7.1), Composer, PHPStorm.

**2**.Склонировать образ проекта с репозитория к себе на ПК:
>git clone "ссылка с репозитория"

**3**.Установить Composer и установить сами пакеты из текущего каталога:
>composer install

**4**.Установить базу данных MySQL. Править конфигурационный файл можно в config/packages/doctrine.yaml,
где:

`driver:` - 'ваш драйвер' (MySQL или другой),

`server_version` - версия MySQL.

**5**.В файле .env, в строке DATABASE_URL, указать параметры MySQL, где:

`db_user` - имя локального пользователя (например: root),

`db_password` - пароль пользователя,

`db_name` - имя базы данных.

**6**.Создайте базу данных с помощью команды:
>php bin/console doctrine:database:create

**7**.Запустить сервер:
>php bin/console server:run

**8**.Создать пользователя-суперадмина:
>php bin/console fos:user:create --super-admin