<?php
include('session.php');
?>
<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="main.css">
</head>


<body>

<h3>PHP SQL TESTBENCH</h3>

<div id="phpRow" class="row row-centered">
    <div id="PHP" class="col-lg-4 col-centered">

        <h2>EDIT PROFILE PAGE</h2>



        <form>

            <div class="form-group">
                <label for="exampleInputEmail1">First Name</label>
                <input type="text" class="form-control" name="fname" aria-describedby="emailHelp" value="<?php echo $first_name; ?>">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Last Name</label>
                <input type="text" class="form-control" name="lname" value="<?php if(isset($last_name)) {
                    echo $last_name;
                } else {
                    echo "(Optional)";
                }
                ?>">
            </div>

            <div class="form-group row">
                <div class="offset-lg-2 col-lg-10">
                    <button type="submit" class="btn btn-primary" formmethod="post" formaction="edituser.php">Save</button>
                    <button type="submit" class="btn btn-danger" formaction="index.php">Cancel</button>
                </div>
            </div>


    </div>
    </form>


</div>
</div>

</body>



</html>
