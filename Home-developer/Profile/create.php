<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$uID = $uType = $fname = $lname = $email = $pass= $phoneNum = $city = $zip = "";
$uID_err = $uType_err = $fname_err = $lname_err = $email_err = $pass_err = $phoneNum_err = $city_err = $zip_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    //USER ID
    $input_uID = trim($_POST["uID"]);
     if(empty($input_uID)){
        $uID_err = "Please enter representative number.";     
    } else{
        $uID = $input_uID;
    }

    // USER TYPE
    $input_uType = trim($_POST["uType"]);
    if(empty($input_uType)){
        $uType_err = "Please enter user type.";
    } else{
        $uType = $input_uType;
    }

    // FIRST NAME
    $input_fname = trim($_POST["fname"]);
    if(empty($input_fname)){
        $fname_err = "Please enter your First Name";
    } else{
        $fname = $input_fname;
    }

    //LAST NAME
    $input_lname = trim($_POST["lname"]);
    if(empty($input_lname)){
        $lname_err = "Please enter your Last Name.";
    } elseif(!filter_var($input_lname, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $lname_err = "Please enter a valid Last Name.";
    } else{
        $lname = $input_lname;
    }

    //EMAIL
    $input_email = trim($_POST["email"]);
    if(empty($input_email)){
        $email_err = "Please enter your Email.";
    } elseif(!filter_var($input_email, FILTER_VALIDATE_EMAIL)){
        $email_err = "Please enter a valid Email.";
    } else{
        $email = $input_email;
    }

    //PASWORD -AYAW MO
    $input_pass = trim($_POST["pass"]);
    if(empty($input_pass)){
        $pass_err = "Please enter a password.";
    } else{
        $pass = $input_pass;
    }
    

    //PHONE NUMBER
    $input_phoneNum = trim($_POST["phoneNum"]);
    if(empty($input_phoneNum)){
        $phoneNum_err = "Please enter your Phone Number.";
    } else{
        $phoneNum = $input_phoneNum;
    }

    //CITY
    $input_city = trim($_POST["city"]);
    if(empty($input_city)){
        $city_err = "Please enter your City.";
    } elseif(!filter_var($input_city, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $city_err = "Please enter a valid City Address.";
    } else{
        $city = $input_city;
    }

    //ZIP CODE
    $input_zip = trim($_POST["zip"]);
    if(empty($input_zip)){
        $zip_err = "Please enter you ZIP Code Address.";
    } else{
        $zip = $input_zip;
    }


    
    // Validate salary
    
    
    
    // Check input errors before inserting in database
    if(empty($uID_err) && empty($uType_err) && empty($fname_err) && empty($lname_err) && empty($email_err) &&empty($pass_err) && empty($phoneNume_err) && empty($city_err) && empty($zip_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO user (User_ID, User_Type, First_Name, Last_Name, Email, Password, Phone_Num, City_Address, ZIP_Code) VALUES ('$uID', '$uType', '$fname', '$lname', '$email', '$pass', '$phoneNum', '$city', '$zip')";
         
        if($stmt = mysqli_prepare($link, $sql)){
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: profile.php");
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
								  <li><a href="profile.php">Profile List</a></li>
								  <li><a href="../../logout.php">Logout</a></li>
								</ul>
				          </li>
				        </ul>
				      </nav><!-- #nav-menu-container -->		    		
			    	</div>
			    </div>
			  </header><!-- #header -->

			
            <div class="wrapper" style="margin-top: 80px;">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="mt-5">Create New User</h2>
                            <p>Please fill this form and submit to add new user record to the database.</p>
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                <div class="form-group">
                                    <label>User ID</label>
                                    <input type="text" name="uID" class="form-control <?php echo (!empty($uID_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $uID; ?>">
                                    <span class="invalid-feedback"><?php echo $uID_err;?></span>
                                </div>
                                <div class="form-group">
                                    <label>User Type</label>
                                    <input type="text" name="uType" class="form-control <?php echo (!empty($uType_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $uType; ?>">
                                    <span class="invalid-feedback"><?php echo $uType_err;?></span>
                                </div>
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" name="fname" class="form-control <?php echo (!empty($fname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $fname; ?>">
                                    <span class="invalid-feedback"><?php echo $fname_err;?></span>
                                </div>
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" name="lname" class="form-control <?php echo (!empty($lname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $lname; ?>">
                                    <span class="invalid-feedback"><?php echo $lname_err;?></span>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                                    <span class="invalid-feedback"><?php echo $email_err;?></span>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="text" name="pass" class="form-control <?php echo (!empty($pass_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $pass; ?>">
                                    <span class="invalid-feedback"><?php echo $pass_err;?></span>
                                </div>
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="text" name="phoneNum" class="form-control <?php echo (!empty($phoneNum_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $phoneNum; ?>">
                                    <span class="invalid-feedback"><?php echo $phoneNum_err;?></span>
                                </div>
                                <div class="form-group">
                                    <label>City</label>
                                    <input type="text" name="city" class="form-control <?php echo (!empty($city_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $city; ?>">
                                    <span class="invalid-feedback"><?php echo $city_err;?></span>
                                </div>
                                <div class="form-group">
                                    <label>ZIP</label>
                                    <input type="text" name="zip" class="form-control <?php echo (!empty($zip_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $zip; ?>">
                                    <span class="invalid-feedback"><?php echo $zip_err;?></span>
                                </div>
                                
                                <input type="submit" class="btn btn-dark" style="background:#B68734; border-style: none;" value="Submit">
                                <a href="profile.php" class="btn btn-dark" style="background:#433533; border-style: none;">Cancel</a>
                            </form>
                        </div>
                    </div>        
                </div>
            </div>
            
            <br><br>

            
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