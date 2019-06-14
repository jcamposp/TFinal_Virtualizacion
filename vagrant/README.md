El siguiente fichero explica el funcionamiento del fichero Vagrantfile:
1. El único requisito es tener instalado Vagrant y Virtualbox.
2. Descargar el fichero Vagrantfile.
3. Disponer de un directorio llamado 'shared' en el directorio donde se encuentra el fichero Vagrantfile.
3. Ejecutar el comando siguiente en el directorio donde se encuentra el fichero Vagrantfile:

`vagrant up`

## Funcionamiento

1. Utilización de la imagen local *ubuntu/xenial64* para Ubuntu 16.04. En caso de no encontrarse en el sistema local, se acudirá al repositorio de Vagrant para llevar a cabo la descarga.
2. Establecer directorios sincronizados entre la máquina anfitrión y la máquina virtual. El directorio en la máquina hosts será el directorio 'shared', el cual comparte el mismo directorio que el fichero Vagrantfile y se sincroniza con el directorio '/var/www/html' de la máquina virtual. Todo fichero en un directorio se corresponderá en el otro directorio y viceversa.
3. Redirección de puertos entre la máquina host 9005 contra el puerto de la máquina virtual 80.
4. Aprovisionamiento de la máquina virtual a partir de SHELL.
    + Actualización del sistema.
    + Instalación de apache2.
