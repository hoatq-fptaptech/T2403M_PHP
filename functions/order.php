<?php 
require_once("db.php");
function order_list(){
    $sql = "select * from orders order by id desc";
    return select($sql);
}
