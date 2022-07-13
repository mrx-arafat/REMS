<?php
session_start();
$uname = $_SESSION['uname'];
$connection = oci_connect('arafatx','arafatx','localhost/XE')
				or die(oci_error());
$wrongPass = false;
// close the connection

?>


<?php


$sql ="select * from property";
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
                <h5 class="property--title"><a href="#">'.$row['P_TITLE'].'</a></h5>
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
