<?php
session_start();
$uname = $_SESSION['uname'];
$connection = oci_connect('arafatx','arafatx','localhost/XE')
				or die(oci_error());
// $wrongPass = false;
// close the connection 

if(isset($_POST['respond'])) {

    // $M_TIME=$_POST['meeting-time'];
    // $M_LINK=$_POST['meeting-link'];
    $M_ID=$_GET['accept'];
    $_SESSION['mid']=$M_ID;

    // $sql1="UPDATE APPOINTMENT 
    // SET LINK=:LINK,
    // TIME=TO_DATE(:TIME, 'HH24:MI:SS')
    // WHERE MEETING_ID=M_ID";
    // $stid1=oci_parse($connection, $sql1);

    // oci_bind_by_name($stid1, ":TIME", $M_TIME);
    // oci_bind_by_name($stid1, ":LINK", $M_LINK);
                            
    // $r1=oci_execute($stid1);

}

if(isset($_POST['reject'])) {

    $M_ID=$_POST['delete'];

    $query="DELETE FROM APPOINTMENT WHERE MEETING_ID='$M_ID'";
    $statement=oci_parse($connection, $query);
    $res=oci_execute($statement);

}

?>



<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
    <!-- Document Meta
    ============================================= -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--IE Compatibility Meta-->
    <meta name="author" content="zytheme" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="Real Estate html5 template">
    <link href="assets/images/favicon/favicon.png" rel="icon">

    <!-- Fonts
    ============================================= -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i%7CPoppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Stylesheets
    ============================================= -->
    <link href="assets/css/external.css" rel="stylesheet">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- Document Title
    ============================================= -->
    <title>LandPro | Real Estate Html5 Template</title>
</head>

<body>
    <!-- Document Wrapper
	============================================= -->
    <div id="wrapper" class="wrapper clearfix">
    <header id="navbar-spy" class="header header-1 header-transparent header-fixed">
            <nav id="primary-menu" class="navbar navbar-fixed-top">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="logo" href="index.php">
                            <p>REMS</p>
                            <!-- <img class="logo-light" src="assets/images/logo/logo-light.png" alt="Land Logo">
                            <img class="logo-dark" src="assets/images/logo/logo-dark.png" alt="Land Logo"> -->
                        </a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse pull-right" id="navbar-collapse-1">
                        <ul class="nav navbar-nav nav-pos-center navbar-left">
                            <!-- Home Menu -->
                            <li>
                                <a href="login-index.php" data-toggle="dropdown" class="dropdown-toggle menu-item">home</a>
                            </li>
                            <!-- li end -->


                            <!-- Properties Menu-->
                            <li class="has-dropdown">
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle menu-item">Properties</a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="properties-grid-user.php">All Properties</a>
                                    </li>
                                    <li>
                                        <a href="my-properties.php">My Properties</a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="#" data-toggle="dropdown" class="dropdown-toggle menu-item">forum</a>
                            </li>

                            <!-- li end -->
                            <li class="has-dropdown active">
                                <a data-toggle="dropdown" class="dropdown-toggle menu-item btn-popup">
                                <?php
                                
                                    $sql ="SELECT * FROM USER_TABLE WHERE USERNAME='$uname'";
                                    $stid = oci_parse($connection, $sql);
                                    $r = oci_execute($stid);
                                    $row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS);
                                    echo $row['USERNAME'];
                                
                                ?>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="agent-profile.php">My Account</a>
                                    </li>
                                    <li>
                                        <a>Favorites</a>
                                    </li>
                                    <li>
                                        <a href="index.php">Logout</a>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                        <!-- ADD FAVORITES ICON HERE -->
                        <!-- Module Consultation  -->
                        <div class="module module-property pull-left">
                            <a class="btn" href="add-property.php"><i class="fa fa-plus"></i>
                                add property</a>
                        </div>
                        <!-- <div class="module module-property pull-left">
                            <a href="add-property.php" target="_blank" class="btn"><i class="fa fa-plus"></i> add
                                property</a>
                        </div> -->
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container-fluid -->
            </nav>

        </header>

        <!-- Page Title #1
