<?php
  // Include config file
  require 'config.php';
  if(!empty($_SESSION["user_id"])){
    header("Location: login.php");
  } 
  if(isset($_POST["submit"])){
    $username = $_POST["user_idemail"];
    $password = $_POST["password"];
    $result = mysqli_query($conn, "SELECT * FROM user WHERE Email = '$username' OR User_ID = '$username'");
    $row = mysqli_fetch_assoc($result);

    if(mysqli_num_rows($result) > 0){
        if($password == $row['Password']){
        $_SESSION["login"] = true;
        $_SESSION["user_id"] = $id = $row["User_ID"];
        
        $sql = "INSERT INTO log_in (user_id) VALUES ($id)";
        mysqli_stmt_execute(mysqli_prepare($conn, $sql));

        if($row["User_Type"]== "Customer")
          header("Location: ./home-customer/index.php");
        else
          header("Location: ./home-developer/index.php");
      }
      else{
        echo
        "<script> alert('Wrong Password'); </script>";
      }
    }
    else{
      echo
      "<script> alert('The username does not exist.'); </script>";
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
                        <p>Please login to your account</p>
      
                        <div class="form-outline mb-4">
                          <input type="text" id="form2Example11" class="form-control" name="user_idemail" required value=""
                            placeholder="Username" />
                        </div>
      
                        <div class="form-outline mb-4">
                          <input type="text" id="form2Example22" class="form-control" name="password" required value=""
                          placeholder="Password"/>
                        </div>
      
                        <div class="text-center pt-1 mb-5 pb-1">
                          <button class="btn btn-block fa-lg gradient-custom-2 mb-3" type="submit" name="submit" style="color: white;">
                          Log in</button>
                          <a class="text-muted" href="retrieve_pass.php">Forgot password?</a>
                        </div>
                        
                        <div class="d-flex align-items-center justify-content-center pb-4">
                          <p class="mb-0 me-2">Don't have an account?</p>
                        </div>
                        <div class="d-flex justify-content-center" style="margin-top:-20px;">
                          <a href="Register.php"><button type="button" class="btn btn-outline-light">Create new</button></a>
                        </div>
                        
      
                      </form>
      
                    </div>
                  </div>
                  <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                    <div class="text-white px-3 py-4 p-md-6 mx-md-4">
                      <h4 class="mb-4" style="text-shadow:2px 2px 2px #78492B;">We don’t just make your coffee. <br> We make your day smoothly.</h4>
                      <p class="small mb-0">The Deja Brew provides a business and School works hub where professionals and students in all industries can come to grab some coffee, hold a meeting, meet for lunch or put in a full day of work. We want everyone we meet to feel welcome in a place where they can work, laugh, or bond– A place to call home.
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