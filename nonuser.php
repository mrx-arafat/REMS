<?php
    $connection = oci_connect('arafatx','arafatx','localhost/XE')
                    or die(oci_error());
    if (!$connection){
    echo "sorry there is some issues";
    }
    else{
    // echo "Yaaay!! Ready to execute";
    }
    // close the connection
    oci_close($connection);
?>



<?php
session_start();
$connection = oci_connect('arafatx','arafatx','localhost/XE')
				or die(oci_error());
$wrongPass = false;
// close the connection


if($_SERVER ['REQUEST_METHOD']=='POST'){

$uname = $_POST['login-name'];
$_SESSION['uname'] = $uname;
$pass = $_POST['login-password'];
$sql ="select * from user_table where username='$uname' and password = '$pass'";
$stid = oci_parse($connection, $sql);
$r = oci_execute($stid);
$row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS);
if($row == null) {
    $wrongPass = true;
}
else {
    header("Location: login-index.php");
}

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
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="assets/js/html5shiv.js"></script>
      <script src="assets/js/respond.min.js"></script>
    <![endif]-->

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
                        <a class="logo" href="index.html">
                            <p>REMS</p>
                            <!-- <img class="logo-light" src="assets/images/logo/logo-light.png" alt="Land Logo">
                            <img class="logo-dark" src="assets/images/logo/logo-dark.png" alt="Land Logo"> -->
                        </a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse pull-right" id="navbar-collapse-1">
                        <ul class="nav navbar-nav nav-pos-center navbar-left">
                            <!-- Home Menu -->
                            <li class="active">
                                <a href="index.html">home</a>
                            </li>
                            <!-- li end -->


                            <!-- Properties Menu-->
                            <li>
                                <a href="properties-grid-nonuser.html">Properties</a>                                
                            </li>
                            <!-- li end -->
                            <li><a href="page-contact.html">Forum</a></li>
                        </ul>
                        <!-- ADD FAVORITES ICON HERE -->
                        <div class="module module-login pull-left d-flex">
                            <a class="btn-popup" data-toggle="modal" data-target="#signupModule">Favorites</a>
                            <a class="btn-popup" data-toggle="modal" data-target="#signupModule">Login/Signup</a>
                            <div class="modal register-login-modal fade" tabindex="-1" role="dialog" id="signupModule">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="row">

                                                <!-- Nav tabs -->
                                                <ul class="nav nav-tabs">
                                                    <li class="active"><a href="#login" data-toggle="tab">login</a>
                                                    </li>
                                                    <li><a href="#signup" data-toggle="tab">signup</a>
                                                    </li>
                                                </ul>
                                                <!-- Tab panes -->
                                                <div class="tab-content">
                                                    <div class="tab-pane fade in active" id="login">
                                                        <div class="signup-form-container text-center">
                                                            <form action="index.php" method="POST" class="mb-0">
                                                                <a href="www.facebook.com"
                                                                    class="btn btn--facebook btn--block"><i
                                                                        class="fa fa-facebook-square"></i>Login with
                                                                    Facebook</a>
                                                                <div class="or-text">
                                                                    <span>or</span>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control"
                                                                        name="login-name" id="login-name"
                                                                        placeholder="Username">
                                                                </div>
                                                                <!-- .form-group end -->
                                                                <div class="form-group">
                                                                    <input type="password" class="form-control"
                                                                        name="login-password" id="login-password"
                                                                        placeholder="Password">
                                                                </div>
                                                                <!-- .form-group end -->
                                                                <div class="input-checkbox">
                                                                    <label class="label-checkbox">
                                                                        <span>Remember Me</span>
                                                                        <input type="checkbox">
                                                                        <span class="check-indicator"></span>
                                                                    </label>
                                                                </div>
                                                                <input type="submit" class="btn btn--primary btn--block"
                                                                    value="Sign In">
                                                                <a href="#" class="forget-password">Forget your
                                                                    password?</a>
                                                            </form>
                                                            <!-- form  end -->
                                                        </div>
                                                        <!-- .signup-form end -->
                                                    </div>
                                                    <div class="tab-pane" id="signup">
                                                        <form class="mb-0" action="signup.php" method="POST">
                                                            <a href="www.facebook.com"
                                                                class="btn btn--facebook btn--block"><i
                                                                    class="fa fa-facebook-square"></i>Register with
                                                                Facebook</a>
                                                            <div class="or-text">
                                                                <span>or</span>
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" name="full-name"
                                                                    id="full-name" placeholder="Username">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="email" class="form-control"
                                                                    name="register-email" id="register-email"
                                                                    placeholder="Email Address">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" name="phone"
                                                                    id="phone" placeholder="Phone Number">
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="password" class="form-control"
                                                                    name="register-password" id="register-password"
                                                                    placeholder="Password">
                                                            </div>
                                                            <!-- .form-group end -->
                                                            <div class="input-checkbox">
                                                                <label class="label-checkbox">
                                                                    <span>I agree with all <a
                                                                            href="termsandconditions.html">Terms &
                                                                            Conditions</a></span>
                                                                    <input type="checkbox"
                                                                        onchange="document.getElementById('register').disabled = !this.checked;">
                                                                    <span class="check-indicator"></span>
                                                                </label>
                                                            </div>
                                                            <input type="submit" name="register" action="signup.php"
                                                                class="btn btn--primary btn--block" id="register"
                                                                disabled value="Register">
                                                        </form>
                                                        <!-- form  end -->
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
                        <!-- Module Consultation  -->
                        <div class="module module-property pull-left">
                            <a class="btn" data-toggle="modal" data-target="#signupModule"><i class="fa fa-plus"></i>
                                add property</a>
                        </div>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container-fluid -->
            </nav>

        </header>
        <!-- Hero Search
