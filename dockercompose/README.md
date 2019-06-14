Este juego de contenedores está compuesto por 3 contenedores:
1. Contenedor web: apache2 + php.
2. Contenedor mysql: base de datos MySQL.
3. Contenedor phpmyadmin: administración de MySQL a través de páginas web.

Para el despliegue de esta aplicación construida en contenedores realiza las siguientes acciones:
1. En un directorio de tú máquina, sitúa los ficheros Dockerfile, docker-compose.yml y el directorio www/
2. Levanta los contenedores con el comando:

`docker-compose up`

3. Se levantarán los contenedores. En este momento se podrán acceder a ellos pero al no existir todavía una base de datos en los contenedores, la presentación será incompleta.
4. Accede a localhost:8085, con lo que se abrirá phpmyadmin. Accede con las credenciales que aparecen en el docker-compose.yml
    + root
    + secret
    
5. Importa la base de datos .sql presentada aquí y dale el nombre 'restaurants'.
6. Ejecuta el comando `docker ps` y toma el nombre o el ID del contenedor MySQL.
7. Accede al fichero www/connection.php y en la variable 'DB_HOST' sitúa el nombre o ID del contenedor para poder establecer la conexión con la base de datos.
8. ¡A disfrutar con Docker!
