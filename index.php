<?php include('Templates/header.php'); ?>

<body>

  <!--------------- Navigation ------------->

  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <a class="navbar-brand" href="#">
        <i class="fas fa-graduation-cap display-4" style="color:#FEFFFF;"></i>
        <a href="index.php" class="h3" id="logo" style="color:#DEF2F1;">Mark Me Up</a>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item ml-2">
            <button type="button" class="btn" id="login" style="background-color:#FEFFFF;">Login</button>
          </li>
          <li class="nav-item ml-2">
            <button type="button" class="btn" id="signUp" style="background-color:#FEFFFF;">Sign Up</button>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!------------ Model Login Forms ---------->

  <div class="modal fade" id="loginForm" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <h4><span class="glyphicon glyphicon-lock"></span>Login</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form" method="post" action="Application Layer/logIn.php">
            <div class="form-group">
              <label for="StudentID"><span class="glyphicon glyphicon-user"></span>Student ID</label>
              <input type="text" class="form-control" id="id" placeholder="Enter your 9 digit Student Number" name="studentId" required>
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
              <input type="password" class="form-control" id="psw" placeholder="Enter password" name="password" required>
              <div style="color:red;font-weight:bold;"><?php if ($_GET["loginFailed"]) echo "Wrong Username or Password" ?></div>
            </div>
            <div class="checkbox">
              <label><input type="checkbox" value="" checked>Remember me</label>
            </div>
            <button type="submit" class="btn btn-block" style="background-color:#3AAFA9;" name="loginBtn"><span class="glyphicon glyphicon-off"></span> Login</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!------------- Model Sign Up Forms ------------->

  <div class="modal fade" id="signUpForm" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <h4><span class="glyphicon glyphicon-lock"></span>Sign Up</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form" method="post" action="Application Layer/newCredentials.php" enctype="multipart/form-data">
            <div class="form-group">
              <label for="FirstName"><span class="glyphicon glyphicon-user"></span>First Name</label>
              <input type="text" class="form-control" id="firstName" placeholder="Enter your First Name" name="firstName" required>
              <div style="color:red;font-weight:bold;"><?php $reasons = array("firstname" => "Invalid First Name");if ($_GET["newAccountFailed"]) echo $reasons[$_GET["invalidfirstname"]]; ?></div>
            </div>
            <div class="form-group">
              <label for="LastName"><span class="glyphicon glyphicon-user"></span>Last Name</label>
              <input type="text" class="form-control" id="lastName" placeholder="Enter your Last Name" name="lastName" required>
              <div style="color:red;font-weight:bold;"><?php $reasons = array("lastname" => "Invalid Last Name");if ($_GET["newAccountFailed"]) echo $reasons[$_GET["invalidlastname"]]; ?></div>
            </div>
              <div class="form-group">
              <label for="StudentID"><span class="glyphicon glyphicon-user"></span>Student ID</label>
              <input type="text" class="form-control" id="newid" placeholder="Enter your 9 digit Student Number" name="newStudentId"  maxlength ='9' required>
              <div style="color:red;font-weight:bold;"><?php $reasons = array("studentId" => "Invalid Student ID Name", "duplicate" => "Student ID already exist");if ($_GET["newAccountFailed"]) echo $reasons[$_GET["invalidstudentId"]]; echo $reasons[$_GET["duplicateId"]];?></div>
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
              <input type="password" class="form-control" id="psw" placeholder="Enter password" name="newPassword" required>
            </div>
            <div class="form-group">
              <label for="Confirm Password"><span class="glyphicon glyphicon-eye-open"></span>Confirm Password</label>
              <input type="password" class="form-control" id="confirmpsw" placeholder="Confirm password" required name = "confirmPassword">
              <div style="color:red;font-weight:bold;"><?php $reasons = array("password" => "Password Doesn't Match");if ($_GET["newAccountFailed"]) echo $reasons[$_GET["invalidpassword"]]; ?></div>
            </div>
            
            <div class="form-group">
              <label for="Email"><span class="glyphicon glyphicon-eye-open"></span>Email</label>
              <input type="email" class="form-control" id="email" placeholder="Enter Your Email" name="newEmail" required>
            </div>
            <div class="form-group">
              <label for="Programme"><span class="glyphicon glyphicon-eye-open"></span>Group No.</label>
              <select class="form-control" id="programme" name="programme" required>
                <option value="Computer Science, BSc. Hons">Computer Science, BSc. Hons</option>
                <option value="Software Engineering, BEng">Software Engineering, BEng</option>
                <option value="Computer Network and Security, BSc. Hons">Computer Network and Security, BSc. Hons</option>
                <option value="Computing, BSc. Hons">Computing, BSc. Hons</option>
                <option value="Computer Forensic, BSc. Hons">Computer Forensic, BSc. Hons</option>
              </select>
            </div>
            <div class="form-group">
              <label for="Group"><span class="glyphicon glyphicon-eye-open"></span>Group No.</label>
              <select class="form-control" id="groupNo" name="newGroup" required>
                <option value="1">Group I</option>
                <option value="2">Group II</option>
                <option value="3">Group III</option>
                <option value="4">Group IV</option>
                <option value="5">Group V</option>
                <option value="6">Group VI</option>
                <option value="7">Group VII</option>
                <option value="8">Group VIII</option>
                <option value="9">Group IX</option>
                <option value="10">Group X</option>
              </select>
              <div style="color:red;font-weight:bold;"><?php $reasons = array("maxGroup" => "Unfortunately, there is no space left in the group");if ($_GET["newAccountFailed"]) echo $reasons[$_GET["groupNo"]]; ?></div>
            </div>
            <div class="form-group">
              <label for="Image"><span class="glyphicon glyphicon-eye-open"></span>Upload your Photo</label>
              <input type="file" name="image" id="image"/>
              <div style="color:red;font-weight:bold;"><?php $reasons = array("largeImage" => "Image too large, Please upload image of size less than 2 MB","wrongtype" => "Invalid Image format");if ($_GET["newAccountFailed"]) echo $reasons[$_GET["invalidImage"]]; echo $reasons[$_GET["invalidtype"]];?></div>
            </div>
            <div>
              <input type="text" class="form-control" id="captchaInput" placeholder="Enter the below visible text" name="captchaInput" required>
              <div style="color:red;font-weight:bold;"><?php $reasons = array("captcha" => "Captcha Doesn't Match");if ($_GET["newAccountFailed"]) echo $reasons[$_GET["invalidcaptcha"]]; ?></div>
              <br />
              <div style="width:60%; border: 1px solid #ccc; text-align: center; padding: 3px; margin-bottom: 13px;"> <img src="Application Layer\reCaptcha.php" id="captcha" /></div>
              <label for="Programme"><span class="glyphicon glyphicon-eye-open"></span>Can't read the Captcha?</label>
              <a class="mb-2" id="reload" style="cursor:pointer;font-weight:bold;">Refresh</a>
            </div>
            <button type="submit" class="btn btn-block" style="background-color:#3AAFA9;" name="AccountBtn"><span class="glyphicon glyphicon-off"></span>Create Account</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-------------- Showcase ------------->

  <section id="intro">
    <div class="intro-content">
      <h2>A Peer Grading tool for your University Life</h2>
    </div>
  </section>

  <!------------ Features -------------->

  <section class="features-icons bg-light text-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="fas fa-chalkboard-teacher m-auto"></i>
            </div>
            <h3>Tutor's Dashboard</h3>
            <p class="lead mb-0">The Web application will an easy to mark & rate system</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="fas fa-theater-masks m-auto"></i>
            </div>
            <h3>Mark your Mates</h3>
            <p class="lead mb-0">Featuring the latest online marking tool</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="features-icons-item mx-auto mb-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="fas fa-smile m-auto"></i>
            </div>
            <h3>Easy to Use</h3>
            <p class="lead mb-0">Easy to use by Tutor & Students</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-------------- Image Showcase ----------->

  <section class="showcase">
    <div class="container-fluid p-0">
      <div class="row no-gutters">
        <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background: lightblue url('Images/gre.jpg') no-repeat  center;"></div>
        <div class="col-lg-6 order-lg-1 my-auto showcase-text">
          <p class="ml-3">"Excellent tool, it is used by all our staff and students"</p>
          <h2 class="float-right mr-3 "> - University of Greenwich</h2>
        </div>
      </div>
      <div class="row no-gutters">
        <div class="col-lg-6 text-white showcase-img" style="background: lightblue url('Images/brunel.jpg') center;"></div>
        <div class="col-lg-6 my-auto showcase-text">
          <p class="ml-3">"Fantastic application for transparent & fair grading for students!"</p>
          <h2 class="float-right mr-3"> -Brunel, University of London</h2>
        </div>
      </div>
    </div>
  </section>

  <span style="clear:right;"></span>

  <!----------------- Testimonials --------------------->

  <section class="testimonials text-center bg-light">
    <div class="container">
      <h2 class="mb-5">What Students are saying...</h2>
      <div class="row">
        <div class="col-lg-4">
          <div class="testimonial-item mx-auto mb-5 mb-lg-0">
            <img class="img-fluid rounded-circle mb-3" src="Images\person1.jpg" alt="">
            <h5>Hannah D.</h5>
            <p class="font-weight-light mb-0">"This is fantastic! Thanks so much!"</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="testimonial-item mx-auto mb-5 mb-lg-0">
            <img class="img-fluid rounded-circle mb-3" src="Images\person2.jpg" alt="">
            <h5>Rob I.</h5>
            <p class="font-weight-light mb-0">"Mark Me Up is amazing. I've been using it for every coursework in my University."</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="testimonial-item mx-auto mb-5 mb-lg-0">
            <img class="img-fluid rounded-circle mb-3" src="Images\person3.jpg" alt="">
            <h5>Ellen C.</h5>
            <p class="font-weight-light mb-0">"Thanks so much for developing this wonderful application"</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-------------- Footer ------------>
  <?php include_once('Templates/footer.php'); ?>

  <!--JQuery & Bootstrap-->

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <!-- Model LaunchPad-->

  <script>
    $(document).ready(function() {
      $("#login").click(function() {
        $("#loginForm").modal();
      });
    });

    $(document).ready(function() {
      $("#signUp").click(function() {
        $("#signUpForm").modal();
      });
    });

    $('#reload').click(function() {
      $('#captcha').attr('src', 'Application Layer\\reCaptcha.php?' + (new Date()).getTime());
    });
  </script>
  <?php
      if($_GET["newAccountFailed"])
          echo "<script>$(document).ready(function() { $('#signUpForm').modal();});</script>";
      
      if($_GET["loginFailed"])
          echo "<script>$(document).ready(function() { $('#loginForm').modal();});</script>";
  ?>

  <!--<div>Icons made by <a href="https://www.flaticon.com/authors/freepik" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></div>-->
</body>

</html>