
<nav class="navbar navbar-expand-lg navbar-light text-white">
    <a class="navbar-brand text-white" routerLink="/home"></a>
    <!--Navigation Strip Items-->
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <img src="../../assets/img/png/logo1.png" class="img-size" style="border-radius: 20px;" routerLink="home">
        &nbsp;&nbsp;&nbsp;
        <div class="navbar-nav">
            <a class="nav-item nav-link text" href='/php_proj/php_code/index.php' >בית</a>
            <a class="nav-item nav-link text" >תפריט</a>
            <a class="nav-item nav-link text" >עלינו בקצרה</a>
            <?php 
            if(session_status()== PHP_SESSION_ACTIVE){
                echo "<a class='nav-item nav-link text'>פרופיל</a>";
                echo "<a class='nav-item nav-link text' href='../includes/logout.inc.php'>logout</a>";
                echo "<p class='nav-item nav-link text'>Hello, " . $_SESSION["useruid"] . "</p>";
            }
            else{
                echo "<a class='nav-item nav-link text' href='./login/index.php'>התחבר</a>";
            }
            ?>
        </div>
    </div>
    
   
</nav>


