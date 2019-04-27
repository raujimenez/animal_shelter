<?php
session_start();
if ($_SESSION['p_type'] != 'u' && $_SESSION['p_type'] != 'a')
    header('Location: login.php');
if ($_SESSION['p_type'] != 'a')
    header('Location: profile.php');
include("src/initialization.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $aid = $_POST['aid'];
    $sql = "SELECT * from animal where AID='$aid'";
    $conn = OpenCon();
    $result = $conn->query($sql);
    if ($result->num_rows != 1) { } else {
        $_SESSION['inquiry_admin_aid'] = $result->fetch_assoc();
        $row = $result->fetch_assoc();
        header('Location: inquiry_animal_admin_form.php');
    }
}

?>

<!DOCTYPE HTML>
<html>

<head>
    <title>Inquiry</title>
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
                                <h3>Discover and Answer</h3>
                                <p>
                                    Enter the Animal ID and we will show you all open queries.
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
                            <div class="col-12">
                                <table style="border:1px solid black;width:100%;">
                                    <tr style="border:1px solid black;">
                                        <th colspan="4"> Responses
                                        </th>
                                    </tr>
                                    <tr>
                                        <th colspan="1" style="border:1px solid black;">Username</th>
                                        <th colspan="1" style="border:1px solid black;">Pet Name</th>
                                        <th colspan="1" style="border:1px solid black;">User Question</th>
                                        <th colspan="1" style="border:1px solid black;">Response</th>
                                    </tr>
                                    <?php
                                    $conn = OpenCon();
                                    $a_pid = $_SESSION['pid'];
                                    $get_donation_sql = "SELECT * FROM inquiry where A_PID='$a_pid';";
                                    $donation_aid_arr = $conn->query($get_donation_sql);
                                    while ($donation_aid = $donation_aid_arr->fetch_assoc()) {
                                        $aid = $donation_aid['AID'];
                                        $u_pid = $donation_aid['U_PID'];
                                        echo "<tr style=\"text-align:center;\">";
                                        $result_user = $conn->query("SELECT * from profile where PID='$u_pid';");
                                        $result_u = $result_user->fetch_assoc();
                                        echo "<td>" . $result_u['Uname'] . "</td>";
                                        $result_aid = $conn->query("SELECT * from animal where AID='$aid';");
                                        $result_a = $result_aid->fetch_assoc();
                                        echo "<td>" . $result_a['Name'] . "</td>";
                                        echo "<td>" . $donation_aid['u_q'] . "</td>";
                                        $admin_date = $donation_aid['a_date'];
                                        $result_response = $conn->query("SELECT * from answers where a_date='$admin_date' and admin_id='$a_pid';");
                                        $result_r = $result_response->fetch_assoc();
                                        echo "<td>" . $result_r['a_ans'] . "</td>";
                                        echo "</tr>";
                                    }
                                    $conn->close();
                                    ?>
                                </table>
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