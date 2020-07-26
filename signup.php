<?php
    include 'config.php';
    if(isset($_POST['submit'])){
        $username=$_POST['username'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        
        $passwordHash=password_hash($password,PASSWORD_DEFAULT);
        var_dump($passwordHash);
        $query="INSERT INTO user (username,password,email) VALUES ('$username','$passwordHash','$email')";
        $result=mysqli_query($connection,$query);
        if($result)
            echo "recorded sucessfully";
        else
            echo "failed";

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="username" placeholder="enter your username">
        <input type="email" name="email" placeholder="enter your email">
        <input type="password" name="password" placeholder="enter a password">
        <input type="submit" name="submit" value="submit"> 
    </form>
</body>
</html>