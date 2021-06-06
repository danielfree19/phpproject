<?php 
require_once "../includes/dbh.inc.php";
require_once "../CRUD/CRUD.php";

$menuItems = readMenuFromDB();

?>
<script>

</script>
<div style="text-align: center;margin-top: 50px; margin-bottom: 20px;">

    <div class="container" style="display: inline-block;">
      <div class="row">
        <div class="col-4" >

        </div>
        <div class="col-4" >
          <h1 style="text-align: center;">
             תפריט
          </h1>
        </div>
      <div class="col-4">

      </div>
    </div>
          <div class="row" style="margin-top:20px;">
          <?php
          foreach ($menuItems as $row) {
              ?>  
          <div class="col-6 single-menu" style="padding: 5px;" >
            <img   src="../assets/img/Menu/<?php echo $row["id"];?>.jpg" value ="<?php echo $row["id"];?>"  class="pic_size" alt="">
                <div class="menu-content ">
                <form method="post" action="<?php echo $foodpath?>">
                    <h4 > <?php echo $row["name"];?>
                    <span ><?php echo $row["price"]; ?> </span></h4>
                    <p ><?php echo $row["description"];//food desc?> </p>
                    <input name="id" value=<?php echo $row["id"];?> style="display:none;" >
                    <button class="btn btn-primary" style="margin-top: 10px;" <?php //adding to busket?>>הוסף לסל</button>
                </form>
                </div>
            </div>
            <?php
          }?>
          </div>
  
    </div>
</div>
