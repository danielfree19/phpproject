<?php
include_once "../includes/routes.php";
routesSetupSec();
include_once "./cartItem.php";
session_start();
include_once "../CRUD/dbh.inc.php";

include_once "../CRUD/CRUD.php";
if (isset($_SESSION["useruid"])) {
    if (isset($_REQUEST["add"])) {
        $item = ItemFromDB($conn, $_REQUEST["id"]);
        if (isset($_SESSION["cart"])) {
            foreach ($_SESSION["cart"] as $val) {
                if ($item->picGet()==$val->picGet()) {
                    $val->addAmount();
                    header("location: ../foodMenu");
                    exit();
                }
            }
        }
        $_SESSION["cart"][] = $item;
        header("location: ../foodMenu");
        exit();
    }
    $key = $_REQUEST["id"];
    if (isset($_REQUEST["remove"])) {
        foreach ($_SESSION["cart"] as $x => $val) {
            if ($key == $val->picGet()) {
                unset($_SESSION["cart"][$x]);
                header("location: ../foodMenu/?success=");
                exit();
            }
        }
        header("location: ../foodMenu/?fail=");
        exit();
    }
    if (isset($_REQUEST["decrease"])) {
        foreach ($_SESSION["cart"] as $x => $val) {
            if ($key == $val->picGet()&& $val->getAmount()>1) {
                $_SESSION["cart"][$x]->decAmount();
                header("location: ../foodMenu/?decreased=");
                exit();
            } elseif ($key == $val->picGet()) {
                unset($_SESSION["cart"][$x]);
                header("location: ../foodMenu/?success=");
                exit();
            }
        }
    }
    if (isset($_REQUEST["increase"])) {
        foreach ($_SESSION["cart"] as $x => $val) {
            if ($key == $val->picGet()) {
                $_SESSION["cart"][$x]->addAmount();
                header("location: ../foodMenu/?addad=");
                exit();
            }
        }
    }
}
else{
    if(isset($_GET["id"])){
        header("location: ./items.php");
    }
    echo "על מנת להוסיף מוצרים צריך להתחבר עם משתמש רשום";
    ?>
    <a href="../login">התחברות</a>
    <?php
}
