<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$aID = $aName = $aPrice  = "";
$aID_err = $aName_err = $aPrice_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate ADD ONS ID
    $input_aID = trim($_POST["aID"]);
     if(empty($input_aID)){
        $aID_err = "Please enter Add Ons ID.";     
    } else{
        $aID = $input_aID;
    }

    // Validate Add ons name
    $input_aName = trim($_POST["aName"]);
    if(empty($input_aName)){
        $aName_err = "Please enter Add ons Name";
    } else{
        $aName = $input_aName;
    }

    //Validate Price
    $input_aPrice = trim($_POST["aPrice"]);
    if(empty($input_aPrice)){
        $aPrice_err = "Please enter Price.";
    } else{
        $aPrice = $input_aPrice;
    }

    

    
    
    // Check input errors before inserting in database
    if(empty($aID_err) && empty($aName_err) && empty($aPrice_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO add_ons (Addons_ID, Addons_Name, Addons_Price) VALUES ('$aID', '$aName', '$aPrice')";
         
        if($stmt = mysqli_prepare($link, $sql)){
            
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: add_ons.php");
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
}
?>
 
<!DOCTYPE html>
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
		<title>Coffee</title>

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
				        <a href="../../index.php"><img src="img/logo.png" alt="" title="" /></a>
				      </div>
				      <nav id="nav-menu-container">
				        <ul class="nav-menu">
				          <li class="menu-active"><a href="../../index.php">Home</a></li>
						  <li class="menu-has-children"><a href="">
							  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
								  <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
							  </svg></a>
							  	<ul style="width: 150px;">
								  <li><a href="/logout.php">Logout</a></li>
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
                            <h2 class="mt-5">Create New Add On</h2>
                            <p>Please fill this form and submit to add new Add on to the database.</p>
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                <div class="form-group">
                                    <label>Add On ID</label>
                                    <input type="text" name="aID" class="form-control <?php echo (!empty($aID_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $aID; ?>">
                                    <span class="invalid-feedback"><?php echo $aID_err;?></span>
                                </div>
                                <div class="form-group">
                                    <label>Add On Name</label>
                                    <input type="text" name="aName" class="form-control <?php echo (!empty($aName_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $aName; ?>">
                                    <span class="invalid-feedback"><?php echo $aName_err;?></span>
                                </div>
                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="text" name="aPrice" class="form-control <?php echo (!empty($aPrice_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $aPrice; ?>">
                                    <span class="invalid-feedback"><?php echo $aPrice_err;?></span>
                                </div>
                                
                                <input type="submit" class="btn btn-dark" style="background:#B68734; border-style: none;" value="Submit">
                                <a href="add_ons.php" class="btn btn-dark" style="background:#433533; border-style: none;">Cancel</a>
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