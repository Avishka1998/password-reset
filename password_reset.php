<?php
    require 'config.php';
    $token=$_GET['token'];
    $alert='';
    if(isset($token)){
        $query="SELECT email FROM tokens WHERE token='$token'";
        $result=mysqli_query($connection,$query);
        if(mysqli_num_rows($result)>0){
            $result_array=mysqli_fetch_assoc($result);
            $email=$result_array['email'];
        }
        else{
            $alert='';
        }

        // if(isset($_POST['reset'])){}
    }
    else
        header('Location:index.php');
    $alert='';
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
        <?php echo $alert;?>
        <form method="POST">
            <p>
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Enter the password" required>
            </p>
            <p>
                <label for="re-password">Re-Password</label>
                <input type="password" name="re-password" placeholder="Re-enter the password" required>
            </p>
            <input type="submit" name="reset" value="Reset">
        </form> 
    </div>  
</body>
</html>