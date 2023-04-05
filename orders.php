<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
  $result = mysqli_query($conn, "SELECT * FROM users WHERE id = $id");
  $row = mysqli_fetch_assoc($result);
}
else{
  header("Location: login.php");
}

if(isset($_GET['delete'])) {
  $delete_id = $_GET['delete'];
  mysqli_query($conn, "DELETE FROM `dashboard` WHERE id = '$delete_id'") or die(mysqli_error($conn));
  header('location:orders.php');
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./order.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;400;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
    <title>Index</title>
  </head>
  <body>
  <header>
        <div class="logo-title">
            <a href="./index.php"><img class="logo" src="./home_img/logo.png" alt="Logo"></a>
            <a href="./index.php"><h1 href="#">AutoShowroom</h1></a>
        </div>
        <nav>
            <ul class="nav-link">
                <li><a href="./index.php">Store</a></li>
                <li><a href="./orders.php">Orders</a></li>
            </ul>
            <div class="user-info">
                <p class="username">User: <?php echo $row["username"]; ?></p>
                <p>Id: <?php echo $row["id"]; ?></p>
                <a class="logout" href="logout.php">Logout</a>
            </div>
        </nav>
    </header>
    <?php
        $sql = "SELECT * FROM dashboard";
        $result = mysqli_query($conn, $sql); 
        while($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="container">
          <div class="box">
            <div class="info">
              <h2><?php echo $row['name']?></h2>
              <h3>Price:<?php echo $row['price']?></h3>  
              <form action="" method="post"> 
              <input  type="hidden" name="id" id="id<?php echo $row['id']?>" value='<?php echo $row['id']?>'> 
              <input  type="hidden" name="name" id="name<?php echo $row['id']?>" value='<?php echo $row['name']?>'>
              <input type="hidden" name="price" id="price<?php echo $row['id']?>" value='<?php echo $row['price']?>'>    
              <button class='delete-btn'><a class="btn_del" href="orders.php?delete=<?php echo $row['id']; ?>">Delete</a></button>
            </div>
            </form>
          </div>
        </div>
        <?php
        }?>
  </body>
</html>