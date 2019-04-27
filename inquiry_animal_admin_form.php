<?php
session_start();
if ($_SESSION['p_type'] != 'u' && $_SESSION['p_type'] != 'a')
    header('Location: login.php');
if ($_SESSION['p_type'] != 'a')
    header('Location: inquiry_admin.php');
include("src/initialization.php");
$current_animal = $_SESSION['inquiry_admin_aid'];
$curr_aid = $current_animal['AID'];
$pid = $_SESSION['pid'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $inquiry_id = $_POST['inquiry_id'];
    if (!empty($inquiry_id)) {
            $sql = "SELECT * from inquiry where Inquiry_id='$inquiry_id' and AID='$curr_aid';";
            $conn = OpenCon();
            $result = $conn->query($sql);
            if ($result->num_rows != 1) { } else {
                    $_SESSION['inquiry_answer'] = $result->fetch_assoc();
                    header('Location: admin_answer.php');
                }
        }
}
?>

<!DOCTYPE HTML>
<html>

<head>
    <title>Adopt Pet</title>
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
                <section class="col-6 col-12-narrower">
                    <div style="text-align:center;margin-left:auto;margin-right:auto;">
                        <h3>
                            Here are the inquiries for <?php echo $current_animal['Name']; ?>
                            <h3>
                    </div>
                </section>
                <section class="col-6 col-12-narrower">
                    <form method="post" action="#">
                        <div class="row gtr-50" style="text-align:center;">
                            <table style="border:1px solid black;width:100%;">
                                <tr style="border:1px solid black;">
                                    <th colspan="7">INQUIRYs
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan="1" style="border:1px solid black;">Inquiry ID</th>
                                    <th colspan="1" style="border:1px solid black;">User Question</th>
                                    <th colspan="1" style="border:1px solid black;">User ID</th>
                                    <th colspan="1" style="border:1px solid black;">Admin ID</th>
                                    <th colspan="1" style="border:1px solid black;">Animal ID</th>
                                    <th colspan="1" style="border:1px solid black;">Date of Question</th>
                                    <th colspan="1" style="border:1px solid black;">Response Date</th>

                                </tr>
                                <?php
                                $conn = OpenCon();
                                $get_donation_sql = "SELECT * FROM inquiry where AID='$curr_aid' and A_PID IS NULL;";
                                $donation_aid_arr = $conn->query($get_donation_sql);
                                while ($donation_aid = $donation_aid_arr->fetch_assoc()) {
                                    echo "<tr style=\"text-align:center;\">";
                                    echo "<td>" . $donation_aid['Inquiry_id'] . "</td>";
                                    echo "<td>" . $donation_aid['u_q'] . "</td>";
                                    echo "<td>" . $donation_aid['U_PID'] . "</td>";
                                    echo "<td>" . $donation_aid['A_PID'] . "</td>";
                                    echo "<td>" . $donation_aid['AID'] . "</td>";
                                    echo "<td>" . $donation_aid['u_date'] . "</td>";
                                    echo "<td>" . $donation_aid['a_date'] . "</td>";

                                    echo "</td></tr>";
                                }
                                $conn->close();
                                ?>
                            </table>
                        </div>
                        <br />
                        <div class="col-12" style="text-align:center; width:100%; ">
                            <h3>Enter the inquiry ID to answer that inquiry </h3>
                            <br />
                        </div>
                        <div class="col-12" style="text-align:center; width:100%; ">
                            <input name="inquiry_id" placeholder="Inquiry ID" type="text" maxlength="100" minlength="1" />
                        </div>
                        <br />
                        <div class="col-12">
                            <ul class="actions" style="text-align:center;">
                                <li><input type="Submit" value="Continue" /></li>
                                <li><a href="inquiry_admin.php" class="button">Go Back</a></li>
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

    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.dropotron.min.js"></script>
    <script src="assets/js/browser.min.js"></script>
    <script src="assets/js/breakpoints.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>

</body>

</html>