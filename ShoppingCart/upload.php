<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/ShoppingCart/createConnection.php'); //import database connection     
session_start();
$myconn = new createConnection(); //create new database connected
$conn = $myconn->connect();

$proName = $_POST['proName'];
$price = $_POST['price'];
$proPic = $_POST['proPic'];
$proDes = $_POST['proDes'];
try{
    //is paid success 0 not paid 1 yes
    $count = $conn->exec("INSERT INTO Products (proName, price, proPic, proDes) VALUES ('$proName', '$price', '$proPic', '$proDes')");
    header("Location: /index.php");
}
catch(PDOException $err){
    echo "exception happened. Pleash check the database connection";
    echo $err->getMessage();		
}	
