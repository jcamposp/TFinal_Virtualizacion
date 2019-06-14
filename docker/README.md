El siguiente fichero explica el funcionamiento del fichero Dockerfile:
1. Descargar el fichero Dockerfile.
2. Ejecutar los comandos siguientes en el directorio donde se encuentra el fichero Dockerfile:

`docker build -t <nombre> <ruta_al_fichero_Dockerfile>`
  + Ejemplo: docker build -t mi_contenedor .
  
 `docker run -dp <puerto_host>:<puerto_contenedor> <nombre_de_la_imagen>`
  + Ejemplo: docker run -dp 9010:80 mi_contenedor

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
