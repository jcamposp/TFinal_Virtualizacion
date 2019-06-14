## Funcionamiento

1. Descarga de la *imagen* Ubuntu 16.04 del respositorio local y en caso de no encontrar la imagen, Docker acudirá a su repositorio.
2. Actualizar el contenedor. Esto habilita el comando 'apt-get install'.
3. Instalación de apache2.
4. Instalación de unzip y wget.
5. Descarga de un fichero .zip de GitHub.
6. Extraer los ficheros del elemento anterior.
7. Copiar los ficheros extraídos al directorio '/var/www/html', DocumentRoot por defecto de apache2
8. Exponer el puerto 9010.
9. Ejecutar al lanzar el contenedor apache2 en segundo plano.

### Ejecución de comandos

###### Creación de la imagen

1. Lanzar el comando:
  + docker build -t <nombre> <ruta_al_fichero_Dockerfile>
    + EJ: docker build -t mi_contenedor .

###### Creación del contenedor a partir de la imagen

1. Lanzar el comando:
  + docker run -dp <puerto_host>:<puerto_contenedor> <nombre_de_la_imagen>
    + EJ: docker run -p 9010:80 mi_contenedor
