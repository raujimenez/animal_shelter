<?php
session_start();
if ($_SESSION['p_type'] != 'u' && $_SESSION['p_type'] != 'a')
    header('Location: login.php');
if ($_SESSION['p_type'] != 'a')
    header('Location: inquiry_admin.php');
include("src/initialization.php");
$conn = OpenCon();
$inquiry_row = $_SESSION['inquiry_answer'];
$aid = $inquiry_row['AID'];
$user_pid = $inquiry_row['U_PID'];
$pid = $_SESSION['pid'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $answer = $_POST['a_ans'];
    $i_id = $inquiry_row['Inquiry_id'];
    $added_date = date("Y-m-d H:i:s");
    if (!empty($answer)) {
            $conn->query("INSERT INTO answers VALUES ('$pid','$added_date', '$answer');");
            $conn->query("UPDATE inquiry SET A_PID='$pid', a_date='$added_date' WHERE Inquiry_id='$i_id';");
            header('Location: profile.php');
        }
}

?>

<!DOCTYPE HTML>
<html>

<head>
    <title>Admin Answer</title>
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
                                <h3>
                                    <?php
                                    $result_user = $conn->query("SELECT * from profile where PID='$user_pid';");
                                    $result_u = $result_user->fetch_assoc();
                                    echo $result_u['Uname'] . "'s" . " inquiry about ";
                                    $result_animal = $conn->query("SELECT * from animal where AID='$aid';");
                                    $result_a = $result_animal->fetch_assoc();
                                    echo $result_a['Name'] . ": ";
                                    ?>
                                </h3>
                                <p>
                                    "
                                    <?php
                                    $question = $inquiry_row['u_q'];
                                    echo $question;
                                    ?>
                                    "
                                </p>
                            </div>
                            <div class="col-12">
                                <textarea name="a_ans" placeholder="Answer Question" maxlength="500"></textarea>
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