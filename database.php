<?php
    
    //CONNECT TO MYSQL DATABASE USING MYSQLI
    $connection = mysqli_connect("localhost", "root", "");
    $db = mysqli_select_db($connection, 'youcodescrumboard');
    // if(isset($db)){
    //     echo 'success';
    // }else{
    //     echo 'nooooo';
    // }
?>