<?php include_once('../Database Layer/connection.php');?>
<?php include_once('startSession.php');?>

<?php 
    if(isset($_POST['loginBtn']))
        {
            $studentId    =  $_POST["studentId"];
            $login_password     =  $_POST["password"];

           if($studentId == '000000000' &&  $login_password == 'password')
              {
                $_SESSION["user"] = "Admin";
                header("Location: ..\Presentation Layer\\tutorDashboard.php"); 
                exit();
              }
           else
              {
                $result = $conn->query("SELECT firstName,lastName,studentID,webPassword FROM Student_Credentials WHERE studentID='$studentId' AND webPassword='$login_password'");

                if($result->num_rows > 0) 
                    {
                      while($row = $result->fetch_assoc())
                       {
                          $_SESSION["user"] = $row["firstName"]." ".$row["lastName"];
                          $_SESSION["userID"] = $_POST["studentId"];
                          header("Location: ..\Presentation Layer\studentDashboard.php"); 
                          exit();
                       }
                    }
                else
                    {
                      die(header("location:../index.php?loginFailed=true"));
                    }
              }
         }
?>