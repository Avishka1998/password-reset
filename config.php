<?php
    //for local server
    $dbserver='localhost';
    $username='root';
    $password='';
    $dbname='password reset';

    $connection=mysqli_connect($dbserver,$username,$password,$dbname);

    if(!$connection)
        echo mysqli_connect_error();
        
?>