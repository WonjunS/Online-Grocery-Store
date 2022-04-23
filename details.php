<html>
<head>
    <title>Online Grocery Store</title>
    <link rel="stylesheet" href="css/checkout.css">
    <script src="js/jquery.min.js"></script>
    <base target="_self">
</head>
<body>
<?php
session_start();

if(isset($_SESSION['products'])) {
    echo "<div id='order_details'><h2>Your Order</h2>";
    echo "<a href='index.html' align='center'><p>Return to Main</p></a>";
    print "<p>Thank you for placing an order with us!</p>";
    print "<table id='user_details'><td align='center'><b>Name</b></td><td align='right'>". $_REQUEST['user_name']. "</td></tr>";
    print "<tr><td align='center'><b>Address</b></td><td align='right'>". $_REQUEST['user_address']. "</td></tr>";
    print "<tr><td align='center'><b>Suburb</b></td><td align='right'>". $_REQUEST['user_suburb']. "</td></tr>";
    print "<tr><td align='center'><b>State</b></td><td align='right'>". $_REQUEST['user_state']. "</td></tr>";
    print "<tr><td align='center'><b>Country</b></td><td align='right'>". $_REQUEST['user_country']. "</td></tr>";
    print "<tr><td align='center'><b>Email</b></td><td align='right'>". $_REQUEST['user_email']. "</td></tr>";
    for($i = 0; $i < sizeof($_SESSION['products']); $i++) {
        $subTotal = $_SESSION['price'][$i] * $_SESSION['quantity'][$i];
        $totalAmt += $subTotal;
    }
    echo "<tr><td align='center'><b>Total price</b></td><td align='right'>$". number_format($totalAmt, 2)."</td></tr></table>";
    
    echo "<h2>Your Receipt</h2>";
    print "<table id='receipt'><tr><th>Product ID</th><th>Product Name</th><th>Unit Quantity</th><th>Unit Price ($)</th><th>Quantity</th><th>Price ($)</th>";
    $cartPrice = 0;
    for($i = 0; $i < sizeof($_SESSION['products']); $i++) {
        print "<tr><td align='center'>". $_SESSION['id'][$i]. "</td>";
        print "<td align='center'>". $_SESSION['products'][$i]. "</td>";
        print "<td align='center'>". $_SESSION['quant'][$i]. "</td>";
        print "<td align='center'>". $_SESSION['price'][$i]. "</td>";
        print "<td align='center'>". $_SESSION['quantity'][$i]. "</td>";
        $subTotal = $_SESSION['price'][$i] * $_SESSION['quantity'][$i];
        print "<td align='center'>" .number_format($subTotal, 2). "</td></tr>";
        $totalAmt += $subTotal;
    }
    echo "<tr><td colspan = 6 align='right'><b>Total price $".number_format($totalAmt, 2)."</b></td></tr></table></div>";
}

?>
</body>
</html>