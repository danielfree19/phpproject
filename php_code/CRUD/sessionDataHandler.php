
<?php
     
function getSessionCart(){
    if(!isset($_SESSION["cart"])&&isset($_SESSION["useruid"])){
                $_SESSION["cart"]=array();
                
            }
    }
function setSessionCart($cart){
    $_SESSION["cart"]=$cart;
}

