<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  header("Location: index.php");
}
if(isset($_POST["submit"])){
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $confirmpassword = $_POST["confirmpassword"];
  $duplicate = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username' OR email = '$email'");
  if(mysqli_num_rows($duplicate) > 0){
    echo "<script> alert('Username or email taken!'); </script>";
  } else {
    if($password == $confirmpassword){
      $query = "INSERT INTO users VALUES('','$username','$email','$password')";
      mysqli_query($conn, $query);
      echo "<script> alert('Successful'); </script>";
    } else {
      echo "<script> alert('Password Does Not Match'); </script>";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="registration.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;400;700&display=swap" rel="stylesheet">
    <title>Registration</title>
</head>
<body>
    <form class="form" action="" method="post" autocomplete="off">
        <h1 class="title">Registration</h1>
        <div class="form_container">
            <div class="group_fr">
                <label class="label_form" for="email">Email</label>
                <input class="input_form" type="email" name="email" id = "email" required value="">
            </div>
            <div class="group_fr">
                <label for="username" class="label_form">Username</label>
                <input type="text" class="input_form" name="username" id = "username" required value="">
            </div>
            <div class="group_fr">
                <label for="password" class="label_form">Password</label>
                <input type="password" class="input_form" name="password" id = "password" required value="">
            </div>
            <div class="group_fr">
                <label for="confirmpassword" class="label_form">Confirm Password</label>
                <input type="password" class="input_form" name="confirmpassword" id = "confirmpassword" required value="">
            </div>
            <div class="group_fr">
                <label>Show password:</label>
                <input onclick="myFunctionShow()" class="chbox" type="checkbox">
            </div>
            <div class="group_fr">
                <a href="./login.php" class="sign-up">Login</a>
            </div>
            <div class="group_fr">
                <div class="btnsbmt">
                    <button name="submit" class="submit_btn_form">Create</button>
                </div>
            </div>
        </div>
    </form>
    <div class="form_image"></div>
    <script src="./show.js"></script>
</body>
</html>