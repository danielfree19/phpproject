<?php 
session_start();

include_once "../CRUD/CRUD.php";
include_once "../CRUD/dbh.inc.php";

$id=$_GET["id"];
if(!$_SESSION["Admin"]=="admin"){
    deleteUser($id,$conn);
}
else{
    echo "cannot delete admin user";
}
