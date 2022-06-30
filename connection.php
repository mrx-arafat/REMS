<?php
$connection = oci_connect('arafatx','arafatx','localhost/XE')
				or die(oci_error());
if (!$connection){
echo "sorry there is some issues";
}
else{
echo "Yaaay!! Ready to execute";
}
// close the connection
oci_close($connection);
?>