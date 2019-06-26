

<?php

session_start();
include($_SERVER['DOCUMENT_ROOT'] . '/ShoppingCart/include/header.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/ShoppingCart/createConnection.php'); //import database connection  


$myconn = new createConnection(); //create new database connected
$conn = $myconn->connect();
$sql = "SELECT * FROM Products";
$totalIteam = 0;
$totalCost = 0;
krsort($_COOKIE);

echo "<div  class='postionCenter'><h1>Shopping Cart</h1></div>";
echo "
            <div class='row'>
            <div class='col-sm-2'>
            </div>
                <div class='col-sm-9'>
                    <div class='row'>
                        <div class='col-xs-2 form-group'>
                            Quantity
                        </div>
                        <div class='col-xs-4'>Product Name</div>
                        <div class='col-xs-3'>Price</div>     
                        <div class='col-xs-3'>Total Price</div>                                                   
                    </div>
                </div>
            </div>
            <div  class='row'>
                <div class='col-sm-2'>
                </div>
                <div class='col-sm-9'>";
foreach ($_COOKIE as $key => $val) {
    if (substr($key, 0, 4) == "cart") {
        $id = substr($key, 4);

        $sql = $conn->prepare("SELECT * FROM Products WHERE id = $id Limit 1");
        $sql->execute();
        $row = $sql->fetch();

        $totalIteam += $val;
        $totalCost += $val * $row['price'];
        echo "<div class='row'>
                            <div class='col-xs-2 form-group'>
                                <label for='" . $key . "'>" . $val . "</label>
                            </div>
                            <div class='col-xs-4'>" . $row['proName'] . "</div>
                            <div class='col-xs-3'>" . '$' . $row['price'] . "</div>                                                       
                            <div class='col-xs-3'>" . '$' . $row['price'] * $val . "</div>  
                        </div>";
    }
}
if ($totalIteam != 0) {
    echo    "</div>                                
                </div>";
}

echo "<form action='aPay.php' method='POST' >
            <div class='row'>
                <div class='col-xs-4'>
                </div>
                <div class='col-xs-4'>
                    <span class='spanFontType'>
                        Subtotal (" . $totalIteam . " items):
                    </span>
                    <span class='spanFontType subtotalNum'>$" . $totalCost . "</span>
                   
                </div>
            </div>  
    
            <input type='hidden' value='" . $totalCost . "' name='totalCost' >
        </form>";
?>