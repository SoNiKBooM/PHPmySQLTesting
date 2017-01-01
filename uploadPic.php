<?php
    include('session.php');

    $configs = include('config.php');

    $dirPath = dirname(getcwd());

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $servername = $configs["host"];
        $username = $configs["username"];
        $password = $configs["pass"];
        $dbname = $configs["database"];
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $fileName = $_FILES['userfile']['name'];
        $tmpName = $_FILES['userfile']['tmp_name'];
        $fileSize = $_FILES['userfile']['size'];
        $fileType = $_FILES['userfile']['type'];
        $fileError = $_FILES['userfile']['error'];

        $kaboom = explode(".", $fileName);
        $fileExt = end($kaboom);
        list($width, $height) = getimagesize($tmpName);

        if ($width < 10 || $height < 10) {
            echo '<script language="javascript">';
            echo 'alert("Image Dimensions are too small")';
            echo '</script>';
        }
        $db_file_name = rand(100000, 999999) . "." . $fileExt;
        if ($fileSize > 5242880) {
            echo '<script language="javascript">';
            echo 'alert("Image is too large. 5MB maximum.")';
            echo '</script>';
        } else if (!preg_match("/\.(gif|jpg|png)$/i", $fileName)) {
            echo '<script language="javascript">';
            echo 'alert("Your image file was not jpg, gif or png type")';
            echo '</script>';
        } else if ($fileError == 1) {
            echo '<script language="javascript">';
            echo 'alert("ERROR: An unknown error occurred")';
            echo '</script>';
        };

        $sql = "SELECT profile_pic FROM users WHERE username='$login_session'";



        $query = mysqli_query($conn, $sql);
        $row = mysqli_fetch_row($query);
        $profile_pic = $row[0];

        if ($profile_pic != "") {
            $picURL = "$dirPath/html/user/$login_session/$db_file_name";
            if (file_exists($picURL)) {
                unlink($picURL);
            }
        }
        if (!file_exists("$dirPath/html/user/$login_session/")) {
            mkdir("$dirPath/html/user/$login_session/", 0777, true);
        }
        $moveResult = move_uploaded_file($tmpName, "$dirPath/html/user/$login_session/$db_file_name");
        if ($moveResult != true) {
            echo '<script language="javascript">';
            echo 'alert("ERROR: File Upload Failed';
            echo '</script>';
        }
        $sql = "UPDATE users SET profile_pic='$db_file_name' WHERE username='$login_session'";
        $query = mysqli_query($conn, $sql);
        mysqli_close($conn);
        header("location: profile.php");
        }

