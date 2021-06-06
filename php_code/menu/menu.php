<?php

?>
<nav class="navbar navbar-expand-lg navbar-light text-white">
<?php
require_once $funcFile;
?>
<?php 
require_once "$DBHpath";
if (isset($_SESSION["useruid"])) {
    $info = array();
    $sqlQ = "SELECT userId FROM admin;";
    $result = mysqli_query($conn, $sqlQ);
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $cnt = 0;
    $flag = false;
    foreach ($rows as $row) {
       if($row['userId']==$_SESSION["useruid"]){
           $flag = true;
       }
    }
}

?>
<a class="navbar-brand text-white" routerLink="/home"></a>
    <!--Navigation Strip Items-->
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <img href="/php_proj/php_code/index.php" src="<?php echo $src?>" class="img-size" style="border-radius: 20px;" >
        &nbsp;&nbsp;&nbsp;
        <div class="navbar-nav">
            <a class="nav-item nav-link text" href='/php_proj/php_code/index.php' >בית</a>
            <a class="nav-item nav-link text" href='/php_proj/php_code/foodMenu' >תפריט</a>
            <a class="nav-item nav-link text" >עלינו בקצרה</a>
            <?php 
            if(isset($_SESSION['useruid'])){
                if($flag){
                    echo "<a class='nav-item nav-link text' href='$adminpath'>דף אדמין</a>";   
                }
                echo "<a class='nav-item nav-link text'>פרופיל</a>";
                echo "<a class='nav-item nav-link text' href='$logout'>התנתק</a>";
                echo "<p class='nav-item nav-link text'>Hello, " . $_SESSION["useruid"] . "</p>";
                
            }
            else{
                echo "<a class='nav-item nav-link text' href='/php_proj/php_code/login/index.php'>התחבר</a>";
            }
            ?>
        </div>
    </div>
    
    
</nav>


