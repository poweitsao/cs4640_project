
<?php
//Contributors: Po Wei Tsao (pt5rsx), Qasim Qasim (qq4fd)
// header('Access-Control-Allow-Origin: http://localhost:4200');
 header('Access-Control-Allow-Origin: *');
 header('Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Authorization, Accept, Client-Security-Token, Accept-Encoding');
 header('Access-Control-Max-Age: 1000');  
 header('Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT');

 $postdata = file_get_contents("php://input");


 $request = json_decode($postdata, true);

 
 include_once("./library.php"); // To connect to the database
 $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
 // Check connection
 if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
 // Form the SQL query (an INSERT query)
//  echo '$request[userID]';
//  session_start();
// echo json_encode($_SESSION)
 $sql="SELECT * FROM trips WHERE userID='$request[userID]'";


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
$insert_sql = "INSERT INTO trips (tripID, name, userID) VALUES ($trip_id, '$request[name]', '$request[userID]');";
$insert_result = mysqli_query($con,$insert_sql);

// header("Location: ../homepage.php");
mysqli_close($con);

$request["tripCreateSuccess"] = true;
echo json_encode($request);
?>