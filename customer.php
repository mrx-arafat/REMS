<?php
    session_start();
    $uname = $_SESSION['uname'];
    echo "hello world" . $uname;
    
?>