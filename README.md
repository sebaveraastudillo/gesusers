# GesUsers

_Este proyecto permite tomar de una lista de usuarios desde una API, y luego si es que el usuario lo desea poder registrarlos mediante un modal_

### Pre-requisitos 📋

_Para instalar este proyecto se necesitan los siguientes requerimientos:_

 - PHP 7.X
 - Apache 2
 - Node y NPM
 - Composer

### Instalación 🔧

_Para instalar primero se debe clonar el proyecto y luego instalar las dependencias de composer desde la raíz del proyecto_

```
$ composer install
```

_Luego, se deben instalar las dependencias de NPM y ejecutar el mix_

```
$ npm install
$ npm run dev

```

_Para terminar se debe crear en la raíz del proyecto un archivo .env con las configuraciones de Laravel_

```
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:pqCZA/uas7NuvtI/PI+FAGYvgCIdaDUDYKGi/FoLbpI=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack

DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=test
DB_USERNAME=root
DB_PASSWORD=root

BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"


```

## Despliegue 📦

_para el despliegue se debe abrir en un navegador tu IP local mas la ruta de tu proyecto [http://localhost/gesusers/public]_

## Construido con 🛠️

_Laravel 7 y Vue JS 2_

* [Laravel](https://laravel.com/) - El framework web usado
* [Vue JS](https://vuejs.org/)

## Autores ✒️

* **Sebastian Vera** - *Trabajo Inicial* - [sebaveraastudillo](https://github.com/sebaveraastudillo)