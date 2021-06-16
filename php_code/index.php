
<?php
// Start the session
include_once "./includes/routes.php";
routesSetup();
include_once $_SERVER["path"]["cartitem"];
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
<link rel="stylesheet" href="menu/menu.css">
<link rel="stylesheet" href="./footer/footer.css">
<link rel="stylesheet" href="./styles.css">
<script type="text/javascript" src="./home.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php $_SERVER['DOCUMENT_ROOT']?>/php_code/assets/img/png/icons8-restaurant-50.png">
    <title>The five chefs restarunt</title>
</head>
<body>
<?php
        
        
        //include_once "./classes/cartItem.php";
        if(!isset($_GET['path'])){
            header('Location: ./?path=home');
        }
        
        
        require "./menu/menu.php";        
        //include_once './classes/cartitem.php';
        
        switch($_GET['path']){
            case "aboutus":
                include_once "./about-us.php";
                break;
            case "home":
                include_once "./home.php";
                break;
        }        
        
    ?>
<footer class="footer" style="text-align: center;">
    <?php
        require "./footer/footer.html";
    ?>
</footer>
   
</body>
</html>