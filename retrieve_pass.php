<?php
    require 'config.php';
    if(!empty($_SESSION["user_id"])){
      header("Location: login.php");
    }

    if(isset($_POST["submit"])){
      $first_name = $_POST["first_name"];
      $last_name = $_POST["last_name"];
      $email = $_POST["email"];
      $result = mysqli_query($conn, "SELECT * FROM user WHERE Email = '$email'");
      $row = mysqli_fetch_assoc($result);

      if(mysqli_num_rows($result) > 0){
        if($first_name == $row['First_Name'] && $last_name == $row['Last_Name']){
        echo
          "<script> alert('Your Password is ".$row['Password']."'); </script>";
        }
        else{
          echo
          "<script> alert('Please enter the correct first and last name.'); </script>";
        }
      }
    else{
        echo
        "<script> alert('Invalid Email Address.'); </script>";
    }
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
    <title>Forgot Password</title>

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
                        <h4 class="mt-1 mb-3 pb-1">Deja Brew</h4>
                      </div>
      
                      <h5 style="text-align: center;">Password Reset</h5>
                      <p>Please fill out the following:</p>
                      
                      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                          <div class="form-group">
                              <label>Email Address</label>
                              <input type="text" id="form2Example11" class="form-control" name="email" required value=""/>
                          </div>
                          <div class="form-group">
                              <label>First Name</label>
                              <input type="text" id="form2Example11" class="form-control" name="first_name" required value=""/>
                          </div>
                          <div class="form-group">
                              <label>Last Name</label>
                              <input type="text" id="form2Example11" class="form-control" name="last_name" required value=""/>
                          </div>

                          <button type="submit" name="submit" class="btn btn-outline-light">Submit</button>
                          <a href="login.php" class="btn btn-secondary ml-2">Cancel</a>
                      </form>
      
                    </div>
                  </div>
                  <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                    <div class="text-white px-3 py-4 p-md-6 mx-md-4">
                      </p>
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