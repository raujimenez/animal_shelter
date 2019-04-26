<?php
session_start();
if ($_SESSION['p_type'] != 'a')
    header('Location: profile.php');
include("src/initialization.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $b_date = date("Y-m-d H:i:s", strtotime($_POST["date"]));
    $temp_date = new DateTime($b_date);
    $temp_date->format("Y-m-d H:i:s");
    $temp_date->modify('+1 day');
    $e_date = date("Y-m-d H:i:s", strtotime($temp_date->format("Y-m-d H:i:s")));
    $_SESSION['b_date'] = $b_date;
    $_SESSION['e_date'] = $e_date;
    header('Location: donation_info.php');
}

?>

<!DOCTYPE HTML>
<html>

<head>
    <title>User Info</title>
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

                <!-- Content -->
                <section class="col-6 col-12-narrower">
                    <form method="post" action="#">
                        <div class="row gtr-50">
                            <div class="col-12" style="text-align:center; width:100%; ">
                                <h3>Date Information</h3>
                                        <p>
                                            Enter a specific date and we will display it.
                                        </p>
                            </div>
                            <div class="col-12" style="text-align:center; width:100%; ">
                                <input name="date" type="date"/>
                            </div>
                            <div class="col-12">

                                <ul class="actions" style="text-align:center;">
                                    <li><input type="Submit" value="Search" /></li>
                                    <li><a href="profile.php" class="button">Cancel</a></li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </section>

                <div class="row features">

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