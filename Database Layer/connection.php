<?php 

    $servername = "mysql.cms.gre.ac.uk";
    $username = "ac8441o";
    $pws = "rebellio619";
    $db = "mdb_ac8441o";

    // connect to database
    $conn = mysqli_connect($servername, $username, $pws, $db);

    //Alert if Connection failed
    if(mysqli_connect_errno($conn))
        echo '<script> alert("' . mysqli_connect_errno() . '")</script>';
?>