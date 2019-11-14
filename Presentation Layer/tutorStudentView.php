<!------------ Start Session ------------>
<?php include_once('../Application Layer/startSession.php');?>

<!------------ Check Session ------------>
<?php include_once('../Application Layer/checkSession.php');?>

<?php include_once('../Templates/header.php');?>

<body>

<!------------ Navigation ------------>
<?php include_once('../Templates/navigation.php');?>

<!------------ Showcase --------------->

<section id="intro">
      <div class="intro-content">
        <h2>Welcome to Tutor's Dashboard</h2>
        <h3 style="color:white;">Making University Grading Easy Peasy</h3>
        <h3 style="color:white;">Your University Best-friend</h3>
      </div>
</section>

<section class="container">
 <br/>
  <h3 class="text-center display-4" style="font-size:35px;">Individual Peer Assessment Overview</h3>
    <div class="row">
    
      <?php 

            $servername = "mysql.cms.gre.ac.uk";
            $username = "ac8441o";
            $pws = "rebellio619";
            $db = "mdb_ac8441o";
            $studentID = $_GET['studentID'];


              // connect to database
            $conn = mysqli_connect($servername, $username, $pws, $db);

            $result = $conn->query("SELECT firstName,lastName,groupNo,profile_image,programme FROM Student_Credentials Where studentID= '$studentID'");
 
            if($result->num_rows>0) 
              {
                 while($row = $result->fetch_assoc())
                  {
                     echo "<div class='col-6'>";
                     echo "<div class='circles' style='text-align:center;'>";
                     echo "<form action='mark.php' method='get'>";
                     echo '<img src="../Images/person2.jpg" />';
                     echo "<h2>" .$row["firstName"].' '.$row["lastName"]."</h2>";
                     echo "<span>" .$studentID."</span>";
                     echo "<span>" .$row["programme"]."</span>";
                     echo "<span>Group No:" .$row["groupNo"]. "</span><br/>";
                     echo "</form>";
                     echo "</div>";
                     echo "</div>";
                  }
               }
              else
                {
                   echo "";
                }
            $result = $conn->query("SELECT AVG(marks) FROM Student_Marks_Permanent Where studentID= '$studentID'");
            $display_result = $conn->query("SELECT * FROM Student_Marks_Permanent Where studentID= '$studentID'");
           
           
            if($result->num_rows>0)
            {
              while($row = $result->fetch_assoc())
              {
                 if($row['AVG(marks)']< -1)
                 {
                  echo "<div class='col-6'>";
                  echo "<h3 class='text-center display-4'>Overall Grade:<span style='color:#3AAFA9'>N/A</span></h3>";
                  echo "<br/>";
                 }
                 else
                 {
                  echo "<div class='col-6'>";
                  echo "<h3 class='text-center display-4'>Overall Grade:<span style='color:#3AAFA9'>".$row['AVG(marks)']."</span></h3>";
                  echo "<br/>";
                 }
              }
            }

            if($display_result->num_rows>0)
            {
              while($rows = $display_result->fetch_assoc())
              {

                $graderID = $rows['gradeUser'];
                $graderName = $conn->query("SELECT firstName,lastName FROM Student_Credentials where studentID = '$graderID'");
                
                foreach($graderName as $row) 
                        $userName = $row['firstName']." ".$row['lastName'];
                echo "<h6 style='font-size:25px;'>Student Name: ".$userName."</h6>";
                echo "<h6 style='font-size:20px;'>Grade: ".$rows[marks]."</h6>";
                echo "<p style='font-size:15px;'> Grade Description: ".$rows[marks_description]."</p>";
                
              }
              echo "</div>";
            }
            else
            {
              echo "<h6 class='display-4 text-center' style='font-size:30px;color:#3AAFA9;'>No Information Available</h6>";
              echo "<br/>";
              echo "<div class='d-block text-center'><img class='w-25'src='Images/cry.png'/></div>";
              echo "</div>";
            }
            
       ?>
      
      </div>
</section>

<br style="clear:left"/>
<!-- Footer -->
<?php include_once('../Templates/footer.php');?>

</body>
</html>