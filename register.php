<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="main.css">
</head>


<body>

<h3>PHP SQL TESTBENCH</h3>

<div id="phpRow" class="row row-centered">
    <div id="PHP" class="col-lg-4 col-centered">

        <h2>REGISTRATION PAGE</h2>

        <?php
        $configs = include('config.php');

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $servername = $configs["host"];
            $username = $configs["username"];
            $password = $configs["pass"];
            $dbname = $configs["database"];

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $fname = mysqli_real_escape_string($conn, $_POST['fname']);
            $lname = mysqli_real_escape_string($conn, $_POST['lname']);
            $uname = mysqli_real_escape_string($conn, $_POST['uname']);

            $pword = mysqli_real_escape_string($conn, $_POST['pword']);
            $hash = password_hash($pword, PASSWORD_BCRYPT);

            $sql = "INSERT INTO users (first_name, last_name, username, reg_date, hash) VALUES ('$fname', '$lname', '$uname', NOW(), '$hash')";

            if ($conn->query($sql) === TRUE) {
                header('location: login.php');
            } else {
                echo "Error updating record: " . $conn->error;
            }

            $conn->close();
        }

        ?>

        <form>

            <div class="form-group">
                <label for="exampleInputEmail1">First Name</label>
                <input type="text" class="form-control" name="fname" aria-describedby="emailHelp" placeholder="Enter First Name">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Last Name</label>
                <input type="text" class="form-control" name="lname" placeholder="Enter Last Name (Optional)">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Username</label>
                <input type="text" class="form-control" name="uname" placeholder="Enter desired Username">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Password</label>
                <input type="password" class="form-control" name="pword" placeholder="Enter Password">
            </div>

            <div class="form-group row">
                <div class="offset-lg-2 col-lg-10">
                    <button type="submit" class="btn btn-primary" formmethod="post" formaction="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">Register</button>
                    <button type="submit" class="btn btn-danger" formaction="index.php">Go Back</button>
                </div>
            </div>

            </div>
        </form>

    </div>
</div>

</body>



</html>
