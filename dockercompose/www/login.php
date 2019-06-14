<?php
    session_start();

require_once 'connection.php';

/*  
*   We perform a query in the 'user' table retrieving 'username', 'password' and ' name'. The 'username'
*   and the 'password' will be used to compare values sends from the form. The 'user' value will be used
*   in a $_SESSION variable to be show in a 'span' in 'index.php'
*   The login function has 3 states:
*       1.- If the user joined in the form exists in the database, the 'mysqli_num_rows' value will be greater than 0
*           The value joined in the password field is compared to the value from the database
*           If them are correct, the $_SESSIONS variables will be created.
*       2.-If the user joined in the form exists in the database but the password joined doesn't match the password 
*           from the database, we create a $_SESSION variables called 'error' that return: Incorrect password
*       3.-If the user joined in the form doesn't exists in the database, we created a $_SESSION variable called 'error'
*           that return: User not registered.
* 
*   After all, return to ' index.php'
*
*/
function getLog($user, $password) {
    global $connection;
    
    $user = mysqli_real_escape_string($connection,$user);
    $password = mysqli_real_escape_string($connection,$password);

    $query = "SELECT `username`,`password`,`name`,`id` FROM `User` WHERE `username`='$user'";
    
    $resultado=mysqli_query($connection,$query);
    
    if (mysqli_num_rows($resultado) > 0 ) {
        $data1 = [];
        $data1 = mysqli_fetch_assoc($resultado);
        
        if ($data1['username']==$user && $data1['password']==md5($password)) {
            $_SESSION["username"] = $user;
            $_SESSION["name"] = $data1['name'];
            $_SESSION["id"] = $data1['id'];
        } else {
            $_SESSION["error"]="Incorrect password. Try again.";
        }
    } else {
        $_SESSION["error"]="User not registered :(";
    }
}

/*
*   We retrieve the 'username' from the form and then it will used with the getLog() function
*/
if (isset($_POST['username'])) {
    getLog($_POST['username'], $_POST['userpasswd']);
}

header('Location: index.php');
?>