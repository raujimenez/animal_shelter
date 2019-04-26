<?php
session_start();
if ($_SESSION['p_type'] != 'u')
    header('Location: profile.php');
include("src/initialization.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $aid = $_POST['aid'];
    $sql = "SELECT * from animal where AID='$aid'";
    $conn = OpenCon();
    $result = $conn->query($sql);
    if ($result->num_rows != 1) { } else {
        $_SESSION['adopt_aid'] = $result->fetch_assoc();
        $row = $result->fetch_assoc();
        header('Location: donate_confirm.php');
    }
}

?>

<!DOCTYPE HTML>
<html>

<head>
    <title>Donate</title>
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
                                <h3>Donate</h3>
                                        <p>
                                            Search for a specific friend, then donate.
                                        </p>
                            </div>
                            <div class="col-12" style="text-align:center; width:100%; ">
                                <input name="aid" placeholder="Animal ID" type="text" maxlength="100" minlength="1" />
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