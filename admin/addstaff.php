<?php
session_start();

//connect to database
$db = mysqli_connect('localhost', 'root', '', 'watersystem');

// if (!isset($_SESSION['email'])) {
//     $_SESSION['msg'] = "You must log in first";
//     header('location: ../login/login.php');
//   }

$id_no = "";
$name = "";
$phone_no = "";


$msg='';
if(isset($_GET['id']) && $_GET['id']!=''){
    $image_required='';
    $id=get_safe_value($db,$_GET['id']);
    $res=mysqli_query($db,"select * from staff where id='$id'");
    $check=mysqli_num_rows($res);
    if($check>0){
        $row=mysqli_fetch_assoc($res);
        $id_no=$row['id_no'];
        $name=$row['name'];
        $phone_no=$row['phone_no'];
    }else{
        header('location:staff.php');
        die();
    }
}

$msg='';
if(isset($_POST['submit'])){
    $id_no=$_POST['id_no'];
    $name=$_POST['name'];;
    $phone_no=$_POST['phone_no'];

    $res=mysqli_query($db,"select * from staff where id_no='$id_no'");
    $check=mysqli_num_rows($res);
    if($check>0){

        if(isset($_GET['id']) && $_GET['id']!=''){
            $getData=mysqli_fetch_assoc($res);
            if($id==$getData['id']){
            
            }else{
                $msg="ID Number already exist";
            }
        }else{
            $msg="ID Number already exist";
        }
    }

    if($msg==''){
        if(isset($_GET['id']) && $_GET['id']!=''){
            $update_sql="update staff set id_no='$id_no', name='$name', phone_no='$phone_no' where id='$id'";
            mysqli_query($db,$update_sql);
        }else{
            mysqli_query($db,"insert into staff(id_no , name, phone_no) values('$id_no','$name','$phone_no')");
        }
        header('location:staff.php');
        die();
    
    }
}

function get_safe_value($db,$str){
    if($str!=''){
        $str=trim($str);
        return mysqli_real_escape_string($db,$str);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <title>Focus Admin: Creative Admin Dashboard</title> -->
    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">
    <!-- Styles -->
    <link href="assets/css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
    <link href="assets/css/lib/chartist/chartist.min.css" rel="stylesheet">
    <link href="assets/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/lib/themify-icons.css" rel="stylesheet">
    <link href="assets/css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="assets/css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="assets/css/lib/weather-icons.css" rel="stylesheet" />
    <link href="assets/css/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="assets/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/lib/helper.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

    <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
        <div class="nano">
            <div class="nano-content">
                <ul>
                    <div class="logo"><a href="index.html">
                            <!-- <img src="assets/images/logo.png" alt="" /> --><span>WATERSYSTEM</span></a></div>
                    <li class="label">Main</li>
                    <li><a  href="index.php"><i class="ti-home"></i> Dashboard </a></li>
                    <li class="label">About</li>
                    <li><a class="sidebar-sub-toggle" href="staff.php"><i class="ti-calendar"></i> Staff Records </a></li>
                    <li><a href="kiosk.php"><i class="ti-email"></i> Water Kiosks</a></li>
                    <li><a href="payment.php"><i class="ti-user"></i> Payments</a></li>
                    <li><a href="expense.php"><i class="ti-layout-grid2-alt"></i> Expenses</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /# sidebar -->

    <div class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="float-left">
                        <div class="hamburger sidebar-toggle">
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class="line"></span>
                        </div>
                    </div>
                    <div class="float-right">
                    

                        <div class="dropdown dib">
                            <div class="header-icon" data-toggle="dropdown">
                                <span class="user-avatar">ADMIN
                                    <i class="ti-angle-down f-s-10"></i>
                                </span>
                                <div class="drop-down dropdown-profile dropdown-menu dropdown-menu-right">
                                    <div class="dropdown-content-body">
                                        <ul>
                                            <li>
                                                <a href="logout.php">
                                                    <i class="ti-power-off"></i>
                                                    <span>Logout</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>New Staff Record</h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Staff</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                <!-- /# row -->
                <section id="main-content">


                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card">
                                <form method="POST">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="id_no" class=" form-control-label" style="color: royalblue;">National ID Number</label>
                                    <input type="number" name="id_no" placeholder="Enter your ID No" autocomplete="off" class="form-control" required value="<?php echo $id_no?>">
                                </div>

                                <div class="form-group">
                                    <label for="name" class=" form-control-label" style="color: royalblue;">Name</label>
                                    <input type="text" name="name" placeholder="Enter name" autocomplete="off" class="form-control" required value="<?php echo $name?>">
                                </div>
                                
                                
                                <div class="form-group">
                                    <label for="mobile" class=" form-control-label" style="color: royalblue;">Phone number</label>
                                    <input type="text" name="phone_no" placeholder="Enter your phone number" autocomplete="off" class="form-control" required value="<?php echo $phone_no?>">
                                </div>

                                
                               <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
                               <span id="payment-button-amount">SUBMIT</span>
                               </button>
                               <div class="field_error"><?php echo $msg?></div>
                                
                            </div>
                            </form>
                                    
                               
                            </div>
                            <!-- /# card -->
                        </div>
                        <!-- /# column -->
                    </div>
                

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="footer">
                                <p>2022 © watersystem. - <a href="#">example.com</a></p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <!-- jquery vendor -->
    <script src="assets/js/lib/jquery.min.js"></script>
    <script src="assets/js/lib/jquery.nanoscroller.min.js"></script>
    <!-- nano scroller -->
    <script src="assets/js/lib/menubar/sidebar.js"></script>
    <script src="assets/js/lib/preloader/pace.min.js"></script>
    <!-- sidebar -->

    <script src="assets/js/lib/bootstrap.min.js"></script>
    <script src="assets/js/scripts.js"></script>
    <!-- bootstrap -->

    <script src="assets/js/lib/calendar-2/moment.latest.min.js"></script>
    <script src="assets/js/lib/calendar-2/pignose.calendar.min.js"></script>
    <script src="assets/js/lib/calendar-2/pignose.init.js"></script>


    <script src="assets/js/lib/weather/jquery.simpleWeather.min.js"></script>
    <script src="assets/js/lib/weather/weather-init.js"></script>
    <script src="assets/js/lib/circle-progress/circle-progress.min.js"></script>
    <script src="assets/js/lib/circle-progress/circle-progress-init.js"></script>
    <script src="assets/js/lib/chartist/chartist.min.js"></script>
    <script src="assets/js/lib/sparklinechart/jquery.sparkline.min.js"></script>
    <script src="assets/js/lib/sparklinechart/sparkline.init.js"></script>
    <script src="assets/js/lib/owl-carousel/owl.carousel.min.js"></script>
    <script src="assets/js/lib/owl-carousel/owl.carousel-init.js"></script>
    <!-- scripit init-->
    <script src="assets/js/dashboard2.js"></script>
</body>

</html>