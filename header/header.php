<html>
<head>
<!--    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />-->
    <meta name="viewport"
          content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://kit.fontawesome.com/ff064b31ce.js"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" type='text/css'
          href="http://localhost/site/css/main.css">
    <title>
        “www”
    </title>

</head>
<body class="body">
<div class="wrapper">
    <section class="top-notification">
        <div class="container">
            <div class="top-notification-wrapper">
                <?php
                session_start();
                if (isset($_SESSION['login'])) {
                    echo 'You entered how ' . '<a href="#">' . $_SESSION['login'] . '</a>';
                }
                ?>
            </div>
        </div>
    </section>
    <header class="header">
        <div class="container">
            <section class="header-wrapper">
                <div class="logo">
                    <a href="http://localhost/site/index.php">
                        <img class="main-logo"
                             src="http://localhost/site/img/main-logo.png"
                             alt="Logo">
                    </a>
                </div>
                <nav class="header-nav ">
                    <ul class="nav-items">
                        <li class="nav-item">
                            <a href="http://localhost/site/index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="http://localhost/site/tables/marketings.php">Marketings</a>
                        </li>
                        <li class="nav-item">
                            <a href="http://localhost/site/tables/marketplaces.php">Marketplaces</a>
                        </li>
                        <li class="nav-item">
                            <a href="http://localhost/site/tables/products.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a href="http://localhost/site/tables/providers.php">Providers</a>
                        </li>
                        <li class="nav-item">
                            <a href="http://localhost/site/bugtracker/bugtracker.php">Bugreport</a>
                        </li>
                        <li class="nav-item">
                            <span>|</span>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="t"><i class="fas fa-search"></i></a>
                            <input class="search" type="text">
                        </li>
                        <?php
                        if (isset($_SESSION['login'])) {
                            echo
                                '<li>' . '<a href="http://localhost/site/auth/logout.php" class="button">Logout</a>' . '</li>';
                        } else {
                            echo '<li>' . '<a href="http://localhost/site/auth/login.php" class="button">Login</a>' . '</li>';
                        }
                        ?>
                        </li>
                    </ul>
                </nav>
            </section>
        </div>
    </header>