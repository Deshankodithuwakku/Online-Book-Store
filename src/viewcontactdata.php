<?php
    require 'connection.php';
    session_start();


$select_sql = "SELECT * FROM contactus";
$result = $con->query($select_sql);

?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Book Store</title>
    <link rel="icon" type="img/png" href="image/logo.png">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="../styles/header-footer.css">
    <link rel="stylesheet" type="text/css" href="../styles/viewcontact.css">
</head>
<body>
	
	<!-- horizontal navigation bar -->
	
	
	<div class="navbar">
			<div class="logo">
				<h1>Online Book Store</h1>
			</div>
			<div class="menu">
				<ul>
					<li><a href="index.html">Home</a></li>
					<li><a href="packages.html">Packages</a></li>
					<li><a href="terms.html">Terms and Conditions</a></li>
					<li><a href="about.html">About Us</a></li>
					<li><a href="../contact.html">Contact Us</a></li>
				</ul>
			</div>
			<div class="login">
				<a href="login.html">Login</a>
				<a href="Register.html">Register</a>
			</div>
		</div>
	</div>


<body><br>
    <center><h2 class="conatct">Contact us Details</h2></center>
    <table class="table">
        <tr>
            <th>ID</th>
            <th>Fullname</th>
            <th>Phone No</th>
            <th>Email</th>
            <th>Subject</th>
            <th>Messsage</th>
            <th>Action</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['fullname'] . "</td>";
                echo "<td>" . $row['phoneNo'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['subject'] . "</td>";
                echo "<td>" . $row['message'] . "</td>";
                echo '<td><a href="../php/contact.php?id=' . $row['id'] . '&action=delete" name="delete_ci">Delete</a></td>';
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No data found in the table.</td></tr>";
        }
        ?>
    </table>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <!--1st column-->
                <div class="footer-col">
                    <h4>Pages</h4>
                    <ul>
                        <li><a href="contact.html">Contact Us</a></li>
                        <li><a href="about.html">About Us</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms & Conditions</a></li>
                    </ul>
                </div>
                <!--2nd column-->
                <div class="footer-col">
                    <ul>
                        <br>
                        <br>
                        <li><a href="#">Promotions</a></li>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">News</a></li>
                        <li><a href="#">FAQs</a></li>
                    </ul>
                </div>
                <!--3rd column-->
                <div class="footer-col">
                    <h4>Office</h4>
                    <ul>
                        <li><a href="">312, Kandy rd</a></li>
                        <li><a href="">Malabe</a></li>
                        <li><a href="">+97 123134235</a></li>
                        <li><a href="">support@sunsetsafari.com</a></li>
                    </ul>
                </div>
                <!--4th column-->
                
            </div>
            <hr>
            <div class="row">
                <div class="col">
                    <p>&#169; 2024 Sunest Boat Safari. All Rights Reserved.</p>
                </div>
                <div class="socialIcons">
                    <a href=""><i class="fa-brands fa-facebook"></i></a>
                    <a href=""><i class="fa-brands fa-instagram"></i></a>
                    <a href=""><i class="fa-brands fa-twitter"></i></a>
                    <a href=""><i class="fa-brands fa-youtube"></i></a>
                </div>
            </div>
        </div>
    </footer>
	 <!--SLIDES USING JAVASCRIPT -->
	 <script src="js/home.js"></script>
</body>
<html>

<?php
$con->close();
?>