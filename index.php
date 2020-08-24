<?php
    require 'config.php';
    $alert='';
    if(isset($_POST['login'])){
        $email=$_POST['email'];
        $password=$_POST['password'];
        $query="SELECT * FROM user WHERE email='$email'";
        $result=mysqli_query($connection,$query);
        if(mysqli_num_rows($result)>0){
            $result_array=mysqli_fetch_assoc($result);
            $hashmatch=password_verify($password,$result_array['password']);
            if($hashmatch){
                $alert="<p class='match'>User matched!</p>";
            }
            else
                $alert="<p class='error'>Password is incorrect!</p>";
        }
        else
            $alert="<p class='error'>User not found!</p>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <title>Document</title>
</head>
<body>
    <div class="formarea">
        <h1>Welcome</h1>
        <?php echo $alert;?>
        <form method="POST">
            <p>
                <label for="email">Email</label>
                <input type="email" name="email" placeholder="Enter the email" required>
            </p>
            <p>
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Enter the password" required>
            </p>
            <input type="submit" name="login" value="login">
        </form> 
        <a href="email_verify.php">Forgot password?</a>
    </div>  
</body>
</html>