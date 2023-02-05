<?php
	require '../config.php';
	if(!empty($_SESSION["user_id"])){
		$id = $_SESSION["user_id"];
		$row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM user WHERE User_id = $id"));
		// PHP FOR ORDERING
		if(isset($_POST["submit"])){
			if(!empty($_POST["mode"])){
                $order_id=$_SESSION['order_id'];
                $mode = $_POST["mode"];
                $total = $_SESSION['total'];
                mysqli_stmt_execute(mysqli_prepare($conn, "INSERT INTO `payment` (`Payment_ID`, `Order_ID`, `User_ID`, `Payment_Mode`, `Time_Received`, `Total_Amount`) VALUES (NULL, '$order_id', '$id', '$mode', current_timestamp(), '$total');"));
				
                unset($_SESSION["order_id"]);
                header("Location: ./success.php");
			}
			else{
				echo
				"<script> alert('Select your coffee first.'); </script>";
			}
		}
	}
	
	else{
		header("Location: ../logout.php");
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <style>
        body {
            text-align: center;
            padding: 40px 0;
            background: #e6c497;
        }
            h1 {
            color: #88B04B;
            font-weight: 900;
            font-size: 40px;
            margin-bottom: 10px;
            }
            p {
            font-weight: bold;
            color: #88B04B;
            font-size:20px;
            margin: 0;
            }
        i {
            color: #9ABC66;
            font-size: 100px;
            line-height: 200px;
            margin-left:-15px;
        }
        .card {
            background: white;
            padding: 40px;
            border-radius: 4px;
            box-shadow: 0 2px 3px #C8D0D8;
            display: inline-block;
            margin: 0 auto;
        }
        .gradient-custom-2 {
        /* fallback for old browsers */
        background: #fccb90;

        /* Chrome 10-25, Safari 5.1-6 */
        background: -webkit-linear-gradient(to right, #E6C497, #AD8965, #82583A, #78492B);

        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        background: linear-gradient(90deg, rgba(230,196,151,1) 0%, rgba(173,137,101,1) 58%, rgba(130,88,58,1) 100%);
        }

        .btn-outline-light {
        background: linear-gradient(90deg, rgba(230,196,151,1) 0%, rgba(173,137,101,1) 58%, rgba(130,88,58,1) 100%);
        border: linear-gradient(90deg, rgba(230,196,151,1) 0%, rgba(173,137,101,1) 58%, rgba(130,88,58,1) 100%);
        outline: linear-gradient(90deg, rgba(230,196,151,1) 0%, rgba(173,137,101,1) 58%, rgba(130,88,58,1) 100%);
        }

        @media (min-width: 768px) {
        .gradient-form {
        height: 100vh !important;
        }
        }
        @media (min-width: 769px) {
        .gradient-custom-2 {
        border-top-right-radius: .3rem;
        border-bottom-right-radius: .3rem;
        }
        }
        select {
        font-size: large;
        width: 250px;
        height: 50px;
        -webkit-appearance: menulist-button;
         color: green;
}

option {
    height: 150px;
  width: 50px;
}
.ment{
    color: black;
}

        </style>
</head>
<body>
    <?php
    $order_id = $_SESSION['order_id'];
    $row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `cart` WHERE `Order_ID` = '$order_id'"));
    $_SESSION['total'] = $total = $row['Subtotal'];
    ?>

<div class="container">
                    <div class="card">
    <h1>Payment</h1><hr />
    <br>
    <div style="border-radius:200px; height:200px; width:200px; background: #433533; margin:0 auto;">
    <i class="checkmark">✓</i>
    </div>
    <br>
    <p class="ment">The total amount you have to pay is ₱<?php echo $total;?></p>
    <p class="ment">You will be automatically charged for the full price.</p>
    <form class="" method="POST" action="" autocomplete="off">
        <h1><label for="mode">Mode of Payment:</label></h1>
        <br>
        <select id="mode" name="mode" class="pay">
            <option value="Credit Card">Credit Card</option>
            <option value="Debit Card">Debit Card</option>
            <option value="Gcash">Gcash</option>
            <option value="Paypal">Paypal</option>
        </select> <br>
        <br>
        <button class="btn btn-block fa-lg gradient-custom-2 mb-3" type="submit" name="submit" >Confirm Payment</button>
    </form>
    </div>
</div>
    <script src="js/vendor/jquery-2.2.4.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src="js/vendor/bootstrap.min.js"></script>			
			<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
  			<script src="js/easing.min.js"></script>			
			<script src="js/hoverIntent.js"></script>
			<script src="js/superfish.min.js"></script>	
			<script src="js/jquery.ajaxchimp.min.js"></script>
			<script src="js/jquery.magnific-popup.min.js"></script>	
			<script src="js/owl.carousel.min.js"></script>			
			<script src="js/jquery.sticky.js"></script>
			<script src="js/jquery.nice-select.min.js"></script>			
			<script src="js/parallax.min.js"></script>	
			<script src="js/mail-script.js"></script>				
			<script src="js/main.js"></script>
</body>
</html>