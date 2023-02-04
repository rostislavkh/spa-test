<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

## Збірка проекту

1) Налаштувати корневий каталог на сервері, щоб він був <code>/public</code>
2) Створити файл з налаштуваннями <code>cp .env.example .env</code> (налаштувати конфігурацію)
3) <code>composer install</code>
4) <code>php artisan migrate</code>
5) <code>npm install</code>
6) <code>php artisan storage:link</code> (якщо не завантажуються фотографії, або не відображаються, то перверірте також доступи до папки <code>/public</code>)

## Конфигурація

Версія php: <code>8.1.6</code><br>
Версія NodeJS: <code>v19.3.0</code><br>
Версія npm: <code>9.2.0</code><br>
Версія Laravel: <code>9.48.0</code><br>
