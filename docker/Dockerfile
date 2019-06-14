FROM ubuntu:16.04

RUN apt-get update
RUN apt-get install -y apache2
RUN apt-get install -y unzip
RUN apt-get install -y wget
RUN wget https://github.com/BlackrockDigital/startbootstrap-freelancer/archive/gh-pages.zip
RUN unzip gh-pages.zip
RUN cp -a startbootstrap-freelancer-gh-pages/* /var/www/html

EXPOSE 9010

CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]
