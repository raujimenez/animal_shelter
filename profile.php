<?php

session_start();
include("src/initialization.php");
$conn = OpenCon();

if (empty($_SESSION['username'])) {
    header('Location: login.php');
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ssn = $_POST['ssn'];
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
    $sql = "SELECT PID FROM PROFILE WHERE Uname = '$username' AND P_Password = '$password';";
    $new_result = $conn->query($sql);
    $row = $new_result->fetch_assoc();
    $pid = $row['PID'];
    if ($_SESSION['p_type'] == 'u') {
        //make user a admin
        $conn->query("UPDATE PROFILE SET P_TYPE = 'a', Ssn = '$ssn' WHERE PID = '$pid';");
        $_SESSION['ssn'] = $ssn;
        $_SESSION['p_type'] = 'a';
    } else if ($_SESSION['p_type'] == 'a') {
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
                        <li class="break"><a href="inquiry.php">Inquiries</a></li>
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
                                <?php
                                if ($_SESSION['p_type'] == 'u')
                                    echo "Want to upgrade your account to be an admin? Click the button and enter your SSN.";
                                else
                                    echo "Want to become a User again?";
                                ?>
                                <form method="post" action="#">
                                    <div class="row gtr-50">
                                        <?php
                                        if ($_SESSION['p_type'] == 'u')
                                            echo '<div class="col-12" style="text-align:center;">
                                                            <input name="ssn" placeholder="SSN" type="text" maxlength="9" minlength="9" />
                                                         </div>';
                                        ?>
                                        <div class="col-12">
                                            <a href="#." class="image featured"><img src="images/business.jpg" alt="" /></a>
                                            <ul class="actions" style="text-align:center;">
                                                <?php
                                                if ($_SESSION['p_type'] == 'u')
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
                            if ($_SESSION['p_type'] == 'a') {
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
                                        <section>
											<a href="update_pet.php" class="image featured"><img src="images/update.jpg" alt="" /></a>
											<header>
												<h3>Update a Pet Info</h3>
											</header>
											<p>This is for admins only. If you are a user and seeing this you have encountered a bug. </p>
											<ul class="actions">
												<li><a href="update_pet.php" class="button">Update a Pet</a></li>
											</ul>
                                        </section>
                                        <section>
											<a href="remove.php" class="image featured"><img src="images/sad_dog.jpg" alt="" /></a>
											<header>
												<h3>Remove a pet</h3>
											</header>
											<p>As sad as it may be sometimes we must say goodbye to family. :( </p>
											<ul class="actions">
												<li><a href="remove.php" class="button">Remove a Pet</a></li>
											</ul>
                                        </section>
                                        
                                    ';
                            } else if ($_SESSION['p_type'] == 'u') {
                                echo '<section>
											<a href="adopt.php" class="image featured"><img src="images/adopt.jpg" alt="" /></a>
											<header style="text-align:center;margin-left:auto;margin-right:auto">
												<h3>Adopt a Pet</h3>
											</header>
											<p>If you are ready for this next step we will help you! </p>
											<ul class="actions" style="text-align:center;margin-left:auto;margin-right:auto">
												<li><a href="adopt.php" class="button">Adopt</a></li>
											</ul>
                                        </section>';
                                echo '<section>
                                <a href="donate.php" class="image featured"><img src="images/donate.png" alt="" /></a>
                                <header style="text-align:center;margin-left:auto;margin-right:auto">
                                    <h3>Donate</h3>
                                </header>
                                <p>Want to help out but can\'t adopt? No problem! You can always donate to help out our furry family. </p>
                                <ul class="actions" style="text-align:center;margin-left:auto;margin-right:auto">
                                    <li><a href="donate.php" class="button">Donate</a></li>
                                </ul>
                            </section>';
                            }
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
                                    <tr>
                                        <th colspan="2">Information about you</th>
                                    </tr>
                                    <?php
                                    echo "<tr> <td>Full Name</td>" . "<td>" . $_SESSION['fname'] . " " . $_SESSION['minit'] . ". " . $_SESSION['lname'] . "</td></tr>";
                                    echo "<tr> <td>Phone Number</td>" . "<td>" . "(" . substr($_SESSION['phone'], 0, 3) . ") - " . substr($_SESSION['phone'], 3, 3) . " - " . substr($_SESSION['phone'], 6, 4) . "</td>";
                                    echo "<tr> <td>Email</td>" . "<td>" . $_SESSION['email'] . "</td>";
                                    echo "<tr> <td>Username</td>" . "<td>"  . $_SESSION['username'] . "</td>";
                                    echo "<tr> <td>Password</td>" . "<td>" . $_SESSION['password'] . "</td>";
                                    if ($_SESSION['p_type'] == 'a')
                                        echo "<tr> <td>Account Type</td>" . "<td> Admin </td>";
                                    else
                                        echo "<tr> <td>Account Type</td>" . "<td> User </td>";
                                    ?>
                                </table>
                            </p>
                            <p>
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
                                    $n_pid = $_SESSION['pid'];
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
                                    $new_pid = $_SESSION['pid'];
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
                                    <tr>
                                        <th colspan="1" style="border:1px solid black;">Name</th>
                                    </tr>
                                    <?php
                                    $conn = OpenCon();
                                    $n_pid = $_SESSION['pid'];
                                    $get_likes_sql = "SELECT * FROM likes where PID=$n_pid;";
                                    $likes_arr = $conn->query($get_likes_sql);
                                    while ($likes_aid = $likes_arr->fetch_assoc()) {
                                        $new_aid = $likes_aid['AID'];
                                        $names = $conn->query("SELECT * from animal where AID=$new_aid;");
                                        $name = $names->fetch_assoc();
                                        echo "<tr style=\"text-align:center;\"><td>" . $name['Name'] . "</td>";
                                    }
                                    $conn->close();
                                    ?>
                                </table>
                            </p>                      
                            <?php
                            if ($_SESSION['p_type'] == 'a') {
                                echo '<section>        
                                <a href="get_user_info.php" class="image featured"><img src="images/user.png" alt="" /></a>
											<header>
												<h3>Get info of a user</h3>
											</header>
                                            <p>Allows us to check the information about a unique user using their username. Know their username? give it a shot!</p>
                                            
											<ul class="actions" style="text-align:center; margin-left:auto;margin-right:auto">
												<li><a href="get_user_info.php" class="button">Search</a></li>
											</ul>
                                </section>';
                                echo '<section>        
                                <a href="get_donation_info.php" class="image featured"><img src="images/time.jpg" alt="" /></a>
											<header>
												<h3>Get info of donations for a specific day</h3>
											</header>
                                            <p>Want to know how the checking book stands on a particular date? Click here to find out.</p>
                                            
											<ul class="actions" style="text-align:center; margin-left:auto;margin-right:auto">
												<li><a href="get_donation_info.php" class="button">Search</a></li>
											</ul>
                                </section>';
                            }
                            if($_SESSION['p_type'] == 'u')
                            {
                                echo '<section>        
                                <a href="likes.php" class="image featured"><img src="images/likes.jpg" alt="" /></a>
											<header>
												<h3>Like an animal</h3>
											</header>
                                            <p>Love an animal and want to show your appreciation? Know their animal id? Give em a like!</p>
											<ul class="actions" style="text-align:center; margin-left:auto;margin-right:auto">
												<li><a href="likes.php" class="button">Like</a></li>
											</ul>
                                </section>';
                            }
                            ?>
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