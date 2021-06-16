<div class="container" align="center">
    <div class="row">
        <div class="col-4"><a href="./?path=menuItems">תפריט</a></div>
        <div class="col-4"><a href="./?path=users">משתמשים</a></div>
        <div class="col-4"><a href="./?path=Admin">מנהלי מערכת</a></div>
    </div>
</div>

<style>
    td ,th{
        text-align:center;
        padding-right:20px;
        padding-left:20px;
    }
    td.he{
        text-align:right;
    }
</style>
<?php 
require_once "../CRUD/CRUD.php";
require_once "../classes/menuItem.php";


?>

<?php
switch($_GET["path"]){
    case "menuItems":
        $lastindex = 0;
        $menuItems = readMenuFromDB($conn);
        ?>
        <table border="1" align="center" style="margin-top:20px;margin-bottom:30px;  background-color: rgba(114, 97, 97, 0.385);" cellspacing="10px"><tr>
            <th>תמונה</th>
            <th>מזהה</th>
            <th>תיאור</th>
            <th>שם</th>
            <th>מחיר</th>
            <th>פעולות</th>
        </tr>
        <?php 
        foreach ($menuItems as $val) {
            $lastindex = $val->picGet();
            if(isset($_GET["id"])&&$val->picGet()==$_GET["id"]){
                ?>    
                <form action="../includes/addproduct.php" method="get">
                    <tr>
                        <td><input style="width: 100%;" type="text" disabled="true" value ="<?php echo ("../assets/img/Menu/".$val->picGet().".jpg"); ?>"></td>
                        <td><input style="width: 100%;" type="text" name="id" value = "<?php echo $val->picGet(); ?>"> </td>
                        <td class="he"><input style="width: 100%;" name="desc" type="text" value = "<?php echo $val->getDescription(); ?>"></td>
                        <td class="he"><input style="width: 100%;" name="name" type="text" value = "<?php echo $val->nameGet(); ?>"></td>
                        <td><input style="width: 100%;" type="text" name="price" value = "<?php echo $val->priceGet(); ?>"></td>
                        <td>
                        <!-- TODO:saving function -->
                        <button type="submit" name="update">שמירה</button>
                        <br>
                        <a href="./?path=menuItems">ביטול</a></td>
                    </tr>  
                </form>                              
                <?php
            } 
            else{
                ?>
            <tr>
                <td><img src="../assets/img/Menu/<?php echo $val->picGet(); ?>.jpg" width="100px" height="100px" value ="<?php echo $val->picGet(); ?>"  class="pic_size" alt=""></td>
                <td><?php echo $val->picGet(); ?></td>
                <td class="he"><?php echo $val->getDescription(); ?></td>
                <td class="he"><?php echo $val->nameGet(); ?></td>
                <td><?php echo $val->priceGet(); ?></td>
                <td>
                    <a href="./?path=menuItems&id=<?php echo $val->picGet();?>">עריכה</a>
                    <br>
                    <a href="../includes/addproduct.php?id=<?php echo $val->picGet();?>&delete=">מחק</a>
                </td>
            </tr>
        <?php
            }
        }
        $lastindex++;
        ?>
            <tr>
                <form action="../includes/addproduct.php" method="get">
                    <td><input style="width: 100%;" type="text"  value ="<?php echo ("../assets/img/Menu/".$lastindex.".jpg"); ?>" placeholder="מסלול הקובץ"></td>
                    <td><input style="width: 100%;" type="text" name="id" value="<?php echo $lastindex;?>" placeholder="מספר סידורי"> </td>
                    <td class="he"><input style="width: 100%;" name="desc" type="text" placeholder="תיאור"></td>
                    <td class="he"><input style="width: 100%;" name="name" type="text" placeholder="שם המוצר"></td>
                    <td><input style="width: 100%;" name="price" type="text" placeholder="מחיר"></td>
                    <td>
                        <button type="submit" name="add">הוסף</button>    
                    </td>
                </form>
            </tr>  
        </table>
        <?php  
    break;
    case "Admin":
        $admins = readAdminFromDB($conn);
        include_once "../CRUD/CRUD.php";
        $nonAdmin = noneAdminUsers($conn);  
              
        ?>
        <table border="1" align="center" style="margin-top:20px;margin-bottom:30px;  background-color: rgba(114, 97, 97, 0.385);" cellspacing="10px">
            <tr>
                <th>מספר זיהוי</th>
                <th>זיהוי משתמש</th>
                <th>שם משתמש</th>
                <th>אימייל</th>
                <th>פעולות</th>
            </tr>
            <?php
            $lastAdminID = 0;
            foreach($admins as $key => $val){
                $lastAdminID = $key;
            ?>
                    <tr>
                        <td><?php echo $key?></td>
                        <td><?php echo $val["userId"]?></td>
                        <td><?php echo $val["userName"]?></td>
                        <td><?php echo $val["userEmail"]?></td>
                        <td><a href="../includes/adminFunc.php?id=<?php echo $val["userId"]?>&remove=">הסר</a></td>
                    </tr>
            <?php
                }
            ?>
            <tr>
                        <form action="../includes/adminFunc.php" method="get">
                        <td class="he" colspan="2"><input style="width: 100%;" type="text" disabled="true" value="<?php echo ($lastAdminID+1); ?>" placeholder="מספר זיהוי"></td>
                        <td class="he" colspan="2">
                            <select name="id" id="users" style="width:100%;text-align:center;">
                              <?php foreach($nonAdmin as $val){ ?>
                                <option value="<?php echo $val["userUid"];?>"><?php echo $val["userUid"];?></option>                    
                                <?php }?>   
                            </select>
                        </td>
                        <td>
                            <!-- TODO:adding function -->
                            <button type="submit" name="add">הוסף</button>
                            <?php //<a href="../includes/adminFunc.php?id= echo $val["userUid"];&add=">הוסף</a>?>
                        </td>
                        </form>
                        
            </tr>  
        </table>
        <?php
    break;
   
    case "users":

        $users = readUsersFromDB($conn);
        
        ?>
        <table border="1" align="center" style="margin-top:20px;margin-bottom:30px;  background-color: rgba(114, 97, 97, 0.385);" cellspacing="10px">
            <tr>
                <th>מספר זיהוי</th>
                <th>שם משתמש</th>
                <th>אימייל</th>
                <th>סיסמא</th>
                <th>פעולות</th>
            </tr>
            <?php
            foreach($users as $val){
            if (isset($_GET["id"])&& $val["userUid"] == $_GET["id"]) {
                ?>
             <tr>
                    <form action="../includes/passchange.php" method="get">
                            <td><input style="width: 100%;" type="text" name="id" value ="<?php echo $val["userUid"]; ?>"></td>
                            <td><input style="width: 100%;" type="text" disabled="true" value = "<?php echo $val["userName"]; ?>"> </td>
                            <td class="he"><input style="width: 100%;" type="text" value = "<?php echo $val["userEmail"]; ?>"></td>
                            <td class="he"><input style="width: 100%;" name="newpass" type="text" ></td>
                            <td>
                            <!-- TODO:saving function -->
                            <button type="submit">שמירה</button>
                            <br>
                            <a href="./?path=users">ביטול</a></td>
                    </form>
                </tr>    
            <?php
            }
            else{
                ?>
                    <tr>
                        <td><?php echo $val["userUid"]?></td>
                        <td><?php echo $val["userName"]?></td>
                        <td><?php echo $val["userEmail"]?></td>
                        <td><?php echo $val["userPwd"]?></td>
                        <td><a href="./?path=users&id=<?php echo $val["userUid"]; ?>">שינוי סיסמא</a><br><a href="../includes/delUser.php?id=<?php echo $val["userUid"]; ?>">מחק</a></td>
                    </tr>
            <?php
            }
                }
            ?>
            <tr>
                <td colspan="5"><a href="../login">יצירת משתמש חדש</a></td>
            </tr>
        </table>
        <?php
    break;
    
}