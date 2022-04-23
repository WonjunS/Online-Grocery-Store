<html>
<head>
    <title>Online Grocery Store</title>
    <link rel="stylesheet" href="css/right.css" type="text/css">
    <script src="js/jquery.min.js"></script>
    <script src="js/display.js"></script>
    <base target="bottom-right-frame">
</head>
<body>


<?php

if(isset($_GET) && !empty($_GET)){
    // echo "Empty";
} else {
    header("Location: right.php");
}

$var = $_GET['id']; // Get product_id when user clicks a product node

$link = mysqli_connect("aaprituimkxav9.clrcxhgcabgm.us-east-1.rds.amazonaws.com", "uts", "internet", "assignment1");
if (!$link)
   die("Could not connect to Server");

$query_string = "select * from products where product_id = '$var'";

$result = mysqli_query($link, $query_string);



if (mysqli_num_rows($result) == 1 ) {
    echo "<div id='prodDisplay'>";
    echo "<form name='prodForm' method='get' action='session.php'>";
    $row = mysqli_fetch_assoc($result);
    echo "<table id='prodInfo'>";
    echo "<caption>Product Information</caption>";
    echo "<tr><td><b>Product ID</b></td><td>" . $row['product_id'] . "</td></tr><tr><td><b>Product Name</b></td><td>" . $row['product_name'] . "</td></tr><tr><td><b>Unit Price</b></td><td>" . $row['unit_price'] . "</td></tr><tr><td><b>Unit Quality</b></td><td>". $row['unit_quantity'] . "</td></tr><tr><td><b>In stock</b></td><td>" .$row['in_stock']. "</td></tr>";
    echo "<tr><td><b>Order</b></td><td><input type='number' id='quantity' name='quantity' min='1' max='20' value='1'></td></tr><tr><td colspan='2' align='center'><input type='submit' id='add' name='Add' onclick='return displayCart()'></td></tr>";
    echo "</table>";
    echo "<input type = 'hidden' id = 'prodId' name = 'prodId' value ='".$row['product_id']."'>";
    echo "<input type = 'hidden' id = 'prodName' name = 'prodName' value ='".$row['product_name']."'>";
    echo "<input type = 'hidden' id = 'unit_quant' name = 'unit_quant' value ='".$row['unit_quantity']."'>";
    echo "<input type = 'hidden' id = 'prod_price' name = 'prod_price' value ='".$row['unit_price']."'>";
    echo "<br>";
    echo "</form></div>";
    
}
else if(!($result))
{
    echo "<h1>No products to display.</h1>";
}

mysqli_close($link);

?>
</body>
</html>