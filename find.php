<!DOCTYPE HTML>
<html>

<head>
    <title>Find Friends</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css" />
</head>

<body class="right-sidebar is-preload">
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
                    <div class="col-8 col-12-narrower">

                        <!-- Content -->
                        <article id="content">
                            <header>
                                <h2>Right Sidebar</h2>
                                <p>Lorem ipsum dolor sit amet consectetur et sed adipiscing elit
                                    dolor neque semper magna lorem ipsum.</p>
                            </header>
                            <a href="#" class="image featured"><img src="images/pic01.jpg" alt="" /></a>
                            <p>Ut sed tortor luctus, gravida nibh eget, volutpat odio. Proin rhoncus, sapien
                                mollis luctus hendrerit, orci dui viverra metus, et cursus nulla mi sed elit. Vestibulum
                                condimentum, mauris a mattis vestibulum, urna mauris cursus lorem, eu fringilla lacus
                                ante non est. Nullam vitae feugiat libero, eu consequat sem. Proin tincidunt neque
                                eros. Duis faucibus blandit ligula, mollis commodo risus sodales at. Sed rutrum et
                                turpis vel blandit. Nullam ornare congue massa, at commodo nunc venenatis varius.
                                Praesent mollis nisi at vestibulum aliquet. Sed sagittis congue urna ac consectetur.</p>
                            <p>Mauris eleifend eleifend felis aliquet ornare. Vestibulum porta velit at elementum
                                gravida nibh eget, volutpat odio. Proin rhoncus, sapien
                                mollis luctus hendrerit, orci dui viverra metus, et cursus nulla mi sed elit. Vestibulum
                                condimentum, mauris a mattis vestibulum, urna mauris cursus lorem, eu fringilla lacus
                                ante non est. Nullam vitae feugiat libero, eu consequat sem. Proin tincidunt neque
                                eros. Duis faucibus blandit ligula, mollis commodo risus sodales at. Sed rutrum et
                                turpis vel blandit. Nullam ornare congue massa, at commodo nunc venenatis varius.
                                Praesent mollis nisi at vestibulum aliquet. Sed sagittis congue urna ac consectetur.</p>
                            <p>Vestibulum pellentesque posuere lorem non aliquam. Mauris eleifend eleifend
                                felis aliquet ornare. Vestibulum porta velit at elementum elementum.</p>
                            <p>Mauris eleifend eleifend felis aliquet ornare. Vestibulum porta velit at elementum
                                gravida nibh eget, volutpat odio. Proin rhoncus, sapien
                                mollis luctus hendrerit, orci dui viverra metus, et cursus nulla mi sed elit. Vestibulum
                                condimentum, mauris a mattis vestibulum, urna mauris cursus lorem, eu fringilla lacus
                                ante non est. Nullam vitae feugiat libero, eu consequat sem. Proin tincidunt neque
                                eros. Duis faucibus blandit ligula, mollis commodo risus sodales at. Sed rutrum et
                                turpis vel blandit. Nullam ornare congue massa, at commodo nunc venenatis varius.
                                Praesent mollis nisi at vestibulum aliquet. Sed sagittis congue urna ac consectetur.</p>
                            <p>Vestibulum pellentesque posuere lorem non aliquam. Mauris eleifend eleifend
                                felis aliquet ornare. Vestibulum porta velit at elementum elementum.</p>
                        </article>

                    </div>
                    <div class="col-4 col-12-narrower">
                        <!-- Sidebar -->
                        <section id="sidebar">
                            <section>
                                <header>
                                    <h3>Find your Friends</h3>
                                </header>
                                <p>Lorem ipsum dolor sit amet consectetur et sed adipiscing elit. Curabitur et vel
                                    sem sit amet dolor neque semper magna. Lorem ipsum dolor sit amet consectetur et dolore
                                    adipiscing elit. Curabitur vel sem sit.</p>
                                <ul class="actions">
                                    <li><a href="#" class="button">Magna amet nullam</a></li>
                                </ul>
                            </section>
                            <section>
                                <a href="#" class="image featured"><img src="images/pic07.jpg" alt="" /></a>
                                <header>
                                    <h3>Commodo lorem varius</h3>
                                </header>
                                <p>Lorem ipsum dolor sit amet consectetur et sed adipiscing elit. Curabitur et vel
                                    sem sit amet dolor neque semper magna. Lorem ipsum dolor sit amet consectetur et dolore
                                    adipiscing elit. Curabitur vel sem sit.</p>
                                <ul class="actions">
                                    <li><a href="#" class="button">Ipsum sed dolor</a></li>
                                </ul>
                            </section>
                        </section>

                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div id="footer-wrapper">
            <div id="footer" class="container">
                <header class="major">
                    <h2>UTAnimals Cares about your friends</h2>
                    <p>We at UTAnimals value your our guest as much as our own family.<br> Please take care of our family members when adopting. </p>
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