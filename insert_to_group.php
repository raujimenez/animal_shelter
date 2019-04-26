<?php
session_start();
$a_type = $_SESSION['a_type'];
$aid = $_SESSION['NEW_AID'];
if ($_SESSION['p_type'] != 'a')
    header('Location: profile.php');

include("src/initialization.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sql = ";";
    switch ($a_type) {
        case 'D':
            $can_reproduce = $_POST['att1'];
            $sql = "INSERT INTO dog (AID, canReproduce) VALUES ($aid, $can_reproduce);";
            break;
        case 'C':
            $is_declaw = $_POST['att1'];
            $can_reproduce = $_POST['att2'];
            $sql = "INSERT INTO cat (AID, isDeclaw, canReproduce) VALUES ($aid, $is_declaw, $can_reproduce);";
            break;
        case 'H':
            $is_ride = $_POST['att1'];
            $speed = $_POST['att2'];
            $sql = "INSERT INTO horse (AID, isRide, Speed) VALUES ($aid, $is_ride, $speed);";            
            break;
        case 'I':
            $is_poison = $_POST['att1'];
            $has_wings = $_POST['att2'];
            $sql = "INSERT INTO insect (AID, is_Poison, has_Wings) VALUES ($aid, $is_poison, $has_wings);";
            break;
        case 'F':
            $w_type = $_POST['att1'];
            $tanksize = $_POST['att2'];
            $sql = "INSERT INTO fish (AID, w_type, Tanksize) VALUES ($aid, $w_type, $tanksize);";
            break;
        case 'S':
            $is_poison = $_POST['att1'];
            $length = $_POST['att2'];
            $sql = "INSERT INTO snake (AID, is_Poison, s_Length) VALUES ($aid, $is_poison, $length);";
            break;
        case 'B':
            $is_noisy = $_POST['att1'];
            $w_span = $_POST['att2'];
            $sql = "INSERT INTO bird (AID, is_Noisy, w_span) VALUES ($aid, $is_noisy, $w_span);";
            break;
    }
    $conn = OpenCon();
    if($conn->query($sql) == true)
    {
        $conn->close();
        header('Location: profile.php');
    }
    else
    {
        $conn->close();
        header('Location: index.php');
    }
}

?>

<!DOCTYPE HTML>
<html>

<head>
    <title>Add Animal</title>
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
                    <header>
                        <h1 style="text-align:center;">
                            <?php
                            switch ($a_type) {
                                case 'D':
                                    echo "Add a Dog";
                                    break;
                                case 'C':
                                    echo "Add a Cat";
                                    break;
                                case 'H':
                                    echo "Add a Horse";
                                    break;
                                case 'I':
                                    echo "Add a Insect";
                                    break;
                                case 'F':
                                    echo "Add a Fish";
                                    break;
                                case 'S':
                                    echo "Add a Snake";
                                    break;
                                case 'B':
                                    echo "Add a Bird";
                                    break;
                                default:
                                    echo "Error";
                                    break;
                            }
                            ?>
                        </h1>
                    </header>
                    <form method="post" action="#">
                        <div class="row gtr-50" style="text-align:center;">
                            <?php
                            switch ($a_type) {
                                case 'D':
                                    echo '                            <!-- Dog -->
                                    <div class="col-12" style="text-align:center; width:100%; ">
                                        <select name="att1">
                                            <option value="1">Can reproduce</option>
                                            <option value="0">Can not reproduce</option>
                                        </select>
                                    </div>
                                    <!-- Dog end -->';
                                    break;
                                case 'C':
                                    echo '<!--Cat-->
                                    <div class="col-12" style="text-align:center; width:100%; ">
                                        <select name="att1">
                                            <option value="1">Declawed</option>
                                            <option value="0">Not Declawed</option>
                                        </select>
                                    </div>
                                    <div class="col-12" style="text-align:center; width:100%; ">
                                        <select name="att2">
                                            <option value="1">Can reproduce</option>
                                            <option value="0">Can not reproduce</option>
                                        </select>
                                    </div> ';
                                    break;
                                case 'H':
                                    echo '                            <!-- horse -->
                                    <div class="col-12" style="text-align:center; width:100%; ">
                                        <select name="att1">
                                            <option value="1">Can Ride</option>
                                            <option value="0">Can not Ride</option>
                                        </select>
                                    </div>
                                    <div class="col-12" style="text-align:center; width:40%; ">
                                        <input name="att2" placeholder="Speed" type="number" min="0" step="0.01" />
                                    </div>';
                                    break;
                                case 'I':
                                    echo '                            <!--INSECT-->
                                    <div class="col-12" style="text-align:center; width:100%; ">
                                        <select name="att1">
                                            <option value="1">Poisonous</option>
                                            <option value="0">Not Poisonous</option>
                                        </select>
                                    </div>
                                    <div class="col-12" style="text-align:center; width:100%; ">
                                        <select name="att2">
                                            <option value="1">Has Wings</option>
                                            <option value="0">No Wings</option>
                                        </select>
                                    </div>';
                                    break;
                                case 'F':
                                    echo '<!--fish-->
                                    <div class="col-12" style="text-align:center; width:100%; ">
                                        <select name="att1">
                                            <option value="F">Freshwater</option>
                                            <option value="S">Saltwater</option>
                                        </select>
                                    </div>
                                    <div class="col-12" style="text-align:center; width:100%; ">
                                        <input name="att2" placeholder="Tank Size" type="number" min="0" step="0.01" />
                                    </div>
                                    ';
                                    break;
                                case 'S':
                                    echo '<!--Snake -->
                                    <div class="col-12" style="text-align:center; width:100%; ">
                                        <select name="att1">
                                            <option value="1">Poisonous</option>
                                            <option value="0">Not Poisonous</option>
                                        </select>
                                    </div>
                                    <div class="col-12" style="text-align:center; width:100%; ">
                                        <input name="att2" placeholder="Length" type="number" min="0" step="0.01" />
                                    </div>';
                                    break;
                                case 'B':
                                    echo '<!--bird-->
                                    <div class="col-12" style="text-align:center; width:100%; ">
                                        <select name="att1">
                                            <option value="1">Noisy</option>
                                            <option value="0">Not Noisy</option>
                                        </select>
                                    </div>
                                    <div class="col-12" style="text-align:center; width:100%; ">
                                        <input name="att2" placeholder="Wing span" type="number" min="0" step="0.01" />
                                    </div>';
                                    break;
                                default:
                                    echo "Error";
                                    break;
                            }
                            ?>

                            <div class="col-12">
                                <ul class="actions" style="text-align:center;">
                                    <li><input type="Submit" value="Add animal" /></li>
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