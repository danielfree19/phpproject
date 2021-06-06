<?php
    function writeItemToDB($id,$description,$name,$price){
        header('Content-Type: text/html; charset=utf-8');
        require_once "dbh.inc.php";
        $sql = "INSERT INTO menu(id,description,name,price) VALUES  (?,?,?,?);";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo "Error";
                }
                mysqli_stmt_bind_param($stmt, "issi",$id,$description,$name,$price);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
                        
            }

        function readMenuFromDB(){
            require_once "../classes/menuItem.php";
            $result = mysqli_query($conn, "SELECT * FROM menu");
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $menu=array();
            foreach ($rows as $row) {
                $menu[]  = new items($row["id"],$row["name"],$row["price"],$row["description"]);
            }
            return $menu;

        }
        function createUser($name,$email,$username,$pwd){
            require_once "dbh.inc.php";
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
                mysqli_stmt_close($stmt);
                return $row;
            }
            else{
                $result = false;
                mysqli_stmt_close($stmt);
                return $result;
            }
           
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
        
    ?>