<?php
session_start();
if($_SESSION['p_type'] != 'u' && $_SESSION['p_type'] != 'a')
    header('Location: login.php');
include("src/initialization.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conditional = false;
    $name         = "";
    $vac          = "";
    $breed        = "";
    $color        = "";
    $a_type       = "";
    $sex          = "";
    $kid_friendly = "";
    $sql = "SELECT * from animal";
    if(!empty($_POST['name']))
    {
        if($conditional == false)
        {
            $sql .= "WHERE ";
            $conditional = true;
        }
        $name = $_POST['name'];
        $_SESSION['f_name'] = $name;
        $sql .= " Name='" .$name . "' "; 
    }
    if(!empty($_POST['vac']))
    {
        if($conditional == false)
        {
            $sql .= "WHERE ";
            $conditional = true;
        }
        $vac = $_POST['vac'];
        $_SESSION['f_vac'] = $vac;
        $sql .= " is_vac=" . $vac . " "; 
    }
    if(!empty($_POST['breed']))
    {
        if($conditional == false)
        {
            $sql .= "WHERE ";
            $conditional = true;
        }
        $breed = $_POST['breed'];
        $_SESSION['f_breed'] = $breed;
        $sql .= " Breed='" .$breed . "' "; 
    }
    if(!empty($_POST['color']))
    {
        if($conditional == false)
        {
            $sql .= "WHERE ";
            $conditional = true;
        }
        $color = $_POST['color'];
        $_SESSION['f_color'] = $color;
        $sql .= " Color='" .$color . "' "; 
    }
    if(!empty($_POST['a_type']))
    {
        if($conditional == false)
        {
            $sql .= "WHERE ";
            $conditional = true;
        }
        $a_type = $_POST['a_type'];
        $_SESSION['f_a_type'] = $a_type;
        $sql .= " A_TYPE='" .$a_type . "' "; 
    }
    if(!empty($_POST['sex']))
    {
        if($conditional == false)
        {
            $sql .= "WHERE ";
            $conditional = true;
        }
        $sex = $_POST['sex'];
        $_SESSION['f_sex'] = $sex;
        $sql .= " Sex='" .$sex . "' "; 
    }
    if(!empty($_POST['kid_friendly']))
    {
        if($conditional == false)
        {
            $sql .= "WHERE ";
            $conditional = true;
        }
        $kid_friendly = $_POST['kid_friendly'];
        $_SESSION['f_kid_friendly'] = $kid_friendly;
        $sql .= " is_kid_friendly=" .$kid_friendly . " "; 
    }
    $sql .= ";";
    $conn = OpenCon();
    $result = $conn->query($sql);
    if ($result->num_rows < 0) { } else {
        $_SESSION['f_name'] = $name;
        $_SESSION['f_vac'] = $vac;
        $_SESSION['f_breed'] = $breed;
        $_SESSION['f_color'] = $color;
        $_SESSION['f_a_type'] = $a_type;
        $_SESSION['f_sex'] = $sex;
        $_SESSION['f_kid_friendly'] = $kid_friendly;
        header('Location: find_info.php');
    }
}

?>

<!DOCTYPE HTML>
<html>

<head>
    <title>Find Pets</title>
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
                                <h3>Find a Friend</h3>
                                        <p>
                                            Search for a friend! This will display information about any animal that matches the description
                                        </p>
                            </div>
                            <div class="col-12" style="text-align:center; width:40%; ">
                                <input name="name" placeholder="Name" type="text" maxlength="100" minlength="1" />
                            </div>
                            <div class="col-12" style="text-align:center; width:20%; ">
                                <select name="vac">
                                    <option value="1">Vaccinated</option>
                                    <option value="0">Not Vaccinated</option>
                                </select>
                            </div>
                            <div class="col-12" style="text-align:center; width:40%; ">
                                <input name="breed" placeholder="Breed" type="text" maxlength="20" minlength="1" />
                            </div>
                            <div class="col-12" style="text-align:center; width:40%; ">
                                <input name="color" placeholder="Color" type="text" maxlength="50" minlength="1" />
                            </div>
                            <div class="col-12" style="text-align:center; width:20%; ">
                                <select name="a_type">
                                    <option value="D">Dog</option>
                                    <option value="C">Cat</option>
                                    <option value="H">Horse</option>
                                    <option value="I">Insect</option>
                                    <option value="F">Fish</option>
                                    <option value="S">Snake</option>
                                    <option value="B">Bird</option>
                                </select>
                            </div>
                            <div class="col-12" style="text-align:center; width:20%; ">
                                <select name="sex">
                                    <option value="M">Male</option>
                                    <option value="F">Female</option>
                                </select>
                            </div>
                            <div class="col-12" style="text-align:center; width:20%; ">
                                <select name="kid_friendly">
                                    <option value="1">Kid Friendly</option>
                                    <option value="0">not Kid Friendly</option>
                                </select>
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