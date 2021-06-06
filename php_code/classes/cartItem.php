<?php
require_once "genFun.inc.php";
class Cart{
private $info;
private $totalcost;
public $cart=array();
public function __construct(){
        $this->info = json_encode($_SESSION["cart"]);
        if (!$this->info) {
            $this->info = array();
        }
    
}
public function addItem_amount($pic,$name,$price,$amount){
    $this->cart[] = new CartItem($pic,$name,$price,$amount);
}
 public function addItem($pic,$name,$price){
        $flag = true;
        foreach($this->cart as $item){
            if($item->picGet() == $pic){
                $item->addAmount();
                $flag = false;
            }
        }
    if($flag){
        $this->cart[] = new CartItem($pic,$name,$price);
    }
}
}
class CartItem{
    private $pic;
    private $name;
    private $price;
    private $amount;
    public function __construct($pic,$name,$price,$amount=0){
        $this->pic = $pic;
        $this->name = $name;
        $this->price = $price;
        $this->amount = $amount;
    }
    
    
    public function nameSet($name){
        $this->name=$name;
    }
    public function nameGet(){
        return $this->name;
    }
    public function priceSet($price){
        $this->price=$price;
    }
    public function priceGet(){
        return $this->price;
    }
    public function picSet($pic){
        $this->pic=$pic;
    }
    public function picGet(){
        return $this->pic;
    }
    public function addAmount(){
        $this->amount++;

    }
    public function decAmount(){
        if($this->amount!=1){
            $this->amount--;
        }
    }
    public function setAmount($amount){
        $this->amount=$amount;
    }
    public function getAmount(){
        return $this->amount;
    }
    public function getTotal(){
        return $this->amount*$this->price;
    }
    public function toString(){
        return "id=".$this->pic." name=".$this->name." price=".$this->price." amount=".$this->amount;
    }
}
    
    