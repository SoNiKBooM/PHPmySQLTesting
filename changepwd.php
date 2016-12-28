<?php
include('session.php');
$configs = include('config.php');
$servername = $configs["host"];
$username = $configs["username"];
$password = $configs["pass"];
$dbname = $configs["database"];
$conn = new mysqli($servername, $username, $password, $dbname);

$pword1 = $_POST['pword1'];
$pword2 = $_POST['pword2'];
$newhash = password_hash($pword1, PASSWORD_BCRYPT);
$sql = "UPDATE users SET hash='$newhash' WHERE username='$login_session'";

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

         if($pword1 <> $pword2) {
            echo "Passwords do not match";
         }
         else {


             if ($conn->connect_error) {
                 die("Connection failed: " . $conn->connect_error);
             }

             if ($conn->query($sql) === TRUE) {
                 header('location: logout.php');
             } else {
                 echo "Error updating record: " . $conn->error;
             }
         }
        $conn->close();
}
?>

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

        <h2>CHANGE PASSWORD PAGE</h2>



        <form>


            <div class="form-group row">
                <div class="offset-lg-2 col-lg-10">
                    <label for="exampleInputEmail1">Change Password</label>
                    <input type="password" class="form-control" name="pword1" placeholder="Enter New Password">
                    <input type="password" class="form-control" name="pword2" placeholder="Repeat New Password">
                </div>
            </div>

            <div class="form-group row">
                <div class="offset-lg-2 col-lg-10">
                    <button type="submit" class="btn btn-primary" formmethod="POST" formaction="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">Change Password</button>
                    <button type="submit" class="btn btn-danger" formaction="index.php">Cancel</button>
                </div>
            </div>

    </div>
    </form>


</div>
</div>

</body>



</html>

