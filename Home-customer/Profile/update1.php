<?php
// Include config file
require 'config.php';
  if(!empty($_SESSION["user_id"])){
    $id = $_SESSION["user_id"];
    $result = mysqli_query($conn, "SELECT * FROM user WHERE User_id = $id");
    $row = mysqli_fetch_assoc($result);
  
 
    // Define variables and initialize with empty values
    $uID = $uType = $fname = $lname = $email = $pass= $phoneNum = $city = $zip = "";
    $uID_err = $uType_err = $fname_err = $lname_err = $email_err = $pass_err = $phoneNum_err = $city_err = $zip_err = "";
    
    // Processing form data when form is submitted
    if(isset($_POST["id"]) && !empty($_POST["id"])){
        // Get hidden input value
        $id = $_POST["id"];

        // Validate USER ID
        $input_uID = trim($_POST["uID"]);
        if(empty($input_uID)){
        $uID_err = "Please enter User ID.";     
    } else{
        $uID = $input_uID;
    }
        
    // Validate first Name
        $input_fname = trim($_POST["fname"]);
        if(empty($input_fname)){
            $fname_err = "Please enter first name.";
        } elseif(!filter_var($input_fname, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
            $fname_err = "Please enter a valid name.";
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

        //PASWORD 
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

        
        // Check input errors before inserting in database
        if(empty($uID_err) && empty($uType_err) && empty($fname_err) && empty($lname_err) && empty($email_err) && empty($pass_err) && empty($phoneNum_err) &&empty($city_err) &&empty($zip_err)){
            // Prepare an update statement
            $sql = "UPDATE user SET User_Type=?, First_Name=?, Last_Name=?, Email=?, Password=?, Phone_Num=?, City_Address=?, ZIP_Code=?  WHERE User_ID=$uID";
            
            if($stmt = mysqli_prepare($conn, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "sssssssss", $param_fname, $param_lname, $param_rep_num, $param_street, $param_city, $param_state, $param_zip, $param_commission, $param_rate);
                echo "update hello";
                // Set parameters
                $param_uID = $uID;
                $param_uType = $uType;
                $param_fname = $fname;
                $param_lname = $lname;
                $param_email = $email;
                $param_pass = $pass;
                $param_phoneNum = $phoneNum;
                $param_city = $city;
                $param_zip = $zip;

                
                
                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    // Records updated successfully. Redirect to landing page
                    header("location: ../index.php");
                    exit();
                } else{
                    echo "Oops! Something went wrong. Please try again later.";
                }
            }
            
            // Close statement
            mysqli_stmt_close($stmt);
        }
        
        // Close connection
        mysqli_close($conn);
    } else{
        // Check existence of id parameter before processing further
        if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
            // Get URL parameter
            $id =  trim($_GET["id"]);
            
            // Prepare a select statement
            $sql = "SELECT * FROM user WHERE User_ID = ?";
            if($stmt = mysqli_prepare($conn, $sql)){
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
                        $uID = $row["User_ID"];
                        $uType = $row["User_Type"];
                        $fname = $row["First_Name"];
                        $lname = $row["Last_Name"];
                        $email = $row["Email"];
                        $pass = $row["Password"];
                        $phoneNum = $row["Phone_Num"];
                        $city = $row["City_Address"];
                        $zip = $row["ZIP_Code"];
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
            mysqli_close($conn);
        }  else{
            // URL doesn't contain id parameter. Redirect to error page
            header("location: error.php");
            exit();
        }
    }
}else{
    header("../index.php");
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Update Record</h2>
                    <p>Please edit the input values and submit to update the employee record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
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
                            <label>ZIP Code</label>
                            <input type="text" name="zip" class="form-control <?php echo (!empty($rate_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $zip; ?>">
                            <span class="invalid-feedback"><?php echo $zip_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="../index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>