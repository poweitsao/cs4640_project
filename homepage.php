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




  <!-- 
  Use a link tag to link an external resource.
  A rel (relationship) specifies relationship between the current document and the linked resource. 
  -->

  <!-- if you choose to download bootstrap and host it locally -->
  <!-- <link rel="stylesheet" href="path-to-your-file/bootstrap.min.css" /> -->

  <!-- include your CSS -->
  <style>
    <?php include './stylesheets/homepage.css'; ?>
  </style>
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
    <?php
      require_once('./php/library.php');
      $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
      // Check connection
      if (mysqli_connect_errno()) {
      echo("Can't connect to MySQL Server. Error code: " .
      mysqli_connect_error());
      return null;
      }
      // Form the SQL query (a SELECT query)
      $sql="SELECT * FROM trips WHERE userID='$_SESSION[userID]'";
      $result = mysqli_query($con,$sql);
      // Print the data from the table row by row
      while($row = mysqli_fetch_array($result)) {
        // echo $row['FirstN'];
        // echo " " . $row['LastN'];
        // echo " " . $row['Age'];
        // echo "<br>";
        echo "<form class='trip-icon' action='./php/remove_trip.php' method='post'>
                <a href='trip_details.php?tripid=".$row['tripID']."'>
                  <span class='trip-icon-outer'>
                  
                    <span class='trip-icon-inner' >
                      <div class='trip-icon-text-box'>
                        <p class='trip-icon-text'>" . $row['name'][0] . "</p>" 
                    . "</div>
                    </span>
                  </span>
                  </span>
                  <div>
                    <p class='trip-icon-label' >" . $row['name'] . "</p>"
              ."  </div>
                </a>
                <input style='display:none;' name='trip_id' value=" . $row['tripID'] . "></input>
                <div onclick='removeButtonHandler(this)' type='submit'>
                  <svg xmlns='http://www.w3.org/2000/svg' width='25' height='25' fill='currentColor' class='bi bi-x'
                    viewBox='0 0 16 16' class='remove-button'>
                    <path
                      d='M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z' />
                  </svg>
                </div>
                
              </form>";

      }
      mysqli_close($con);
    ?>
    
      
    </div>

    <div class="new-trip-button">
      <button class="btn btn-primary" onclick="toggleNewTripForm()">Add a new Trip</button>
    </div>

    <div id="new-trip-form-container" style="display: none;">
      <div class="card" style="padding: 20px; width: 300px;">

        <form onsubmit="return  checkTripName()" id="new-trip-form" action="./php/create_trip.php" method="post" style="display: flex; flex-direction: column; justify-content: center; align-content: center;">
          <div class="form-group">
            <label >Trip Name</label>
            <input type="text" class="form-control" name="new_trip_name" id="new_trip_name" placeholder="Enter your trip's name">
          </div>
          <div>
            <button type="submit" class="btn btn-primary" style="width: 90px; margin: 5px;">Create!</button>
            <button type="button" class="btn btn-secondary" onclick="toggleNewTripForm()" style="width: 90px; margin: 5px;">Cancel</button>
            <!-- <svg type="submit" xmlns='http://www.w3.org/2000/svg' width='25' height='25' fill='currentColor' class='bi bi-x'
                    viewBox='0 0 16 16' class='remove-button'>
                    <path
                      d='M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z' />
                  </svg> -->
          </div>
        </form>
        <div id="new-trip-form-error-msg" style="margin: 5px; color: red;"> 
        </div>
        </div>  
    </div>

  </div>

  <script>
    var clickHandler = () => {
      console.log("clicked")
    }

    removeButtonHandler = (element) => {

      element.parentElement.style.display = 'none';
      element.parentElement.submit();



    }


    var toggleNewTripForm = () =>{
      var newTripForm = document.getElementById("new-trip-form-container");
      if (newTripForm.style.display === "none"){
        newTripForm.style.display = "block";
      } else{
        newTripForm.style.display = "none";
        setTripFormErrorMsg("")

      }
    }

    var setTripFormErrorMsg = (msg) =>{
      var msgDiv = document.getElementById("new-trip-form-error-msg");
      msgDiv.textContent = msg;
    }

    var checkTripName = () =>{
      var tripName = document.getElementById("new_trip_name");
      if (tripName.value.length === 0){
        setTripFormErrorMsg("Trip name cannot be empty.")
        return false
      } else{
        return true;
      }
    }

  </script>

  <!-- CDN for JS bootstrap -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
    crossorigin="anonymous"></script>





</body>

</html>