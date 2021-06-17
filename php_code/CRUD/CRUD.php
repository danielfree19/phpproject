<?php
        function writeItemToDB($conn,$id,$description,$name,$price){
            header('Content-Type: text/html; charset=utf-8');
                    $sql = "INSERT INTO menu(id,description,name,price) VALUES  (?,?,?,?);";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        echo "Error";
                    }
                    mysqli_stmt_bind_param($stmt, "issi",$id,$description,$name,$price);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_close($stmt);

        }
        require_once "../classes/menuItem.php";
        function readMenuFromDB($conn){
            $result = mysqli_query($conn, "SELECT * FROM menu ORDER BY id");
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $menu=array();
            foreach ($rows as $row) {
                $menu[]  = new Items($row["id"],$row["name"],$row["price"],$row["description"]);
            }
             return $menu;        
        }
        function readUsersFromDB($conn){
            $result = mysqli_query($conn, "SELECT * FROM users");
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $menu=array();
            foreach ($rows as $row) {
                $menu[]  = $row;
            }
             return $menu;        
        }
        function readAdminFromDB($conn){
           
            $result = mysqli_query($conn, "SELECT * FROM admin ORDER BY id");
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $admins=array();
            foreach ($rows as $row) {
                $admins[$row["id"]] = array();
                $admins[$row["id"]]["userId"]  = $row["userId"];
                $result2 = mysqli_query($conn, "SELECT * FROM users");
                $rows2 = mysqli_fetch_all($result2, MYSQLI_ASSOC);
                foreach ($rows2 as $row2) {
                    if($row2["userUid"]==$row["userId"]){
                        $admins[$row["id"]]["userName"]=$row2["userName"];
                        $admins[$row["id"]]["userEmail"]=$row2["userEmail"];
                        
                    }
                    
                }
            }
             return $admins;        
        }
        function addNewItem($id,$desc,$name,$price,$conn){
            $sql = "INSERT INTO menu(id,description,name,price) VALUES  (?,?,?,?);";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                echo "Error";
            }
            mysqli_stmt_bind_param($stmt, "issi",$id,$desc,$name,$price);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            header("Location: ../admin/?path=menuItems");
            exit();
        }
        function deleteItem($id,$conn){
            $sql = "DELETE FROM menu WHERE id=".$id.";";
            echo $sql;
            if(mysqli_query($conn, $sql)){
                echo "Record was updated successfully.";
            } else {
                echo "ERROR: Could not able to execute $sql. " 
                                        . mysqli_error($conn);
            } 
            mysqli_close($conn);
            header("Location: ../admin/?path=menuItems");
            exit();
        }
        function updateItem($id,$desc,$name,$price,$conn){
            //UPDATE menu SET id=22 description='asd' name='asd' price=12 where id=22
            $sql = "UPDATE menu SET id=".$id.", description='".$desc."', name='".$name."', price=".$price." where id=".$id;
            echo $sql;
            if(mysqli_query($conn, $sql)){
                echo "Record was updated successfully.";
            } else {
                echo "ERROR: Could not able to execute $sql. " 
                                        . mysqli_error($conn);
            } 
            mysqli_close($conn);
            header("Location: ../admin/?path=menuItems");
            exit();
        }

        function addNewAdmin($id,$conn){
            $sql = "INSERT INTO admin (userId) VALUES  ('".$id."');";
            echo $sql;
            if(mysqli_query($conn, $sql)){
                echo "Record was updated successfully.";
            } else {
                echo "ERROR: Could not able to execute $sql. " 
                                        . mysqli_error($conn);
            } 
            mysqli_close($conn);
            header("Location: ../admin/?path=Admin");
            exit();
        }
        function deleteAdmin($id,$conn){
            $sql = "DELETE FROM admin WHERE userId='".$id."';";
            echo $sql;
            if(mysqli_query($conn, $sql)){
                echo "Record was updated successfully.";
            } else {
                echo "ERROR: Could not able to execute $sql. " 
                                        . mysqli_error($conn);
            } 
            mysqli_close($conn);
            header("Location: ../admin/?path=menuItems");
            exit();
        }
        function PasswordChange($id,$newpass,$conn){
            $hashedPwd = password_hash($newpass,PASSWORD_DEFAULT);
            $sql = "UPDATE users SET userPwd='".$hashedPwd."' WHERE userUid='".$id."'";
            if(mysqli_query($conn, $sql)){
                echo "Record was updated successfully.";
            } else {
                echo "ERROR: Could not able to execute $sql. " 
                                        . mysqli_error($conn);
            } 
            mysqli_close($conn);
            header("Location: ../admin/?path=users");
            exit();
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
            if(isset($_SESSION["userUid"])){
                header("location: ../index.php?error=none");
                exit();
            }
            else{
                header("location: ../login/index.php?error=none");
                exit();
            }
            
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
        include_once "sessionDataHandler.php";
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
                getSessionCart();
                header("location: ../index.php");
                exit();
            }
        }
        function deleteUser($id,$conn){
            $sql = "DELETE FROM users WHERE userUid='".$id."';";
            echo $sql;
            if(mysqli_query($conn, $sql)){
                echo "Record was updated successfully.";
            } else {
                echo "ERROR: Could not able to execute $sql. " 
                                        . mysqli_error($conn);
            } 
            mysqli_close($conn);
            //header("Location: ../admin/?path=users");
            //exit();
        }
        function ItemFromDB($conn,$id){
            $result = mysqli_query($conn, "SELECT * FROM menu where id=".$id.";");
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
            
            foreach($rows as $row){
                
                return new CartItem($row['id'],$row['name'],$row['price'],1);
            }
        }
        function noneAdminUsers($conn){
            $result = mysqli_query($conn, "SELECT * FROM admin");
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
            $result2 = mysqli_query($conn, "SELECT * FROM users");
            $rows2 = mysqli_fetch_all($result2, MYSQLI_ASSOC);
            $nonAdmin=array();
            foreach ($rows2 as $row2){  
                $nonAdmin[] = $row2;
            }
            foreach ($rows as $row) {
                foreach ($nonAdmin as $key=>$val){  
                     if($row['userId']==$val['userUid']){
                         unset($nonAdmin[$key]);
                     }
                }
            }
            return $nonAdmin;    
        }
