<?php
    include 'config.php';
    if(isset($_GET['token'])){
        var_dump($_GET['token']);
        $token=$_GET['token'];
        $retQuery="SELECT * FROM password_reset WHERE token='$token'";
        $retResult=mysqli_query($connection,$retQuery);
        if(mysqli_num_rows($retResult)>0){
            $retResultArray=mysqli_fetch_assoc($retResult);
            $userId=$retResultArray['id'];
        }
        else{
            echo 'Cannot reset the password';
        }
    }
    if(isset($_POST['submit'])){
        $password_1=$_POST['password_1'];
        $password_2=$_POST['password_2'];
        if($password_1!=$password_2)
            echo 'passwords do not match';
        else{
            $passwordHash=password_hash($password_1,PASSWORD_DEFAULT);
            $updateQuery="UPDATE user SET password='$passwordHash' WHERE id='$userId'";
            $updateResult=mysqli_query($connection,$updateQuery);
            if(mysqli_affected_rows($connection)>0){
                echo 'password reset sucessful';
            }
            else
                echo 'failed to update the password';
        }
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
        <input type="password" name="password_1" placeholder="Enter the password">
        <input type="password" name="password_2" placeholder="Re-enter the password">
        <input type="submit" name="submit" value="Reset Password">
    </form>
</body>
</html>