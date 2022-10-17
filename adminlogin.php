<?php

// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
// if(isset($_SESSION["adminloggedin"]) && $_SESSION["adminloggedin"] === true){
//   header('location:index.php');
//     exit;
// }
 
// Include config file
require_once "config.php";
  // timestamp 
  date_default_timezone_set('Africa/Nairobi');
  $timestamp = time();
  $timecapture = date("Y-m-d h:i:s",$timestamp);
// Define variables and initialize with empty values
$email = $password = "";
$email_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if email is empty
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter email.";
    } else{
        $email = trim($_POST["email"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($email_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, email, password FROM admin WHERE email = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = $email;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if email exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $email, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                           
            //fetch user data from database
            $sqlfetchuserinfo = "SELECT * FROM admin WHERE email = '$email'";
            $result = mysqli_query($link, $sqlfetchuserinfo);
            $row = mysqli_fetch_array($result);
            $fullname = $row['name'];
                      $id = $row['id'];
                            // Store data in session variables
                            $_SESSION["adminloggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["email"] = $email; 
                            //select user details from db 
                            $sessionsql = "SELECT * FROM admin WHERE email = '$email'";
                            $sessionresult = mysqli_query($link, $sessionsql);
                            $sessionrow = mysqli_fetch_array($sessionresult);
                            $_SESSION["name"] = $sessionrow['name'];
                           
                          
                            //echo welcome
                            header('location:adminrecords.php');
                            $timesql = "INSERT INTO logs (email, time, role) VALUES ('$email', '$timecapture', 'admin')";
                            $timeresult = mysqli_query($link, $timesql);
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid email or password.";
                        }
                    }
                } else{
                    // email doesn't exist, display a generic error message
                    $login_err = "Invalid email or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Water System |Admin Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
  
<div class="login-box">
  <div class="login-logo">
    <!-- <a href="index2.html"><b>Admin Login Page</a> -->
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Company Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div> -->
          <!-- /.col -->
          <?php
if(isset($login_err)){
    echo '<div class="col-12"> ';
    if(!empty($login_err)){
       echo ' <div class="alert alert-danger">
                <strong>'.$login_err.'</strong>
            </div>';
    }else{
        echo '<div class="alert d-none alert-danger">
                <strong>'.$login_err.'</strong>
            </div>';
    }

     echo '</div>';
}
?>

          <div class="col-4">
          <button type="submit" class="btn btn-success btn-block" value="Submit">Sign in</button>
          <a href="login.php" >Not an Admin</a>
          </div>
          <!-- /.col -->
        </div>
      </form>

     
      <p class="mb-1">
        <!-- <a href="">I forgot my password</a>/ -->
      </p>
      
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="js/adminlte.min.js"></script>

</body>
</html>
