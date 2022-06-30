<!-- basic connection with oracle DB -->
<?php
    
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');
    
    $username = "arafatx";    // Use your username
    $password = "arafatx";         // and your password
    $database = "localhost/XE";   // and the connect string to connect to your database
    
    $con = oci_connect($username, $password, $database);
    if (!$con) {
        $m = oci_error();
        trigger_error('Could not connect to database: '. $m['message'], E_USER_ERROR);
    }
    
?>