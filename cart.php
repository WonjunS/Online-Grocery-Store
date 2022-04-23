<html>
<head>
    <title>Online Grocery Store</title>
    <link rel="stylesheet" href="css/cart.css" type="text/css">
    <script src="js/display.js"></script>
    <script src="js/jquery.min.js"></script>
    <base target="_blank">
</head>

<body>
<div id="title">
    <!-- This form will be displayed when user clicks clear button -->
    <form action="clear.php" method="post">
        <input type="submit" id="clear" value="Clear">
    </form>
    <!-- This form will be displayed when user clicks checkout button -->
    <form action="checkout.php" method="post">
        <input type="submit" id="checkout" value="Checkout" onclick="return display_cart()"/>
    </form>
    <h2>Your Shopping Cart</h2>
</div>
<hr/>
<div>
<?php

session_start();
print "<table id='list'><tr><th>Product ID</th><th>Product Name</th><th>Unit Quantity</th><th>Unit Price ($)</th><th>Quantity</th><th>Price ($)</th>";

if(isset($_SESSION['products'])) {
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
    print "</table>";
    print "<br>";
    print "<table id='total'>";
    echo "<tr> <td>Total price for ".sizeof($_SESSION['products']). " product(s): $</td> <td align = 'center'> ".number_format($totalAmt, 2)."</td></tr></table></div>";
    
}
else {
    echo "<h2>Your shopping cart is empty!</h2>";
}

?>

</body>
</html>