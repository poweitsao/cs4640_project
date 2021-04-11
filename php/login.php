<?php
 include_once("./library.php"); // To connect to the database
 $con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE);
 // Check connection
 if (mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
 // Form the SQL query (an INSERT query)
 $sql="SELECT * FROM users WHERE email='$_POST[email]' AND password='$_POST[password]'";


 if (!mysqli_query($con,$sql)) {
    die('Error: ' . mysqli_error($con));
 }  

 $result = mysqli_query($con,$sql);
 session_start();
if (mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_array($result);
    // echo $row["email"];
    $_SESSION["user_email"] = $row["email"];
    // echo $_SESSION["user_email"];
    if (isset($_SESSION["login_error_message"])){
        unset($_SESSION["login_error_message"]);
    }

    header("Location: ../homepage.php");
} else{
    // echo "Log in failed. Username and password combination not found. Please try again.";
    // sleep(5);
    $_SESSION["login_error_message"] = "Incorrect username and password.";
    header("Location: ../landing_page.php");

}


mysqli_close($con);
?>