<?php
session_start();
//only admins can access this page
if ($_SESSION['p_type'] != 'a')
    header('Location: profile.php');

include("src/initialization.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = OpenCon();
    $admin_id = $_SESSION['pid'];
    $name = $_POST["name"];
    $a_type = $_POST["a_type"];
    $sex = $_POST["sex"];
    $color = $_POST["color"];
    $diet = $_POST["diet"];
    $is_available = $_POST["avail"];
    $weight = $_POST["weight"];
    $height = $_POST["height"];
    $dob = date("Y-m-d H:i:s", strtotime($_POST["DOB"]));
    $is_kid_friendly = $_POST["kid_friendly"];
    $is_vac = $_POST["vac"];
    $description = $_POST["description"];
    $added_date = date("Y-m-d H:i:s");
    $breed = $_POST["breed"];
    $sql = "INSERT INTO animal (Added_by, Name, A_TYPE, Sex, Color, Diet, Available, Weight, Height, DoB, is_kid_friendly, is_vac, Description, A_date, breed) VALUES 
    ('$admin_id','$name', '$a_type', '$sex', '$color', '$diet', $is_available, '$weight', '$height', '$dob', $is_kid_friendly, $is_vac, '$description', '$added_date', '$breed');";
    $_SESSION['fname'] = $sql;
    if ($conn->query($sql) == true) {
        $new_sql = "SELECT AID FROM ANIMAL WHERE Name='$name' and DoB='$dob';";
        $result = $conn->query($new_sql);
        $row = $result->fetch_assoc();
        $_SESSION['a_type'] = $a_type;
        $_SESSION['NEW_AID'] = $row['AID'];
        header('Location: insert_to_group.php');
    }else{
        //go back to profile if it fails
        header('Location: profile.php');
    }
    $conn->close();    
}

?>

<!DOCTYPE HTML>
<html>

<head>
    <title>UTAnimals Signup</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css" />
</head>

<body class="no-sidebar is-preload">
    <div id="page-wrapper">

        <!-- Header -->
        <div id="header-wrapper">
            <div id="header" class="container">

                <!-- Logo -->
                <h1 id="logo"><a href="index.php">UTAnimals</a></h1>

                <!-- Nav -->
                <nav id="nav">
                    <ul>
                        <li>
                            <a href="find.php">Find a Friend</a>
                        </li>
                        <li><a href="profile.php">
                                <?php
                                if ($_SESSION['username'] == '')
                                    echo "Profile";
                                else
                                    echo "Hi, " . $_SESSION['username'] . "!";
                                ?>
                            </a></li>
                        <li class="break"><a href="right-sidebar.php">Inquiries</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </nav>

            </div>
        </div>

        <!-- Main -->
        <div class="wrapper">
            <div class="container" id="main">

                <section class="col-6 col-12-narrower">
                    <header>
                        <h1 style="text-align:center;">Add an Animal</h1>
                    </header>
                    <form method="post" action="#">
                        <div class="row gtr-50">
                            <div class="col-12" style="text-align:center; width:40%; ">
                                <input name="name" placeholder="Name" type="text" maxlength="100" minlength="1" />
                            </div>
                            <div class="col-12" style="text-align:center; width:20%; ">
                                <select name="a_type">
                                    <option value="D">Dog</option>
                                    <option value="C">Cat</option>
                                    <option value="H">Horse</option>
                                    <option value="I">Insect</option>
                                    <option value="F">Fish</option>
                                    <option value="S">Snake</option>
                                    <option value="B">Bird</option>
                                </select>
                            </div>
                            <div class="col-12" style="text-align:center; width:20%; ">
                                <select name="sex">
                                    <option value="M">Male</option>
                                    <option value="F">Female</option>
                                </select>
                            </div>
                            <div class="col-12" style="text-align:center; width:20%; ">
                                <input name="breed" placeholder="Breed" type="text" maxlength="50" minlength="1" />
                            </div>
                            <div class="col-12" style="text-align:center; width:40%; ">
                                <input name="color" placeholder="Color" type="text" maxlength="50" minlength="1" />
                            </div>
                            <div class="col-12" style="text-align:center; width:20%; ">
                                <select name="vac">
                                    <option value="1">Vaccinated</option>
                                    <option value="0">Not Vaccinated</option>
                                </select>
                            </div>
                            <div class="col-12" style="text-align:center; width:40%; ">
                                <input name="diet" placeholder="Diet" type="text" maxlength="200" minlength="1" />
                            </div>

                            <div class="col-12" style="text-align:center; width:20%; ">
                                <input name="weight" placeholder="Weight" type="number" min="0" step=".01" />
                            </div>
                            <div class="col-12" style="text-align:center; width:20%; ">
                                <input name="height" placeholder="Height" type="number" min="0" step=".01" />
                            </div>

                            <div class="col-12" style="text-align:center; width:20%; ">
                                <input type="date" name="DOB">
                            </div>

                            <div class="col-12" style="text-align:center; width:20%; ">
                                <select name="kid_friendly">
                                    <option value="1">Kid Friendly</option>
                                    <option value="0">not Kid Friendly</option>
                                </select>
                            </div>
                            <div class="col-12" style="text-align:center; width:20%; ">
                                <select name="avail">
                                    <option value="1">Available</option>
                                    <option value="0">Not Available</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <textarea name="description" placeholder="Description" maxlength="500"></textarea>
                            </div>
                            <div class="col-12">
                                <ul class="actions" style="text-align:center;">
                                    <li><input type="Submit" value="Add animal" /></li>
                                    <li><a href="profile.php" class="button">Cancel</a></li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>

        <!-- Footer -->
        <div id="footer-wrapper">
            <div id="footer" class="container">
                <header class="major">
                    <h2>UTAnimals Cares about your friends</h2>
                    <p>We at UTAnimals value our guest as much as our own family.<br> Please take care of our family members when adopting. </p>
                </header>
            </div>
        </div>

    </div>

    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.dropotron.min.js"></script>
    <script src="assets/js/browser.min.js"></script>
    <script src="assets/js/breakpoints.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>

</body>

</html>