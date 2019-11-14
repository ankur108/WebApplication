<?php

    if (!isset($_SESSION['user']))
    {
        echo "<script>alert('Permission Denied! Please login')</script>";  
        echo "<script>window.open('/~ac8441o/','_self')</script>";
    }

?>
