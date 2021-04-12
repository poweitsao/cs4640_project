<?php 
require_once('./php/library.php');
$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
// Check connection
if (mysqli_connect_errno()) {
echo("Can't connect to MySQL Server. Error code: " .
mysqli_connect_error());
return null;
}
?>
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

    <!-- Destinations Destinations Destinations -->
    <!-- Destinations Destinations Destinations -->

    <?php 
    
    $sql="SELECT * FROM stops WHERE tripID='".$_GET['tripid']."' ORDER BY `stopNumber`";
    $result = mysqli_query($con,$sql) or die(mysqli_error($con));

    while ($row = mysqli_fetch_array($result)) {
        ?>
      <div class="destination" data-destId="1">
        <div>
        <?php //echo $row['stopNumber']; ?>
        </div>
        <p><?php echo $row['name']; ?></p>
        <span id="<?php echo $row['stopNumber']; ?>" style="height:0px; line-height:0px; font-size:0px;"><?php echo $row['notes']; ?></span>
        <a href="php/remove_stop.php?tripID=<?php echo $row['tripID']; ?>&stopNumber=<?php echo $row['stopNumber']; ?>" onclick="return confirm('are you sure you want to delete the stop');" style="color:red; font-size:larger;">x</a>
      </div>
      
    <?php
      } 
    ?>


      


    </div>

      
      <div class="main-content-card">
      
        <div> 
          <p id="dest-name">Select a Stop</p>
          <button id="remove-dest">Update Notes</button> <!-- id="remove-dest" -->
        </div>
        <form method="post" id="update_notes_form" action="php/update_note.php">
        <textarea placeholder="Add notes ..." id="update_notes" name="update_notes" style="width: 100%; height:100px; "></textarea>
        <input type="hidden" id="notes_stopNumber" name="stopNumber" value="0" />
        <input type="hidden"  name="tripID" value="<?php echo $_GET['tripid']; ?>" />
        </form>
      </div>
   

  </div>
  <button id="add-dest">Add a destination</button>

  <div class="popup-modal hidden">
    <form method="post" action="php/add_stop.php?tripid=<?php echo $_GET['tripid']; ?>">
      <label for="destname">Destination name:</label><br />
      <input type="text" id="destname" name="destname"><br />
      <input type="hidden" id="tripId" name="tripid" value="<?php echo $_GET['tripid']; ?>" /><br />
      <button type="submit">Create new</button> <!-- id="modal-btn" -->
    </form>
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