<?php
 include_once("./library.php"); // To connect to the database
 $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
 // Check connection
 if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
 // Form the SQL query (an INSERT query)

 session_start();

 $sql="SELECT stopNumber FROM stops WHERE userID='$_SESSION[userID]' AND tripID = '".$_POST["tripid"]."' ORDER BY stopNumber DESC";
 $result = mysqli_query($con,$sql);
 if(mysqli_num_rows($result) > 0){
   $row = mysqli_fetch_array($result);
   $stopNumber = $row['stopNumber'] + 1;
 }else{
   $stopNumber = 1;
 }
 if(isset($_POST['destname']) && !empty($_POST['destname'])){
   $sql="INSERT INTO stops SET userID = '".$_SESSION["userID"]."',
                               tripID = '".$_POST["tripid"]."',
                               stopNumber = $stopNumber,
                               notes = '',
                               name   = '".$_POST["destname"]."'";
   $result = mysqli_query($con,$sql) or die(mysqli_error($con));
 
 }
 
mysqli_close($con);

header("Location: ../trip_details.php?tripid=".$_POST["tripid"]);

?>