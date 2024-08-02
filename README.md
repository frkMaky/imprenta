# imprenta
INFO IMPORTANTE INSTALACION!!!

1 Proyecto con node.js, bootstrap, php , composer
Requiere node.js y composer para su correcta ejecucion

2. Instalacion de la base de datos
Se incluye archivo "fastprintspain.sql" para ejecutar y tener la base de datos 
Si se quiere cambiar el nombre de la base de datos modificar las tres primeras lineas por el nombre de la base de datos que se desea

DROP DATABASE IF EXISTS baseDatosNombreWeb;
CREATE DATABASE baseDatosNombreWeb;
USE baseDatosNombreWeb;

Ejemplo si la base se llama miweb:
DROP DATABASE IF EXISTS miweb;
CREATE DATABASE miweb;
USE miweb;


** IMPORTANTE > Si se modifica la base de datos hay que modificar el archivo dentro de la carpeta
NombreWeb/includes/.env

DB_HOST=localhost
DB_USER=root
DB_PASS
DB_NAME=baseDatosNombreWeb

EMAIL_HOST=
EMAIL_PORT=
EMAIL_USER=
EMAIL_PASS=

HOST=http://localhost:3000

Poniendo los valores necesarios para el host y el servidor de correo (mailtrap configurado por defecto para pruebas)

3. Instalacion del sitio

Copiar la carpeta "NombreWeb" en el directorio de tu servidorabl

El sitio arranca desde la carpeta NombreWeb/public en el archivo index.php 

* Precaucion con XAMPP, ya que arranca desde la carpeta raíz por defecto


ADVERTENCIA !!!! para poder subir y bajar imagenes la carpeta "NombreWeb/build/medios" debe tener permisos de lectura y escritura en el servidor
* boton derecho > propiedades > permisos 

En los INSERT de SQL se incluyen 2 usuarios por defecto 
admin@correo.com (password: admin)
usuario@correo.com (password: 1234) 
