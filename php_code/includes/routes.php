<?php

function routesSetup(){
    if (!isset($_SERVER["path"])) {
        $_SERVER["path"] = array();
        $_SERVER["path"]["function"] = "./includes/functions.inc.php";
        $_SERVER["path"]["cart"] = "./cart/cart.php";
        $_SERVER["path"]["adminpath"] = "./admin/?path=menuItems";
        $_SERVER["path"]["DBHpath"] = "./CRUD/dbh.inc.php";
        $_SERVER["path"]["src"] = "./assets/img/png/logo1.png";
        $_SERVER["path"]["logout"] = "./includes/logout.inc.php";
        $_SERVER["path"]["funcFile"] = "./includes/functions.inc.php";
        $_SERVER["path"]["aboutus"] = "./?path=aboutus";
        $_SERVER["path"]["items"] = "./classes/items.php"; //?
        $_SERVER["path"]["cartitem"] = "./classes/cartitem.php";
        $_SERVER["path"]["menuitemClass"] = "./classes/menuItem.php";
    }
}

function routesSetupSec(){
    if (!isset($_SERVER["path"])) {
        $_SERVER["path"] = array();
        $_SERVER["path"]["function"] = "../includes/functions.inc.php";
        $_SERVER["path"]["cart"] = "../cart/cart.php";
        $_SERVER["path"]["adminpath"] = "../admin/?path=menuItems";
        $_SERVER["path"]["DBHpath"] = "../CRUD/dbh.inc.php";
        $_SERVER["path"]["src"] = "../assets/img/png/logo1.png";
        $_SERVER["path"]["logout"] = "../includes/logout.inc.php";
        $_SERVER["path"]["funcFile"] = "../includes/functions.inc.php";
        $_SERVER["path"]["aboutus"] = "../?path=aboutus";
        $_SERVER["path"]["items"] = "../classes/items.php";
        $_SERVER["path"]["cartitem"] = "../classes/cartitem.php";
        $_SERVER["path"]["menuitemClass"] = "../classes/menuItem.php";
    }
}