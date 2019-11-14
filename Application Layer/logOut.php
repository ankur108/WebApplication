<?php
    session_start();
    session_destroy();
    header("Location: /~ac8441o/"); //Redirect to Index page
    exit();
?>