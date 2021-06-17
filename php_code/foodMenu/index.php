<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
<link rel="stylesheet" href="../menu/menu.css">
<link rel="stylesheet" href="../footer/footer.css">
<link rel="stylesheet" href="../styles.css">
<link rel="stylesheet" href="./FoodMenu.css">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?php $_SERVER['DOCUMENT_ROOT']?>/php_code/assets/img/png/icons8-restaurant-50.png">
    <title>The five chefs restarunt</title>
</head>
<body>

<?php
        include_once "../includes/routes.php";
        routesSetupSec();
        include_once $_SERVER["path"]["cartitem"];
        session_start();
        require_once "../menu/menu.php";
        
        include_once "FoodMenu.php";
    ?>


<footer class="footer" style="text-align: center;">
    <?php
        require_once "../footer/footer.html";
    ?>
</footer>
   
</body>
</html>