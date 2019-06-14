<?php

require_once 'connection.php';

if (isset($_POST['comment'])) {
    insertComment($_POST['comment']);
}

function insertComment($comment) {
    session_start();
    global $connection;
    $comment=mysqli_real_escape_string($connection,$comment);
    $rating=$_POST['slide'];
    $restId=$_GET['id'];
    $userId=$_SESSION['id'];

    $sql="INSERT INTO `Comment` (`comment`,`rating`,`restaurantId`,`userId`,`dateTime`,`isValidated`) VALUES
    ('$comment',$rating,$restId,$userId,CURRENT_TIMESTAMP,1)";

    $result = mysqli_query($connection,$sql);

    mysqli_close($connection);

    header ('Location: restaurant.php?id='.$_GET['id']);
}

function showComments($id) {
    global $connection;

    $id=$_GET['id'];

    $sql="SELECT `comment`,`rating`,`User`.`name` AS `username` FROM `Comment` INNER JOIN `User` 
    WHERE `Comment`.`userId`=`User`.`id` AND `restaurantId`=$id";

    $result = mysqli_query($connection,$sql);

    $data = NULL;
    $data = mysqli_fetch_all($result,MYSQLI_ASSOC);

    mysqli_free_result($result);
    mysqli_close($connection);

    return $data;
}
?>