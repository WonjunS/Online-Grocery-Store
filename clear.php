<html>
<head>
    <title>Online Grocery Store</title>
    <link rel="stylesheet" href="css/cart.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/display.js"></script>
    <base target="container">
</head>
<body onload="return clear()">
<div id="title">
    <?php
    session_start();
    session_destroy();
    ?>
</div>

<div id="message">
    <?php
    echo "<a href='index.html'>Return to Main</a>";
    ?>
</div>

</body>
</html>