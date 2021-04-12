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

  <title>Trip Details</title>

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
  <!-- <link rel="stylesheet" href="./stylesheets/trips_details.css" />
  <link rel="stylesheet" href="./stylesheets/styles.css" /> -->
  <style>
    <?php include './stylesheets/trips_details.css'; ?>
    <?php include './stylesheets/styles.css'; ?>
  </style>

</head>

<body>
  <header>
    <nav class="navbar navbar-expand-md bg-light navbar-light">
      <a class="navbar-brand" href="#">Road Trip Planner</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>


      <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item">
            <a class="nav-link" href="homepage.php">My Trips</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="landing_page.php">Landing Page</a>
          </li>

        </ul>
      </div>
    </nav>
  </header>
  <!-- Page Content goes here -->

  <h1>Recent Vacation</h1>

  <div class="main-content">
    <div class="main-content-body">
      <div class="destination" data-destId="1">
        <div>

        </div>
        <p>Home</p>
      </div>

      <div class="destination" data-destId="2">
        <div>

        </div>
        <p>New Jersey</p>
      </div>

      <div class="destination" data-destId="3">
        <div>

        </div>
        <p>N.J. Airport</p>
      </div>

      <div class="destination" data-destId="4">
        <div>

        </div>
        <p>Miami Airport</p>
      </div>

      <div class="destination" data-destId="5">
        <div>

        </div>
        <p>Miami City</p>
      </div>

      <div class="destination" data-destId="6">
        <div>

        </div>
        <p>Miami South Beach</p>
      </div>


    </div>
    <div class="main-content-card">
      <div>
        <p id="dest-name">New Jersey</p>
        <button id="remove-dest">Remove</button>
      </div>
      <textarea placeholder="Add notes ..."></textarea>
    </div>
  </div>
  <button id="add-dest">Add a destination</button>

  <div class="popup-modal hidden">
    <label for="destname">Destination name:</label><br />
    <input type="text" id="destname" name="destname"><br />
    <button id="modal-btn">Create new</button>
  </div>




  <!-- CDN for JS bootstrap -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
    crossorigin="anonymous"></script>
  <script src="./js/main.js"></script>

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