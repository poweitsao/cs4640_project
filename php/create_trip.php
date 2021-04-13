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

 $sql="SELECT * FROM trips WHERE userID='$_SESSION[userID]'";


 if (!mysqli_query($con,$sql)) {
    die('Error: ' . mysqli_error($con));
 }  

 $result = mysqli_query($con,$sql);

 $max_trip_id = 0;
 while($row = mysqli_fetch_array($result)) {
     $max_trip_id = max($row["tripID"], $max_trip_id);
}

$trip_id = $max_trip_id + 1;
// echo $_POST["new-trip-name"];
$insert_sql = "INSERT INTO trips (tripID, name, userID) VALUES ($trip_id, '$_POST[new_trip_name]', '$_SESSION[userID]');";
$insert_result = mysqli_query($con,$insert_sql);

header("Location: ../homepage.php");

mysqli_close($con);
?>