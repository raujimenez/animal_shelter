<?php
session_start();
if ($_SESSION['p_type'] != 'a')
    header('Location: profile.php');
include("src/initialization.php");
$conn = OpenCon();
$row = $_SESSION['user_uname'];
$uname = $row['Uname'];
$pid = $row['PID'];
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
                    <div style="text-align:center;margin-left:auto;margin-right:auto;">
                        <h3>
                            Here is the information for <?php echo $uname; ?>
                            <h3>
                    </div>
                </section>
                <section class="col-6 col-12-narrower">
                    <form method="post" action="#">
                        <div class="row gtr-50" style="text-align:center;">
                            <table style="border:1px solid black;width:100%;">
                                <tr style="border:1px solid black;">
                                    <th colspan="3">Adopted Pets</th>
                                </tr>
                                <tr>
                                    <th colspan="1" style="border:1px solid black;">Name</th>
                                    <th colspan="1" style="border:1px solid black;">Date</th>
                                    <th colspan="1" style="border:1px solid black;">Fee</th>
                                </tr>
                                <?php
                                $conn = OpenCon();
                                $n_pid = $pid;
                                $get_adoptions_sql = "SELECT * FROM adoption where PID=$n_pid;";
                                $adoption_aid_arr = $conn->query($get_adoptions_sql);
                                while ($adoption_aid = $adoption_aid_arr->fetch_assoc()) {
                                    $new_aid = $adoption_aid['AID'];
                                    $names = $conn->query("SELECT * from animal where AID=$new_aid;");
                                    $name = $names->fetch_assoc();
                                    echo "<tr style=\"text-align:center;\"><td>" . $name['Name'] . "</td>";
                                    echo "<td>" . $adoption_aid['adopt_date'] . "</td>";
                                    echo "<td>" . "\$" . number_format($adoption_aid['fee'], 2) . "</td></tr>";
                                }
                                $conn->close();
                                ?>
                            </table>
                            <br />
                            <table style="border:1px solid black;width:100%;">
                                <tr style="border:1px solid black;">
                                    <th colspan="3">Donations</th>
                                </tr>
                                <tr>
                                    <th colspan="1" style="border:1px solid black;">Name</th>
                                    <th colspan="1" style="border:1px solid black;">Date</th>
                                    <th colspan="1" style="border:1px solid black;">Amount</th>
                                </tr>
                                <?php
                                $conn = OpenCon();
                                $new_pid = $pid;
                                $get_donations_sql = "SELECT * FROM donates_to where PID=$new_pid;";
                                $donations_arr = $conn->query($get_donations_sql);
                                while ($donation_aid = $donations_arr->fetch_assoc()) {
                                    $n_aid = $donation_aid['AID'];
                                    $names_d = $conn->query("SELECT * from animal where AID=$n_aid;");
                                    $name_d = $names_d->fetch_assoc();
                                    echo "<tr style=\"text-align:center;\"><td>" . $name_d['Name'] . "</td>";
                                    echo "<td>" . $donation_aid['D_date'] . "</td>";
                                    echo "<td>" . "\$" . number_format($donation_aid['Amount'], 2) . "</td></tr>";
                                }
                                $conn->close();
                                ?>
                            </table>
                            <table style="border:1px solid black;width:100%;">
                                <tr style="border:1px solid black;">
                                    <th colspan="1">Likes</th>
                                </tr>
                                <?php
                                $conn = OpenCon();
                                $get_donations_sql = "SELECT * FROM likes where PID=$pid;";
                                $donations_arr = $conn->query($get_donations_sql);
                                while ($donation_aid = $donations_arr->fetch_assoc()) {
                                    $n_aid = $donation_aid['AID'];
                                    $names_d = $conn->query("SELECT * from animal where AID=$n_aid;");
                                    $name_d = $names_d->fetch_assoc();
                                    echo "<tr style=\"text-align:center;\"><td>" . $name_d['Name'] . "</td>";
                                    
                                }
                                $conn->close();
                                ?>
                            </table>
                            <div class="col-12">
                                <ul class="actions" style="text-align:center;">
                                    <li><a href="get_user_info.php" class="button">Search again</a></li>
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