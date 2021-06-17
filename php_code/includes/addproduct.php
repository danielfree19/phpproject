<?php
session_start();

include_once "../CRUD/CRUD.php";
include_once "../CRUD/dbh.inc.php";
if(isset($_GET["id"])){
    $id = $_GET["id"];
}
if (isset($_GET["desc"])) {
    $desc = $_GET["desc"];
}
if (isset($_GET["name"])) {
    $name = $_GET["name"];
}
if (isset($_GET["price"])) {
    $price = $_GET["price"];
}
if(isset($_GET["add"])){
    addNewItem($id,$desc,$name,$price,$conn);
}
if (isset($_GET["delete"])) {
    deleteItem($id,$conn);
}
if (isset($_GET["update"])){
    updateItem($id,$desc,$name,$price,$conn);
}