<?php

define ("DB_HOST","dockercompose_db_1");
define ("DB_USER","root");
define ("DB_PASS","secret");
define ("DB_NAME","restaurants");
define ("DB_PORT","3306");

#                       local connection at IESFBMoll: 'localhost','root','','restaurants','3306';
#                       local connection at home: 'localhost','root','','restaurants','3307';
#                       external connection to serveriaw: 'localhost','jcampos','josepedro9','jcampos','3306';

$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME,DB_PORT);

if(!$connection) {
    exit ("Can not access to the database. ".mysqli_error($connection));
}
    #echo "Yes"; Connection established

?>
