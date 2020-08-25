<?php
    $alert='';
    require 'config.php';
    $token=$_GET['token'];
    if(isset($_POST['reset'])){
        $password=mysqli_real_escape_string($connection,$_POST['password']);
        $re_password=mysqli_real_escape_string($connection,$_POST['re_password']);
        if($password===$re_password){
            $ret_query="SELECT email FROM tokens WHERE token='$token'";
            $ret_result=mysqli_query($connection,$ret_query);
            if(mysqli_num_rows($ret_result)>0){
                $ret_array=mysqli_fetch_assoc($ret_result);
                $email=$ret_array['email'];
                $hash=password_hash($password,PASSWORD_DEFAULT);
                $update_query="UPDATE user SET password='$hash' WHERE email='$email' ";
                $update_result=mysqli_query($connection,$update_query);
                if(mysqli_affected_rows($connection)>0){
                    $alert="<div class='sent'>Password Reseted sucessfully.</div>";
                    $delete_query="DELETE FROM tokens WHERE token='$token'";
                    $delete_result=mysqli_query($connection,$delete_query);
                }
                else
                    $alert="<div class='error'>Failed to reset the password.Please try again.</div>";

            }
            else{
                $alert="<div class='error'>Access Denided!Token has used before.</div>";
            }
        }
        else{
            $alert="<div class='error'>Passwords do not match!</div>";
        }
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
        <?php echo $alert;?>
        <form method="POST">
            <p>
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Enter the password" required>
            </p>
            <p>
                <label for="re-password">Re-Password</label>
                <input type="password" name="re_password" placeholder="Re-enter the password" required>
            </p>
            <input type="submit" name="reset" value="Reset">
        </form> 
    </div>  
</body>
</html>