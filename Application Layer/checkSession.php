<?php

    if (!isset($_SESSION['userID']))
    {
        echo "<script>alert('Permission Denied! Please login')</script>";  
        echo "<script>window.open('/~ac8441o/','_self')</script>";
    }

?>
