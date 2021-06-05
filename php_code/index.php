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
        if(!isset($_GET['path'])){
            header('Location: ./?path=home');
        }
        $adminpath = "./admin";
        $DBHpath = "./includes/dbh.inc.php";
        $src = "assets/img/png/logo1.png";
        $logout = "includes/logout.inc.php";
        $funcFile = "./includes/genFun.inc.php";
        require "./menu/menu.php";        
        include "./includes/dbh.inc.php";
        include_once './includes/cartitems.php';
        if(!isset($_SESSION["cart"])&&isset($_SESSION["useruid"])){
            $_SESSION["cart"]=array();
            $sqlQ = "SELECT * FROM menu;";
            $result = mysqli_query($conn, $sqlQ);
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
            foreach($rows as $row){
                $_SESSION["cart"][] = new items($row["id"],$row["name"],$row["price"]);
            }
        }
        switch($_GET['path']){
            case "about-us":
            include_once "./about-us.html";
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