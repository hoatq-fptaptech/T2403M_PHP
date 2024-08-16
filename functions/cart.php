<?php
session_start();
require_once("./db.php");
function getCartItems(){
    $cart = isset($_SESSION["cart"])?$_SESSION["cart"]:[];
    $items = [];
    if(count($cart)> 0){
        $ids = "(1,2,4,5,6)";
        $sql = "select * from products where id in $ids";
        // [
        //     [
        //         "id"=>
        //         "name"=>
        //         "thumbnail"=>
        //         "price"=>
        //         "in_stock"=> qty > buy_qty?true:false,
        //         "buy_qty"=>buy_qty
        //     ],
        //     [

        //     ]
        // ]
    }
    return $items;
}