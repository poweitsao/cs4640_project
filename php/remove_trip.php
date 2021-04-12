<?php 
    require_once('./library.php');
    $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
    // Check connection
    session_start();
    if (mysqli_connect_errno()) {
    echo("Can't connect to MySQL Server. Error code: " .
    mysqli_connect_error());
    return null;
    }
    $trip_id = intval($_POST['trip_id']);

    $sql="DELETE FROM stops WHERE userID='$_SESSION[userID]' AND tripID = '".$trip_id."'";
    $result = mysqli_query($con,$sql) or die(mysqli_error($con));

    $sql="DELETE FROM trips WHERE userID='$_SESSION[userID]' AND tripID='$trip_id';";

    $result = mysqli_query($con,$sql);
    header("Location: ../homepage.php");
?>