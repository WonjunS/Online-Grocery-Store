<html>
<head>
    <title>Online Grocery Store</title>
    <link rel="stylesheet" href="css/checkout.css">
    <script src="js/validation.js"></script>
    <script src="js/jquery.min.js"></script>
    <base target="_self">
</head>
<body>
<div id="title">
    <h3>Order List</h3>
</div>
<div>
<?php
session_start();

if(isset($_SESSION['products'])) {
    print "<table id='list'><tr><th>Product ID</th><th>Product Name</th><th>Unit Quantity</th><th>Unit Price ($)</th><th>Quantity</th><th>Price ($)</th>";
    
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
    echo "<tr><td colspan = 6 align='right'><b>Total price $".number_format($totalAmt, 2)."</b></td></tr></table>";
    
    echo "<form id='checkout' name='checkout' method='POST' action='details.php' onload='document.checkout.user_email.focus()'>
            <fieldset>
                <legend>Purchase form</legend>
                <table>
                    <tr>
                        <td>Name:<span style='color:red'>*</span> </td>
                        <td><input type='text' name='user_name' id='user_name' required></td>
                    </tr>
                    <tr>
                        <td>Address:<span style='color:red'>*</span> </td>
                        <td><input type='text' name='user_address' id='user_address' required></td>
                    </tr>
                    <tr>
                        <td>Suburb:<span style='color:red'>*</span> </td>
                        <td><input type='text' name='user_suburb' id='user_suburb' required></td>
                    </tr>
                    <tr>
                        <td>State:<span style='color:red'>*</span> </td>
                        <td><input type='text' name='user_state' id='user_state' required></td>
                    </tr>
                    <tr>
                        <td>Country:<span style='color:red'>*</span> </td>
                        <td><input type='text' name='user_country' id='user_country' required></td>
                    </tr>
                    <tr>
                        <td>Email:<span style='color:red'>*</span> </td>
                        <td><input type='text' name='user_email' id='user_email' required></td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan='2' align='center'><input type='submit' value='Purchase' name='Purchase' onclick='ValidateEmail(document.checkout.user_email)'/></td>
                        <td>&nbsp;</td>
                    </tr>
                </table>
            </fieldset>
        </form></div>";
}?>

<?php
// If no product has been added to the cart
if(!isset($_SESSION['products']))
{
	echo "<div id='no_product'><h4>No products to checkout. Please add product to Checkout.</h4>";
	echo "<a href='index.html' align='center'><p>Return to Main</p></a></div>";
}
?> 
</body>
</html>