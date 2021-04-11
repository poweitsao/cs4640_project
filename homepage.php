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

  <title>My Trips</title>

  <!-- 3. link bootstrap -->
  <!-- if you choose to use CDN for CSS bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

  <style>
    <?php include './stylesheets/homepage.css'; ?>
  </style>


  <!-- 
  Use a link tag to link an external resource.
  A rel (relationship) specifies relationship between the current document and the linked resource. 
  -->

  <!-- if you choose to download bootstrap and host it locally -->
  <!-- <link rel="stylesheet" href="path-to-your-file/bootstrap.min.css" /> -->

  <!-- include your CSS -->
  <link rel="stylesheet" href="./stylesheets/homepage.css" />

</head>

<body>
<?php 
    session_start();
    if (!isset($_SESSION["userID"])){
      $_SESSION["login_error_message"] = "Please login to continue.";
      header("Location: ./landing_page.php");
    }
     ?>
  <header>
    <nav class="navbar navbar-expand-md bg-light navbar-light">
      <a class="navbar-brand" href="#">Road Trip Planner</a>
      <text class="nav-link" >Logged in as <?php echo $_SESSION["userID"];?></text>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>


      <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item">
            <a class="nav-link" href="homepage.php">My Trips</a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="landing_page.php">Landing Page</a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Log out</a>
          </li>

        </ul>
      </div>
    </nav>
  </header>

  <div class="container">

    <div class="trip-icon-grid">

      <div class="trip-icon">
        <a href="trip_details.php">
          <span class="trip-icon-outer">
            <span class="trip-icon-inner" onclick="clickHandler()">
              <div class="trip-icon-text-box">
                <p class="trip-icon-text">T</p>
              </div>
            </span>
          </span>
          </span>
          <div>
            <p class="trip-icon-label">Trip 1</p>
          </div>
        </a>


        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-x"
          viewBox="0 0 16 16" onclick="removeButtonHandler(this)" class="remove-button">
          <path
            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
        </svg>
      </div>

      <div class="trip-icon">
        <a href="trip_details.php">
          <span class="trip-icon-outer">
            <span class="trip-icon-inner" onclick="clickHandler()">
              <div class="trip-icon-text-box">
                <p class="trip-icon-text">T</p>
              </div>
            </span>
          </span>
          </span>
          <div>
            <p class="trip-icon-label">Trip 2</p>
          </div>
        </a>


        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-x"
          viewBox="0 0 16 16" onclick="removeButtonHandler(this)" class="remove-button">
          <path
            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
        </svg>
      </div>

      <div class="trip-icon">
        <a href="trip_details.php">
          <span class="trip-icon-outer">
            <span class="trip-icon-inner" onclick="clickHandler()">
              <div class="trip-icon-text-box">
                <p class="trip-icon-text">T</p>
              </div>
            </span>
          </span>
          </span>
          <div>
            <p class="trip-icon-label">Trip 3</p>
          </div>
        </a>


        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-x"
          viewBox="0 0 16 16" onclick="removeButtonHandler(this)" class="remove-button">
          <path
            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
        </svg>
      </div>

      <div class="trip-icon">
        <a href="trip_details.php">
          <span class="trip-icon-outer">
            <span class="trip-icon-inner" onclick="clickHandler()">
              <div class="trip-icon-text-box">
                <p class="trip-icon-text">T</p>
              </div>
            </span>
          </span>
          </span>
          <div>
            <p class="trip-icon-label">Trip 4</p>
          </div>
        </a>


        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-x"
          viewBox="0 0 16 16" onclick="removeButtonHandler(this)" class="remove-button">
          <path
            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
        </svg>
      </div>
      
    </div>

    <div>
      <button class="btn btn-primary">Add a new Trip</button>
    </div>




  </div>

  <script>
    var clickHandler = () => {
      console.log("clicked")
    }

    removeButtonHandler = (element) => {

      element.parentElement.style.display = 'none';
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