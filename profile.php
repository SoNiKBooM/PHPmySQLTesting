<?php
include('session.php');

?>

<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Merriweather" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="main.css">

    <title><?php echo $login_session; ?>'s Profile</title>
</head>


<body>

<h3>PHP SQL TESTBENCH</h3>

<div class="container">

<div class="row row-centered">

    <div id="profile" class="col-lg-8 col-centered">

        <div id="profileHead">
            <i><?php echo $login_session; ?></i>
            <b style="font-size:10px;margin-left:3px;" id="edit"><a href="editprofile.php">Edit</a></b>
            <b style="font-size:10px;margin-left:3px;" id="changepwd"><a href="changepwd.php">Change Password</a></b>
            <b style="float:right;" id="logout"><a href="logout.php"> Log Out</a></b>
        </div>

        <div id="profileInfo" class="row">
            <div class="col-lg-8">
                <p><?php echo $first_name.' '.$last_name;?> </p>
                <h6>Registered on: <?php echo $reg_date;?></h6>
            </div>
            <div id="profilePic" class="col-lg-4">
                <img style="width:150px;height:150px;" alt="<?php echo $login_session;?>"
                     src="<?php
                     if($profile_pic_url == NULL){
                         echo './images/default_avatar.jpg';
                     }
                     else {
                     echo "./user/$login_session/$profile_pic_url";
                     }?>"/>

                <br><b style="font-size:10px;margin-left:3px;" id="uploadPic"><a href="changePic.php">Change Pic</a></b>
            </div>

        </div>

    </div>
</div>
</div>

</body>



</html>