============================================= -->
        <section id="heroSearch" class="hero-search mtop-100 pt-0 pb-0">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="slider--content">
                            <div class="text-center">
                                <h1>Find Your Favorite Property</h1>
                            </div>
                            <form class="mb-0">
                                <div class="form-box search-properties">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <div class="form-group">
                                                <div class="select--box">
                                                    <i class="fa fa-angle-down"></i>
                                                    <select name="select-location" id="select-location">
                                                        <option>Any Location</option>
                                                        <option>Alabama</option>
                                                        <option>Alaska</option>
                                                        <option>California</option>
                                                        <option>Dhaka</option>
                                                        <option>Florida</option>
                                                        <option>Mississippi</option>
                                                        <option>Oregon</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- .col-md-3 end -->
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <div class="form-group">
                                                <div class="select--box">
                                                    <i class="fa fa-angle-down"></i>
                                                    <select name="select-type" id="select-type">
                                                        <option>Any Type</option>
                                                        <option>Residential</option>
                                                        <option>Commercial</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- .col-md-3 end -->
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <div class="form-group">
                                                <div class="select--box">
                                                    <i class="fa fa-angle-down"></i>
                                                    <select name="select-status" id="select-status">
                                                        <option>Any Status</option>
                                                        <option>For Rent</option>
                                                        <option>For Sale</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- .col-md-3 end -->
                                        <div class="col-xs-12 col-sm-6 col-md-3 option-hide">
                                            <div class="form-group">
                                                <div class="select--box">
                                                    <i class="fa fa-angle-down"></i>
                                                    <select name="select-beds" id="select-beds">
                                                        <option>Beds</option>
                                                        <option>Any Number</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- .col-md-3 end -->
                                        <div class="col-xs-12 col-sm-6 col-md-3 option-hide">
                                            <div class="form-group">
                                                <div class="select--box">
                                                    <i class="fa fa-angle-down"></i>
                                                    <select name="select-baths" id="select-baths">
                                                        <option>Baths</option>
                                                        <option>Any Number</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                    </select>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- .col-md-3 end -->
                                        <div class="col-xs-12 col-sm-6 col-md-3 option-hide">
                                            <div class="form-group">
                                                <div class="select--box">
                                                    <i class="fa fa-angle-down"></i>
                                                    <select name="select-baths" id="select-baths">
                                                        <option>Balconies</option>
                                                        <option>Any Type</option>
                                                        <option>Cantilevered Balcony</option>
                                                        <option>Hung Balcony</option>
                                                        <option>Stacked Balcony</option>
                                                        <option>False Balcony</option>
                                                        <option>Mezzanine Balcony</option>
                                                        <option>Loggia Balcony</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- .col-md-3 end -->
                                        <div class="col-xs-12 col-sm-6 col-md-3 option-hide">
                                            <div class="form-group">
                                                <div class="select--box">
                                                    <i class="fa fa-angle-down"></i>
                                                    <select name="select-baths" id="select-baths">
                                                        <option>Dining</option>
                                                        <option>Any Type</option>
                                                        <option>Attached</option>
                                                        <option>Not Attached</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- .col-md-3 end -->
                                        <div class="col-xs-12 col-sm-6 col-md-3 option-hide">
                                            <div class="form-group">
                                                <div class="select--box">
                                                    <i class="fa fa-angle-down"></i>
                                                    <select name="select-baths" id="select-baths">
                                                        <option>Kitchen</option>
                                                        <option>Any Type</option>
                                                        <option>One-Wall Layout</option>
                                                        <option>Galley Layout</option>
                                                        <option>L-Shaped Layout</option>
                                                        <option>U-Shaped Layout</option>
                                                        <option>Peninsula Layout</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- .col-md-3 end -->
                                        <!-- <div class="col-xs-12 col-sm-6 col-md-6 option-hide">
                                            <div class="filter mb-30">
                                                <p>
                                                    <label for="amount">Rating: </label>
                                                    <input id="ratingamount" type="text" class="ratingamount" readonly>
                                                </p>
                                                <div class="slider-range"></div>
                                            </div>
                                        </div> -->
                                        <div class="col-xs-12 col-sm-6 col-md-9 option-hide">
                                            <div class="filter mb-30">
                                                <p>
                                                    <label for="amount">Price Range: </label>
                                                    <input id="amount" type="text" class="amount" readonly>
                                                </p>
                                                <div class="slider-range"></div>
                                            </div>
                                        </div>
                                        <!-- .col-md-3 end -->
                                        <div class="col-xs-12 col-sm-6 col-md-3">
                                            <input type="submit" value="Search" name="submit"
                                                class="btn btn--primary btn--block">
                                        </div>
                                        <!-- .col-md-3 end -->
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <a href="#" class="less--options">More options</a>
                                        </div>
                                    </div>
                                    <!-- .row end -->
                                </div>
                                <!-- .form-box end -->
                            </form>
                        </div>
                    </div>
                    <!-- .container  end -->
                </div>
                <!-- .slider-text end -->
            </div>
            <div class="carousel slider-navs" data-slide="1" data-slide-rs="1" data-autoplay="true" data-nav="true"
                data-dots="false" data-space="0" data-loop="true" data-speed="800">
                <!-- Slide #1 -->
                <div class="slide--item bg-overlay bg-overlay-dark3">
                    <div class="bg-section">
                        <img src="assets/images/slider/slide-bg/3.jpg" alt="background">
                    </div>
                </div>
                <!-- .slide-item end -->
                <!-- Slide #2 -->
                <div class="slide--item bg-overlay bg-overlay-dark3">
                    <div class="bg-section">
                        <img src="assets/images/slider/slide-bg/1.jpg" alt="background">
                    </div>
                </div>
                <!-- .slide-item end -->
                <!-- Slide #3 -->
                <div class="slide--item bg-overlay bg-overlay-dark3">
                    <div class="bg-section">
                        <img src="assets/images/slider/slide-bg/3.jpg" alt="background">
                    </div>
                </div>
                <!-- .slide-item end -->
            </div>
        </section>
        <!-- #property-single-slider end -->

        <!-- properties-carousel
