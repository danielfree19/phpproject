<?php


require_once $_SERVER["path"]["DBHpath"];

?>
<nav class="navbar navbar-expand-lg navbar-light text-white">
<?php

?>
<?php 

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
           $_SESSION["admin"]=true;
       }
    }
}

?>

    <!--Navigation Strip Items-->
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <img href="/index.php" src="<?php echo $_SERVER["path"]["src"]?>" class="img-size" style="border-radius: 20px;" >
        &nbsp;&nbsp;&nbsp;
        <div class="navbar-nav">
            <a class="nav-item nav-link text" href='/index.php' >בית</a>
            <a class="nav-item nav-link text" href='/foodMenu' >תפריט</a>
            <a class="nav-item nav-link text" href= "<?php echo $_SERVER["path"]["aboutus"]?>">עלינו בקצרה</a>
            <?php 
            if(isset($_SESSION['useruid'])){
                if($flag){?>
                    <a class='nav-item nav-link text' href='<?php echo $_SERVER["path"]["adminpath"]?>'>דף אדמין</a>
                    <a class='nav-item nav-link text' href='/login'>יצירת משתמש חדש</a>
                <?php 
                }
                ?>
                <a class='nav-item nav-link text' href='<?php echo $_SERVER["path"]["logout"]?>'>התנתק</a>
                <p class='nav-item nav-link text'><?php echo "שלום, ".$_SESSION["useruid"] ?></p>
                <?php 
                }
                            else{?>
                <a class='nav-item nav-link text' href='/login'>התחבר</a>
                <?php 
                }
                ?>
                <span style='margin-left:20px;margin-right:20px;'></span>
                <?php include_once $_SERVER["path"]["cart"];?>
        </div>
    </div>
    
    
</nav>


