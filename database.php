<?php

//CONNECT TO MYSQL DATABASE USING MYSQLI
$conn = mysqli_connect("localhost", "root", "", "testing");
// Check connection
if ($conn) {
    echo ("Connection is good. connecting to the server...");
} else {
    echo "Connected baaaad";
}
