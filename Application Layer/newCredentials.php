<?php include_once('startSession.php'); ?>
<?php include_once('../Database Layer/connection.php'); ?>

<?php

if (isset($_POST['AccountBtn'])) {
    $firstName   =  $_POST["firstName"];
    $lastName    =  $_POST["lastName"];
    $studentId    =  $_POST["newStudentId"];
    $newPassword     =  $_POST["newPassword"];
    $confirmPassword     =  $_POST["confirmPassword"];
    $email     =  $_POST["newEmail"];
    $group     =  $_POST["newGroup"];
    $programme     =  $_POST["programme"];
    $image     =  $_POST["image"];
    $Cap1 = $_SESSION['cap_hidden'];
    $Cap2 = $_POST['captchaInput'];

    $error = '';

    if (preg_match('/[^A-Za-z]/', $firstName)) {
        $error .= '&invalidfirstname=firstname';
    }
    if (preg_match('/[^A-Za-z]/', $lastName)) {
        $error .= '&invalidlastname=lastname';
    }
    if (preg_match('/[^0-9]/', $studentId) || strlen($studentId) != 9) {
        $error .= '&invalidstudentId=studentId';
    } else {
        $result = $conn->query("SELECT studentID FROM Student_Credentials WHERE studentID='$studentId'");

        if ($result->num_rows > 0) {
            $error .= '&duplicateId=duplicate';
        }
    }

    if ($newPassword != $confirmPassword) {
        $error .= '&invalidpassword=password';
    }

    $numOfGroup = $conn->query("SELECT studentID FROM Student_Credentials WHERE groupNo='$group'");

    if ($numOfGroup->num_rows == 3) {
        $error .= '&groupNo=maxGroup';
    }

    if ($Cap1 != $Cap2) {
        $error .= '&invalidcaptcha=captcha';
    }

    if ($image != NULL) {

        if ($_FILES["image"]["size"] > 200000000) // If the file is larger than 2MB
        {
            $error .= '&invalidImage=largeImage';
        }
        if (strtolower(pathinfo($image, PATHINFO_EXTENSION)) != "jpg" && strtolower(pathinfo($image, PATHINFO_EXTENSION)) != "png" && strtolower(pathinfo($image, PATHINFO_EXTENSION)) != "jpeg"  && strtolower(pathinfo($image, PATHINFO_EXTENSION)) != "gif") {
            $error .= '&invalidtype=wrongtype';
        }
    }

    if (strlen($error) > 1) {
        die(header("location:../index.php?newAccountFailed=true" . $error));
    } else {

        $imgData = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        $imageProperties = getimageSize($_FILES['image']['tmp_name']);

        $_SESSION["userID"] = $_POST["studentId"]; //Check This
        $sql = "INSERT INTO Student_Credentials  (firstName, lastName, studentID, webPassword,email,groupNo,profile_image,profile_image_type,programme)
            VALUES ( '$firstName' , '$lastName' , '$studentId','$newPassword ','$email','$group','{$imgData}','{$imageProperties['mime']}','$programme')";

        if ($conn->query($sql) === TRUE) {

            $_SESSION["userID"] = $_POST["newStudentId"];
            $_SESSION["user"] = $firstName . " " . $lastName;  //Check This
            header("Location: ..\Presentation Layer\studentDashboard.php"); //$row = mysqli_fetch_assoc($result);
            exit();
        } else {
            echo '<script type="text/javascript">alert("' . $sql . "<br>" . $conn->error . '")</script>';
        }
    }
}
?>
