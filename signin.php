<?php 
session_start();
include("php/dbconnection.php"); 

  

if(isset($_POST['submit'])){

  $username = $_POST['member_email']; 
  $password = $_POST['member_password']; 
  $sql = "SELECT * FROM member_tbl WHERE member_email = '$username' AND member_password ='$password' AND member_type = '1'"; 
  $result = $conn->query($sql); 
  $data = mysqli_query($conn, "select * from `member_tbl` where member_email = '$member_email'");
  $fetchdata = mysqli_fetch_assoc($data);
  
  if($result->num_rows > 0){ 
    $_SESSION['member_email'] = $username; 
    header("Location: dashboardclient.php");
  }
  else{
    echo "Login gagal.";
    header("Location: signin.php"); 
  }

   $conn->close(); 

  }
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <!-- My CSS -->
    <link rel="stylesheet" href="stylesignup.css" />
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200..800&display=swap" rel="stylesheet" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Marcellus&display=swap" rel="stylesheet" />

    <!-- End of Font -->
    <title>Sign In Page</title>
  </head>

  <body style="background: linear-gradient(0deg, rgba(0,48,63,0.674269561340161) 0%, rgba(228,199,161,1) 92%);">
    <div class="jumbotron vertical-center shadow">
      <div class="container "style="background: linear-gradient(135deg, #f6d365 0%, #fda085 100%);" >
        <div class="row">
          <div class="col">
            <img src="asset/icon/navbar/flying papers.png" width="300" class="vertical-center object-fit-contain rounded" ; />
          </div>
          <div class="col shadow p-5 rounded">
            <form action="" class="signin" method="post" enctype="multipart/form-data">
              <div class="col user-details">
                <div class="row text-center">
                  <h3>Welcome, Reader!</h3>
                </div>
                <div class="row">
                  <a>Email</a>
                </div>
                <div class="row">
                  <div class="input-box">
                    <input type="text" name="member_email" placeholder="Enter your email"required/>
                  </div>
                </div>
                <div class="row">
                  <a>Password</a>
                </div>
                <div class="row">
                  <div class="input-box">
                    <input type="password" name="member_password" placeholder="Enter your password"required/>
                  </div>
                </div>
                <div class="row py-2">
                  <button type="submit" name="submit" value="submit" class="btn btn-dark center">Sign In</button>
                </div>
                <div class="row py-2 text-center">
                  <a href="signup.php">Doesn't have account? Sign Up</a>
                  <a href="signinadmin.php">Administrator Login</a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>

  <!-- Script Start -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <!-- Script Finished -->
</html>
