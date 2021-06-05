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

function uidexists($conn,$username,$email) {
    $sql = "SELECT * FROM users WHERE userUid = ? or userEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../login/index.php?error=stmtfailed1");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss",$username,$email);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else{
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function createUser($conn,$name,$email,$username,$pwd){
    
    $sql = "INSERT INTO USERS (userName,userEmail,userUid,userPwd) VALUES (?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../login/index.php?error=stmtfailed2");
        exit();
    }
    $hashedPwd = password_hash($pwd,PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, "ssss",$name,$email,$username,$hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../login/index.php?error=none");
        exit();
}

function emptyInlogin($username,$pwd){
    $result = false;
    if(empty($username) || empty($pwd)){
        $result = true;
    }
    return $result;
}

function loginUser($conn,$username,$pwd){
    $uidExists = uidexists($conn,$username,$username);
    if($uidExists===false){
        header("location: ../login/index.php?error=wronglogin");
        exit();
    }
    $hashedPwd = $uidExists["userPwd"];
    $checkPwd = password_verify($pwd,$hashedPwd);

    if($checkPwd===false){
        header("location: ../login/index.php?error=wronglogin");
        exit();
    }
    elseif($checkPwd === true){
        session_start();
        $_SESSION["userid"]=$uidExists["userId"];
        $_SESSION["useruid"]=$uidExists["userUid"];
        
        header("location: ../index.php");
        exit();
    }

}