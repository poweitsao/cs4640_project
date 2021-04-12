<!-- Contributors: Po Wei Tsao (pt5rsx), Qasim Qasim (qq4fd) -->
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">

  <!-- 2. include meta tag to ensure proper rendering and touch zooming -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- 
  Bootstrap is designed to be responsive to mobile.
  Mobile-first styles are part of the core framework.
   
  width=device-width sets the width of the page to follow the screen-width
  initial-scale=1 sets the initial zoom level when the page is first loaded   
  -->

  <meta name="author" content="your name">
  <meta name="description" content="include some description about your page">

  <title>Landing Page</title>

  <!-- 3. link bootstrap -->
  <!-- if you choose to use CDN for CSS bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

  <!-- 
  Use a link tag to link an external resource.
  A rel (relationship) specifies relationship between the current document and the linked resource. 
  -->

  <!-- if you choose to download bootstrap and host it locally -->
  <!-- <link rel="stylesheet" href="path-to-your-file/bootstrap.min.css" /> -->

  <!-- include your CSS -->
  <link rel="stylesheet" href="./stylesheets/landing_page.css" />
  <style>
    <?php include './stylesheets/landing_page.css'; ?>
  </style>

</head>

<body>
<?php 
    session_start();
    if (isset($_SESSION["userID"])){
      header("Location: ./homepage.php");
    }

     ?>
  <header>
    <nav class="navbar navbar-expand-md bg-light navbar-light">
      <a class="navbar-brand" href="#">Road Trip Planner</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>


      <div class="collapse navbar-collapse justify-content-center" id="collapsibleNavbar">
        <ul class="navbar-nav mx-auto">
          <!-- <li class="nav-item">
            <a class="nav-link" href="homepage.php">My Trips</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="landing_page.php">Landing Page</a>
          </li> -->

        </ul>
      </div>
    </nav>
  </header>
  <div class="container">
    <div class="landing-image">
      <img
        src="https://images.unsplash.com/photo-1469854523086-cc02fe5d8800?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1008&q=80">
    </div>

    <div id="login-signup-panel" style="display: block">
      <form id="login-signup-panel-form" onsubmit="return checkLoginCredentials()" action="./php/login.php" method="post">
      <h3 id="login-signup-panel-title">Log in</h3>
      <div class="signup-msg">
            <?php 
              if(isset($_SESSION['signup_success'])) {
                if( $_SESSION["signup_success"]){
                  echo "<div style='color: green'>" . "Sign up success! Please log in." . "</div>";
                } else{
                  echo "<div style='color: red'>" . $_SESSION['signup_error_message'] . "</div>";
                }
              }
              ?>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" name="email" class="form-control" id="email-input" aria-describedby="emailHelp"
            placeholder="Enter email">
        </div>
        <div class="feedback">
          <div id="email-msg"></div>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" name="password" class="form-control" id="password-input" placeholder="Password">
        </div>
        <div class="feedback">
          <div id="password-msg">
          <?php 
            if(isset($_SESSION['login_error_message'])) {
              
              echo $_SESSION['login_error_message'];
            }
            ?>
          </div>
        </div>

        <div class="submit-button">
          <button id="login-button" type="submit" class="btn btn-primary" >Log in</button>
        </div>
        <div class="submit-button">
          <button id="signup-button" type="button" class="btn btn-secondary" onclick="togglePanel()">Sign up</button>
        </div>

      </form>
    </div>



  </div>

  <!-- Page Content goes here -->

  <script>

    var addEventListenersToInput = function(){
      function checkPassword() {
        var msg = document.getElementById("password-msg");
        if (this.value.length == 0) {
          msg.textContent = "Password cannot be empty";

        } else if (this.value.length < 3) {
          msg.textContent = "Password cannot be shorter than 3 characters";
        } else
          msg.textContent = "";
      }

      var password = document.getElementById("password-input");
      password.addEventListener('blur', checkPassword, false);

      function checkEmail() {
        var msg = document.getElementById("email-msg");

        var pattern = new RegExp(".{1,}@.{1,}");
        var match_test = pattern.test(this.value);
        console.log(this.value)
        if (match_test) {
          msg.textContent = "";
        } else {
          msg.textContent = "Enter a valid email";
        }
      }

      var email = document.getElementById("email-input");
      email.addEventListener('blur', checkEmail, false);
      var login = function () {
      }
    }
    // this.addEventListenersToInput = addEventListenersToInput
    addEventListenersToInput()

    var checkLoginCredentials = function () {
      var email = document.getElementById("email-input");
      var pattern = new RegExp(".{1,}@.{1,}");
      var emailValid = pattern.test(email.value);
      // console.log(this.value)

      var password = document.getElementById("password-input");
      var passwordValid = false
      if (password.value.length >= 3) {
        passwordValid = true
      }
      console.log(emailValid && passwordValid);
      return (emailValid && passwordValid);
    }


    var togglePanel = function () {
      // var signUpPanel = document.getElementById("signup-panel");
      var panel = document.getElementById("login-signup-panel");
      var panelTitle = document.getElementById("login-signup-panel-title");
      var panelForm = document.getElementById("login-signup-panel-form");
      var panelFormURL = panelForm.action.toString()
      var loginButton = document.getElementById("login-button");
      var signUpButton = document.getElementById("signup-button");

      if (panelFormURL.substr(panelFormURL.length - 9) === "login.php"){
        panelForm.action = "./php/signup.php";
        panelTitle.textContent = "Sign up";
        loginButton.className = "btn btn-secondary";
        signUpButton.className = "btn btn-primary";

        loginButton.setAttribute("onclick","togglePanel();");
        loginButton.setAttribute("type","button");

        signUpButton.setAttribute("type", "submit");
        signUpButton.removeAttribute("onclick");

      } else if (panelFormURL.substr(panelFormURL.length - 10) === "signup.php"){
        panelForm.action = "./php/login.php";
        panelTitle.textContent = "Log in";
        signUpButton.className = "btn btn-secondary";
        loginButton.className = "btn btn-primary";

        signUpButton.setAttribute("onclick", "togglePanel();");
        signUpButton.setAttribute("type","button");

        loginButton.setAttribute("type", "submit");
        loginButton.removeAttribute("onclick");
      }
      var email = document.getElementById("email-input");
      email.value = "";
      var password = document.getElementById("password-input");
      password.value = "";
      var msg = document.getElementById("email-msg");
      msg.textContent = "";
      var msg = document.getElementById("password-msg");
      msg.textContent = "";
    }

  </script>


  <!-- CDN for JS bootstrap -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
    crossorigin="anonymous"></script>


  <!-- for local -->
  <!-- <script src="jquery.min.js"></script> -->
  <!-- <script src="bootstrap/js/bootstrap.min.js"></script> -->


  <!--  uncomment the following code when customizing your page -->
  <!-- <script>
  // document ready event is fired when DOM has been loaded 
  $(document).ready(function() {
	 // do DOM manipulation, set header's height
     $('.header').height($(window).height()/2.5);     
   })
  </script>  -->



</body>

</html>