============================================= -->
<section id="properties-carousel" class="properties-carousel pt-90 pb-90">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="heading heading-2 text-center mb-70">
                            <h2 class="heading--title">Latest Properties</h2>
                            <p class="heading--desc">Find the properties most recently added.</p>
                        </div>
                        <!-- .heading-title end -->
                    </div>
                    <!-- .col-md-12 end -->
                </div>
                <!-- .row end -->
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="carousel carousel-dots" data-slide="3" data-slide-rs="2" data-autoplay="true"
                            data-nav="false" data-dots="true" data-space="25" data-loop="true" data-speed="800">
                            <!-- .property-item #1 -->
                            <?php

                            $sql ="SELECT * FROM PROPERTY LEFT JOIN REVIEWS
                            ON PROPERTY.PROPERTY_ID=REVIEWS.PROPERTY_ID";
                            $stid = oci_parse($connection, $sql);

                            $r = oci_execute($stid);

                            while($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
                                echo '
                                <div class="property-item">
                                    <div class="property--img">
                                        <a href="#">
                                            <img src="assets/images/properties/3.jpg" alt="property image"
                                                class="img-responsive">
                                            <span class="property--status">'.$row['STATUS'].'</span>
                                        </a>
                                    </div>
                                    <div class="property--content">
                                        <div class="property--info">
                                            <h5 class="property--title"><a href="#">'.$row['PROPERTY_NAME'].'</a></h5>
                                            <p class="property--location">'.$row['LOC_AREA'].'</p>
                                            <p class="property--price">USD '.$row['PRICE'].'</p>
                                        </div>
                                        <!-- .property-info end -->
                                        <div class="property--features">
                                            <ul class="list-unstyled mb-0">
                                                <li><span class="feature">Beds:</span><span class="feature-num">'.$row['ROOMS_BEDROOMS'].'</span>
                                                </li>
                                                <li><span class="feature">Baths:</span><span class="feature-num">'.$row['ROOMS_BATHROOMS'].'</span>
                                                </li>
                                                <li><span class="feature">Area:</span><span class="feature-num"> '.$row['PROPERTY_AREA'].' sq ft</span>
                                                </li>
                                                <li><span class="feature">Rating:</span><span class="feature-num"> '.$row['RATING'].' </span>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- .property-features end -->
                                    </div>
                                </div>
                                ';
                            }

                            ?>

                        </div>
                        <!-- .carousel end -->
                    </div>
                    <!-- .col-md-12 -->
                </div>
                <!-- .row -->
            </div>
            <!-- .container -->
        </section>
        <!-- #properties-carousel  end  -->

        <!-- HIGHEST RATED -->

        <section id="properties-carousel" class="properties-carousel pt-90 pb-90">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="heading heading-2 text-center mb-70">
                            <h2 class="heading--title">Highest Rated Properties</h2>
                            <p class="heading--desc">Find the properties with the highest ratings.</p>
                        </div>
                        <!-- .heading-title end -->
                    </div>
                    <!-- .col-md-12 end -->
                </div>
                <!-- .row end -->
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="carousel carousel-dots" data-slide="3" data-slide-rs="2" data-autoplay="true"
                            data-nav="false" data-dots="true" data-space="25" data-loop="true" data-speed="800">
                            <!-- .property-item #1 -->
                            <?php

                            $sql ="SELECT * FROM PROPERTY JOIN REVIEWS USING (PROPERTY_ID) WHERE RATING > 4";
                            $stid = oci_parse($connection, $sql);

                            $r = oci_execute($stid);

                            while($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
                                echo '
                                <div class="property-item">
                                    <div class="property--img">
                                        <a href="#">
                                            <img src="assets/images/properties/3.jpg" alt="property image"
                                                class="img-responsive">
                                            <span class="property--status">'.$row['STATUS'].'</span>
                                        </a>
                                    </div>
                                    <div class="property--content">
                                        <div class="property--info">
                                            <h5 class="property--title"><a href="#">'.$row['PROPERTY_NAME'].'</a></h5>
                                            <p class="property--location">'.$row['LOC_AREA'].'</p>
                                            <p class="property--price">USD '.$row['PRICE'].'</p>
                                        </div>
                                        <!-- .property-info end -->
                                        <div class="property--features">
                                            <ul class="list-unstyled mb-0">
                                                <li><span class="feature">Beds:</span><span class="feature-num">'.$row['ROOMS_BEDROOMS'].'</span>
                                                </li>
                                                <li><span class="feature">Baths:</span><span class="feature-num">'.$row['ROOMS_BATHROOMS'].'</span>
                                                </li>
                                                <li><span class="feature">Area:</span><span class="feature-num"> '.$row['PROPERTY_AREA'].' sq
                                                        ft</span></li>
                                            </ul>
                                        </div>
                                        <!-- .property-features end -->
                                    </div>
                                </div>
                                ';
                            }

                            ?>

                        </div>
                        <!-- .carousel end -->
                    </div>
                    <!-- .col-md-12 -->
                </div>
                <!-- .row -->
            </div>
            <!-- .container -->
        </section>
        <!-- #properties-carousel  end  -->


        <!-- MOST VIEWED -->

        <section id="properties-carousel" class="properties-carousel pt-90 pb-90">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="heading heading-2 text-center mb-70">
                            <h2 class="heading--title">Most Popular Properties</h2>
                            <p class="heading--desc">Find the most popular properties.</p>
                        </div>
                        <!-- .heading-title end -->
                    </div>
                    <!-- .col-md-12 end -->
                </div>
                <!-- .row end -->
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="carousel carousel-dots" data-slide="3" data-slide-rs="2" data-autoplay="true"
                            data-nav="false" data-dots="true" data-space="25" data-loop="true" data-speed="800">
                            <!-- .property-item #1 -->
                            <?php

                            $sql ="SELECT * FROM POPULAR_PROPERTIES JOIN PROPERTY
                            USING (PROPERTY_ID)
                            WHERE INTERESTED>0";
                            $stid = oci_parse($connection, $sql);

                            $r = oci_execute($stid);

                            while($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
                                echo '
                                <div class="property-item">
                                    <div class="property--img">
                                        <a href="#">
                                            <img src="assets/images/properties/3.jpg" alt="property image"
                                                class="img-responsive">
                                            <span class="property--status">'.$row['STATUS'].'</span>
                                        </a>
                                    </div>
                                    <div class="property--content">
                                        <div class="property--info">
                                            <h5 class="property--title"><a href="#">'.$row['PROPERTY_NAME'].'</a></h5>
                                            <p class="property--location">'.$row['LOC_AREA'].'</p>
                                            <p class="property--price">USD '.$row['PRICE'].'</p>
                                        </div>
                                        <!-- .property-info end -->
                                        <div class="property--features">
                                            <ul class="list-unstyled mb-0">
                                                <li><span class="feature">Beds:</span><span class="feature-num">'.$row['ROOMS_BEDROOMS'].'</span>
                                                </li>
                                                <li><span class="feature">Baths:</span><span class="feature-num">'.$row['ROOMS_BATHROOMS'].'</span>
                                                </li>
                                                <li><span class="feature">Area:</span><span class="feature-num"> '.$row['PROPERTY_AREA'].' sq
                                                        ft</span></li>
                                            </ul>
                                        </div>
                                        <!-- .property-features end -->
                                    </div>
                                </div>
                                ';
                            }

                            ?>

                        </div>
                        <!-- .carousel end -->
                    </div>
                    <!-- .col-md-12 -->
                </div>
                <!-- .row -->
            </div>
            <!-- .container -->
        </section>
        <!-- #properties-carousel  end  -->

        <!-- Feature
