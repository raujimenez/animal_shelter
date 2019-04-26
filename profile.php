<?php

session_start();
include("src/initialization.php");
$conn = OpenCon();

if (empty($_SESSION['username'])) {
    header('Location: login.php');
}
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $ssn = $_POST['ssn'];
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
    $sql = "SELECT PID FROM PROFILE WHERE Uname = '$username' AND P_Password = '$password';";
    $new_result = $conn->query($sql);
    $row = $new_result->fetch_assoc();
    $pid = $row['PID'];
    if($_SESSION['p_type'] == 'u')
    {
        //make user a admin
        $conn->query("UPDATE PROFILE SET P_TYPE = 'a', Ssn = '$ssn' WHERE PID = '$pid';");
        $_SESSION['ssn'] = $ssn;
        $_SESSION['p_type'] = 'a';
    }
    else if ($_SESSION['p_type'] == 'a')
    {
        //make an admin a user
        $conn->query("UPDATE PROFILE SET P_TYPE = 'u', Ssn = NULL WHERE PID = '$pid';");
        $_SESSION['ssn'] = NULL;
        $_SESSION['p_type'] = 'u';
    }
}
$conn->close();
?>
<!DOCTYPE HTML>
<html>

<head>
    <title>
        <?php
            echo $_SESSION['username'] . '\'s profile';
        ?>
    </title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css" />
</head>

<body class="left-sidebar is-preload">
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
                <div class="row gtr-150">
                    <div class="col-4 col-12-narrower">

                        <!-- Sidebar -->
                        <section id="sidebar">
                            <section class="col-6 col-12-narrower">
                                <header>
                                    <h3>Request Upgrade to Admin</h3>
                                </header>
                                    <p>
                                        <?php
                                            if($_SESSION['p_type'] == 'u')
                                                echo "Want to upgrade your account to be an admin? Click the button and enter your SSN.";
                                            else
                                                echo "Want to become a User again?";
                                        ?>
                                        <form method="post" action="#">
                                            <div class="row gtr-50">
                                                <?php
                                                if($_SESSION['p_type'] == 'u')
                                                    echo '<div class="col-12" style="text-align:center;">
                                                            <input name="ssn" placeholder="SSN" type="text" maxlength="9" minlength="9" />
                                                         </div>';
                                                ?>
                                                <div class="col-12">
                                                    <ul class="actions" style="text-align:center;">
                                                        <?php
                                                        if($_SESSION['p_type'] == 'u')
                                                            echo '<li><input type="Submit" value="Request" n/></li>';
                                                        else
                                                            echo '<li><input type="Submit" value="Go back" /></li>'

                                                        ?>
                                                    </div>
                                                    <div style="color:red;">NOTE: YOU WILL NOT BE ABLE TO ADOPT, DONATE, OR LIKE ANIMALS IN THE FUTURE</div>
                                        </form>
                                    </section>
                                    <?php
                                    //If admin is a user they should be able to add animals
                                    if($_SESSION['p_type'] == 'a')
                                    echo '<section>
											<a href="add.php" class="image featured"><img src="images/dolphin.jpg" alt="" /></a>
											<header>
												<h3>Add a Pet</h3>
											</header>
											<p>This is for admins only. If you are a user and seeing this you have encountered a bug. </p>
											<ul class="actions">
												<li><a href="add.php" class="button">Add Pet</a></li>
											</ul>
                                        </section>
                                    ';
                                    ?>
                            </section>
                        </section>

                    </div>
                    <div class="col-8 col-12-narrower imp-narrower">

                        <!-- Content -->
                        <article id="content">
                            <header>
                                <h2>
                                    <?php
                                        echo "Hello " . $_SESSION['username']
                                    ?>
                                </h2>
                                <p>This information is read-only for your purposes. It is recommended you take a picture of your username and password.</p>
                            </header>
                            <a href="#" class="image featured"><img src="images/lock.jpg" alt="" /></a>
                            <p>
                                <table style="border:1px solid black;">
                                    <tr><th colspan="2">Information about you</th></tr>
                                <?php
                                    echo "<tr> <td>Full Name</td>" . "<td>" . $_SESSION['fname'] . " " . $_SESSION['minit'] . ". " . $_SESSION['lname'] . "</td></tr>";
                                    echo "<tr> <td>Phone Number</td>" . "<td>" . "(" . substr($_SESSION['phone'], 0, 3) . ") - " . substr($_SESSION['phone'], 3,3). " - " . substr($_SESSION['phone'], 6, 4) ."</td>";
                                    echo "<tr> <td>Email</td>" . "<td>" . $_SESSION['email'] . "</td>";
                                    echo "<tr> <td>Username</td>" . "<td>"  . $_SESSION['username'] . "</td>";
                                    echo "<tr> <td>Password</td>" . "<td>" . $_SESSION['password'] . "</td>";
                                    if($_SESSION['p_type'] == 'a')
                                        echo "<tr> <td>Account Type</td>" . "<td> Admin </td>";
                                    else 
                                        echo "<tr> <td>Account Type</td>" . "<td> User </td>";                                    
                                ?>
                                </table>
                            </p>
                        </article>
                    </div>
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