<?php 
require_once "../CRUD/CRUD.php";
require_once "../classes/menuItem.php";
$menuItems = readMenuFromDB($conn);


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
            <img src="../assets/img/Menu/<?php echo $row->picGet(); ?>.jpg" value ="<?php echo $row->picGet(); ?>"  class="pic_size" alt="">
                <div class="menu-content ">
                
                    <h4 > <?php echo $row->nameGet();?>
                    <span ><?php echo $row->priceGet(); ?> </span></h4>
                    <p ><?php echo $row->getDescription();//food desc?> </p>
                    
                    <a href="<?php echo ($_SERVER["path"]["items"]."?id=".$row->picGet()."&add=");?>"><button class="btn btn-primary" style="margin-top: 10px;" name="add" <?php //adding to busket?>>הוסף לסל</button></a>
                
                </div>
            </div>
            <?php
         }?>
          </div>
  
    </div>
</div>
