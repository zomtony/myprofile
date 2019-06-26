<?php
include($_SERVER['DOCUMENT_ROOT'] . '/include/header.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/generateOrderNo.php');
$generateOrderNo = new generateOrderNo();
$OrderNo = $generateOrderNo->getOrderNo();


$totalCost = $_POST['totalCost'];
echo $totalCost;

try{
    //is paid success 0 not paid 1 yes
    $count = $conn->exec("INSERT INTO OrderInfo (OrderNo, totalAmount, UserAccount, isPaid) VALUES ('$OrderNo', '$totalCost', 'Test', 0)");
}
catch(PDOException $err){
    echo $err->getMessage();		
}	

?>