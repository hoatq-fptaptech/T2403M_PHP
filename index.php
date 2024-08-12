<!DOCTYPE html>
<html lang="en">
<?php include_once("html/head.php");?>
<body>
  <?php include_once("html/nav.php");?>
  <?php
     // get categories from database
        // 1 connect to db
        $host = "localhost";
        $user = "root";
        $pass = "root";
        $db = "t2403m";
        $conn = new mysqli($host,$user,$pass,$db);
        if($conn->error){
            die("Connect refused!");
        }
        //die("Connected database...");
      // 2. query data
      $sql = "select * from products";
      $result = $conn->query($sql);
      // 3. convert data to array
      $products = [];
      while($row = $result->fetch_assoc()){
          $products[] = $row;
      }
  ?>
  <main>
    <div class="container">
        <div class="row">
          <?php foreach($products as $item):?>
            <div class="col-3 mb-3 mt-3">
              <div class="card">
                <img src="<?php echo $item["thumbnail"] ?>" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title"><?php echo $item["name"] ?></h5>
                  <p>$<?php echo $item["price"] ?></p>
                  <p class="card-text"><?php echo $item["description"] ?></p>
                  <a href="#" class="btn btn-primary">Detail</a>
                </div>
              </div>
            </div>
          <?php endforeach;?>  
        </div>
    </div>
  </main>
</body>
</html>