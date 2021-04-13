<!-- Contributors: Po Wei Tsao (pt5rsx), Qasim Qasim (qq4fd) -->

<?php
 include_once("./library.php"); // To connect to the database
 $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
 // Check connection
 if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
 // Form the SQL query (an INSERT query)

 session_start();

  $sql="UPDATE stops SET notes = '".addslashes($_POST['update_notes'])."' WHERE userID='$_SESSION[userID]' AND tripID = '".$_POST["tripID"]."' AND stopNumber = '".$_POST["stopNumber"]."'";
  $result = mysqli_query($con,$sql);
  $result = mysqli_query($con,$sql) or die(mysqli_error($con));
  mysqli_close($con);

header("Location: ../trip_details.php?tripid=".$_POST["tripID"]);

?>