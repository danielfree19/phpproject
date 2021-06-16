<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
<link rel="stylesheet" href="../footer/footer.css">
<link rel="stylesheet" href="../styles.css">
<link rel="stylesheet" href="../menu/menu.css">


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/img/png/icons8-restaurant-50.png">
    <title>The five chefs restarunt</title>
</head>
<body>
<div>
<?php
        include_once "../includes/routes.php";
        routesSetupSec();
        session_start();
       //include_once "../classes/cartItem.php";
       
       require_once "../menu/menu.php";
       if(!isset($_GET["path"])){
           header("Location: ./?path=login");
       }
    ?>
    </div>
<div class="row">
    <?php
    if(!isset($_SESSION["useruid"]) && $_GET["path"] == "login"){
        ?>
<div style="text-align: center;" class="col-12">
<?php
   
      include_once "login.php";
?>   
<a href="./?path=signup">Sign-up</a>
</div>

<?php
    }
?>
<?php
    if(!isset($_SESSION["useruid"]) && $_GET["path"] == "signup"||isset($_SESSION["admin"])){
        ?>
<div style="text-align: center;" class="col-12">
   <?php
  
      include_once "signup.php";
  
   ?>
   <a href="./?path=login">Login with existing account</a>
</div>
<?php
    }
?>
</div>


<footer class="footer" style="text-align: center;">
    <?php
        require "../footer/footer.html";
    ?>
</footer>
    
</body>
</html>