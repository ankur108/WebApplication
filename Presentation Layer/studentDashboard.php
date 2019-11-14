<!------------ Start Session ------------>
<?php include_once('../Application Layer/startSession.php'); ?>

<!------------ Check Session ------------>
<?php include_once('../Application Layer/checkSession.php'); ?>

<?php include_once('../Templates/header.php'); ?>

<body>

  <!------------ Navigation ------------>
  <?php include_once('../Templates/navigation.php'); ?>

  <!------------ Showcase -------------->
  <section id="intro">
    <div class="intro-content">
      <h2>Welcome to Student's Dashboard</h2>
      <h3 style="color:white;">Making University Grading Easy Peasy</h3>
      <h3 style="color:white;">Your University Best-friend</h3>
    </div>
  </section>

  <section id="students">
    <div class="container ">
      <div>
        <h3 class="display-4 text-center">Meet your Group Members</h3>
      </div>
      <br />
      <div id="senior-rep">
        <div class="Group-circle">
          <?php include_once('../Database Layer/connection.php'); ?>
          <?php

          $studentID = $_SESSION["userID"];
          $studentGroup = $conn->query("SELECT groupNo FROM Student_Credentials Where studentID= '$studentID'");

          if ($studentGroup->num_rows > 0) {
            while ($row = $studentGroup->fetch_assoc()) {
              $groupNo = $row['groupNo'];
            }
          }

          $result = $conn->query("SELECT studentID,firstName,lastName, programme,profile_image FROM Student_Credentials Where groupNo = '$groupNo' AND studentID <> '$studentID' AND studentID <> '000000000' ");

          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              echo "<div class='circles' style='text-align:center;'>";
              echo "<form action='studentGrade.php' method='get'>";
              echo '<img src="../Images/person2.jpg"/>';
              echo "<h2>" . $row["firstName"] . ' ' . $row["lastName"] . "</h2>";
              echo "<span>" . $row["programme"] . "</span><br/>";
              echo "<button type='submit' class='btn' name = 'studentID' value='" . $row["studentID"] . "' style='background-color:#3AAFA9;'><span class='glyphicon glyphicon-off'></span>Mark</button>";
              echo "</form>";
              echo "</div>";
            }
          } else {
            echo "<h6 class='display-4 text-center' style='font-size:30px;color:#3AAFA9;'>Nobody is in your group</h6>";
            echo "<br/>";
            echo "<div class='d-block text-center'><img class='w-25'src='../Images/cry.png'/></div>";
            echo "</div>";
          }

          ?>
        </div>
      </div>
    </div>
  </section>

  <br style="clear:left" /><br />
  <!-- Footer -->
  <?php include_once('../Templates/footer.php'); ?>

</body>

</html>