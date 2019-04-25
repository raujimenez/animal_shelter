<?php
session_start();
if(!empty($_SESSION['username']))
{
    header('Location: profile.php');
}
include("src/initialization.php");
$conn = OpenCon();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["username"]) || empty($_POST["password"])) {
            //ensure username and password filled in
        } else {
        $fname = $_POST['Fname'];
        $minit = $_POST['minit'];
        $lname = $_POST['Lname'];
        $email = $_POST['Email'];
        $phone = $_POST['Phone'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $p_type = 'u';
        $j_date = date("Y-m-d H:i:s");

        $sql = "INSERT INTO profile (Fname, Minit, Lname, Email, Phone, uname, P_Password, P_TYPE, Jdate) VALUES ('$fname', '$minit', '$lname','$email','$phone','$username','$password','$p_type','$j_date');";
        if ($conn->query($sql) == true) {
                $result = $conn->query("SELECT * FROM PROFILE WHERE Uname = '$username' AND P_Password = '$password';");
                $all_user_info = $result->fetch_assoc();
                $_SESSION['pid'] = $all_user_info['PID'];
                $_SESSION['fname'] = $all_user_info['Fname'];
                $_SESSION['minit'] = $all_user_info['Minit'];
                $_SESSION['lname'] = $all_user_info['Lname'];
                $_SESSION['phone'] = $all_user_info['Phone'];
                $_SESSION['email'] = $all_user_info['Email'];
                $_SESSION['p_type'] = $all_user_info['P_TYPE'];
                $_SESSION['username'] = $all_user_info['Uname'];
                $_SESSION['password'] = $all_user_info['P_Password'];
                header('Location: profile.php');
            }
    }
}
$conn->close();
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
                    <form method="post" action="#">
                        <div class="row gtr-50">
                            <div class="col-12" style="text-align:center; width:40%; ">
                                <input name="Fname" placeholder="First Name" type="text" maxlength="100" minlength="1"/>
                            </div>
                            <div class="col-12" style="text-align:center; width:20%;">
                                <input name="Minit" placeholder="Middle Initial" type="text" maxlength="1" minlength="0"/>
                            </div>

                            <div class="col-12" style="text-align:center; width:40%; ">
                                <input name="Lname" placeholder="Last Name" type="text" maxlength="100" minlength="1"/>
                            </div>

                            <div class="col-12" style="text-align:center;">
                                <input name="Email" placeholder="Email" type="text" maxlength="100" minlength="1"/>
                            </div>
                            <div class="col-12" style="text-align:center;">
                                <input name="Phone" placeholder="Phone Number 1234567890" type="text" maxlength="12" minlength="12" />
                            </div>
                            <div class="col-12" style="text-align:center;">
                                <input name="username" placeholder="username" type="text" maxlength="12" minlength="1"/>
                            </div>

                            <div class="col-12" style="text-align:center;">
                                <input name="password" placeholder="password" type="text" maxlength="12" minlength="1"/>
                            </div>

                            <div class="col-12">
                                <ul class="actions" style="text-align:center;">
                                    <li><input type="Submit" value="Create Account" /></li>
                                    <li><a href="login.php" class="button">Login in</a></li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </section>


                <div class="row features">
                    <section class="col-4 col-12-narrower feature">
                        <div class="image-wrapper first">
                            <a href="#" class="image featured"><img src="images/snake.jpg" alt="" /></a>
                        </div>
                        <header>
                            <h3>Super Snakes</h3>
                        </header>
                        <p>Whether they are constricting or slithering these snakes are ready to grab onto a new family and never let go.</p>
                        <ul class="actions">
                            <li><a href="#" class="button">Learn more</a></li>
                        </ul>
                    </section>
                    <section class="col-4 col-12-narrower feature">
                        <div class="image-wrapper">
                            <a href="#" class="image featured"><img src="images/bird.jpg" alt="" /></a>
                        </div>
                        <header>
                            <h3>Busy Birds</h3>
                        </header>
                        <p>These birds are all over the place! They love to sing, fly, and play. While they build their nest will you let them stay in yours?</p>
                        <ul class="actions">
                            <li><a href="#" class="button">Learn more</a></li>
                        </ul>
                    </section>
                    <section class="col-4 col-12-narrower feature">
                        <div class="image-wrapper">
                            <a href="#" class="image featured"><img src="images/horse.jpg" alt="" /></a>
                        </div>
                        <header>
                            <h3>Majestic Horses</h3>
                        </header>
                        <p>Not quite unicorns, but they are the next best thing! These horses love the outdoors and would love a caring family to give rides to.</p>
                        <ul class="actions">
                            <li><a href="#" class="button">Learn more</a></li>
                        </ul>
                    </section>
                </div>
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