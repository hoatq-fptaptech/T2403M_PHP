<?php 
    require_once("./../functions/order.php");
    $orders = order_list();
?>
<!DOCTYPE html>
<html lang="en">
<?php include_once("./../html/head.php");?>
<body>
    <main>
        <div class="row">
            <aside class="col-3">
                <ul class="list-group">
                    <li class="list-group-item">Orders</li>
                    <li class="list-group-item">Customers</li>
                    <li class="list-group-item">Products</li>
                    <li class="list-group-item">Categories</li>
                    <li class="list-group-item">Reviews</li>
                </ul>
            </aside>
            <article class="col">
                <h1>Orders Listing</h1>
                <table class="table table-bordered table-striped">
                    <thead>
                        <th>#</th>
                        <th>Customer</th>
                        <th>Telephone</th>
                        <th>Grand total</th>
                        <th>Created At</th>
                        <th>Payment</th>
                        <th>Paid</th>
                        <th>Status</th>
                    </thead>
                    <tbody>
                        <?php foreach($orders as $item):?>
                            <tr>
                                <td><?php echo $item["id"];?></td>
                                <td><?php echo $item["customer_name"];?></td>
                                <td><?php echo $item["telephone"];?></td>
                                <td><?php echo $item["grand_total"];?></td>
                                <td><?php echo $item["created_at"];?></td>
                                <td><?php echo $item["payment_method"];?></td>
                                <td><?php echo $item["paid"];?></td>
                                <td><?php echo $item["status"];?></td>
                            </tr>
                        <?php endforeach;?>    
                    </tbody>
                </table>
            </article>
        </div>
    </main>
</body>
</html>