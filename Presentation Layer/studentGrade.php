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
        <h2>Welcome to Student's Dashboard</h2>
        <h3 style="color:white;">Making University Grading Easy Peasy</h3>
        <h3 style="color:white;">Your University Best-friend</h3>
      </div>
</section>

<section class="container">
 <br/>
  <h3 class="text-center display-4" style="font-size:35px;">Marking Dashboard</h3>
    <div class="row">
    <div class="col-6">
      <?php include_once('../Database Layer/connection.php'); ?>
      <?php 

            $result = $conn->query("SELECT firstName,lastName,groupNo,profile_image FROM Student_Credentials Where studentID= '$studentID'");
 
            if($result->num_rows>0) 
              {
                 while($row = $result->fetch_assoc())
                  {
                     echo "<div class='circles' style='text-align:center;'>";
                     echo "<form action='mark.php' method='get'>";
                     echo '<img src="Images/person2.jpg" />';
                     echo "<h2>" .$row["firstName"].' '.$row["lastName"]."</h2>";
                     echo "<span>Group No:" .$row["groupNo"]. "</span><br/>";
                     echo "</form>";
                     echo "</div>";
                  }
               }
              else
                {
                   echo "";
                }
              
              

              if(isset($_POST['submitBtn']))
                {
                  $mark   =  $_POST["marks"];
                  $marks_description = $_POST["description"];
                  $emoji = $_POST["emoji"];

                  $sql = "INSERT INTO Student_Marks_Permanent(studentID, marks,marks_description, emoji)
                          VALUES ('$studentID','$mark','$marks_description','$emoji')";   ////////////////////////////////////Problem with Student ID
              
                if ($conn->query($sql) === TRUE) 
                    echo "New record created successfully";
                else 
                {
                  echo "Error: " . $sql . "<br>" . $conn->error;
                }
            
                }
       ?>
      </div>
      <div class="col-6">
      <form role="form"  method="post" action="mark.php">
            <div class="form-group">
              <label for="marks"><span class="glyphicon glyphicon-user"></span>Marks</label>
              <input type="number" class="form-control" id="marks" placeholder="Enter marks" name="marks" min="1" max="10"required>
            </div>
            <div class="form-group">
              <label for="description"><span class="glyphicon glyphicon-eye-open d-inline"></span>Description</label>
              <textarea rows="4" cols="75" name="description" placeholder="Please describe your marking"></textarea>
            </div>
            <div class="form-group">
              <label for="emoji"><span class="glyphicon glyphicon-eye-open d-inline"></span>Emoji</label>
              <input type="file" name="emoji">
            </div>
            </div>
              <button type="submit" class="btn btn-block text-center" style="background-color:#3AAFA9;" name="saveBtn"><span class="glyphicon glyphicon-off"></span>Save Marking</button>
              <button type="submit" class="btn btn-block" style="background-color:#3AAFA9;" name="submitBtn"><span class="glyphicon glyphicon-off"></span>Submit Marking</button>
        </form>
      </div>
      </div>
</section>


<br style="clear:left"/><br/>
  <!-- Footer -->
  <?php include_once('../Templates/footer.php');?>

</body>
</html>