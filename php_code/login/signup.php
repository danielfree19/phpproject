

<section>
    <h2>Sign up</h2>
    <form action="../includes/signup.inc.php" method="post">
    <table style="display:inline-block;">
        <tr>
            <td>
                <input type="text" name="uid" placeholder="Username">
            </td>
        </tr>
        <tr>
            <td>
                <input type="password" name="pwd" placeholder="Password">
            </td>
        </tr>        
        <tr>
            <td>
                <input type="password" name="pwdre" placeholder="Password retype">
            </td>
        </tr>
        <tr>
            <td>
                <input type="email" name="email" placeholder="Email">
            </td>
        </tr>
        <tr>
            <td>
                <input type="text" name="name" placeholder="Full name">
            </td>
        </tr>
        <tr>
            <td>
                <button type="submit" name="submit">Sign Up</button>
            </td>
        </tr>
        <tr><td>
        <?php
        //emptyinput usernametaken PNM invalidEmail invaliduid stmtfailed2 stmtfailed1
        if(isset($_GET["error"])){
            switch($_GET["error"]){
                case "emptyinput":
                    echo "<p>Fill in all thr fields</p>";
                break;
                case "usernametaken":
                    echo "<p>username taken</p>";
                break;
                case "PNM":
                    echo "<p>Choose a proper email</p>";
                break;
                case "invalidEmail":
                    echo "<p>Passwords doesnt match</p>";
                break;
                case "invaliduid":
                    echo "<p>Choose a valid username</p>";
                break;
                case "stmtfailed2":
                    echo "<p>System error message number 2 contact the admin</p>";
                break;
                case "stmtfailed1":
                    echo "<p>System error message number 1 contact the admin</p>";
                break;
                case "none":
                    echo "<p>All good you signed up!!</p>";
                break;
            }
        }
        ?>
        </td></tr>
    </table>
    </form>
</section>
