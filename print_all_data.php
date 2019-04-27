<?php
session_start();


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
                                    <th colspan="5">DONATIONs
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan="1" style="border:1px solid black;">Donate id</th>
                                    <th colspan="1" style="border:1px solid black;">Users ID</th>
                                    <th colspan="1" style="border:1px solid black;">Anima ID</th>
                                    <th colspan="1" style="border:1px solid black;">Date</th>
                                    <th colspan="1" style="border:1px solid black;">Amount</th>
                                </tr>
                                <?php
                                $conn = OpenCon();
                                $get_donation_sql = "SELECT * FROM donates_to;";
                                $donation_aid_arr = $conn->query($get_donation_sql);
                                while ($donation_aid = $donation_aid_arr->fetch_assoc()) {
                                    echo "<tr style=\"text-align:center;\">";
                                    echo "<td>" . $donation_aid['d_id'] . "</td>";
                                    echo "<td>" . $donation_aid['AID'] . "</td>";
                                    echo "<td>" . $donation_aid['PID'] . "</td>";
                                    echo "<td>" . $donation_aid['D_date'] . "</td>";
                                    echo "<td>" . "\$" . number_format($donation_aid['Amount'], 2) . "</td></tr>";
                                }
                                $conn->close();
                                ?>
                            </table>
                            <table style="border:1px solid black;width:100%;">
                                <tr style="border:1px solid black;">
                                    <th colspan="4">Adoption
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan="1" style="border:1px solid black;">User ID</th>
                                    <th colspan="1" style="border:1px solid black;">Animal ID</th>
                                    <th colspan="1" style="border:1px solid black;">Date</th>
                                    <th colspan="1" style="border:1px solid black;">Fee</th>
                                </tr>
                                <?php
                                $conn = OpenCon();
                                $get_donation_sql = "SELECT * FROM adoption;";
                                $donation_aid_arr = $conn->query($get_donation_sql);
                                while ($donation_aid = $donation_aid_arr->fetch_assoc()) {
                                    echo "<tr style=\"text-align:center;\">";
                                    echo "<td>" . $donation_aid['AID'] . "</td>";
                                    echo "<td>" . $donation_aid['PID'] . "</td>";
                                    echo "<td>" . $donation_aid['adopt_date'] . "</td>";
                                    echo "<td>" . "\$" . number_format($donation_aid['fee'], 2) . "</td></tr>";
                                }
                                $conn->close();
                                ?>
                            </table>
                            <table style="border:1px solid black;width:100%;">
                                <tr style="border:1px solid black;">
                                    <th colspan="4">Adoption
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan="1" style="border:1px solid black;">User ID</th>
                                    <th colspan="1" style="border:1px solid black;">Animal ID</th>
                                    <th colspan="1" style="border:1px solid black;">Date</th>
                                    <th colspan="1" style="border:1px solid black;">Fee</th>
                                </tr>
                                <?php
                                $conn = OpenCon();
                                $get_donation_sql = "SELECT * FROM adoption;";
                                $donation_aid_arr = $conn->query($get_donation_sql);
                                while ($donation_aid = $donation_aid_arr->fetch_assoc()) {
                                    echo "<tr style=\"text-align:center;\">";
                                    echo "<td>" . $donation_aid['AID'] . "</td>";
                                    echo "<td>" . $donation_aid['PID'] . "</td>";
                                    echo "<td>" . $donation_aid['adopt_date'] . "</td>";
                                    echo "<td>" . "\$" . number_format($donation_aid['fee'], 2) . "</td></tr>";
                                }
                                $conn->close();
                                ?>
                            </table>
                            <table style="border:1px solid black;max-width:100%;">
                                <tr style="border:1px solid black;">
                                    <th colspan="17">ANIMALs
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan="1" style="border:1px solid black;">Animal ID</th>
                                    <th colspan="1" style="border:1px solid black;">Admin ID (Added)</th>
                                    <th colspan="1" style="border:1px solid black;">Admin ID (Removed)</th>
                                    <th colspan="1" style="border:1px solid black;">Animal Name</th>
                                    <th colspan="1" style="border:1px solid black;">Animal Type</th>
                                    <th colspan="1" style="border:1px solid black;">Sex</th>
                                    <th colspan="1" style="border:1px solid black;">Color</th>
                                    <th colspan="1" style="border:1px solid black;">Diet</th>
                                    <th colspan="1" style="border:1px solid black;">Available</th>
                                    <th colspan="1" style="border:1px solid black;">Weight</th>
                                    <th colspan="1" style="border:1px solid black;">Height</th>
                                    <th colspan="1" style="border:1px solid black;">Date of Birth</th>
                                    <th colspan="1" style="border:1px solid black;">Kid Friendly</th>
                                    <th colspan="1" style="border:1px solid black;">Vaccinated</th>
                                    <th colspan="1" style="border:1px solid black;">Description</th>
                                    <th colspan="1" style="border:1px solid black;">Added Date</th>
                                    <th colspan="1" style="border:1px solid black;">Breed</th>
                                </tr>
                                <?php
                                $conn = OpenCon();
                                $get_donation_sql = "SELECT * FROM animal;";
                                $donation_aid_arr = $conn->query($get_donation_sql);
                                while ($donation_aid = $donation_aid_arr->fetch_assoc()) {
                                    echo "<tr style=\"text-align:center;\">";
                                    echo "<td>" . $donation_aid['AID'] . "</td>";
                                    echo "<td>" . $donation_aid['Added_by'] . "</td>";
                                    echo "<td>" . $donation_aid['Removed_by'] . "</td>";
                                    echo "<td>" . $donation_aid['Name'] . "</td>";
                                    echo "<td>" . $donation_aid['A_TYPE'] . "</td>";
                                    echo "<td>" . $donation_aid['Sex'] . "</td>";
                                    echo "<td>" . $donation_aid['Color'] . "</td>";
                                    echo "<td>" . $donation_aid['Diet'] . "</td>";
                                    echo "<td>" . $donation_aid['Available'] . "</td>";
                                    echo "<td>" . $donation_aid['Weight'] . "</td>";
                                    echo "<td>" . $donation_aid['Height'] . "</td>";
                                    echo "<td>" . $donation_aid['DoB'] . "</td>";
                                    echo "<td>" . $donation_aid['is_kid_friendly'] . "</td>";
                                    echo "<td>" . $donation_aid['is_vac'] . "</td>";
                                    echo "<td>" . $donation_aid['Description'] . "</td>";
                                    echo "<td>" . $donation_aid['A_date'] . "</td>";
                                    echo "<td>" . $donation_aid['Breed'] . "</td>";
                                    echo "</td></tr>";
                                }
                                $conn->close();
                                ?>
                            </table>
                            <table style="border:1px solid black;width:100%;">
                                <tr style="border:1px solid black;">
                                    <th colspan="11">PROFILEs
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan="1" style="border:1px solid black;">Profile ID</th>
                                    <th colspan="1" style="border:1px solid black;">Email</th>
                                    <th colspan="1" style="border:1px solid black;">Phone</th>
                                    <th colspan="1" style="border:1px solid black;">First Name</th>
                                    <th colspan="1" style="border:1px solid black;">Last Name</th>
                                    <th colspan="1" style="border:1px solid black;">Middle Initital</th>
                                    <th colspan="1" style="border:1px solid black;">Join Date</th>
                                    <th colspan="1" style="border:1px solid black;">Profile Type</th>
                                    <th colspan="1" style="border:1px solid black;">Password</th>
                                    <th colspan="1" style="border:1px solid black;">Username</th>
                                    <th colspan="1" style="border:1px solid black;">Social Security number</th>
                                </tr>
                                <?php
                                $conn = OpenCon();
                                $get_donation_sql = "SELECT * FROM profile;";
                                $donation_aid_arr = $conn->query($get_donation_sql);
                                while ($donation_aid = $donation_aid_arr->fetch_assoc()) {
                                    echo "<tr style=\"text-align:center;\">";
                                    echo "<td>" . $donation_aid['PID'] . "</td>";
                                    echo "<td>" . $donation_aid['Email'] . "</td>";
                                    echo "<td>" . $donation_aid['Phone'] . "</td>";
                                    echo "<td>" . $donation_aid['Fname'] . "</td>";
                                    echo "<td>" . $donation_aid['Lname'] . "</td>";
                                    echo "<td>" . $donation_aid['Minit'] . "</td>";
                                    echo "<td>" . $donation_aid['Jdate'] . "</td>";
                                    echo "<td>" . $donation_aid['P_TYPE'] . "</td>";
                                    echo "<td>" . $donation_aid['P_Password'] . "</td>";
                                    echo "<td>" . $donation_aid['Uname'] . "</td>";
                                    echo "<td>" . $donation_aid['Ssn'] . "</td>";
                                    echo "</td></tr>";
                                }
                                $conn->close();
                                ?>
                            </table>
                            <table style="border:1px solid black;width:100%;">
                                <tr style="border:1px solid black;">
                                    <th colspan="2">DOGs
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan="1" style="border:1px solid black;">Animal ID</th>
                                    <th colspan="1" style="border:1px solid black;">Can Reproduce</th>

                                </tr>
                                <?php
                                $conn = OpenCon();
                                $get_donation_sql = "SELECT * FROM dog;";
                                $donation_aid_arr = $conn->query($get_donation_sql);
                                while ($donation_aid = $donation_aid_arr->fetch_assoc()) {
                                    echo "<tr style=\"text-align:center;\">";
                                    echo "<td>" . $donation_aid['AID'] . "</td>";
                                    echo "<td>" . $donation_aid['canReproduce'] . "</td>";
                                    echo "</td></tr>";
                                }
                                $conn->close();
                                ?>
                            </table>
                            <table style="border:1px solid black;width:100%;">
                                <tr style="border:1px solid black;">
                                    <th colspan="3">BIRDs
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan="1" style="border:1px solid black;">Animal ID</th>
                                    <th colspan="1" style="border:1px solid black;">Wing Span</th>
                                    <th colspan="1" style="border:1px solid black;">Noisy</th>
                                </tr>
                                <?php
                                $conn = OpenCon();
                                $get_donation_sql = "SELECT * FROM bird;";
                                $donation_aid_arr = $conn->query($get_donation_sql);
                                while ($donation_aid = $donation_aid_arr->fetch_assoc()) {
                                    echo "<tr style=\"text-align:center;\">";
                                    echo "<td>" . $donation_aid['AID'] . "</td>";
                                    echo "<td>" . $donation_aid['w_span'] . "</td>";
                                    echo "<td>" . $donation_aid['isNoisy'] . "</td>";

                                    echo "</td></tr>";
                                }
                                $conn->close();
                                ?>
                            </table>
                            <table style="border:1px solid black;width:100%;">
                                <tr style="border:1px solid black;">
                                    <th colspan="3">CATs
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan="1" style="border:1px solid black;">Animal ID</th>
                                    <th colspan="1" style="border:1px solid black;">Declawed</th>
                                    <th colspan="1" style="border:1px solid black;">Can Reproduce</th>
                                </tr>
                                <?php
                                $conn = OpenCon();
                                $get_donation_sql = "SELECT * FROM cat;";
                                $donation_aid_arr = $conn->query($get_donation_sql);
                                while ($donation_aid = $donation_aid_arr->fetch_assoc()) {
                                    echo "<tr style=\"text-align:center;\">";
                                    echo "<td>" . $donation_aid['AID'] . "</td>";
                                    echo "<td>" . $donation_aid['isDeclaw'] . "</td>";
                                    echo "<td>" . $donation_aid['canReproduce'] . "</td>";

                                    echo "</td></tr>";
                                }
                                $conn->close();
                                ?>
                            </table>
                            <table style="border:1px solid black;width:100%;">
                                <tr style="border:1px solid black;">
                                    <th colspan="3">FISHs
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan="1" style="border:1px solid black;">Animal ID</th>
                                    <th colspan="1" style="border:1px solid black;">Water Type</th>
                                    <th colspan="1" style="border:1px solid black;">Tank Size</th>
                                </tr>
                                <?php
                                $conn = OpenCon();
                                $get_donation_sql = "SELECT * FROM fish;";
                                $donation_aid_arr = $conn->query($get_donation_sql);
                                while ($donation_aid = $donation_aid_arr->fetch_assoc()) {
                                    echo "<tr style=\"text-align:center;\">";
                                    echo "<td>" . $donation_aid['AID'] . "</td>";
                                    echo "<td>" . $donation_aid['w_type'] . "</td>";
                                    echo "<td>" . $donation_aid['Tanksize'] . "</td>";

                                    echo "</td></tr>";
                                }
                                $conn->close();
                                ?>
                            </table>
                            <table style="border:1px solid black;width:100%;">
                                <tr style="border:1px solid black;">
                                    <th colspan="3">HORSEs
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan="1" style="border:1px solid black;">Animal ID</th>
                                    <th colspan="1" style="border:1px solid black;">Rideable</th>
                                    <th colspan="1" style="border:1px solid black;">Speed</th>
                                </tr>
                                <?php
                                $conn = OpenCon();
                                $get_donation_sql = "SELECT * FROM horse;";
                                $donation_aid_arr = $conn->query($get_donation_sql);
                                while ($donation_aid = $donation_aid_arr->fetch_assoc()) {
                                    echo "<tr style=\"text-align:center;\">";
                                    echo "<td>" . $donation_aid['AID'] . "</td>";
                                    echo "<td>" . $donation_aid['isRide'] . "</td>";
                                    echo "<td>" . $donation_aid['Speed'] . "</td>";

                                    echo "</td></tr>";
                                }
                                $conn->close();
                                ?>
                            </table>
                            <table style="border:1px solid black;width:100%;">
                                <tr style="border:1px solid black;">
                                    <th colspan="3">INSECTs
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan="1" style="border:1px solid black;">Animal ID</th>
                                    <th colspan="1" style="border:1px solid black;">Poisonous</th>
                                    <th colspan="1" style="border:1px solid black;">Has Wings</th>
                                </tr>
                                <?php
                                $conn = OpenCon();
                                $get_donation_sql = "SELECT * FROM insect;";
                                $donation_aid_arr = $conn->query($get_donation_sql);
                                while ($donation_aid = $donation_aid_arr->fetch_assoc()) {
                                    echo "<tr style=\"text-align:center;\">";
                                    echo "<td>" . $donation_aid['AID'] . "</td>";
                                    echo "<td>" . $donation_aid['is_Poison'] . "</td>";
                                    echo "<td>" . $donation_aid['has_Wings'] . "</td>";

                                    echo "</td></tr>";
                                }
                                $conn->close();
                                ?>
                            </table>
                            <table style="border:1px solid black;width:100%;">
                                <tr style="border:1px solid black;">
                                    <th colspan="3">SNAKEs
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan="1" style="border:1px solid black;">Animal ID</th>
                                    <th colspan="1" style="border:1px solid black;">Poisonous</th>
                                    <th colspan="1" style="border:1px solid black;">length</th>
                                </tr>
                                <?php
                                $conn = OpenCon();
                                $get_donation_sql = "SELECT * FROM snake;";
                                $donation_aid_arr = $conn->query($get_donation_sql);
                                while ($donation_aid = $donation_aid_arr->fetch_assoc()) {
                                    echo "<tr style=\"text-align:center;\">";
                                    echo "<td>" . $donation_aid['AID'] . "</td>";
                                    echo "<td>" . $donation_aid['is_Poison'] . "</td>";
                                    echo "<td>" . $donation_aid['s_Length'] . "</td>";

                                    echo "</td></tr>";
                                }
                                $conn->close();
                                ?>
                            </table>
                            <table style="border:1px solid black;width:100%;">
                                <tr style="border:1px solid black;">
                                    <th colspan="2">LIKEs
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan="1" style="border:1px solid black;">Animal ID</th>
                                    <th colspan="1" style="border:1px solid black;">User ID</th>
                                </tr>
                                <?php
                                $conn = OpenCon();
                                $get_donation_sql = "SELECT * FROM likes;";
                                $donation_aid_arr = $conn->query($get_donation_sql);
                                while ($donation_aid = $donation_aid_arr->fetch_assoc()) {
                                    echo "<tr style=\"text-align:center;\">";
                                    echo "<td>" . $donation_aid['AID'] . "</td>";
                                    echo "<td>" . $donation_aid['PID'] . "</td>";
                                    echo "</td></tr>";
                                }
                                $conn->close();
                                ?>
                            </table>
                            <table style="border:1px solid black;width:100%;">
                                <tr style="border:1px solid black;">
                                    <th colspan="6">INQUIRYs
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan="1" style="border:1px solid black;">User Question</th>
                                    <th colspan="1" style="border:1px solid black;">User ID</th>
                                    <th colspan="1" style="border:1px solid black;">Admin ID</th>
                                    <th colspan="1" style="border:1px solid black;">Animal ID</th>
                                    <th colspan="1" style="border:1px solid black;">Date of Question</th>
                                    <th colspan="1" style="border:1px solid black;">Response Date</th>

                                </tr>
                                <?php
                                $conn = OpenCon();
                                $get_donation_sql = "SELECT * FROM inquiry;";
                                $donation_aid_arr = $conn->query($get_donation_sql);
                                while ($donation_aid = $donation_aid_arr->fetch_assoc()) {
                                    echo "<tr style=\"text-align:center;\">";
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
                            <table style="border:1px solid black;width:100%;">
                                <tr style="border:1px solid black;">
                                    <th colspan="2">SICKNESSes
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan="1" style="border:1px solid black;">Animal ID</th>
                                    <th colspan="1" style="border:1px solid black;">Sickness</th>
                                </tr>
                                <?php
                                $conn = OpenCon();
                                $get_donation_sql = "SELECT * FROM a_sickness;";
                                $donation_aid_arr = $conn->query($get_donation_sql);
                                while ($donation_aid = $donation_aid_arr->fetch_assoc()) {
                                    echo "<tr style=\"text-align:center;\">";
                                    echo "<td>" . $donation_aid['AID'] . "</td>";
                                    echo "<td>" . $donation_aid['Sickness_str'] . "</td>";
                                    echo "</td></tr>";
                                }
                                $conn->close();
                                ?>
                            </table>
                            <table style="border:1px solid black;width:100%;">
                                <tr style="border:1px solid black;">
                                    <th colspan="3">ANSWERs
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan="1" style="border:1px solid black;">Admin ID</th>
                                    <th colspan="1" style="border:1px solid black;">Response Date</th>
                                    <th colspan="1" style="border:1px solid black;">Response</th>
                                </tr>
                                <?php
                                $conn = OpenCon();
                                $get_donation_sql = "SELECT * FROM likes;";
                                $donation_aid_arr = $conn->query($get_donation_sql);
                                while ($donation_aid = $donation_aid_arr->fetch_assoc()) {
                                    echo "<tr style=\"text-align:center;\">";
                                    echo "<td>" . $donation_aid['admin_id'] . "</td>";
                                    echo "<td>" . $donation_aid['a_date'] . "</td>";
                                    echo "<td>" . $donation_aid['a_ans'] . "</td>";
                                    echo "</td></tr>";
                                }
                                $conn->close();
                                ?>
                            </table>
                        </div>
                        <br />
                        <div class="col-12">
                            <ul class="actions" style="text-align:center;">
                                <li><a href="get_donation_info.php" class="button"></a></li>
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