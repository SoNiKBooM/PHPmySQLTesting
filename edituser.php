<?php

include('session.php');
$configs = include('config.php');


if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $servername = $configs["host"];
    $username = $configs["username"];
    $password = $configs["pass"];
    $dbname = $configs["database"];
    $conn = new mysqli($servername, $username, $password, $dbname);
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $sql = "UPDATE users SET first_name='$fname',last_name='$lname' WHERE username='$login_session'";

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($conn->query($sql) === TRUE) {
        header('location: profile.php');
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
}
