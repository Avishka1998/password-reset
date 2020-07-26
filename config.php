<?php
//Localhost
    // $dbserver='localhost';
    // $username='root';
    // $password='';
    // $dbname='user';
//freemysqlhost.net
    $dbserver='sql12.freemysqlhosting.net';
    $username='sql12357140';
    $password='PGLR8dQZvr';
    $dbname='sql12357140'; 

    $connection=mysqli_connect($dbserver,$username,$password,$dbname);
    if(!$connection)
        echo mysqli_connect_error();
    else
        //echo 'database connected sucessfully';
?>