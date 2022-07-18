<?php


session_start();

if($_SESSION['uname']){
    echo "welcome ";
}
else{

    header("location:index.php");
}

?>

<a class="btn-popup" href="/logout.php">Logout</a>