<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$payID = $userID = $orderID = $paymentMode = $date = $time = $totalAmount = "";

$payID_err = $userID_err = $orderID_err = $paymentMode_err = $date_err = $time_err = $totalAmount_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $input_payID = trim($_POST["payID"]);
    if(empty($input_payID)){
        $payID_err = "Please enter First Name";
    } else{
        $payID = $input_payID;
    }


    $input_userID = trim($_POST["userID"]);
    if(empty($input_userID)){
        $userID_err = "Please enter Last Name.";
    } else{
        $userID = $input_userID;
    }

    $input_orderID = trim($_POST["orderID"]);
    if(empty($input_orderID)){
       $orderID_err = "Please enter representative number.";     
   } else{
       $orderID = $input_orderID;
   }

    $input_paymentMode = trim($_POST["paymentMode"]);
    if(empty($input_paymentMode)){
        $paymentMode_err = "Please enter paymentMode.";
    } else{
        $paymentMode = $input_paymentMode;
    }

    $input_totalAmount = trim($_POST["totalAmount"]);
    if(empty($input_totalAmount)){
        $totalAmount_err = "Please enter totalAmount.";
    } else{
        $totalAmount = $input_totalAmount;
    }
    
    
    // Check input errors before inserting in database
    if(empty($payID_err) && empty($userID_err) && empty($orderID_err) && empty($paymentMode_err) &&empty($totalAmount_err)){
        // Prepare an update statement
        $sql = "UPDATE payment SET Payment_Mode=?, Total_Amount=? WHERE Payment_ID=$payID";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
             mysqli_stmt_bind_param($stmt, "ss", $param_paymentMode, $param_totalAmount);
             echo "update hello";
            // Set parameters
            $param_paymentMode = $paymentMode;
            $param_totalAmount = $totalAmount;
             
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM payment WHERE Payment_ID = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $payID = $row["Payment_ID"];
                    $orderID = $row["Order_ID"];
                    $userID = $row["User_ID"];
                    $paymentMode = $row["Payment_Mode"];
                    $timeReceived = $row["Time_Received"];
                    $totalAmount = $row["Total_Amount"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($link);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/elements/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="colorlib">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>Update Payment</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="css/linearicons.css">
			<link rel="stylesheet" href="css/owl.carousel.css">
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="css/nice-select.css">			
			<link rel="stylesheet" href="css/magnific-popup.css">
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/main.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<header id="header" id="home" style="background: #433533;">
				<div class="header-top">
		  			<div class="container">
				  		<div class="row justify-content-end">
				  			<div class="col-lg-8 col-sm-4 col-8 header-top-right no-padding">
				  				<ul>
				  					<li>
				  						Mon-Fri: 8am to 8pm
				  					</li>
				  					<li>
				  						Sat-Sun: 11am to 11pm
				  					</li>
				  					<li>
				  						<a href="tel:(012) 6985 236 7512">(+63) 912 345 6789</a>
				  					</li>				  					
				  				</ul>
				  			</div>
				  		</div>			  					
		  			</div>
				</div>			  	
			    <div class="container">
			    	<div class="row align-items-center justify-content-between d-flex">
				      <div id="logo">
				        <a href="../index.php"><img src="img/logo.png" alt="" title="" /></a>
				      </div>
				      <nav id="nav-menu-container">
				        <ul class="nav-menu">
				          <li class="menu-active"><a href="../index.php">Home</a></li>
						  <li class="menu-has-children"><a href="">
							  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
								  <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
							  </svg></a>
							  	<ul style="width: 150px;">
								  <li><a href="../../logout.php">Logout</a></li>
								</ul>
				          </li>
				        </ul>
				      </nav><!-- #nav-menu-container -->		    		
			    	</div>
			    </div>
			  </header><!-- #header -->
              <br><br><br>
                <div class="wrapper">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <h2 class="mt-5">Update Payment</h2>
                                <p>Please edit the input values and submit to update the payment.</p>
                                <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                                <div class="form-group">
                                        <label>Pay ID</label>
                                        <input readonly type="text" name="payID" class="form-control <?php echo (!empty($payID_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $payID; ?>">
                                        <span class="invalid-feedback"><?php echo $payID_err;?></span>
                                    </div>
                                    <div class="form-group">
                                        <label>User ID</label>
                                        <input readonly type="text" name="userID" class="form-control <?php echo (!empty($userID_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $userID; ?>">
                                        <span class="invalid-feedback"><?php echo $userID_err;?></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Order ID</label>
                                        <input readonly type="text" name="orderID" class="form-control <?php echo (!empty($orderID_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $orderID; ?>">
                                        <span class="invalid-feedback"><?php echo $orderID_err;?></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Payment Mode</label>
                                        <input type="text" name="paymentMode" class="form-control <?php echo (!empty($paymentMode_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $paymentMode; ?>">
                                        <span class="invalid-feedback"><?php echo $paymentMode_err;?></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Total Amount</label>
                                        <input type="text" name="totalAmount" class="form-control <?php echo (!empty($totalAmount_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $totalAmount; ?>">
                                        <span class="invalid-feedback"><?php echo $totalAmount_err;?></span>
                                    </div>
                                    <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                                    <input type="submit" class="btn btn-dark" style="background:#B68734; border-style: none;" value="Submit">
                                    <a href="index.php" class="btn btn-dark" style="background:#433533; border-style: none;">Cancel</a>
                                </form>
                            </div>
                        </div>        
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