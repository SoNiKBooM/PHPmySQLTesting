<?php
$configs = include('config.php');

$servername = $configs["host"];
$username = $configs["username"];
$password = $configs["pass"];
$dbname = $configs["database"];
$conn = new mysqli($servername, $username, $password, $dbname);

session_start();

$uname = $_SESSION['login_user'];

$sql = "SELECT user_id,first_name,last_name,username,reg_date,hash FROM users WHERE username='$uname'";
$ses_sql = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($ses_sql);

$user_id = $row['user_id'];
$first_name = $row['first_name'];
$last_name = $row['last_name'];
$login_session = $row['username'];
$reg_date = $row['reg_date'];



if(!isset($login_session)){
    $conn->close();
    header('location: index.php');
}


