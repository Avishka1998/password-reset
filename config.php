<?php
    //for local server connect
    $dbserver='localhost';
    $username='root';
    $password='';
    $dbname='password reset';

    $connection=mysqli_connect($dbserver,$username,$password,$dbname);

    if(!$connection)
        echo mysqli_connect_error();
?>

