# webapp-tareas*
---
***webapp-tareas*** es una aplicación para la gestión de tareas escrita en **Laravel 8**.

A continuación encontrarás una pequeña guía para su instalación y testing, junto con algunos datos que podrían resultarte de utilidad en cuanto decidas gestionar las tareas de tu equipo con esta alternativa.


## Descarga

1. Si vas a probar la aplicación en local, es recomendable que cuentes con un paquete completo que te permita implementar un servidor web. De todas las opciones disponibles, recomiendo *Laragon* pero cualquier otra debería funcionar.

2. Una vez que tengas listo el punto anterior, dirigite a la carpeta que aloja tus proyectos dentro del directorio de dicho paquete (la carpeta llamada "www" en el caso de *Laragon*). Escribí en tu consola los siguientes comandos: 

```
git clone https://github.com/davidsandez/webapp-tareas.git

cd webapp-tareas

composer install

```

---
NOTA: para que el comando anterior funcione debes tener instalado ***composer*** en tu equipo. (Laragon lo incluye por defecto).

---

3. Ahora que hemos generado nuestra carpeta *vendor* podemos de hablar de variables de entorno y bases de datos.
* Creá un archivo *.env* y agregale el contenido que hallarás en *.env.example*.
* Especificá en tu nuevo archivo *.env* el apartado de base de datos y hacé coincidir las constantes de configuración como **DB_DATABASE**, **DB_USERNAME** y **DB_PASSWORD** con las credenciales de la base de datos que crearás a continuación.
* Finalmente deberás crear tu base de datos.

4. Muy bien, de modo que tenemos nuestro archivo *.env* y nuestra base de datos preparados. Nos encontramos listos para retornar a nuestra consola y ejecutar nuestras *migrations*:

```
php artisan migrate --seed
```

Esto llenará nuestra base de datos recién creada con las tablas y registros (de prueba) necesarios para hacer funcionar la aplicación.


5. Ahora que tienes casi todo listo, *Laravel 8* necesita que ejecutes el comando siguiente para asignarle una clave a tu aplicación:

```
php artisan key:generate
```
7. Eso es todo en cuanto a PHP y Laravel. Pero ahora necesitamos ocuparnos de la compilación de javascript y css. Para ello, del mismo modo que hicimos con la carpeta *vendor*, ahora necesitamos generar la carpeta *node_modules*, que alojará nuestras dependencias de javascript.
He aquí este comando:
```
npm install
npm run dev

```
---
NOTA: para que el comando anterior funcione debes tener instalado ***nodejs*** en tu equipo. (Que una vez más, Laragon incluye por defecto).

---

8. Para ejecutar los test en nuestra aplicación debemos ejecutar el siguiente comando:
```
php artisan test --env=testing

``` 

Para acceder a la documentación de nuestra api, deberíamos poder encontrarla en:
http://localhost/wepapp-tareas/public/api/docs

Para acceder a la interface gráfica de la aplicación, deberíamos usar esta otra ruta:
http://localhost/wepapp-tareas/public

---
NOTA: las credenciales del usuario administrador son las siguientes:
usuario: admin@admin.com
contraseña: 123456789
---