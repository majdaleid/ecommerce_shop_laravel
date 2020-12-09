<?php
namespace App;

class Cart{

public $items=null;
public $totalqty=0;
public $totalPrice=0;

public function __construct($oldCart){

if($oldCart)
{
  $this->items=$oldCart->items;
  $this->totalqty=$oldCart->totalqty;
  $this->totalPrice=$oldCart->totalPrice;
}

}

public function add($item,$product_id)
{
  $storedItem=['qty'=>0,'product_id'=>0,'product_name'=>$item->product_name,
'product_price'=>$item->product_price,'product_image'=>$item->product_image,
'item'=>$item
];
//print_r($storedItem);
if($this->items){
  if(array_key_exists($product_id,$this->items)){
    $storedItem=$this->items[$product_id];
  }
}
//var_dump($storedItem);
//die();
$storedItem['qty']++;
$storedItem['product_id']=$product_id;
$storedItem['product_name']=$item->product_name;
$storedItem['product_price']=$item->product_price;
$storedItem['product_image']=$item->product_image;
//print_r($storedItem);

$this->totalqty++;
$this->totalPrice+=$item->product_price;
$this->items[$product_id]=$storedItem;
//print_r($this->items);

  }

  public function updateqty($id, $qty){

          $this->totalqty  -= $this->items[$id]['qty'];
          //dd($this->totalqty);
          $this->totalPrice -= $this->items[$id]['product_price'] * $this->items[$id]['qty'];
          //dd($this->totalPrice);
          $this->items[$id]['qty'] = $qty;
          $this->totalqty += $qty;
          $this->totalPrice += $this->items[$id]['product_price'] * $qty;
        //  dd($this->totalPrice);
      }
 public function removeitem($id)
 {
$this->totalqty-=$this->items[$id]['qty'];
$this->totalPrice-=$this->items[$id]['product_price']*$this->items[$id]['qty'];
unset($this->items[$id]);

 }



}





 ?>
