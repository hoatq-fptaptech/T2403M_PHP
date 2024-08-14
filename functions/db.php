<?php 
function connect(){
    $config = file_get_contents("app_setting.json");// string
    $config = json_decode($config);
    $host = $config->host;
    $user = $config->user;
    $pass = $config->password;
    $db = $config->database;
    $conn = new mysqli($host,$user,$pass,$db);
    if($conn->error){
        die("Connect refused!");
    }
    return $conn;
}

function select($sql){
    $conn = connect();
    $result = $conn->query($sql);
    //convert data to array
    $data = [];
    while($row = $result->fetch_assoc()){
        $data[] = $row;
    }
    return $data;
}

function findById($sql) {
    $data = select($sql); // [] : 1 hoặc 0 element
    if(count($data)>0){
        return $data[0];
    }
    return null;
}


