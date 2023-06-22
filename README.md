# Laravel Cart API
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>
## Qué es Laravel

Laravel es un framework de código abierto para desarrollar aplicaciones y servicios web con PHP 5, PHP 7 y PHP 8. Su filosofía es desarrollar código PHP de forma elegante y simple, evitando el "código espagueti". Fue creado en 2011 y tiene una gran influencia de frameworks como Ruby on Rails, Sinatra y ASP .NET MVC.​

## El problema:

Como parte de la plataforma necesitamos diseñar una cesta de la compra que permita a todas aquellas personas interesadas en productos de deporte poder comprar de forma eficiente y rápida.
sE por ello, que el equipo de desarrollo ha decidido que la mejor manera de implementarlo se partir de una API. Tu misión consiste en iniciar el desarrollo de ese carrito.
### Requerimientos
Necesitamos que el carrito sea capaz de hacer todo esto:
- Gestión de productos eficiente que permita: añadir, actualizar y eliminar productos del carrito.
- Obtener el número total de productos en el carrito. - Confirmar al compra de carrito.
  Como vas a ser quién inicie le desarrollo del carrito, el diseño se libre a tu elección. Y is tienes dudas específicas no dudes en preguntarnos.
### Qué valoramos? Por este orden:
- Código limpio, simple y fácil de entender.
- Consideramos el testing un factor clave al momento de desarrollar nuevo código. Es necesario lograr
  una máxima cobertura de los casos de uso.
- El time to market para nosotros es fundamental. Eso significa que valoramos por encima de muchos
  otros factores que la solución sea simple y sobretodo **fácil de mantener**.
- Performance, performance y por si no lo habíamos mencionado performance :). Aclaración: No nos sirve
  una solución que tiene muy buena performance pero que nadie más del equipo va a saber tocar o que al curva de aprendizaje va a ser muy pronunciada. Así que ahi vas a tener que balancear.
- No valoramos la UI.
- Nos da igual qué framework uses, siempre y cuando el dominio esté desacoplado del mismo.Como parte de la plataforma necesitamos diseñar una cesta de la compra que permita a todas aquellas personas interesadas en productos de deporte poder comprar de forma e fi c i e n t e y rápida. Por ello, que el equipo de desarrollo ha decidido que la mejor manera de implementarlo se partir de una API. Tu misión consiste en iniciar el desarrollo de ese carrito.
### Requerimientos
Necesitamos que el carrito sea capaz de hacer todo esto:
- Gestión de productos eficiente que permita: añadir, actualizar y eliminar productos del carrito.
- Obtener el número total de productos en el carrito. - Confirmar al compra de carrito.
  Como vas a ser quién inicie le desarrollo del carrito, el diseño se libre a tu elección. Y is tienes dudas específicas no dudes en preguntarnos.
## Qué valoramos? Por este orden:
- Código limpio, simple y fácil de entender.
- Consideramos el testing un factor clave al momento de desarrollar nuevo código. Es necesario lograr
  una máxima cobertura de los casos de uso.
- El time to market para nosotros es fundamental. Eso significa que valoramos por encima de muchos
  otros factores que la solución sea simple y sobretodo **fácil de mantener**.
- Performance, performance y por si no lo habíamos mencionado performance :). Aclaración: No nos sirve
  una solución que tiene muy buena performance pero que nadie más del equipo va a saber tocar o que al curva de aprendizaje va a ser muy pronunciada. Así que ahi vas a tener que balancear.
- No valoramos la UI.
- Nos da igual qué framework uses, siempre y cuando el dominio esté desacoplado del mismo.



## Instalar el proyecto
Para instalar el proyecto es necesario clonar el repositorio si tienes git instalado (esto es opcional, puedes descargarlo [aquí](https://git-scm.com/downloads)) en el pc o puedes descargar el .zip desde [aquí](https://github.com/JDamianCabello/LaravelCartApiHexagonal/archive/refs/heads/master.zip).

El comando para clonar el repositorio (en caso de no descargar el .zip) desde la consola es:

    git https://github.com/JDamianCabello/LaravelCartApiHexagonal.git

De una forma u otra tendrás una carpeta llamada **LaravelCartApiHexagonal-master**

Para ejecutar los comandos de PHP, necesitas tener PHP instalado, según tu plataforma puedes seguir un tutorial u otro:


|[Windows](https://code.tutsplus.com/es/tutorials/how-to-install-php-on-windows--cms-35435)|[Linux](https://www.scriptcase.net/docs/es_es/v9/manual/02-scriptcase-installation/06-linux_php/)|[Mac](https://www.neoguias.com/instalar-php-macos/)|
|--|--|--|

Una vez instalado PHP, necesitamos instalar composer, esto se puede hacer [desde su web](https://getcomposer.org/doc/00-intro.md). Donde también encontraremos información de uso e instalación.

Con todo listo entramos dentro de la carpeta, abrimos un terminal/cmd y usamos el comando de composer para instalar las dependencias:

    composer install

Se instalaran todas las dependencias necesarias para ejecutar la api. Una vez acabada la instalación usaremos el comando de laravel para ejecutar el servidor local:

    php artisan serve

Con esto tendremos el servidor en local para probar la api en la url [127.0.0.1:8000/api/"](http://127.0.0.1:8000/api/)

En caso de querer usar el front es necesario instalar las dependencias de JavaScript utilizando npm o yarn. Si no tienes npm o yarn instalado, asegúrate de descargar e instalar Node.js antes de continuar.

    npm install   # o yarn install

Ahora, puedes iniciar el servidor de desarrollo para el proyecto PHP utilizando Vite. Ejecuta el siguiente comando:

    npm run dev   # o yarn dev


## FAQ

- La api necesita un API_KEY de conexión el cual está hardcoded en el .env, ese token es el siguiente (se puede cambiar por el que se quiera):

  API_KEY=a17d9c12-2403-437f-b2a9-7033c1a1d004

- El usuario y la contraseña por defecto para iniciar sesión son:

> - Email: root@root.es
    >     - password: root

- Para setear los datos en la base de datos deberemos usar el comando **php artisan database:seed**

- Si tienes problemas con la base de datos, dentro del proyecto vamos a la carpeta `storage/database`, dentro de la misma encontraremos un fichero llamado `database.sqlite`.

  Eliminamos el fichero y creamos un nuevo fichero llamado igual **database.sqlite** y ejecutamos en el terminal/cmd el comando que nos crea la estructura de tablas en la base de datos el cual es: **`php artisan migrate`**.