============================================ -->
        <section id="page-title" class="page-title bg-overlay bg-overlay-dark2">
            <div class="bg-section">
                <img src="assets/images/page-titles/1.jpg" alt="Background" />
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3">
                        <div class="title title-1 text-center">
                            <div class="title--content">
                                <div class="title--heading">
                                    <h1>My Account</h1>
                                </div>
                                <ol class="breadcrumb">
                                    <li>Home</li>
                                    <li>Appointment</li>
                                    <li class="active">Requests</li>
                                </ol>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <!-- .title end -->
                    </div>
                    <!-- .col-md-12 end -->
                </div>
                <!-- .row end -->
            </div>
            <!-- .container end -->
        </section>
        <!-- #page-title end -->


        <!-- agent-profile 
============================================= -->
        <section id="agent-profile" class="agent-profile bg-white">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-3">
                        <div class="edit--profile-area">
                            <ul class="edit--profile-links list-unstyled mb-0">
                                <li><a href="agent-profile.php">View Profile</a></li>
                                <li><a href="user-profile.php">Edit Profile</a></li>
                                <li><a href="#" class="active">Appointments</a>
                                    <ul type="none">
                                        <li>
                                            <a href="requeststome.php" class="active">Requests</a>
                                        </li>
                                        <li>
                                            <a href="requestsfromme.php">Responses</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="my-properties.php">My Properties</a></li>
                                <li><a href="contracts.php">Contracts</a></li>
                                <li><a href="transactions.php">Transactions</a></li>
                            </ul>
                        </div>
                    </div>


                    <?php                    
                    
                    $sql="SELECT * FROM USER_TABLE U, APPOINTMENT A
                    WHERE U.USER_ID=A.OWNER_USER_ID
                    AND USERNAME='$uname'";
                    $stid = oci_parse($connection, $sql);
                    $r = oci_execute($stid);
                    $nrows = oci_fetch_all($stid, $result);

                    if($nrows>0) {

                        echo '
                        <div class="col-xs-12 col-sm-12 col-md-9">
                                <div class="requests">

                                    <table class="table table-borderless">
                                        <thead>
                                            <tr>
                                            <th scope="col">Customer Name</th>
                                            <th scope="col">Property Name</th>
                                            <th scope="col">STATUS</th>
                                            <th scope="col"></th>
                                            <th scope="col"></th>
                                            </tr>
                                        </thead>';

                                        $query="SELECT * FROM USER_TABLE U, APPOINTMENT A
                                        WHERE U.USER_ID=A.OWNER_USER_ID
                                        AND USERNAME='$uname'";
                                        $statement = oci_parse($connection, $query);
                                        $res = oci_execute($statement);

                        while($row = oci_fetch_array($statement, OCI_ASSOC+OCI_RETURN_NULLS)) {                            

                                    echo '                            
                                    <tbody>
                                        <tr>
                                        <td>'.$row['CUST_USER_ID'].'</td>
                                        <td>'.$row['PROPERTY_ID'].'</td>
                                        <td>'.$row['STATUS'].'</td>
                                        <td>

                                        <p>                                            
                                            <button class="btn btn-success" name="respond" type="submit" data-toggle="modal" data-target="#collapseExample" aria-controls="collapseExample">
                                            Accept '.$row['MEETING_ID'].'
                                            </button>   
                                        </p> 
                                        
                                        <div class="module module-login pull-left d-flex">     
                                            <div class="modal register-login-modal fade" tabindex="-1" role="dialog" id="collapseExample">
                                            <p>'.$row['MEETING_ID'].' 2</p>
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <div class="row">

                                                                <!-- Nav tabs -->
                                                                <ul class="nav nav-tabs">
                                                                    <li class="active"><a href="#" data-toggle="tab">appointment details</a>
                                                                    </li>
                                                                </ul>

                                                                <div class="tab-content">                                                                    
                                                                    <div class="tab-pane fade in active" id="login">
                                                                        <div class="signup-form-container text-center">
                                                                            <form action="requestpage.php" method="POST" class="mb-0">
                                                                                <div class="form-group">
                                                                                    <label for="meeting-time">Meeting Time:</label>
                                                                                    <input type="time" class="form-control"
                                                                                        name="meeting-time" id="meeting-time">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="meeting-link">Meeting Link:</label>
                                                                                    <input type="text" class="form-control"
                                                                                        name="meeting-link" id="meeting-link"
                                                                                        placeholder="Meeting Link">
                                                                                </div>
                                                                                <input type="hidden" name="whatever" value="'.$row['MEETING_ID'].'">
                                                                                <input type="submit" name="respond"
                                                                                class="btn btn--primary btn--block" id="respond"
                                                                                value="'.$row['MEETING_ID'].'">
                                                                            </form>
                                                                        </div>
                                                                    </div>                                                                    
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                                <!-- /.modal -->
                                            </div>
                                        </div>

                                        </td>

                                        <td>

                                        <form method="POST">
                                        <input type="hidden" name="delete" value="'.$row['MEETING_ID'].'">
                                        <input type="submit" class="btn btn-danger" name="reject" value="Reject" style="height:40px; width: 120px">
                                        </form>  

                                        </td>

                                        </tr>
                                    </tbody>
                                    
                            ';

                               
                        }

                        echo '
                        </table>
                                
                                </div>                                
                            </div>';

                    }
                    
                    else {
                        echo '
                        <div>
                            <br><br>
                            <p style="font-size: 25px; color: light-grey;">No Requests</p>
                        </div>';
                    } 

                    ?>                                                                         


                </div>
                <!-- .container -->
            </div>
        </section>
        <!-- #agent-profile  end  -->


        <!-- Footer #1
