<nav class="navbar navbar-expand-lg">
  <div class="container">
    <a class="navbar-brand" href="#">
          <i class="fas fa-graduation-cap display-4" style="color:#FEFFFF;"></i>
          <a href="/~ac8441o/" class="h3" id="logo" style="color:#DEF2F1;">Mark Me Up</a>
        </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item ml-2">
        <h4 class="text-center m-2 mr-4" style="color:white;"><?php echo $_SESSION["user"]; ?></h4>
        </li>
        <li class="nav-item ml-2">
         <button type="button" class="btn" id="loginOut" style="background-color:#FEFFFF;"><a href="../Application Layer/logOut.php" style="color:black;">Log Out</a></button>
        </li>
      </ul>
    </div>
  </div>
</nav>