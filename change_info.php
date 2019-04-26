<?php
session_start();
include("src/initialization.php");
$pet_info = $_SESSION['curr_aid'];
$aid = $pet_info['AID'];
$a_type = $pet_info['A_TYPE'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $color = $_POST['color'];
    $vac = $_POST['vac'];
    $diet = $_POST['diet'];
    $weight = $_POST['weight'];
    $height = $_POST['height'];
    $kid_friendly = $_POST['kid_friendly'];
    $description = $_POST['description'];
    //standard statement
    $sql = "UPDATE animal SET Name='$name', Color='$color', is_vac=$vac, Diet='$diet', Weight='$weight', Height='$height',  is_kid_friendly=$kid_friendly, Description='$description' WHERE AID=$aid;";
    $group_sql = "";
    switch ($a_type) {
        case 'D':
            $can_reproduce = $_POST['att1'];
            $group_sql = "UPDATE dog SET canReproduce=$can_reproduce WHERE AID=$aid;";
            break;
        case 'C':
            $is_declaw = $_POST['att1'];
            $can_reproduce = $_POST['att2'];
            $group_sql = "UPDATE cat SET isDeclaw=$is_declaw, canReproduce=$can_reproduce WHERE AID=$aid;";
            break;
        case 'H':
            $is_ride = $_POST['att1'];
            $speed = $_POST['att2'];
            $group_sql = "UPDATE horse SET isRide=$is_ride, Speed='$speed' WHERE AID=$aid;";
            break;
        case 'I':
            $is_poison = $_POST['att1'];
            $has_wings = $_POST['att2'];
            $group_sql = "UPDATE insect SET is_Poison=$is_poison, has_Wings=$has_wings WHERE AID=$aid;";
            break;
        case 'F':
            $w_type = $_POST['att1'];
            $tanksize = $_POST['att2'];
            $group_sql = "UPDATE fish SET w_type='$w_type', Tanksize='$tanksize'  WHERE AID=$aid;";
            break;
        case 'S':
            $is_poison = $_POST['att1'];
            $length = $_POST['att2'];
            $group_sql = "UPDATE snake SET is_Poison=$is_poison, s_Length='$length' WHERE AID=$aid;";
            break;
        case 'B':
            $is_noisy = $_POST['att1'];
            $w_span = $_POST['att2'];
            $group_sql = "UPDATE bird SET w_span='$w_span', isNoisy=$isNoisy WHERE AID=$aid;";
            break;
    }
    $conn = OpenCon();
    if ($conn->query($sql) == true) {
        if ($conn->query($group_sql) == true) {
            $conn->close();
            header('Location: update_pet.php');
        } else {
            $conn->close();
            header('Location: update_pet.php');
        }
    } else {
        $conn->close();
        header('Location: update_pet.php');
    }
}

?>

<!DOCTYPE HTML>
<html>

