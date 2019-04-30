<?php
session_start();
if ($_SESSION['p_type'] != 'u')
    header('Location: profile.php');
include("src/initialization.php");
$conn = OpenCon();
$current_animal = $_SESSION['like_aid'];
$curr_aid = $current_animal['AID'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if($current_animal['Available'] == 1){
        $curr_pid = $_SESSION['pid'];
        $aid = $current_animal['AID'];
        if ($conn->query("INSERT INTO likes VALUES ($aid, $curr_pid);") == true)
        {
            header('Location: profile.php');
        }
        else
        {
            header('Location: likes.php');
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
                    <form method="post" action="#">
                        <div class="row gtr-50" style="text-align:center;">
                            <?php
                            echo '<table style="border:1px solid black; width:50%; text-align:center; margin-left:auto;margin-right:auto;">';
                            echo '<tr><th colspan="2">Information about ';
                            echo $current_animal['Name'];
                            echo '</th></tr>';
                            echo '<tr><td>Name</td>';
                            echo '<td>' . $current_animal['Name'] . '</td>';
                            echo '<tr><td>Animal ID</td>';
                            echo '<td>' . $current_animal['AID'] . '</td>';
                            echo '<tr><td>Sex</td>';
                            if ($current_animal['Sex'] == 'M')
                                echo '<td>' . 'Male' . '</td>';
                            else
                                echo '<td>' . 'Female' . '</td>';

                            echo '<tr><td>Color</td>';
                            echo '<td>' . $current_animal['Color'] . '</td>';
                            echo '<tr><td>Diet</td>';
                            echo '<td>' . $current_animal['Diet'] . '</td>';
                            echo '<tr><td>Available</td>';
                            if ($current_animal['Available'] == 1)
                                echo '<td>' . 'Available' . '</td>';
                            else
                                echo '<td>' . 'Not Available' . '</td>';

                            echo '<tr><td>Weight</td>';
                            echo '<td>' . $current_animal['Weight'];
                            if ($current_animal['A_TYPE'] == 'I')
                                echo ' oz</td>';
                            else
                                echo ' lbs </td>';
                            echo '<tr><td>Height</td>';
                            echo '<td>' . $current_animal['Height'];
                            if ($current_animal['A_TYPE'] == 'I')
                                echo ' in</td>';
                            else
                                echo ' ft </td>';
                            echo '<tr><td>Birthday</td>';
                            echo '<td>' . $current_animal['DoB'] . '</td>';

                            echo '<tr><td>Kid Friendly</td>';
                            if ($current_animal['is_kid_friendly'] == 1)
                                echo '<td>Yes</td>';
                            else
                                echo '<td>No</td>';
                            echo '<tr><td>Vaccinated</td>';
                            if ($current_animal['is_vac'] == 1)
                                echo '<td>Yes</td>';
                            else
                                echo '<td>No</td>';
                            echo '<tr><td>Description</td>';
                            echo '<td>' . $current_animal['Description'] . '</td>';
                            echo '<tr><td>Recieved on</td>';
                            echo '<td>' . $current_animal['A_date'] . '</td>';
                            echo '<tr><td>Breed</td>';
                            echo '<td>' . $current_animal['Breed'] . '</td>';
                            switch ($a_type) {
                                case 'D':
                                    echo '<tr><td>Can Reproduce</td>';
                                    if ($extra_info['canReproduce'] == 1)
                                        echo '<td>Yes</td>';
                                    else
                                        echo '<td>No</td>';
                                    break;
                                case 'C':
                                    echo '<tr><td>Declawed</td>';
                                    if ($extra_info['isDeclaw'] == 1)
                                        echo '<td>Yes</td>';
                                    else
                                        echo '<td>No</td>';
                                    echo '<tr><td>Can Reproduce</td>';
                                    if ($extra_info['canReproduce'] == 1)
                                        echo '<td>Yes</td>';
                                    else
                                        echo '<td>No</td>';
                                    break;
                                case 'H':
                                    echo '<tr><td>Rideable</td>';
                                    if ($extra_info['isRide'] == 1)
                                        echo '<td>Yes</td>';
                                    else
                                        echo '<td>No</td>';
                                    echo '<tr><td>Speed</td>';
                                    echo '<td>' . $extra_info['Speed'] . ' mph </td>';
                                    break;
                                case 'I':
                                    echo '<tr><td>Poisoinous</td>';
                                    if ($extra_info['is_Poison'] == 1)
                                        echo '<td>Yes</td>';
                                    else
                                        echo '<td>No</td>';
                                    echo '<tr><td>Has Wings</td>';
                                    if ($extra_info['has_Wings'] == 1)
                                        echo '<td>Yes</td>';
                                    else
                                        echo '<td>No</td>';
                                    break;
                                case 'F':
                                    echo '<tr><td>Water Type</td>';
                                    if ($extra_info['w_type'] == 's' || $extra_info['w_type'] == 'S')
                                        echo '<td>Saltwater</td>';
                                    else
                                        echo '<td>Freshwater</td>';
                                    echo '<tr><td>Tank Size</td>';
                                    echo '<td>' . $extra_info['Tanksize'] . ' L </td>';
                                    break;
                                case 'S':
                                    echo '<tr><td>Poisoinous</td>';
                                    if ($extra_info['is_Poison'] == 1)
                                        echo '<td>Yes</td>';
                                    else
                                        echo '<td>No</td>';
                                    echo '<tr><td>Length</td>';
                                    echo '<td>' . $extra_info['s_Length'] . ' ft </td>';
                                    break;
                                case 'B':
                                    echo '<tr><td>Noisy</td>';
                                    if ($extra_info['isNoisy'] == 1)
                                        echo '<td>Yes</td>';
                                    else
                                        echo '<td>No</td>';
                                    echo '<tr><td>Wing Span</td>';
                                    echo '<td>' . $extra_info['w_span'] . ' in </td>';
                                    break;
                            }



                            echo '</table>';
                            ?>
                            <div class="col-12">
                                <ul class="actions" style="text-align:center;">
                                    <?php
                                        if($current_animal['Available'] == 1)
                                            echo '<li><input type="Submit" value="Like" /></li>';
                                    ?>
                                    <li><a href="likes.php" class="button">Cancel</a></li>
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