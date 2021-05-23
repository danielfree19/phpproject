<?php

if(isset($_SESSION["useruid"])){
    header("location:index.php");
}
?>

<form method="POST" action="../includes/login.inc.php">
    <h2>Login Screen</h2><br>
    <table style="display:inline-block;">
        <tr>
            <td>
                <input type="text" name="uid" placeholder="Username/email...">
            </td>
            
        </tr>
        <tr>
            <td>
                <input type="password" name="pass" placeholder="Password...">
            </td>
        </tr>
        <tr>
        <td colspan="2">
            <button type="submit" name="submit">Login</button>
            </td>
            </tr>
            <tr><td>
            <?php
        //emptyinput usernametaken PNM invalidEmail invaliduid stmtfailed2 stmtfailed1
        if(isset($_GET["error"])){
            switch($_GET["error"]){
                case "emptyinput":
                    echo "<p>Fill in all the fields</p>";
                break;
                case "wronglogin":
                    echo "<p>Wrong username or password</p>";
                break;
                
            }
        }
        ?>
            </td></tr>
    </table>
</form>

