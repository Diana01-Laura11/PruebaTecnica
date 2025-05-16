# Nombre del Proyecto

Ejercicio de Inventario de alamacen.

## Información de Desarrollo
### IDE Utilizado
- Visual Studio Code

### Versión del Lenguaje de Programación
- Laravel 12, PHP 8.4.3, Composer 2.8.5 

### DBMS Utilizado y Versión
-  MySQL 8.0

## Pasos para Ejecutar la Aplicación
los siguientes comandos en la terminal
    brew install php@8.4
    brew install composer

En la terminal en la raiz del proyecto 
    composer install
    Modificar el achivo .env linea 23 a 28, la cual hace la conecion a la base de datos

    php artisan key:generate    ---Genera la clave de Laravel

ejecutar 
    php artisan serve  ---En la terminal en la raiz del proyecto  
