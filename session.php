<html>
<head>
    <base target = "bottom-right-frame">
</head>
<body>
<?php

session_start();

if(!empty($_REQUEST['prodName'])) {
	if(!isset($_SESSION['products'])) {
		$_SESSION['id'][0] = $_REQUEST['prodId'];
		$_SESSION['products'][0] = $_REQUEST['prodName'];
		$_SESSION['quant'][0] = $_REQUEST['unit_quant'];
		$_SESSION['price'][0] = $_REQUEST['prod_price'];
		$_SESSION['quantity'][0] = $_REQUEST['quantity'];
	}
	else {
		$newProdId = $_REQUEST['prodId'];
		$match = false;
		for($i = 0; $i < sizeof($_SESSION['products']); $i++) {
			if($newProdId == $_SESSION['id'][$i]) {
				$_SESSION['quantity'][$i] += $_REQUEST['quantity'];
				$match = true;
				break;
			}
		}
		if(!$match) {
			$_SESSION['id'][] = $newProdId;
			$_SESSION['products'][] = $_REQUEST['prodName'];
			$_SESSION['quant'][] = $_REQUEST['unit_quant'];
			$_SESSION['price'][] = $_REQUEST['prod_price'];
			$_SESSION['quantity'][] = $_REQUEST['quantity'];
		}
	}
}
else {
	print "<h1>No products to display</h1>";
}

?>

<form id = "updateCart" action = "cart.php" method = "post"> 
<input type = "hidden" id = "update" name = "update">
<script type = "text/javascript">
    document.getElementById("updateCart").submit();     
</script>
</form>

</body>
</html>