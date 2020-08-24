<?php
    require 'config.php';
    $alert='';
    if(isset($_POST['send'])){
        $email=$_POST['email'];
        $query="SELECT email FROM user WHERE email='$email'";
        $result=mysqli_query($connection,$query);
        if(mysqli_num_rows($result)>0){
            $token=uniqid(md5(time()));
            $query="INSERT INTO tokens (email,token) VALUES ('$email','$token')";
            $insert_result=mysqli_query($connection,$query);
            
            //send token to the email
            $to=$email;
            $from='sandeepaucsc@gmail.com';
            $subject="Password reset token";
            $message='We have got your request to reset your password.<br>';
            $message.='Please follow the url and reset your password.The link will only be valid for one time use only.<br>';
            $message.='http://localhost/password%20reset/password_reset.php?token='.$token;
            $header="From: {$from}\r\nContent-Type: text/html;";

            $send_result=mail($to,$subject,$message,$header);
            if($send_result)
                $alert="<div class='sent'>Password request link sent to your email<br>Please follow the link.</div>";
            else
                $alert="<div class='failed'>Failed to send the mail!</div>";
        }
        else 
        $alert="<p class='error'>The entered email is not a registerd email address!</p>";
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
    <p class="message">Enter your email address so that we will send you an email to reset your password.</p>
    <form action="" method="POST">
        <p>
            <label for="email">Email</label>
            <input type="email" name="email" placeholder="Enter the email" required>
        </p>
        <input type="submit" name="send" value="send">
    </form>
</body>
</html>