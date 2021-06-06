<?php

function emptyInSi($name,$email,$username,$pwd,$pwdre) {
    $result = false;
    if(empty($name) || empty($username) || empty($email) || empty($pwd) || empty($pwdre)){
        $result = true;
    }
    return $result;
}
function invalidUid($username) {
    $result = false;
    if(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
        $result = true;
    }
    return $result;
}
function invalidEmail($email) {
    $result = false;
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    return $result;
}

function PwdMatch($pwd,$pwdre) {
    $result = false;
    if($pwd!=$pwdre){
        $result = true;
    }
    return $result;
}

function emptyInlogin($username,$pwd){
    $result = false;
    if(empty($username) || empty($pwd)){
        $result = true;
    }
    return $result;
}


