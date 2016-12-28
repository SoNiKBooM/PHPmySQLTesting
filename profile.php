<?php
include('session.php');
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

        <div id="profile">
            <b id="welcome">Welcome <i><?php echo $login_session; ?></i></b>
            <b style="font-size:10px;margin-left:3px;" id="edit"><a href="editprofile.php">Edit</a></b>
            <b style="font-size:10px;margin-left:3px;" id="changepwd"><a href="changepwd.php">Change Password</a></b>
            <b style="float:right;" id="logout"><a href="logout.php"> Log Out</a></b>

        </div>

        <div>
            <h6>Registered on: <?php echo $reg_date;?></h6>
            <p>Name: <?php echo $first_name.' '.$last_name;?> </p>
        </div>

    </div>
</div>


</body>



</html>