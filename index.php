<?php
session_start();
if(isset($_SESSION['login_user'])){
    header("location: profile.php");
}
?>

<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>


<body>

    <h3>PHP SQL TESTBENCH</h3>

    <div id="phpRow" class="row row-centered">
        <div id="PHP" class="col-lg-4 col-centered">

            <h2>LANDING PAGE</h2>
            <br>
            <form class="text-center">
                <button type="submit" class="btn btn-primary" formaction="register.php">Register</button>
                <button type="submit" class="btn btn-success" formaction="login.php">Login</button>
            </form>

    </div>
    </div>


</body>



</html>