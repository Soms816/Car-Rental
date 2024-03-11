<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if the user is logged in
if (isset($_SESSION['user_name'])) {
    $loggedIn = true;
    $name = $_SESSION['user_name'];
} else {
    $loggedIn = false;
}

?>
<!DOCTYPE php>
<php lang="en">

    <head>
        <title>Chill-Drive</title>
        <meta charset="utf-8">
        <link rel="icon" href="images\log.png">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
        <link rel="stylesheet" href="css/animate.css">

        <link rel="stylesheet" href="css/owl.carousel.min.css">
        <link rel="stylesheet" href="css/owl.theme.default.min.css">
        <link rel="stylesheet" href="css/magnific-popup.css">

        <link rel="stylesheet" href="css/aos.css">

        <link rel="stylesheet" href="css/ionicons.min.css">

        <link rel="stylesheet" href="css/bootstrap-datepicker.css">
        <link rel="stylesheet" href="css/jquery.timepicker.css">


        <link rel="stylesheet" href="css/flaticon.css">
        <link rel="stylesheet" href="css/icomoon.css">
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
            <div class="container">
                <img src="images\logo.png" alt="logo" width="200" height="50">

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="oi oi-menu"></span> Menu
                </button>

                <div class="collapse navbar-collapse" id="ftco-nav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item <?php if (basename($_SERVER['PHP_SELF']) == 'index.php') echo "active"; ?>"><a href="index.php" class="nav-link">Home</a></li>
                        <li class="nav-item <?php if (basename($_SERVER['PHP_SELF']) == 'about.php') echo "active"; ?>"><a href="about.php" class="nav-link">About</a></li>
                        <li class="nav-item <?php if (basename($_SERVER['PHP_SELF']) == 'services.php') echo "active"; ?>"><a href="services.php" class="nav-link">Services</a></li>
                        <li class="nav-item <?php if (basename($_SERVER['PHP_SELF']) == 'pricing.php') echo "active"; ?>"><a href="pricing.php" class="nav-link">Pricing</a></li>
                        <li class="nav-item <?php if (basename($_SERVER['PHP_SELF']) == 'car.php') echo "active"; ?>"><a href="car.php" class="nav-link">Cars</a></li>
                        <li class="nav-item <?php if (basename($_SERVER['PHP_SELF']) == 'contact.php') echo "active"; ?>"><a href="contact.php" class="nav-link">Contact</a></li>
                        <li class="nav-item  <?php if (basename($_SERVER['PHP_SELF']) == 'job.php') echo "active"; ?>"><a href="job.php" class="nav-link">Became a driver</a></li>

                        <li class="nav-item active"> <?php
                                                        if ($loggedIn) {
                                                            echo "<a class='nav-link' style='background:#fff;border-radius: 25px;'><i class='fa fa-user'></i> $name</a>";
                                                            echo "<a href='logout.php'>Sign Out</a>";
                                                        } else {
                                                            echo "<a class='nav-link' style='background:#fff;border-radius: 25px;' href='login.php'><i class='fa fa-user'></i> Login</a>";
                                                        }
                                                        ?>


                        </li> <!-- <li class="nav-item"><a href="login.php" class="nav-link"><i class="fa-solid fa-right-to-bracket"></i></a></li> -->
                    </ul>
                </div>
            </div>
        </nav>

</php>