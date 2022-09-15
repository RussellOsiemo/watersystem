<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'watersystem');

// if (!isset($_SESSION['email'])) {
//     $_SESSION['msg'] = "You must log in first";
//     header('location: ../login/login.php');
//   }

if(isset($_GET['type']) && $_GET['type']!=''){
    $type=get_safe_value($db,$_GET['type']);
    if($type=='delete'){
        $id=get_safe_value($db,$_GET['id']);
        $delete_sql="delete from kiosk where id='$id'";
        mysqli_query($db,$delete_sql);
    }

} 
$sql="select * from kiosk";
$res=mysqli_query($db,$sql);

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
                    <li><a href="staff.php"><i class="ti-calendar"></i> Staff Records </a></li>
                    <li><a class="sidebar-sub-toggle" href="kiosk.php"><i class="ti-email"></i> Water Kiosks</a></li>
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
                                <h1>Hello, <span>Welcome Here</span></h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Water Kiosks</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                <!-- /# row -->
                <section id="main-content">

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="col-lg-4">
                                <button type="button" class="btn btn-white save-event waves-effect waves-light"> <a href="addkiosk.php"><h6>Add New Kiosk Record</h6></a></button></div>
                            </div>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                
                                   
                                        <div class="table-stats order-table ov-h">
                                    <table class="table table-bordered verticle-middle table-responsive-sm">
                                        <thead>
                                            <tr>
                                               
                                               <th width="20%" style="color: blueviolet;">Name</th>
                                               <th width="10%" style="color: blueviolet;">Number</th>
                                               <th width="15%" style="color: blueviolet;">Location</th>
                                               <th width="15%" style="color: blueviolet;">Opening Hrs</th>
                                               <th width="15%" style="color: blueviolet;">Closing Hrs</th>
                                               <th width="25%" style="color: blueviolet;">Status</th>
                                               <th width="10%" style="color: blueviolet;">ACTION</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php 
                                        
                                         while($row=mysqli_fetch_assoc($res)) { ?>
                                            <tr>
                                            <td style="color: black;"> <?php echo $row['name']?> </td>
                                            <td style="color: black;"> <?php echo $row['number']?> </td>
                                            <td style="color: black;"> <?php echo $row['location']?> </td>
                                            <td style="color: black;"> <?php echo $row['open_hrs']?> </td>
                                            <td style="color: black;"> <?php echo $row['close_hrs']?> </td>
                                            <td style="color: black;"> <?php echo $row['status']?> </td>
                                            <td>
                                                    <?php
                                                   
                                                    echo "<a href='addkiosk.php?id=".$row['id']."' data-toggle='tooltip' data-placement='top' title='Edit'><i class='fa fa-pencil color-muted' style='color: black;'></i></a>";
                                                        echo '<span class="badge badge-edit" data-toggle="tooltip" data-placement="top" '; 
                                                        echo "<span class='badge badge-delete'><a href='kiosk.php?type=delete &id=".$row['id']."'><i class='fa fa-close color-danger' style='color: black;'></i></a></span> ";
                                                    ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                         
                                     </tbody>
     
                                    </table>
                                </div>
                                    
                               
                            </div>
                            <!-- /# card -->
                        </div>
                        <!-- /# column -->
                    </div>
                

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="footer">
                                <p>2022 © watersystem.</p>
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