<?php
include "connection.php";

// Check if the 'id' parameter is set in the URL
if (isset($_GET['id'])) {
    // Sanitize the 'id' parameter to prevent SQL injection
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // Query to fetch car details based on the provided 'id'
    $query = "SELECT * FROM cars WHERE id = $id";

    // Execute the query
    $result = mysqli_query($conn, $query);

    // Check if the query was successful
    if (mysqli_num_rows($result) > 0) {
        // Fetch car details from the result
        $carDetails = mysqli_fetch_assoc($result);
    } else {
        // Handle case where no car with the provided 'id' was found
        echo "No car found with the provided ID.";
        exit();
    }
} else {
    // Handle case where 'id' parameter is not set in the URL
    echo "No ID parameter provided.";
    exit();
}
?>
    <?php

    include "header.php";

    ?>

    <!-- <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <img src="images\logo.png" alt="logo" width="200" height="50">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="index.html" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
                    <li class="nav-item"><a href="services.html" class="nav-link">Services</a></li>
                    <li class="nav-item"><a href="pricing.html" class="nav-link">Pricing</a></li>
                    <li class="nav-item active"><a href="car.html" class="nav-link">Cars</a></li>
                    <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav> -->
    <!-- END nav -->

    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/6.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
                <div class="col-md-9 ftco-animate pb-5">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Car details <i class="ion-ios-arrow-forward"></i></span></p>
                    <h1 class="mb-3 bread">Car Details</h1>
                </div>
            </div>
        </div>
    </section>


    <section class="ftco-section ftco-car-details">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="car-details">
                        <div class="img rounded" style="background-image: url(<?php echo $carDetails['image'] ?>);"></div>
                        <div class="text text-center">
                            <span class="subheading"><?php echo $carDetails['brand'] ?></span>
                            <h2><?php echo $carDetails['name'] ?></h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services">
                        <div class="media-body py-md-4">
                            <div class="d-flex mb-3 align-items-center">
                                <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-dashboard"></span></div>
                                <div class="text">
                                    <h3 class="heading mb-0 pl-3">
                                        Mileage
                                        <span><?php echo $carDetails['mileage'] ?></span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services">
                        <div class="media-body py-md-4">
                            <div class="d-flex mb-3 align-items-center">
                                <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-pistons"></span></div>
                                <div class="text">
                                    <h3 class="heading mb-0 pl-3">
                                        Transmission
                                        <span><?php echo $carDetails['transmission'] ?></span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services">
                        <div class="media-body py-md-4">
                            <div class="d-flex mb-3 align-items-center">
                                <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-car-seat"></span></div>
                                <div class="text">
                                    <h3 class="heading mb-0 pl-3">
                                        Seats
                                        <span><?php echo $carDetails['seats'] ?> Adults</span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services">
                        <div class="media-body py-md-4">
                            <div class="d-flex mb-3 align-items-center">
                                <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-backpack"></span></div>
                                <div class="text">
                                    <h3 class="heading mb-0 pl-3">
                                        Luggage
                                        <span><?php echo $carDetails['luggage'] ?> Bags</span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services">
                        <div class="media-body py-md-4">
                            <div class="d-flex mb-3 align-items-center">
                                <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-diesel"></span></div>
                                <div class="text">
                                    <h3 class="heading mb-0 pl-3">
                                        Fuel
                                        <span><?php echo $carDetails['fuel'] ?></span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 pills">
                    <div class="bd-example bd-example-tabs">
                        <div class="d-flex justify-content-center">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-description-tab" data-toggle="pill" href="#pills-description" role="tab" aria-controls="pills-description" aria-expanded="true">Features</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-manufacturer-tab" data-toggle="pill" href="#pills-manufacturer" role="tab" aria-controls="pills-manufacturer" aria-expanded="true">Description</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-review-tab" data-toggle="pill" href="#pills-review" role="tab" aria-controls="pills-review" aria-expanded="true">Review</a>
                                </li>
                            </ul>
                        </div>

                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-description" role="tabpanel" aria-labelledby="pills-description-tab">
                                <?php
                                $features_query = "SELECT * FROM features WHERE car_id = " . $carDetails['id'];
                                $features_result = mysqli_query($conn, $features_query);

                                // Check if features are found for the car
                                if (mysqli_num_rows($features_result) > 0) {
                                    // Initialize an array to store features
                                    $features = array();

                                    // Fetch all features into an array
                                    while ($row = mysqli_fetch_assoc($features_result)) {
                                        $features[] = $row;
                                    }

                                    // Calculate number of columns based on number of features
                                    $num_columns = 3;
                                    $recordsTobeAdd = ceil(count($features) / $num_columns);
                                ?>

                                    <div class="row">
                                        <?php
                                        for ($i = 0; $i < 3; $i++) {
                                        ?>
                                            <div class="col-md-4">
                                                <ul class="features">
                                                    <?php for ($j = $i * $recordsTobeAdd; $j < min(($i + 1) * $recordsTobeAdd, count($features)); $j++) {
                                                        $has_feature = $features[$j]['has_feature'];
                                                        $feature_name = $features[$j]['feature_name'];
                                                    ?>
                                                        <li class="<?php echo $has_feature ? 'check' : 'remove' ?>"><span class="<?php echo $has_feature ? 'ion-ios-checkmark' : 'ion-ios-close' ?>"></span><?php echo $feature_name ?></li>
                                                    <?php } ?>
                                                    <!-- <li class="check"><span class="ion-ios-checkmark"></span>Airconditions</li>
                                            <li class="check"><span class="ion-ios-checkmark"></span>Child Seat</li>
                                            <li class="check"><span class="ion-ios-checkmark"></span>GPS</li>
                                            <li class="check"><span class="ion-ios-checkmark"></span>Luggage</li>
                                            <li class="check"><span class="ion-ios-checkmark"></span>Music</li> -->
                                                </ul>
                                            </div>
                                        <?php } ?>
                                        <!-- <div class="col-md-4">
                                        <ul class="features">
                                            <li class="check"><span class="ion-ios-checkmark"></span>Seat Belt</li>
                                            <li class="remove"><span class="ion-ios-close"></span>Sleeping Bed</li>
                                            <li class="check"><span class="ion-ios-checkmark"></span>Water</li>
                                            <li class="check"><span class="ion-ios-checkmark"></span>Bluetooth</li>
                                            <li class="remove"><span class="ion-ios-close"></span>Onboard computer</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="features">
                                            <li class="check"><span class="ion-ios-checkmark"></span>Audio input</li>
                                            <li class="check"><span class="ion-ios-checkmark"></span>Long Term Trips</li>
                                            <li class="check"><span class="ion-ios-checkmark"></span>Car Kit</li>
                                            <li class="check"><span class="ion-ios-checkmark"></span>Remote central locking</li>
                                            <li class="check"><span class="ion-ios-checkmark"></span>Climate control</li>
                                        </ul>
                                    </div> -->
                                    </div>

                                <?php } ?>
                            </div>

                            <div class="tab-pane fade" id="pills-manufacturer" role="tabpanel" aria-labelledby="pills-manufacturer-tab">
                                <?php echo $carDetails['description'] ?>
                            </div>

                            <div class="tab-pane fade" id="pills-review" role="tabpanel" aria-labelledby="pills-review-tab">
                                <div class="row">
                                    <div class="col-md-7">
                                        <?php
                                        // Assume $conn is your database connection
                                        $reviews_query = "SELECT * FROM reviews WHERE car_id = " . $carDetails['id'];
                                        $reviews_result = mysqli_query($conn, $reviews_query);

                                        if (mysqli_num_rows($reviews_result) > 0) {
                                            echo '<h3 class="head">' . mysqli_num_rows($reviews_result) . ' Reviews</h3>';
                                            while ($review = mysqli_fetch_assoc($reviews_result)) {
                                        ?>
                                                <div class="review d-flex">
                                                    <div class="user-img" style="background-image: url(images/usericon.png)"></div>
                                                    <div class="desc">
                                                        <h4>
                                                            <span class="text-left"><?php echo $review['name']; ?></span>
                                                            <span class="text-right"><?php echo ucwords(date("d F Y", strtotime($review['created_at']))); ?></span>
                                                        </h4>
                                                        <p class="star">
                                                            <span>
                                                                <?php
                                                                for ($i = 0; $i < $review['rating']; $i++) {
                                                                    echo '<i class="ion-ios-star"></i>';
                                                                }
                                                                ?>
                                                            </span>
                                                            <span class="text-right"><a href="#" class="reply"><i class="icon-reply"></i></a></span>
                                                        </p>
                                                        <p><?php echo $review['feedback']; ?></p>
                                                    </div>
                                                </div>
                                        <?php
                                            }
                                        } else {
                                            echo '<p>No reviews available.</p>';
                                        }
                                        ?>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="rating-wrap">
                                            <h3 class="head">Give a Review</h3>
                                            <div class="wrap">
                                                <?php

                                                $reviews_query = "SELECT 
                                                    COUNT(*) AS total_reviews,
                                                    SUM(CASE WHEN rating = 5 THEN 1 ELSE 0 END) AS five_star_count,
                                                    SUM(CASE WHEN rating = 4 THEN 1 ELSE 0 END) AS four_star_count,
                                                    SUM(CASE WHEN rating = 3 THEN 1 ELSE 0 END) AS three_star_count,
                                                    SUM(CASE WHEN rating = 2 THEN 1 ELSE 0 END) AS two_star_count,
                                                    SUM(CASE WHEN rating = 1 THEN 1 ELSE 0 END) AS one_star_count
                                                    FROM 
                                                    reviews 
                                                    WHERE 
                                                    car_id = " . $carDetails['id'];

                                                $reviews_result = mysqli_query($conn, $reviews_query);

                                                if ($reviews_result) {
                                                    $reviews_data = mysqli_fetch_assoc($reviews_result);

                                                    $total_reviews = $reviews_data['total_reviews'];
                                                    $five_star_count = $reviews_data['five_star_count'];
                                                    $four_star_count = $reviews_data['four_star_count'];
                                                    $three_star_count = $reviews_data['three_star_count'];
                                                    $two_star_count = $reviews_data['two_star_count'];
                                                    $one_star_count = $reviews_data['one_star_count'];

                                                    // Calculate percentages
                                                    $five_star_percentage = ($five_star_count / $total_reviews) * 100;
                                                    $four_star_percentage = ($four_star_count / $total_reviews) * 100;
                                                    $three_star_percentage = ($three_star_count / $total_reviews) * 100;
                                                    $two_star_percentage = ($two_star_count / $total_reviews) * 100;
                                                    $one_star_percentage = ($one_star_count / $total_reviews) * 100;

                                                }

                                                ?>
                                                <p class="star">
                                                    <span>
                                                        <i class="ion-ios-star"></i>
                                                        <i class="ion-ios-star"></i>
                                                        <i class="ion-ios-star"></i>
                                                        <i class="ion-ios-star"></i>
                                                        <i class="ion-ios-star"></i>
                                                        (<?php echo $five_star_percentage?>%)
                                                    </span>
                                                    <span>(<?php echo $five_star_count ?? 0?>) Reviews</span>
                                                </p>
                                                <p class="star">
                                                    <span>
                                                        <i class="ion-ios-star"></i>
                                                        <i class="ion-ios-star"></i>
                                                        <i class="ion-ios-star"></i>
                                                        <i class="ion-ios-star"></i>
                                                        (<?php echo $four_star_percentage?>%)
                                                    </span>
                                                    <span>(<?php echo  $four_star_count ?? 0?>) Reviews</span>
                                                </p>
                                                <p class="star">
                                                    <span>
                                                        <i class="ion-ios-star"></i>
                                                        <i class="ion-ios-star"></i>
                                                        <i class="ion-ios-star"></i>
                                                        (<?php echo $three_star_percentage?>%)
                                                    </span>
                                                    <span>(<?php echo $three_star_count ?? 0?>) Reviews</span>
                                                </p>
                                                <p class="star">
                                                    <span>
                                                        <i class="ion-ios-star"></i>
                                                        <i class="ion-ios-star"></i>
                                                        (<?php echo $two_star_percentage?>%)
                                                    </span>
                                                    <span>(<?php echo $two_star_count ?? 0?>) Reviews</span>
                                                </p>
                                                <p class="star">
                                                    <span>
                                                        <i class="ion-ios-star"></i>
                                                        (<?php echo $one_star_percentage?>%)
                                                    </span>
                                                    <span>(<?php echo $one_star_count ?? 0?>) Reviews</span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-no-pt">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                    <span class="subheading">Choose Car</span>
                    <h2 class="mb-2">Related Cars</h2>
                </div>
            </div>
            <div class="row">
                <?php
                $query = "SELECT * FROM cars LIMIT 3";
                $cars = mysqli_query($conn, $query);
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
                                        <p class="price ml-auto">₹<?php echo $row['daily_price'] ?> <span>/day</span></p>
                                    </div>
                                    <p class="d-flex mb-0 d-block"><a href="index.php?carId=<?php echo $row['id']; ?>" class="btn btn-primary py-2 mr-1">Book now</a>
                                        <a href="car-single.php?id=<?php echo $row['id']; ?>" class="btn btn-secondary py-2 ml-1">Details</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                <?php }
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