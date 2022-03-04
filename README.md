<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>


## EXAMEN ALVA FLORES ROOSBELTH

Cómo clonar un proyecto de Laravel desde GitHub

- Instalar dependencias.
- Crear una base de datos
-  Crear el archivo .env
-  Generar una clave
-  Migrar la base de datos

Pasos detallados


## Instalar dependencias

Instalaremos con Composer, el manejador de dependencias para PHP, las dependencias definidos en el archivo composer.json. Para ello abriremos una terminal en la carpeta del proyecto y ejecutaremos:
```bash
composer install
```

```bash
npm install
```

## Crear una base de datos

Entre las bases de datos MySQL y creamos una base de datos con el nombre prueba_seleccion

## Crear el archivo .env

Podemos duplicar el archivo .env.example, renombrarlo a .env e incluir los datos de conexión de la base de datos que indicamos en el paso anterior.
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=prueba_seleccion
DB_USERNAME=root
DB_PASSWORD=secret
```

## Crear el archivo .env

La clave de aplicación es una cadena aleatoria almacenada en la clave APP_KEY dentro del archivo .env. Notarás que también falta.

Para crear la nueva clave e insertarla automáticamente en el .env, ejecutaremos:

```bash
php artisan key:generate

```
## Ejecutar migraciones

Por último, ejecutamos las migraciones para que se generen las tablas con:

``` bash
php artisan migrate 
```

## Pregunta de migración

### ¿Qué ventajas nos ofrece el uso de migraciones en una aplicación Laravel en producción?

Las migraciones en Laravel tienen varias ventajas comparado con crear la estructura de la base de datos directamente:

- Permiten crear, hacer o deshacer modificaciones a las tablas, columas, índices desde una clase, sin tener que crear un script para conectarse o utilizar línea de comando o algún administrador para escribir las líneas necesarias.
- Simplifican la sintaxis, especialmente para quienes no están familiarizados con lo básico de MySQL, PostgreSQL, etc.
- Aportan control de versiones de la base de datos, en vez de tener que modificar algún un archivo gigante con el código SQL, y si hubo algún error, es tan sencillo como hacer migrate:rollback.
