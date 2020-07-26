<?php
include 'config.php';
    if(isset($_POST['submit'])){
        $email=$_POST['email'];
        var_dump($email);
        $password=$_POST['password'];

        $query="SELECT email,password FROM user WHERE email='$email'";
        $result=mysqli_query($connection,$query);
        if(mysqli_num_rows($result)>0){
            $resultArray=mysqli_fetch_assoc($result);
            $passwordHash=$resultArray['password'];
            if(password_verify($password,$passwordHash)){
                echo 'welcome user';
            }
            else
                echo 'wrong password';
        }
        else
            echo 'wrong username';
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
        <input type="email" name="email" placeholder="enter your email">
        <input type="password" name="password" placeholder="enter the password">
        <input type="submit" name="submit" valuer="submit">
    </form>
    <a href="forgetpassword.php">forget password?</a>
</body>
</html>