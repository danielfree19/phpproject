<?php

if(isset($_POST["submit"])){
    
    $name=$_POST["name"];
    $email=$_POST["email"];
    $username=$_POST["uid"];
    $pwd=$_POST["pwd"];
    $pwdre=$_POST["pwdre"];

    require_once '../CRUD/dbh.inc.php';
    require_once 'functions.inc.php';
    require_once '../CRUD/CRUD.php';

    if(emptyInSi($name,$email,$username,$pwd,$pwdre)!==false){
        header("location: ../login/index.php?error=emptyinput");
        exit();
    }
    if(invalidUid($username)!==false){
        header("location: ../login/index.php?error=invaliduid");
        exit();
    }
    if(invalidEmail($email)!==false){
        header("location: ../login/index.php?error=invalidEmail");
        exit();
    }
    if(PwdMatch($pwd,$pwdre)!==false){
        header("location: ../login/index.php?error=PNM");
        exit();
    }
    if(uidexists($conn,$username,$email)!==false){
        header("location: ../login/index.php?error=usernametaken");
        exit();
    }
    
    createUser($name,$email,$username,$pwd);
}
else{
    header("location: ../login/index.php");
    exit();
}
