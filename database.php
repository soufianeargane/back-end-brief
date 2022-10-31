<?php

//CONNECT TO MYSQL DATABASE USING MYSQLI
$conn = mysqli_connect("localhost", "root", "", "testing");
// Check connection
if ($conn) {
    echo ("Connection goooood");
} else {
    echo "Connected baaaad";
}
