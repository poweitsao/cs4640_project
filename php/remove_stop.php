<?php
 include_once("./library.php"); // To connect to the database
 $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
 // Check connection
 if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
 // Form the SQL query (an INSERT query)

 session_start();

 $sql="DELETE FROM stops WHERE userID='$_SESSION[userID]' AND tripID = '".$_GET["tripID"]."' AND stopNumber = '".$_GET["stopNumber"]."' LIMIT 1";
 $result = mysqli_query($con,$sql) or die(mysqli_error($con));

header("Location: ../trip_details.php?tripid=".$_GET["tripID"]);

?>