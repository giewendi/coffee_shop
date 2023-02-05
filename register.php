<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$first_name = $last_name = $email = $password = $phone = $city = $zip = "";
$first_name_err = $last_name_err = $email_err = $password_err = $phone_err = $city_err = $zip_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_first_name = trim($_POST["first_name"]);
    if(empty($input_first_name)){
        $first_name_err = "Please enter first name.";
    } elseif(!filter_var($input_first_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $first_name_err = "Please enter a valid name.";
    } else{
        $first_name = $input_first_name;
    }
    
    // Validate lastname
    $input_last_name = trim($_POST["last_name"]);
    if(empty($input_last_name)){
        $last_name_err = "Please enter lastname.";     
    } else{
        $last_name = $input_last_name;
    }
    
    // Validate email
    $input_email = trim($_POST["email"]);
     if(empty($input_email)){
        $email_err = "Please enter representative number.";     
    } elseif(!filter_var($input_email, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i")))){
        $email_err = "Please enter a valid email.";
    } else{
        $email = $input_email;
    }

    // Validate password
    $input_password = trim($_POST["password"]);
     if(empty($input_password)){
        $password_err = "Please enter a password.";     
    } else{
        $password = $input_password;
    }

    // Validate phone
    $input_phone = trim($_POST["phone"]);
     if(empty($input_phone)){
        $phone_err = "Please enter phone address.";     
    } else{
        $phone = $input_phone;
    }

    // Validate city
    $input_city = trim($_POST["city"]);
     if(empty($input_city)){
        $city_err = "Please enter city address.";     
    } else{
        $city = $input_city;
    }

    // Validate zip
    $input_zip = trim($_POST["zip"]);
     if(empty($input_zip)){
        $zip_err = "Please enter zip address.";     
    } else{
        $zip = $input_zip;
    }

    // Check input errors before inserting in database
    if(empty($first_name_err) && empty($last_name_err) && empty($email_err) && empty($password_err) && empty($city_err) && empty($phone_err) && empty($zip_err) && empty($commission_err) && empty($rate_err)){
        // Prepare an insert phonement
        $sql = "INSERT INTO user (first_name, last_name, email, password, city_address, phone_num, zip_code, user_type) VALUES (?, ?, ?, ?,?,?,?,'Customer')";
         
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared phonement as parameters
            mysqli_stmt_bind_param($stmt, "sssssss", $param_first_name, $param_last_name, $param_email, $param_password, $param_phone, $param_city, $param_zip);
            
            // Set parameters
            $param_first_name = $first_name;
            $param_last_name = $last_name;
            $param_email = $email;
            $param_password = $password;
            $param_city = $city;
            $param_phone = $phone;
            $param_zip = $zip;
            
            // Attempt to execute the prepared phonement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: login.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close phonement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($conn);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Deja Brew</title>

    <style>
        h4{
            font-weight: 700;
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
        .contactTitle p{
    text-align: center;
    font-size: 20px;
}
      .back{
        margin-left: 20px;
        height: 5vh;
        width: 100%;
      }

    </style>
</head>
<body>
    <section class="bg-image" style="background-image: url(img/wallpaper.jpg); height: 100vh;">
        <div class="container py-5 h-100 ">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-10">
              <div class="card rounded-3 text-black">
                <div class="row g-0">
                  <div class="col-lg-6">
                    <div class="card-body p-md-5 mx-md-4">
      
                      <div class="text-center">
                        <img src="img/logo.png"
                          style="width: 185px;" alt="logo">
                        <h4 class="mt-1 mb-5 pb-1">Deja Brew</h4>
                      </div>
      
                      <form class="" method="POST" action="" autocomplete="off">
                      <div class="contactTitle">
                <h2 class="mt-5">Create New User</h2><br>
    <p>Please fill this form and and click submit.</p>
    </div>
      
                        <div class="form-outline mb-4">
                        <label>First Name</label>
            <input type="text" name="first_name" class="form-control <?php echo (!empty($first_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $first_name; ?>">
            <span class="invalid-feedback"><?php echo $first_name_err;?></span>
                        </div>
      
                        <div class="form-outline mb-4">
                        <label>Last Name</label>
            <input type="text" name="last_name" class="form-control <?php echo (!empty($last_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $last_name; ?>">
            <span class="invalid-feedback"><?php echo $last_name_err;?></span>
                        </div>

                        <div class="form-outline mb-4">
                        <label>Email Address</label>
            <input type="text" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
            <span class="invalid-feedback"><?php echo $email_err;?></span>
                        </div>
      

                        <div class="form-outline mb-4">
                        <label>Password</label>
            <input type="text" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
            <span class="invalid-feedback"><?php echo $password_err;?></span>
                        </div>

                        
                        <div class="form-outline mb-4">
                        <label>Phone Number</label>
            <input type="text" name="phone" class="form-control <?php echo (!empty($phone_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $phone; ?>">
            <span class="invalid-feedback"><?php echo $phone_err;?></span>
                        </div>

                        
                        <div class="form-outline mb-4">
                        <label>Phone Number</label>
            <input type="text" name="phone" class="form-control <?php echo (!empty($phone_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $phone; ?>">
            <span class="invalid-feedback"><?php echo $phone_err;?></span>
                        </div>
      
      
                        <div class="form-outline mb-4">
                        <label>ZIP Code</label>
            <input type="text" name="zip" class="form-control <?php echo (!empty($zip_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $zip; ?>">
            <span class="invalid-feedback"><?php echo $zip_err;?></span>
                        </div>
                        

                        <div class="" style="margin-top:-20px;">
                        <br>
                          <a href="register.php"><br><button type="button" class="btn btn-outline-light">Create new</button></a>
                          <a href="login.php" id="back" class="btn btn-outline-light">  Back  </a>
                        </div>
                        
      
                      </form>
      
                    </div>
                  </div>
                  <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                    <div class="text-white px-3 py-4 p-md-6 mx-md-4">
                      <h4 class="mb-4" style="text-shadow:2px 2px 2px #78492B;">Register Now, <br> To make your day smoothly.</h4>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
</body>
</html>