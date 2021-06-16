<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_POST['submit'])){
    header("location:welcome.php");
    
}
else{
    

 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM login WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
      <style>
body{
  background-color: black;
  font-family: 'Baloo Tammudu 2', cursive;
}
video {
    position: absolute;
    z-index: -1;
    right: 0;
    bottom: 0;
    width: 100%;
    height: 100%;
    object-fit: fill;
}
.form{
  text-align: center;

  box-shadow: 0 30px 60px 0 rgba(148, 80, 80, 0.4);
  background-color: rgba(0, 0, 0, 0.5);
  border-radius: 5px;
  max-width: 400px;
  margin-left: auto;
  margin-right: auto;
  padding-top: 5px;
  padding-bottom: 5px;
  left: 0;
  right: 0;
  position: absolute;
  border-top: 5px solid #810000;
  top: 30%;
}
a{
  padding: 5px 15px;
  text-decoration: none;
  color: #dddddd;
}
p{
  text-align: left;
  padding-left: 28%;
  padding-bottom: 0;
  margin: 0;
  color: #dddddd;
}
.name{
  background-color: #DDDDDD;
}
.name:hover{
  background-color: #FDFAF6;
  border-bottom: 5px solid #CE1212;
height: 20px;
width: 200px;
transition: ease 0.5s;
}
a:hover{
  font-size: 20px;
}
.submit:hover{
  background-color: #FDFAF6;
  border-bottom: 5px solid #CE1212;
height: 27px;
width: 70px;
transition: ease 0.5s;
}
</style>
    <meta charset="utf-8">
    <title>Sign in</title>
    <link rel="stylesheet" href="signIn.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Baloo+Tammudu+2&display=swap" rel="stylesheet">
  </head>
  <body>
    <video autoplay muted loop>
   <source src="video.mp4" type="video/mp4">
 </video>
    <div class="form">
      <form class="signInform"  method="post">
        <p>Username:</p>
        <input class="name" type="text" name="username" value="">
        <p>Password:</p>
        <input class="name" type="password" name="" value="">
        <div>
          <input class="submit" type="submit" name="submit">
        </div>
      </form>
      <td><a href="#">Forgot password</a></td><td><a href="register.php">Register now</a></td>
    </div>
  </body>
</html>