<?php

// //start session 
session_start();
// if(!isset($_SESSION["adminloggedin"]) || $_SESSION["adminloggedin"] !== true){
//        header("location: adminlogin.php");
//       exit;
//    }
require_once "config.php";

$name = $email = $password = $confirm_password=  "";
$name_err = $email_err = $password_err = $confirm_password_err = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
  //validation
  if(empty(trim($_POST["name"]))){
    $name_err = "Please enter a name.";
    
  } else{
    $name = trim($_POST["name"]);
  }
  //validate email
  if(empty(trim($_POST["email"]))){
    $email_err = "Please enter an email.";
    //check if email exists in database
      }else{
        $sql = "SELECT id FROM admin WHERE email = ?";
        if($stmt = mysqli_prepare($link, $sql)){
          mysqli_stmt_bind_param($stmt, "s", $param_email);
          $param_email = trim($_POST["email"]);
          if(mysqli_stmt_execute($stmt)){
            mysqli_stmt_store_result($stmt);
            if(mysqli_stmt_num_rows($stmt) == 1){
              $email_err = "This email is already taken.";
            } else{
              $email = trim($_POST["email"]);
            }
          } else{
            echo "<script type ='javascript'> alert('Oops! Something went wrong. Please try again later.</script>";
          }
        }
        mysqli_stmt_close($stmt);
      }
  // Validate password
  if(empty(trim($_POST["password"]))){
    $password_err = "Please enter a password.";     
} elseif(strlen(trim($_POST["password"])) < 6){
    $password_err = "Password must have atleast 6 characters.";
} else{
    $password = trim($_POST["password"]);
}

// Validate confirm password
if(empty(trim($_POST["confirm_password"]))){
    $confirm_password_err = "Please confirm password.";     
} else{
    $confirm_password = trim($_POST["confirm_password"]);
    if(empty($password_err) && ($password != $confirm_password)){
        $confirm_password_err = "Password did not match.";
    }
}
  //store all errors in one variable 
  $all_errors = $name_err . $email_err  . $password_err . $confirm_password_err;
  //mysqli_stmt_close($stmt);
  //sql to insert into database
  //if no error exist then insert into database
  if(empty($all_errors)){
    $sql = "INSERT INTO admin (name, email, password) VALUES (?, ?, ?)";
    if($stmt = mysqli_prepare($link, $sql)){
      mysqli_stmt_bind_param($stmt, "sss", $param_name, $param_email, $param_password);
      $param_name = $name;
      $param_email = $email;
      $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
       
      if(mysqli_stmt_execute($stmt)){
        header("location: adminlogin.php");
      } else{
        echo "<script type ='javascript'> alert('$all_errors').</script>";
      }
    }
    mysqli_stmt_close($stmt);
  }
 
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Watersystem| Registration Page</title>
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
<body class="hold-transition register-page bg bg-primary-dark">

<div class="register-box">
  <div class="register-logo">
    <a href="index.php"><b>Watersystem Admin Registration</a>
    <?php
if(isset($all_errors)){
    echo '<div class="col-12"> ';
    if(!empty($all_errors)){
       echo ' <div class="alert alert-danger">
                <strong>'.$all_errors.'</strong>
            </div>';
    }else{
        echo '<div class="alert d-none alert-danger">
                <strong>'.$all_errors.'</strong>
            </div>';
    }

     echo '</div>';
}
?>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register as a new User</p>

      <form  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="name" placeholder="Name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder=" Institution Email">
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
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="confirm_password" placeholder="Retype password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="btn-group">
              
              <div class="form-group">
                        <lab/label>
                        <select class="custom-select" name="admin" disabled>
                          <option value="Admin">Admin</option>
                          <!-- <option value="Recorder">Recorder</option>
                          <option value="Viewer">Viewer</option> -->
                          
                        </select>
                      </div>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <!-- <a href="index2.html"> -->
            <button type="submit" class="btn btn-warning btn-block" value="Submit">Register</button>
          <!-- </a> -->
          </div>
          <!-- /.col -->
        </div>
      </form>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="js/adminlte.min.js"></script>
</body>
</html>
