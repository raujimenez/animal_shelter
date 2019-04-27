<?php
session_start();
if ($_SESSION['p_type'] != 'a')
    header('Location: profile.php');
include("src/initialization.php");

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
                            Here you go
                            <h3>
                    </div>
                </section>
                <section class="col-6 col-12-narrower">
                    <form method="post" action="#">
                        <div class="row gtr-50" style="text-align:center;">
                            <table style="border:1px solid black;width:100%;">
                                <tr style="border:1px solid black;">
                                    <th colspan="4">Donations from
                                        <?php
                                        echo '( ' . $_SESSION['b_date'] . ' ) to ' . '( ' . $_SESSION['e_date'] . ' ) ';
                                        ?>
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan="1" style="border:1px solid black;">Users Name</th>
                                    <th colspan="1" style="border:1px solid black;">Animal Name</th>
                                    <th colspan="1" style="border:1px solid black;">Date</th>
                                    <th colspan="1" style="border:1px solid black;">Amount</th>
                                </tr>
                                <?php
                                $conn = OpenCon();
                                $b_date = $_SESSION['b_date'];
                                $e_date = $_SESSION['e_date'];
                                $get_donation_sql = "SELECT * FROM donates_to where D_date between '$b_date' and '$e_date';";
                                $donation_aid_arr = $conn->query($get_donation_sql);
                                while ($donation_aid = $donation_aid_arr->fetch_assoc()) {
                                    $new_aid = $donation_aid['AID'];
                                    $new_pid = $donation_aid['PID'];
                                    $a_names = $conn->query("SELECT * from animal where AID=$new_aid;");
                                    $u_names = $conn->query("SELECT * from profile where PID=$new_pid;");
                                    $u_name = $u_names->fetch_assoc();
                                    $a_name = $a_names->fetch_assoc();
                                    echo "<tr style=\"text-align:center;\"><td>" . $a_name['Name'] . "</td>";
                                    echo "<td>" . $u_name['Fname'] . " " . $u_name['Minit'] . ". " . $u_name['Lname'] . "</td>";
                                    echo "<td>" . $donation_aid['D_date'] . "</td>";
                                    echo "<td>" . "\$" . number_format($donation_aid['Amount'], 2) . "</td></tr>";
                                }
                                $conn->close();
                                ?>
                            </table>
                            <br />
                            <div class="col-12">
                                <ul class="actions" style="text-align:center;">
                                    <li><a href="get_donation_info.php" class="button">Search again</a></li>
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