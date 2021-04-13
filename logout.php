<!-- Po Wei Tsao (pt5rsx), Qasim Qasim (qq4fd) -->
<!-- <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  
  <title>PHP State Maintenance (Cookies)</title>    
</head>
<body>

  <div class="container">
    <h1>Road Trip Planner</h1>
    Successfully logged out 
    <div style="padding:30px;">    
      <form action="landing_page.php" method="get">
        <input type="submit" value="Log in" class="btn btn-dark" />
      </form>
    </div> 
  </div> -->

   

  <?php 
    session_start();
    if(count($_SESSION) > 0){
        foreach ($_SESSION as $k => $v){
        unset($_SESSION[$k]);
        }
        session_destroy();    
    }
    header("Location: landing_page.php");
?>

