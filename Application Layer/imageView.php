<?php
   require_once('../Database Layer/connection.php'); 

    if(isset($_GET['studentID'])) {
        $sql = "SELECT profile_image,profile_image_type FROM Student_Credentials WHERE studentID=" . $_GET['studentID'];
		$result = mysqli_query($conn, $sql) or die("<b>Error:</b> Problem on Retrieving Image BLOB<br/>" . mysqli_error($conn));
		$row = mysqli_fetch_array($result);
		header("Content-type: " . $row["profile_image_type"]);
        echo $row["profile_image"];
	}
	mysqli_close($conn);
?>