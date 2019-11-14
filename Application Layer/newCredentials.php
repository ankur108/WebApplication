<?php include_once('startSession.php'); ?>
<?php include_once('../Database Layer/connection.php'); ?>

<?php

if (isset($_POST['AccountBtn'])) {
    $firstName   =  $_POST["firstName"];
    $lastName    =  $_POST["lastName"];
    $studentId    =  $_POST["newStudentId"];
    $newPassword     =  $_POST["newPassword"];
    $email     =  $_POST["newEmail"];
    $group     =  $_POST["newGroup"];
    $programme     =  $_POST["programme"];
    $image     =  $_POST["image"];
    $Cap1 = $_SESSION['cap_hidden'];
    $Cap2 = $_POST['captchaInput'];

    if ($Cap1 == $Cap2) 
    {
        $_SESSION["userID"] = $_POST["studentId"];
        $sql = "INSERT INTO Student_Credentials  (firstName, lastName, studentID, webPassword,email,groupNo,profile_image,programme)
        VALUES ( '$firstName' , '$lastName' , '$studentId','$newPassword ','$email','$group','$image','$programme')";

        if ($conn->query($sql) === TRUE) {

            //$result = $conn->query("SELECT firstName,lastName FROM Student_Credentials Where groupNo= '$group' AND studentID <> '$studentID'");

           // if ($result->num_rows > 0) {
               // while ($row = $result->fetch_assoc()) {
                 //   $_SESSION["user"] = $row["firstName"] . " " . $row["lastName"];
                   // $_SESSION["userID"] = $_POST["studentId"];
                    header("Location: ..\Presentation Layer\studentDashboard.php");
                    exit();
                //}
            }
         else {
            echo '<script type="text/javascript">alert("' . $sql . "<br>" . $conn->error . '")</script>';
        }
    }
     else 
    {
        echo '<script type="text/javascript">alert("Invalid Captcha")</script>';
        echo "<script>window.open('/~ac8441o/','_self')</script>";
    }
}
?>