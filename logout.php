<?php


session_start();

// if($_SESSION['uname']){
//     echo "Hey ".$_SESSION['uname']." are you sure?";
// }

// else{

//     header("location:index.php");
// }


session_destroy();

header("location:index.php");
?>

