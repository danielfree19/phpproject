<?php
if(isset($_POST["submit"])){

    $username = $_POST["uid"];
    $pwd = $_POST["pass"];

    require_once '../CRUD/dbh.inc.php';
    require_once 'functions.inc.php';
    require_once '../CRUD/CRUD.php';
    if(emptyInlogin($username,$pwd)!==false){
        header("location: ../login/index.php?error=emptyinput");
        exit();
    }
    loginUser($conn,$username,$pwd);    
}
else{
    header("location: ../login/index.php");
    exit();
}