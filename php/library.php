<?php
if($_SERVER['HTTP_HOST'] == 'localhost' && 1 == 2){
    $SERVER = 'localhost';
    $USERNAME = 'root';
    $PASSWORD = 'bitcoiin';
    $DATABASE = 'pt5rsx_cs4640_project';    
}else{
    $SERVER = 'usersrv01.cs.virginia.edu';
    $USERNAME = 'pt5rsx';
    $PASSWORD = 'Powei@cs4640';
    $DATABASE = 'pt5rsx_cs4640_project';    
}
?>
