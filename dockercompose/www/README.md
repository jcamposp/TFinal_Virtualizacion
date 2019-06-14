## About this repository

+ **Name:** Task 7.1 - Restaurants
+ **Author:** José Pedro Campos Pérez
+ **Subject:** Web Applications Implementation
+ **Institute:** IES Francesc de Borja Moll
+ **Year:** 2018-2019

#### Link

This application can be visualized following this link:
https://serveriaw.iesfbmoll.org/~jcampos/Restaurants_CamposJose/

### Structure

![Logical structure](/images/logicrelation.png "Structure relation")
-----

1. [What is PHP?](#what-is-php?)
2. [Tools needed](#tools-needed)
3. [Syntax](#syntax)
4. [Installation](#installation)
    1. [XAMPP](#xampp)
5. [phpMyAdmin](#phpmyadmin)

## What is PHP?

![PHP](https://www.e-sort.net/blog/wp-content/uploads/2012/04/Logo_PHP.jpg "PHP logo")

PHP: Hypertext Preprocessor, or simply PHP, is a server-side scripting language designed for Web development, and also used as a general-purpose programming language.  
With PHP we can work with *cookies*, form process, generate dynamic content, send e-mails, ...
One of the advantages of PHP is its compatibility to access data in almost any system of storage from XML to database applications.
Moreover, PHP can be harness in any operative system, Linux, Unix, Windows, Mac-OS, ...; and supporting the different web servers: Apache, Microsoft IIS, iPlanet, Caudium, ...  
PHP code may be embedded into HTML code, or it can be used in combination with various web template systems, web content management systems, and web framework.

## Tools needed

The PHP language is a plain text language. So basically, to program a web in PHP we can use development tools like any plain text editor, such as Windows Notepad.  
Of course, there are much more powerful tools that allow you to develop in an easier and more intuitive way, with preview windows, autocomplete options, error marks, ...; like:
+ [Komodo Edit](https://www.activestate.com/komodo-ide/downloads/edit)
+ [Brackets](http://brackets.io/)
+ [Sublime text](https://www.sublimetext.com/)
+ [Atom](https://atom.io/)
+ [Visual Code Studio](https://code.visualstudio.com/)

## Syntax

The PHP interpreter only executes the code that is among its delimiters. The most common delimiters are to open `<?php` and to close `?>`. The purpose of these delimiters is to separate the PHP code from the rest of the code, such as HTML.

```
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8"/>
        <title>Basic PHP</title>
    </head>
    <body>
        <?php
            echo 'Hello World!';
        ?>
    </body>
</html>
```

## Installation

To be able to execute the PHP scripts, first of all, you need a web server to be able to interpret this programming language. To do this, it has to be complemented with a PHP interpreter. In this sense, it is a software component that can identify the passages of a file that contain PHP code. In principle, PHP can be executed on any web server and the interpreter is part of the PHP download package. The current version can be downloaded for free from the official website of the php.net project.   
In practice, PHP is often used in combination with the Apache HTTP Server. If this connection is completed with the MySQL or MariaDB database, one can speak, depending on the operating system, of LAMP (Linux), WAMP (Windows) or MAMP (Mac-OS).   
Web stacks of this type are offered as pre-configured software stacks. To learn PHP it is recommended to use the complete XAMPP package, which contains the local installation of the Apache web server, the MariaDB database system and the Perl and PHP programming languages.   

### XAMPP

![XAMPP](https://erickorlando.files.wordpress.com/2017/01/xampp.png?w=600 "XAMPP logo")

[XAMPP](https://www.apachefriends.org/es/index.html) is an independent platform server, free software, consisting mainly of the MySQL database, the Apache web server and the interpreters for scripting languages: PHP and Perl. The name comes from the acronym of X (for any operating systems), Apache, MySQL, PHP, Perl. The program was releases under the GNU license and acts as a free Web server, easy to use and capable of interpreting dynamic pages.   
To test this task, or to be able to hand web pages that you do, is necessary to have a web server. On the Internet, there are many companies that offer *posting* services and make it available from a space already set up to upload the files and upload the web to dedicatd machines that you can configure yourself.   
XAMPP is a light software that can be used on any PC. It does not need many resources. 

### phpMyAdmin

![phpMyAdmin](https://www.lunium.com/media/blog/phpmyadmin-mini.gif "phpMyAdmin logo")

[phpMyAdmin](https://www.phpmyadmin.net/) is a free tool written in PHP that allows you to control the administration of MySQL from a web browser. It allows to perfomr different tasks such as creating, modifying or deleting databases, tables, fields or rows, etc,.; executing SQL commands.

The structure to access a database is very similar to the protocol to access a file:
1. Open the database.
2. Transmit the SQL query to the database.
3. Return the result of the query.
4. Close the database connection.

To run this application, you must import the file `restaurants.sql` and the `users.sql` inside the `sql` folder in your phpMyAdmin and set the particular values for the connection.

$connection = mysqli_connect ('host','username','password','dbname','port','socket');