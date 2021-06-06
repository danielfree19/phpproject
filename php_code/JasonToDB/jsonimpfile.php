<?php

    function importJSON($filename){
        header('Content-Type: text/html; charset=utf-8');
        require_once "dbh.inc.php";
        $jsondata = file_get_contents($filename,true);
        $data = json_decode($jsondata, true);
        foreach ($data as $val) {
            $desc = $val["desc"];
            $id = (int)$val["pic"];
            $price = (int)$val["price"];
            $name = $val["name"];
        $sql = "INSERT INTO menu(id,description,name,price) VALUES  (?,?,?,?);";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "Error";
        }
        mysqli_stmt_bind_param($stmt, "issi",$id,$desc,$name,$price);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        }
    }