============================================= -->
        <section id="feature" class="feature feature-1 text-center bg-white pb-90">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="heading heading-2 text-center mb-70">
                            <h2 class="heading--title">Simple Steps</h2>
                            <p class="heading--desc">Can't find your way around our website? Here's an overview!</p>
                        </div>
                        <!-- .heading-title end -->
                    </div>
                    <!-- .col-md-12 end -->
                </div>
                <!-- .row end -->
                <div class="row">
                    <!-- feature Panel #1 -->
                    <div class="col-xs-12 col-sm-3 col-md-3">
                        <div class="feature-panel">
                            <div class="feature--icon">
                                <img src="assets/images/features/icons/5.png" alt="icon img">
                            </div>
                            <div class="feature--content">
                                <h3>Search For Properties</h3>
                                <p>Find your desired properties, filter your search using the search functionality, and
                                    explore!</p>
                            </div>
                        </div>
                        <!-- .feature-panel end -->
                    </div>
                    <!-- .col-md-4 end -->
                    <!-- feature Panel #2 -->
                    <div class="col-xs-12 col-sm-3 col-md-3">
                        <div class="feature-panel">
                            <div class="feature--icon">
                                <img src="assets/images/features/icons/6.png" alt="icon img">
                            </div>
                            <div class="feature--content">
                                <h3>Select Your Favorites</h3>
                                <p>Choose properties you are interested in by adding them to your Favorites list.</p>
                            </div>
                        </div>
                        <!-- .feature-panel end -->
                    </div>
                    <!-- feature Panel #3 -->
                    <div class="col-xs-12 col-sm-3 col-md-3">
                        <div class="feature-panel">
                            <div class="feature--icon">
                                <img src="assets/images/features/icons/8.png" alt="icon img">
                            </div>
                            <div class="feature--content">
                                <h3>Set Appointments</h3>
                                <p>Set up meetings regarding your favorite picks, discuss and decide on your time.</p>
                            </div>
                        </div>
                        <!-- .feature-panel end -->
                    </div>
                    <!-- .col-md-4 end -->
                    <!-- feature Panel #4 -->
                    <div class="col-xs-12 col-sm-3 col-md-3">
                        <div class="feature-panel">
                            <div class="feature--icon">
                                <img src="assets/images/features/icons/7.png" alt="icon img">
                            </div>
                            <div class="feature--content">
                                <h3>Take Your Key</h3>
                                <p>Take ownership of your forever home!</p> 
                            </div>
                        </div>
                        <!-- .feature-panel end -->
                    </div>
                    <!-- .col-md-4 end -->
                </div>
                <!-- .row end -->
            </div>
            <!-- .container end -->
        </section>
        <!-- .feature end -->
        <!-- city-property
