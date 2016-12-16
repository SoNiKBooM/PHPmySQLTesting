<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="main.css">
</head>


<body>

<h3>PHP SQL TESTBENCH</h3>

<div id="phpRow" class="row row-centered">
    <div id="PHP" class="col-lg-4 col-centered">

        <h2>LOGIN PAGE</h2>

        <?php
        $configs = include('config.php');

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $servername = $configs["host"];
            $username = $configs["username"];
            $password = $configs["pass"];
            $dbname = $configs["database"];
            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $uname = mysqli_real_escape_string($conn, $_POST['uname']);
            $pword = mysqli_real_escape_string($conn, $_POST['pword']);

            $sql = "SELECT hash FROM users WHERE username='$uname'";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);
            $hash = $row["hash"];

            if(password_verify($pword, $hash) )  {
                echo "Logged in successfully";
            } else {
                echo "Incorrect Credentials, Try again...";
            }


            $conn->close();
        }

        ?>

        <form>

            <div class="form-group">
                <label for="exampleInputEmail1">Username</label>
                <input type="text" class="form-control" name="uname" placeholder="Enter Username">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Password</label>
                <input type="password" class="form-control" name="pword" placeholder="Enter Password">
            </div>

            <div class="form-group row">
                <div class="offset-lg-2 col-lg-10">
                    <button type="submit" class="btn btn-primary" formmethod="post" formaction="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">Login</button>
                    <button type="submit" class="btn btn-danger" formaction="index.php">Go Back</button>
                </div>
            </div>

    </div>
    </form>

</div>
</div>

</body>



</html>
