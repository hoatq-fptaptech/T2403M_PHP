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
    $sql = "select * from categories";
    $result = $conn->query($sql);
    // 3. convert data to array
    $categories = [];
    while($row = $result->fetch_assoc()){
        $categories[] = $row;
    }
?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Home</a>
        </li>
        <?php foreach($categories as $item):?>
        <li class="nav-item">
          <a class="nav-link" href="/category.php?id=<?php echo $item["id"];?>"><?php echo $item["name"];?></a>
        </li>
        <?php endforeach;?>
      </ul>
      <form action="/search.php" method="get" class="d-flex" role="search">
        <input name="q" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>