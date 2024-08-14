<?php 
    session_start();
    $cart = isset($_SESSION["cart"])?$_SESSION["cart"]:[];
    foreach($cart as $key=>$item){
        echo "ID=$key -- buy_qty=$item<br/>";
    }
