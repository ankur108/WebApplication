<!------------ Start Session ------------>
<?php include_once('../Application Layer/startSession.php');?>

<!------------ Check Session ------------>
<?php include_once('../Application Layer/checkSession.php');?>

<?php include_once('../Templates/header.php');?>

<body>

<!-- Navigation -->
<?php include_once('../Templates/navigation.php');?>

<section id="intro">
      <div class="intro-content">
        <h2>Welcome to Tutor's Dashboard</h2>
        <h3 style="color:white;">Making University Grading Easy Peasy</h3>
        <h3 style="color:white;">Your University Best-friend</h3>
      </div>
</section>

<section id="students">
  <div class="container ">
    <div><h3 class="display-4 text-center">All Students</h3></div>
    <div class="row">
    <div class="search text-center col-6">
        <select class="type">
                <option value ="studentID">Student ID</option>
                <option value ="firstName">First Name</option>
                <option value ="groupNo">Group IV</option>
                <option value ="marks">Marks</option>
         </select>
    </div>
    <div id="custom-search-input" class="col-6">
                            <div class="input-group col-md-12">
                                <input type="text" class="  search-query form-control" placeholder="Search" />
                                <span class="input-group-btn">
                                    <button class="btn btn-danger" type="button">
                                        <span class=" glyphicon glyphicon-search"></span>
                                    </button>
                                </span>
                            </div>
     </div>
    <div id="senior-rep" >
        <div class="Group-circle">
              <?php include_once('../Database Layer/connection.php'); ?>
              <?php 

                  $result = $conn->query("SELECT studentID,firstName,lastName, programme,profile_image FROM Student_Credentials WHERE studentID <> '000000000'");
                   

                    if($result->num_rows>0) 
                        {
                            while($row = $result->fetch_assoc())
                             {
                              echo "<div class='circles' style='text-align:center;'>";
                              echo "<form action='tutorStudentView.php' method='get'>";
                              echo '<img src="../Images/person2.jpg"/>';
                              echo "<h2>" .$row["firstName"].' '.$row["lastName"]."</h2>";
                              echo "<span>" .$row["programme"]. "</span><br/>";
                              echo "<button type='submit' class='btn' name = 'studentID' value='".$row["studentID"]."' style='background-color:#3AAFA9;'><span class='glyphicon glyphicon-off'></span>View Grades</button>";
                              echo "</form>";
                              echo "</div>";
                              }
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
    </div>
  </div>
</section>


<br style="clear:left"/><br/>

  <!-- Footer -->
  <?php include_once('../Templates/footer.php');?>

</body>
</html>