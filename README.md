# AseUtp

Este proyecto es unicamente educativo para la materia de laboratorio de software, donde se pretende crear un sistema que permita el registro de egresados de la universidad tecnologica de pereira mediante un proceso de administración el cual sera encargado de aceptar o no una solicitud que enviara el egresado, una vez la solicitud este aceptada el usuario **(Egresado)** prodra registrarse en nuestra plataforma y despues loguearse

## Pre-requisitos - Instalación

Esta aplicación esta hecha en ***Laravel Framework 7.5.2 - Composer version 1.10.5***, una vez se haya clonado el proyecto, ir a la carpeta del proyecto y ejecutar el comando **composer install**, Automáticamente composer leerá el archivo composer.json y comenzará a instalar todas las dependencias, despues seguiremos con el siguiente paso que es **Crear el archivo .env**, Por defecto, y por razones de seguridad, el archivo .env no es tomado en cuenta en el proyecto (ya que cada contribuidor puede tener diferentes contraseñas que no deberíamos saber) así que tenemos que generar uno por nosotros mismos. Una vez creado, copiaremos lo que hay en el archivo **.env.example** que contiene un ejemplo de las variables.


<img src="https://parzibyte.me/blog/wp-content/uploads/2017/05/archivo-env-ejemplo.png" width="">

Una vez hayamos agregado el .env procederemos a ejecutar las migraciones y los seeders del proyecto, para ellos nos iremos a la carpeta de nuestro proyecto y ejecutaremos el comando ***php artisan migrate:refresh --seed***, con este comando ejecutaremos todas las migraciones y se nos crearan las tablas correspondientes en la base de datos.

Y listo, ya por ultimo nos quedaria ejecutar el comando ***php artisan serve***, y podremos visualizar en nuestro navegador el proyecto

## Autor

**Juan Pablo Perez Santos**<\br>
***Universidad Tecnologica de Pereira***

