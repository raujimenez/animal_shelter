<?php
session_start();
if(!empty($_SESSION['username']))
{
    header('Location: profile.php');
}
include("src/initialization.php");
$conn = OpenCon();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT Uname, P_Password FROM PROFILE WHERE Uname = '$username' AND P_Password = '$password';";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $new_result = $conn->query("SELECT * FROM PROFILE WHERE Uname = '$username' AND P_Password = '$password';");
        $all_user_info = $new_result->fetch_assoc();
        $_SESSION['pid'] = $all_user_info['PID'];
        $_SESSION['fname'] = $all_user_info['Fname'];
        $_SESSION['minit'] = $all_user_info['Minit'];
        $_SESSION['lname'] = $all_user_info['Lname'];
        $_SESSION['phone'] = $all_user_info['Phone'];
        $_SESSION['email'] = $all_user_info['Email'];
        $_SESSION['p_type'] = $all_user_info['P_TYPE'];
        $_SESSION['username'] = $all_user_info['Uname'];
        $_SESSION['password'] = $all_user_info['P_Password'];
        $_SESSION['jdate'] = $all_user_info['Jdate'];
        header('Location: profile.php');
    }
}
?>

<!DOCTYPE HTML>
<html>

<head>
    <title>UTAnimals</title>
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
                        <li class="break"><a href="inquiry.php">Inquiries</a></li>
                        <li><a href="logout.php">Logout</a></li>
                </nav>

            </div>
        </div>

        <!-- Main -->
        <div class="wrapper">
            <div class="container" id="main">
                
                <section class="col-6 col-12-narrower">
                    <header><h3 style="text-align:center;">Welcome<br/> Please login to use this wonderful system!</h3></header>
                    <form method="post" action="#">
                        <div class="row gtr-50">
                            <div class="col-12" style="text-align:center; width:50%; ">
                                <input name="username" placeholder="username" type="text" maxlength="12" minlength="1"/>
                            </div>
                            <div class="col-12" style="text-align:center; width:50%; ">
                                <input name="password" placeholder="password" type="text" maxlength="12" minlength="1"/>
                            </div>
                            <div class="col-12">
                                <ul class="actions" style="text-align:center;">
                                    <li><input type="Submit" value="Login" /></li>
                                    <li><a href="signup.php" class="button">Sign up</a></li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </section>


                <div class="row features">
                    <section class="col-4 col-12-narrower feature">
                        <div class="image-wrapper first">
                            <a href="#" class="image featured"><img src="images/dog.jpg" alt="" /></a>
                        </div>
                        <header>
                            <h3>Doggy Mayhem</h3>
                        </header>
                        <p>These dogs know how to wrestle and play. Don't let their good behavior fool you! These are the most playful of dogs.</p>
                        <ul class="actions">
                            <li><a href="#" class="button">Learn more</a></li>
                        </ul>
                    </section>
                    <section class="col-4 col-12-narrower feature">
                        <div class="image-wrapper">
                            <a href="#" class="image featured"><img src="images/fish.jpg" alt="" /></a>
                        </div>
                        <header>
                            <h3>Fishy Business</h3>
                        </header>
                        <p>These fish are sharks. Literally! While they are Kings and Queens of the ocean they can also be lovable fishy pets.</p>
                        <ul class="actions">
                            <li><a href="#" class="button">Learn more</a></li>
                        </ul>
                    </section>
                    <section class="col-4 col-12-narrower feature">
                        <div class="image-wrapper">
                            <a href="#" class="image featured"><img src="images/cat.jpg" alt="" /></a>
                        </div>
                        <header>
                            <h3>Kitty Kats</h3>
                        </header>
                        <p>Their ancestors were the kings of the jungle and they still think they are royalty. These cats are as pretigious as they come!</p>
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