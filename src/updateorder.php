<?php
session_start();

include("./config/database.php");

// Initialize variables
$iname = $quantity = $uprice = $tprice = $email = $mobile = '';

if (isset($_POST['update'])) {
    $iname = $_POST['iname'];
    $quantity = $_POST['quantity'];
    $uprice = $_POST['uprice'];
    $tprice = $_POST['tprice'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $ID = $_POST['ID'];

    $sql = "UPDATE `order` SET iname ='$iname', quantity = '$quantity', uprice = '$uprice',
        tprice = '$tprice', email = '$email', mobile = '$mobile' WHERE ID = '$ID'";

    $result = $conn->query($sql);

    if ($result == TRUE) {
        echo "Record updated successfully!";
        header('Location: orderdashboard.php');
        exit;
    } else {
        echo "Error:" . $sql . "<br>" . $conn->error;
    }
}

if (isset($_GET['ID'])) {
    $id = $_GET['ID'];
    $sql = "SELECT * FROM `order` WHERE ID = '$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $iname = $row['iname'];
            $quantity = $row['quantity'];
            $uprice = $row['uprice'];
            $tprice = $row['tprice'];
            $email = $row['email'];
            $mobile = $row['mobile'];
            $ID = $row['ID'];
        }
    } else {
        header('Location: orderdashboard.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Order</title>
    <link rel="stylesheet" href="./style/updateorder.css">
</head>
<body>
   <!--header-->
   <section class="menu">
    <div class="nav">
        <div class="logo"><h1>Book<b>shop</b></h1></div>
        <ul>
            <li><a class="active" href="homeBook.html">Home</a></li>
            <li><a href="category.html">Category</a></li>
            <li><a href="OFFER.HTML">Offers</a></li>
            <li><a href="aboutusnew.html">About Us</a></li>
            <li><a href="Create.php">Feedback</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="SignUp.php">SignUp</a></li>
            <li><a href="payment2.html">Add to Cart</a></li>
        </ul>
    </div>
</section>

<div class="container">
    <h2>Edit Order</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="form-group">
            <label for="iname">Item Name:</label>
            <input type="text" id="iname" name="iname" value="<?php echo $iname; ?>" required>
        </div>
        <div class="form-group">
            <label for="quantity">Quantity:</label>
            <input type="text" id="quantity" name="quantity" value="<?php echo $quantity; ?>" required>
        </div>
        <div class="form-group">
            <label for="uprice">Unit Price:</label>
            <input type="text" id="uprice" name="uprice" value="<?php echo $uprice; ?>" required>
        </div>
        <div class="form-group">
            <label for="tprice">Total Price:</label>
            <input type="text" id="tprice" name="tprice" value="<?php echo $tprice; ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $email; ?>" required>
        </div>
        <div class="form-group">
            <label for="mobile">Mobile Number:</label>
            <input type="tel" id="mobile" name="mobile" value="<?php echo $mobile; ?>" required>
        </div>
        <div class="button-group">
            <input type="hidden" name="ID" value="<?php echo $ID; ?>">
            <button class="edit-button" type="submit" value="update" name="update"> Save Changes</button>
            <br/>
        </div>
    </form>
</div>

</body>
</html>