<head>
    <title>UTAnimals Signup</title>
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
                        <h1 style="text-align:center;">Change info of <?php echo $pet_info['Name'] ?></h1>
                    </header>
                    <form method="post" action="#">
                        <div class="row gtr-50">
                            <div class="col-12" style="text-align:center; width:40%; ">
                                <input name="name" placeholder="Name" type="text" maxlength="100" minlength="1" value="<?php echo $pet_info['Name']; ?>" />
                            </div>
                            <div class="col-12" style="text-align:center; width:40%; ">
                                <input name="color" placeholder="Color" type="text" maxlength="50" minlength="1" value="<?php echo $pet_info['Color']; ?>" />
                            </div>
                            <div class="col-12" style="text-align:center; width:20%; ">
                                <select name="vac" value="<?php echo $pet_info['is_vac']; ?>">
                                    <option value="1" <?php if ($pet_info['is_vac'] == 1) echo 'selected="selected"'; ?>>Vaccinated</option>
                                    <option value="0" <?php if ($pet_info['is_vac'] == 0) echo 'selected="selected"'; ?>>Not Vaccinated</option>
                                </select>
                            </div>
                            <div class="col-12" style="text-align:center; width:40%;">
                                <input name="diet" placeholder="Diet" type="text" maxlength="200" minlength="1" value="<?php echo $pet_info['Diet']; ?>" />
                            </div>

                            <div class="col-12" style="text-align:center; width:20%; ">
                                <input name="weight" placeholder="Weight" type="number" min="0" step=".01" value="<?php echo $pet_info['Weight']; ?>" />
                            </div>
                            <div class="col-12" style="text-align:center; width:20%; ">
                                <input name="height" placeholder="Height" type="number" min="0" step=".01" value="<?php echo $pet_info['Height']; ?>" />
                            </div>

                            <div class="col-12" style="text-align:center; width:20%; ">
                                <select name="kid_friendly">
                                    <option value="1" <?php if ($pet_info['is_kid_friendly'] == 1) echo 'selected="selected"'; ?>>Kid Friendly</option>
                                    <option value="0" <?php if ($pet_info['is_kid_friendly'] == 0) echo 'selected="selected"'; ?>>not Kid Friendly</option>
                                </select>
                            </div>
                            <div class="col-12" style="text-align:center; width:20%; ">
                                <select name="avail">
                                    <option value="1" <?php if ($pet_info['Available'] == 1) echo 'selected="selected"'; ?>>Available</option>
                                    <option value="0" <?php if ($pet_info['Available'] == 0) echo 'selected="selected"'; ?>>Not Available</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <textarea name="description" placeholder="Description" maxlength="500"><?php echo $pet_info['Description']; ?></textarea>
                            </div>
                            <?php
                            $conn = OpenCon();

                            switch ($a_type) {
                                case 'D':
                                    $group_result = $conn . query("SELECT * FROM dog WHERE AID=$aid");
                                    $group_row = $group_result->fetch_assoc();
                                    echo '                            <!-- Dog -->
                                    <div class="col-12" style="text-align:center; width:100%; ">
                                        <select name="att1">
                                            <option value="1".';
                                    if ($group_row['canReproduce'] == 1) echo 'selected';
                                    echo '>Can reproduce</option>
                                            <option value="0". ';
                                    if ($group_row['canReproduce'] == 0)  echo 'selected';
                                    echo '>Can not reproduce</option>
                                        </select>
                                    </div>
                                    <!-- Dog end -->';
                                    break;
                                case 'C':
                                    $group_result = $conn->query("SELECT * FROM cat WHERE AID='$aid';");
                                    $group_row = $group_result->fetch_assoc();
                                    echo '<!--Cat-->
                                    <div class="col-12" style="text-align:center; width:100%; ">
                                        <select name="att1">
                                            <option value="1" ';
                                    if ($group_row['isDeclaw'] == 1) echo 'selected';
                                    echo '>Declawed</option>
                                            <option value="0" ';
                                    if ($group_row['isDeclaw'] == 0) echo 'selected';
                                    echo '>Not Declawed</option>
                                        </select>
                                    </div>
                                    <div class="col-12" style="text-align:center; width:100%; ">
                                        <select name="att2">
                                            <option value="1" ';
                                    if ($group_row['canReproduce'] == 1) echo 'selected';
                                    echo '>Can reproduce</option>
                                            <option value="0" ';
                                    if ($group_row['canReproduce'] == 0) echo 'selected';
                                    echo '>Can not reproduce</option>
                                        </select>
                                    </div> ';
                                    break;
                                case 'H':
                                    $group_result = $conn->query("SELECT * FROM horse WHERE AID='$aid';");
                                    $group_row = $group_result->fetch_assoc();
                                    echo '                            <!-- horse -->
                                    <div class="col-12" style="text-align:center; width:100%; ">
                                        <select name="att1">
                                            <option value="1" ';
                                    if ($group_row['isRide'] == 1) echo 'selected';
                                    echo '>Can Ride</option>
                                            <option value="0" ';
                                    if ($group_row['isRide'] == 0) echo 'selected';
                                    echo '>Can not Ride</option>
                                        </select>
                                    </div>
                                    <div class="col-12" style="text-align:center; width:40%; ">
                                        <input name="att2" placeholder="Speed" type="number" min="0" step="0.01" value="';
                                    echo $group_row['Speed'];
                                    echo '" />
                                    </div>';
                                    break;
                                case 'I':
                                    $group_result = $conn->query("SELECT * FROM insect WHERE AID='$aid';");
                                    $group_row = $group_result->fetch_assoc();
                                    echo '                            <!--INSECT-->
                                    <div class="col-12" style="text-align:center; width:100%; ">
                                        <select name="att1">
                                            <option value="1" ';
                                    if ($group_row['is_Poison'] == 1) echo 'selected';
                                    echo '>Poisonous</option>
                                            <option value="0" ';
                                    if ($group_row['is_Poison'] == 0) echo 'selected';
                                    echo '>Not Poisonous</option>
                                        </select>
                                    </div>
                                    <div class="col-12" style="text-align:center; width:100%; ">
                                        <select name="att2">
                                            <option value="1" ';
                                    if ($group_row['has_Wings'] == 1) echo 'selected';
                                    echo '>Has Wings</option>
                                            <option value="0" ';
                                    if ($group_row['has_Wings'] == 0) echo 'selected';
                                    echo '>No Wings</option>
                                        </select>
                                    </div>';
                                    break;
                                case 'F':
                                    $group_result = $conn->query("SELECT * FROM fish WHERE AID='$aid';");
                                    $group_row = $group_result->fetch_assoc();
                                    echo '<!--fish-->
                                    <div class="col-12" style="text-align:center; width:100%; ">
                                        <select name="att1">
                                            <option value="F" ';
                                    if ($group_row['w_type'] == 'f' or $group_row['w_type'] == 'F')  echo 'selected';

                                    echo '>Freshwater</option>
                                            <option value="S" ';
                                    if ($group_row['w_type'] == 's' or $group_row['w_type'] == 'S')  echo 'selected';
                                    echo '>Saltwater</option>
                                        </select>
                                    </div>
                                    <div class="col-12" style="text-align:center; width:100%; ">
                                        <input name="att2" placeholder="Tank Size" type="number" min="0" step="0.01" value="';
                                    echo $group_row['Tanksize'];
                                    echo '"/>
                                    </div>
                                    ';
                                    break;
                                case 'S':
                                    $group_result = $conn->query("SELECT * FROM snake WHERE AID='$aid';");
                                    $group_row = $group_result->fetch_assoc();
                                    echo '<!--Snake -->
                                    <div class="col-12" style="text-align:center; width:100%; ">
                                        <select name="att1">
                                            <option value="1" ';
                                    if ($group_row['is_Poison'] == 1)  echo 'selected';
                                    echo '>Poisonous</option>
                                            <option value="0" ';
                                    if ($group_row['is_Poison'] == 0)  echo 'selected';
                                    echo '>Not Poisonous</option>
                                        </select>
                                    </div>
                                    <div class="col-12" style="text-align:center; width:100%; ">
                                        <input name="att2" placeholder="Length" type="number" min="0" step="0.01" value="';

                                    echo $group_row['s_Length'];

                                    echo '" />
                                    </div>';

                                    break;
                                case 'B':
                                    $group_result = $conn->query("SELECT * FROM bird WHERE AID='$aid';");
                                    $group_row = $group_result->fetch_assoc();
                                    echo '<!--bird-->
                                    <div class="col-12" style="text-align:center; width:100%; ">
                                        <select name="att1">
                                            <option value="1" ';
                                    if ($group_row['isNoisy'] == 1)  echo 'selected';
                                    echo '>Noisy</option>
                                            <option value="0" ';
                                    if ($group_row['isNoisy'] == 0)  echo 'selected';
                                    echo '>Not Noisy</option>
                                        </select>
                                    </div>
                                    <div class="col-12" style="text-align:center; width:100%; ">
                                        <input name="att2" placeholder="Wing span" type="number" min="0" step="0.01" value="';
                                    echo $group_row['w_span'];
                                    echo '"/>
                                    </div>';
                                    break;
                                default:
                                    echo "Error";
                                    break;
                            }
                            ?>

                            <div class="col-12">
                                <ul class="actions" style="text-align:center;">
                                    <li><input type="Submit" value="Update" /></li>
                                    <li><a href="update_pet.php" class="button">Cancel</a></li>
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