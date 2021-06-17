<?php //sending here id and new password
include_once "../CRUD/CRUD.php";
include_once "../CRUD/dbh.inc.php";
$id = $_GET['id'];
$newpass = $_GET['newpass'];

PasswordChange($id,$newpass,$conn);