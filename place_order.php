<?php 
session_start();
require_once("./functions/db.php");
require_once("./functions/cart.php");
$customer_name = $_POST["customer_name"];
$email = $_POST["email"];
$telephone = $_POST["telephone"];
$shipping_address = $_POST["shipping_address"];
$payment_method = $_POST["payment_method"];

$items = getCartItems();
if(count($items) == 0){
    header("Location: cart.php");
    die();
}
$grand_total = 0;
foreach($items as $item){
    $grand_total += $item["price"] * $item["buy_qty"];
}
$now= date("Y-m-d H:i:s");
$sql = "insert into orders(
                created_at,
                grand_total,
                paid,
                payment_method,
                shipping_address,
                customer_name,
                email,
                telephone
                ) VALUES(
                    '$now',
                    $grand_total,
                    0,
                    '$payment_method',
                    '$shipping_address',
                    '$customer_name',
                    '$email',
                    '$telephone'
                )";
$order_id = insert($sql);
if($order_id != null){
    foreach($items as $item){
        $product_id = $item["id"];
        $buy_qty = $item["buy_qty"];
        $price = $item["price"];
        $sql = "insert into order_items(order_id,product_id,buy_qty,price)
             VALUES($order_id,$product_id, $buy_qty,$price)";
        insert($sql);     
    }
    header("Location: /thankyou.php");
    die();
}
header("Location: /checkout.php");
