<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  header("Location: index.php");
}
if(isset($_POST["submit"])){
  $usernameemail = $_POST["usernameemail"];
  $password = $_POST["password"];
  $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$usernameemail' OR email = '$usernameemail'");
  $row = mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result) > 0){
    if($password == $row['password']){
      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["id"];
      header("Location: index.php");
    } else {
      echo
      "<script> alert('Wrong Password!!!'); </script>";
    }
  } else {
    echo
    "<script> alert('We do not find this account!!!'); </script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="logins.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;400;700&display=swap" rel="stylesheet">
    <title>Login</title>
</head>
<body>
    <form class="form" action="" method="post" autocomplete="off">
        <h1 class="title">Login</h1>
        <div class="form_container">
            <div class="group_fr">
                <label for="usernameemail" class="label_form">Email or Username</label>
                <input type="text" class="input_form" name="usernameemail" id = "usernameemail" required value="">
            </div>
            <div class="group_fr">
                <label for="password" class="label_form">Password</label>
                <input type="password" class="input_form" name="password" id="password" required value="">
            </div>
            <div class="group_fr">
                <label>Show password:</label>
                <input onclick="myFunctionShow()" class="chbox" type="checkbox">
            </div>
            <div class="group_fr">
                <a href="./Registration.php" class="sign-up">Sign up</a>
            </div>
            <div class="group_fr">
                <div class="btnsbmt">
                    <button type="submit" name="submit" class="submit_btn_form">Submit</button>
                </div>
            </div>
        </div>
    </form>
    <div class="form_image"></div>
    <script src="./show.js"></script>
</body>
</html>