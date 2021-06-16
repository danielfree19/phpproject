<?php
session_start();
include_once "../CRUD/CRUD.php";
include_once "../CRUD/dbh.inc.php";

$id=$_GET["id"];

if(isset($_GET["add"])){
    addNewAdmin($id,$conn);
}
 
if(isset($_GET["remove"])){
    if( $_SESSION["useruid"]==$id||$id=="admin"){
        echo "You cannot remove this user";
    }
    else{
       
        deleteAdmin($id,$conn);
    }
}
