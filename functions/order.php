<?php 
require_once("db.php");
const PENDING = 0;
const CONFIRM = 1;
const SHIPPING = 2;
const SHIPPED = 3;
const COMPLETE = 4;
const CANCEL = 5;

function order_list(){
    $sql = "select * from orders order by id desc";
    return select($sql);
}
function status_label($status){
    switch($status){
        case PENDING: return "<span class='text-warning'>Pending</span>";
        case CONFIRM: return "<span class='text-primary'>Confirmed</span>";
        case SHIPPING: return "<span class='text-secondary'>Shipping</span>";
        case SHIPPED: return "<span class='text-info'>Shipped</span>";
        case COMPLETE: return "<span class='text-success'>Completed</span>";
        case CANCEL: return "<span class='text-danger'>Cancel</span>";
    }
}

function order_detail($id){
    $sql = "select * from orders where id = $id";
    $order = findById($sql);
    $sql_item = "select products.name,
                        products.thumbnail, 
                        order_items.buy_qty,
                        order_items.price
                  from order_items inner join products 
                  on order_items.product_id = products.id
                  where order_items.order_id = $id";
    $items = select($sql_item);
    return [
        "order"=>$order,
        "items"=>$items
    ];              
}