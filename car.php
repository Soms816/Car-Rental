
    <?php

    include "header.php";
    include "connection.php";

    $query = "SELECT * FROM cars";
    $cars = mysqli_query($conn, $query);

    ?>

    
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/4.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
                <div class="col-md-9 ftco-animate pb-5">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Cars <i class="ion-ios-arrow-forward"></i></span></p>
                    <h1 class="mb-3 bread">Choose Your Car</h1>
                </div>
            </div>
        </div>
    </section>


    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row">
                <?php
                if (mysqli_num_rows($cars) > 0) {
                    while ($row = mysqli_fetch_assoc($cars)) {
                ?>
                        <div class="col-md-4">
                            <div class="car-wrap rounded ftco-animate">
                                <div class="img rounded d-flex align-items-end" style="background-image: url(<?php echo $row['image'] ?>);">
                                </div>
                                <div class="text">
                                    <h2 class="mb-0"><a href="car-single.php"> <?php echo $row['name'] ?></a></h2>
                                    <div class="d-flex mb-3">
                                        <span class="cat"><?php echo $row['brand'] ?></span>
                                        <p class="price ml-auto">₹<?php echo $row['daily_price'] ?><span>/day</span></p>
                                    </div>
                                    <p class="d-flex mb-0 d-block"><a href="<?php echo isset($_SESSION['user_id']) ? 'index.php?carId=' . $row['id'] : 'login.php'; ?>"  class="btn btn-primary py-2 mr-1">Book now</a>
                                        <a href="car-single.php?id=<?php echo $row['id']; ?>" class="btn btn-secondary py-2 ml-1">Details</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                <?php  }
                } ?>
            </div>
        </div>

    </section>

    <?php

include "footer.php";
?>



    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
        </svg></div>


    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/jquery.timepicker.min.js"></script>
    <script src="js/scrollax.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="js/google-map.js"></script>
    <script src="js/main.js"></script>

</body>

</html>