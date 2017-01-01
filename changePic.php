<?php
include('session.php');
?>
<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Merriweather" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="main.css">

    <title>Upload Pic</title>
</head>


<body>

<h3>PHP SQL TESTBENCH</h3>



<div class="container">

    <div class="row row-centered">

        <div id="profile" class="col-lg-8 col-centered">

            <div id="profileHead">
                <i><a href="profile.php"><?php echo $login_session; ?></a></i>
                <b style="font-size:10px;margin-left:3px;" id="edit"><a href="editprofile.php">Edit</a></b>
                <b style="font-size:10px;margin-left:3px;" id="changepwd"><a href="changepwd.php">Change Password</a></b>
                <b style="float:right;" id="logout"><a href="logout.php"> Log Out</a></b>
            </div>

            <div id="profileInfo" class="row">

                <div id="profilePic" class="col-lg-12 col-centered">
                    <img style="width:150px;height:150px;" alt="<?php echo $login_session;?>"
                         src="<?php
                         if($profile_pic_url == NULL){
                             echo './images/default_avatar.jpg';
                         }
                         else {
                             echo "./user/$login_session/$profile_pic_url";
                         }?>"/>
                    <form method="post" enctype="multipart/form-data">
                        <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
                        <label class="btn btn-default btn-file">
                            Choose File..<input style="display: none;" name="userfile" type="file" id="userfile">
                        </label>
                        <button class="btn btn-primary" name="upload" type="submit" formaction="uploadPic.php" id="upload">Upload</button><br>
                        <button type="submit" class="btn btn-danger" formaction="profile.php">Go Back</button>
                    </form>
                </div>

            </div>

        </div>
    </div>
</div>

</body>



</html>