============================================= -->
<section id="city-property" class="city-property text-center pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="heading heading-2 text-center mb-70">
                            <h2 class="heading--title">Property By City</h2>
                            <p class="heading--desc">All your properties, sorted by their cities.</p>
                        </div>
                        <!-- .heading-title end -->
                    </div>
                    <!-- .col-md-12 end -->
                </div>
                <!-- .row end -->
                <div class="row">
                    <!-- City #1 -->
                    <div class="col-xs-12 col-sm-8 col-md-8">
                        <div class="property-city-item">
                            <div class="property--city-img">
                                <a href="#">
                                    <img src="assets/images/properties/city/1.jpg" alt="city" class="img-responsive">
                                    <?php 

                                    $sql ="SELECT LOC_CITY, COUNT(PROPERTY_ID) FROM PROPERTY WHERE LOC_CITY='Perryridge' GROUP BY LOC_CITY";
                                    $stid = oci_parse($connection, $sql);
        
                                    $r = oci_execute($stid);
        
                                    while($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
                                        echo '
                                        <div class="property--city-overlay">
                                            <div class="property--item-content">
                                                <h5 class="property--title">'.$row['LOC_CITY'].'</h5>
                                                <p class="property--numbers">'.$row['COUNT(PROPERTY_ID)'].' Properties</p>
                                            </div>
                                        </div>';
                                    }
                                    ?>
                                </a>
                            </div>
                            <!-- .property-city-img end -->
                        </div>
                        <!-- . property-city-item end -->
                    </div>
                    <!-- .col-md-8 end -->
                    <!-- City #2 -->
                    <div class="col-xs-12 col-sm-4 col-md-4">
                        <div class="property-city-item">
                            <div class="property--city-img">
                                <a href="#">
                                    <img src="assets/images/properties/city/2.jpg" alt="city" class="img-responsive">
                                    <?php 

                                    $sql ="SELECT LOC_CITY, COUNT(PROPERTY_ID) FROM PROPERTY WHERE LOC_CITY='Sacramento' GROUP BY LOC_CITY";
                                    $stid = oci_parse($connection, $sql);
        
                                    $r = oci_execute($stid);
        
                                    while($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
                                        echo '
                                        <div class="property--city-overlay">
                                            <div class="property--item-content">
                                                <h5 class="property--title">'.$row['LOC_CITY'].'</h5>
                                                <p class="property--numbers">'.$row['COUNT(PROPERTY_ID)'].' Properties</p>
                                            </div>
                                        </div>';
                                    }
                                    ?>
                                </a>
                            </div>
                            <!-- .property-city-img end -->
                        </div>
                        <!-- . property-city-item end -->
                    </div>
                    <!-- .col-md-8 end -->
                </div>
                <!-- .row end -->
                <div class="row">

                    <!-- City #3 -->
                    <div class="col-xs-12 col-sm-4 col-md-4">
                        <div class="property-city-item">
                            <div class="property--city-img">
                                <a href="#">
                                    <img src="assets/images/properties/city/3.jpg" alt="city" class="img-responsive">
                                    <?php 

                                    $sql ="SELECT LOC_CITY, COUNT(PROPERTY_ID) FROM PROPERTY WHERE LOC_CITY='Dhaka' GROUP BY LOC_CITY";
                                    $stid = oci_parse($connection, $sql);
        
                                    $r = oci_execute($stid);
        
                                    while($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
                                        echo '
                                        <div class="property--city-overlay">
                                            <div class="property--item-content">
                                                <h5 class="property--title">'.$row['LOC_CITY'].'</h5>
                                                <p class="property--numbers">'.$row['COUNT(PROPERTY_ID)'].' Properties</p>
                                            </div>
                                        </div>';
                                    }
                                    ?>
                                </a>
                            </div>
                            <!-- .property-city-img end -->
                        </div>
                        <!-- . property-city-item end -->
                    </div>
                    <!-- .col-md-8 end -->
                    <!-- City #4 -->
                    <div class="col-xs-12 col-sm-8 col-md-8">
                        <div class="property-city-item">
                            <div class="property--city-img">
                                <a href="#">
                                    <img src="assets/images/properties/city/4.jpg" alt="city" class="img-responsive">
                                    <?php 

                                    $sql ="SELECT LOC_CITY, COUNT(PROPERTY_ID) FROM PROPERTY WHERE LOC_CITY='Montgomery' GROUP BY LOC_CITY";
                                    $stid = oci_parse($connection, $sql);
        
                                    $r = oci_execute($stid);
        
                                    while($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
                                        echo '
                                        <div class="property--city-overlay">
                                            <div class="property--item-content">
                                                <h5 class="property--title">'.$row['LOC_CITY'].'</h5>
                                                <p class="property--numbers">'.$row['COUNT(PROPERTY_ID)'].' Properties</p>
                                            </div>
                                        </div>';
                                    }
                                    ?>
                                </a>
                            </div>
                            <!-- .property-city-img end -->
                        </div>
                        <!-- . property-city-item end -->
                    </div>
                    <!-- .col-md-8 end -->
                </div>
                <!-- .row end -->
            </div>
            <!-- .container end -->
        </section>
        <!-- .city-property end -->

        <!-- agents
=============================================
        

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
                                    <!-- <img src="assets/images/logo/logo-dark2.png" alt="logo"> -->
                                    <p>REMS</p>
                                </div>
                                <p>86 Petersham town, New South Wales Wardll Street, Australia PA 6550</p>
                                <div class="footer--contact">
                                    <ul class="list-unstyled mb-0">
                                        <li>+61 525 240 310</li>
                                        <li><a href="mailto:contact@rems.com">contact@rems.com</a></li>
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