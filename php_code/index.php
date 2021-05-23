<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
<link rel="stylesheet" href="./footer/footer.css">
<link rel="stylesheet" href="./styles.css">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./assets/img/png/icons8-restaurant-50.png">
    <title>The five chefs restarunt</title>
</head>
<body>
<?php
if(isset($_SESSION['useruid'])){
    session_start();
}
        require "./menu/menu.php";
    ?>


<footer class="footer" style="text-align: center;">
    <?php
        require "./footer/footer.html";
    ?>
</footer>
    
</body>
</html>