============================================= -->
        <footer id="footer" class="footer footer-1 bg-white">
            <!-- Widget Section
	============================================= -->
            <div class="footer-widget">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-3 widget--about">
                            <div class="widget--content">
                                <div class="footer--logo">
                                    <img src="assets/images/logo/logo-dark2.png" alt="logo">
                                </div>
                                <p>86 Petersham town, New South Wales Wardll Street, Australia PA 6550</p>
                                <div class="footer--contact">
                                    <ul class="list-unstyled mb-0">
                                        <li>+61 525 240 310</li>
                                        <li><a href="mailto:contact@land.com">contact@land.com</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- .col-md-2 end -->
                        <div class="col-xs-12 col-sm-3 col-md-2 col-md-offset-1 widget--links">
                            <div class="widget--title">
                                <h5>Company</h5>
                            </div>
                            <div class="widget--content">
                                <ul class="list-unstyled mb-0">
                                    <li><a href="#">About us</a></li>
                                    <li><a href="#">Career</a></li>
                                    <li><a href="#">Services</a></li>
                                    <li><a href="#">Properties</a></li>
                                    <li><a href="#">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- .col-md-2 end -->
                        <div class="col-xs-12 col-sm-3 col-md-2 widget--links">
                            <div class="widget--title">
                                <h5>Learn More</h5>
                            </div>
                            <div class="widget--content">
                                <ul class="list-unstyled mb-0">
                                    <li><a href="#">Privacy</a></li>
                                    <li><a href="#">Terms & Conditions</a></li>
                                    <li><a href="#">Account</a></li>
                                    <li><a href="#">FAQ</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- .col-md-2 end -->
                        <div class="col-xs-12 col-sm-12 col-md-4 widget--newsletter">
                            <div class="widget--title">
                                <h5>newsletter</h5>
                            </div>
                            <div class="widget--content">
                                <form class="newsletter--form mb-40">
                                    <input type="email" class="form-control" id="newsletter-email"
                                        placeholder="Email Address">
                                    <button type="submit"><i class="fa fa-arrow-right"></i></button>
                                </form>
                                <h6>Get In Touch</h6>
                                <div class="social-icons">
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-vimeo"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- .col-md-4 end -->

                    </div>
                </div>
                <!-- .container end -->
            </div>
            <!-- .footer-widget end -->

            <!-- Copyrights
	============================================= -->
            <div class="footer--copyright text-center">
                <div class="container">
                    <div class="row footer--bar">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <span>© 2018 <a href="http://themeforest.net/user/zytheme">Zytheme</a>, All Rights
                                Reserved.</span>
                        </div>

                    </div>
                    <!-- .row end -->
                </div>
                <!-- .container end -->
            </div>
            <!-- .footer-copyright end -->
        </footer>
    </div>
    <!-- #wrapper end -->

    <!-- Footer Scripts
============================================= -->
    <script src="assets/js/jquery-2.2.4.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/functions.js"></script>
</body>

</html>