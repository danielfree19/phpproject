<?php
$totalprice =0;
if (isset($_SESSION['useruid'])) {
    ?>
<div class="dropdown" style="text-align:right;">
  <button onclick="myFunction()" class="dropbtn">עגלה</button>
  <div id="myDropdown" class="dropdown-content">
  <?php
  foreach ($_SESSION["cart"] as $key => $val) {
      ?>  
    <a href="#">
    <?php 
      $totalprice+=$val->getTotal();
      echo $val->nameGet()."<br> מחיר: ".$val->priceGet()." כמות: ".$val->getAmount()." סכום כולל: ".$val->getTotal() 
    ?></a>
      <div style="text-align:center;">
      <div class="row">
        <div class="col-4"><a href="<?php echo ($_SERVER["path"]["items"]."?id=".$val->picGet()."&increase=")?>">+</a></div>
        <div class="col-4"><a href="<?php echo ($_SERVER["path"]["items"]."?id=".$val->picGet()."&remove=")?>">הסר</a></div>
        <div class="col-4"><a href="<?php echo ($_SERVER["path"]["items"]."?id=".$val->picGet()."&decrease=")?>">-</a></div>
      </div>
        
        
        
      </div>
      
     
     
  
    
    <?php
  } 
  ?>
  <a href="#" style="text-align:center"><?php echo "סה\"כ: ".$totalprice?></a>
  </div>
</div>
<?php
}
?>















































<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
<style>

/* Dropdown Button */
.dropbtn {
  background-color: #3498DB;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

/* Dropdown button on hover & focus */
.dropbtn:hover, .dropbtn:focus {
  background-color: #2980B9;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
  margin-left:50px;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #ddd}

/* Show the dropdown menu (use JS to add this class to the .dropdown-content container when the user clicks on the dropdown button) */
.show {display:block;}

</style>
