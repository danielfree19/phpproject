<?php
class Items{
    private $pic;
    private $name;
    private $price;
    private $description;
    public function __construct($pic,$name,$price,$description){
        $this->pic = $pic;
        $this->name = $name;
        $this->price = $price;
        $this->amount = $description;
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
    public function description(){
        $this->description;

    }
    public function decAmount(){
        if($this->amount!=1){
            $this->amount--;
        }
    }
    public function setDescription($description){
        $this->description=$description;
    }
    public function getDescription(){
        return $this->description;
    }
    
    public function toString(){
        return "id=".$this->pic." name=".$this->name." price=".$this->price." description=".$this->description;
    }
}