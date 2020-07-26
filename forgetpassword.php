<?php
include 'config.php';
    if(isset($_POST['submit'])){
        $email=$_POST['email'];
        $query="SELECT * FROM user WHERE email='$email'";
        $result=mysqli_query($connection,$query);
        if(mysqli_num_rows($result)>0){
            $resultArray=mysqli_fetch_assoc($result);
            $userEmail=$resultArray['email'];
            $userId=$resultArray['id'];
            $token=uniqid(md5(time()));

            $insertQuery="INSERT INTO password_reset (id,email,token) VALUES ('$userId','$userEmail','$token')";
            $insertResult=mysqli_query($connection,$insertQuery); 
            echo 'Check your emails to get the password reset link';
        }
            
        else
            echo 'This is not a registerd email';
 
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
        <input type="email" name="email" placeholder="enter the email">
        <input type="submit" name="submit" value="submit">
    </form>
</body>
</html>