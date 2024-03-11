
        <?php

        include "header.php";
        include "connection.php";

        $query = "SELECT * FROM cars";
        $cars = mysqli_query($conn, $query);
        

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Prepare and bind parameters
            $stmt = $conn->prepare("INSERT INTO car_bookings (pickup_location, dropoff_location, pickup_date, dropoff_date, pickup_time, car_id, name, phone, driver_choice) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssisss", $pickup_location, $dropoff_location, $pickup_date, $dropoff_date, $pickup_time, $selected_car_id, $name, $phone, $driver_choice);

            // Set parameters
            $pickup_location = $_POST["pickup_location"];
            $dropoff_location = $_POST["dropoff_location"];
            $pickup_date = date('Y-m-d', strtotime($_POST["pickup_date"]));
            $dropoff_date = date('Y-m-d', strtotime($_POST["dropoff_date"]));
            $pickup_time = date('H:i:s', strtotime($_POST["pickup_time"]));
            $selected_car_id = $_POST["selected_car"];
            $name = $_POST["name"];
            $phone = $_POST["phone"];
            $driver_choice = $_POST["driver_choice"]; 

            if ($stmt->execute()) {
                $_SESSION['success_message'] = "Car rental request submitted successfully.";
            } else {
                $_SESSION['error_message'] = "Error: " . $stmt->error;
            }

            $stmt->close();
        }



        ?>

        <!-- <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <img src="images\logo.png" alt="logo" width="200" height="50">
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a href="index" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="about" class="nav-link">About</a></li>
                    <li class="nav-item"><a href="services" class="nav-link">Services</a></li>
                    <li class="nav-item"><a href="pricing" class="nav-link">Pricing</a></li>
                    <li class="nav-item"><a href="car" class="nav-link">Cars</a></li>
                    <li class="nav-item"><a href="contact" class="nav-link">Contact</a></li>
                    <li class="nav-item"><a href="" class="nav-link"><i class="fa-solid fa-right-to-bracket"></i></a></li>
                </ul>
            </div>
        </div>
    </nav> -->
        <!-- END nav -->

        <div class="hero-wrap ftco-degree-bg" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
                    <div class="col-lg-8 ftco-animate">
                        <div class="text w-100 text-center mb-md-5 pb-md-5">
                            <h1 class="mb-4">Fast &amp; Easy Way To Rent A Car</h1>

                            <div class="heading-title ml-5">
                                <span>
                                    <h2>
                                        <p style="color:white;">Easy steps for renting a car</p>
                                    </h2>
                                </span>
                            </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="ftco-section ftco-no-pt bg-light">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-md-12	featured-top">
                        <div class="row no-gutters">
                            <div class="col-md-4 d-flex align-items-center">
                                <form action="<?php echo isset($_SESSION['user_id']) ? 'index.php' : 'login.php'; ?>" method="POST" class="request-form ftco-animate bg-primary">

                                <?php  // Start the session
                                    if (isset($_SESSION['success_message'])) {
                                        echo '<div class="alert alert-success">' . $_SESSION['success_message'] . '</div>';
                                        unset($_SESSION['success_message']); // Remove the success message from session after displaying it
                                    } else if (isset($_SESSION['error_message'])) {
                                        echo '<div class="alert alert-danger">' . $_SESSION['error_message'] . '</div>';
                                        unset($_SESSION['error_message']); // Remove the success message from session after displaying it
                                    }
                                    ?>
                                    <h2>Make your trip</h2>
                                    <div class="form-group">
                                        <label for="" class="label">Pick-up location</label>
                                        <input name="pickup_location" type="text" class="form-control" placeholder="City, Airport, Station, etc" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="label">Drop-off location</label>
                                        <input name="dropoff_location" type="text" class="form-control" placeholder="City, Airport, Station, etc" required>
                                    </div>
                                    <div class="d-flex">
                                        <div class="form-group mr-2">
                                            <label for="" class="label">Pick-up date</label>
                                            <input name="pickup_date" type="date" class="form-control" min="<?php echo date('Y-m-d');?>" placeholder="Date"required>
                                        </div>
                                        <div class="form-group ml-2">
                                            <label for="" class="label">Drop-off date</label>
                                            <input name="dropoff_date" type="date" class="form-control" min="<?php echo date('Y-m-d');?>" placeholder="Date" required>
                                        </div>
                                    </div>

                                       <div class="form-group">
                                        <label for="" class="label">Pick-up time</label>
                                        <input name="pickup_time" type="text" class="form-control" id="time_pick" placeholder="Time" required>
                                    </div>
                                       <div class="form-group">
                                        <label for="" class="label">Select Car</label>
                                        <select class="form-control" name="selected_car" required>
                                            <option>Select Car </option>
                                            <?php
                                            $selectdCar=isset($_GET['carId']) ?$_GET['carId'] : '';
                                            // Populate select list with car options
                                            if (mysqli_num_rows($cars) > 0) {
                                                while ($row = mysqli_fetch_assoc($cars)) {
                                                    echo "<option value='" . $row["id"] . "' ".(($selectdCar ==  $row["id"])  ? 'selected' : '') .">" . $row["name"] . "</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                     <div class="form-group">
        <label for="driver_choice" class="label">Driver Choice</label>
        <select class="form-control" name="driver_choice" required>
            <option value="with_driver">With Driver</option>
            <option value="without_driver">Without Driver</option>
        </select>
    </div>
                                    <div class="form-group">
                                        <label for="" class="label">Name</label>
                                      <input name="name" type="text" class="form-control" id="name" placeholder="Name" required>

                                    </div>
                                    <div class="form-group">
                                        <label for="" class="label">Phone</label>
                                        <input name="phone" type="text" pattern="[789][0-9]{9}" class="form-control" id="phone" placeholder="Phone" required>
                                    </div>
                                 
                                 
                                    <div class="form-group">
                                        <input type="submit" value="Rent A Car Now" class="btn btn-secondary py-3 px-4">
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-8 d-flex align-items-center">
                                <div class="services-wrap rounded-right w-100">
                                    <h3 class="heading-section mb-4">Better Way to Rent Your Perfect Cars</h3>
                                    <div class="row d-flex mb-4">
                                        <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                                            <div class="services w-100 text-center">
                                                <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-route"></span></div>
                                                <div class="text w-100">
                                                    <h3 class="heading mb-2">Choose Your Pickup Location</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                                            <div class="services w-100 text-center">
                                                <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-handshake"></span></div>
                                                <div class="text w-100">
                                                    <h3 class="heading mb-2">Select the Best Deal</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                                            <div class="services w-100 text-center">
                                                <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-rent"></span></div>
                                                <div class="text w-100">
                                                    <h3 class="heading mb-2">Reserve Your Rental Car</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p><a href="#" class="btn btn-primary py-3 px-4">Reserve Your Perfect Car</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>


        <section class="ftco-section ftco-no-pt bg-light">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                        <span class="subheading">What we offer</span>
                        <h2 class="mb-2">Feeatured Vehicles</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="carousel-car owl-carousel">
                            <?php
                            
                            $query = "SELECT * FROM cars";
                            $cars = mysqli_query($conn, $query);
                            if (mysqli_num_rows($cars) > 0) {
                                while ($row = mysqli_fetch_assoc($cars)) {
                            ?>
                                    <div class="item">
                                        <div class="car-wrap rounded ftco-animate">
                                            <div class="img rounded d-flex align-items-end" style="background-image: url(<?php echo $row['image'] ?>);">
                                            </div>
                                            <div class="text">
                                                <h2 class="mb-0"><a href="#"> <?php echo $row['name'] ?></a></h2>
                                                <div class="d-flex mb-3">
                                                    <span class="cat"><?php echo $row['brand'] ?></span>
                                                    <p class="price ml-auto">₹<?php echo $row['hourly_price'] ?><span>/hours</span></p>
                                                </div>
                                                <p class="d-flex mb-0 d-block"><a href="<?php echo isset($_SESSION['user_id']) ? 'index.php?carId=' . $row['id'] : 'login.php'; ?>"   class="btn btn-primary py-2 mr-1">Book now</a>
                                                    <a href="car-single.php?id=<?php echo $row['id']; ?>" class="btn btn-secondary py-2 ml-1">Details</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                            <?php  }
                            } ?>
                            <!-- <div class="item">
                            <div class="car-wrap rounded ftco-animate">
                                <div class="img rounded d-flex align-items-end" style="background-image: url(images/Hyundai_Creta.jpg);">
                                </div>
                                <div class="text">
                                    <h2 class="mb-0"><a href="#">Creta</a></h2>
                                    <div class="d-flex mb-3">
                                        <span class="cat">Hyundai</span>
                                        <p class="price ml-auto">₹100<span>/hours</span></p>
                                    </div>
                                    <p class="d-flex mb-0 d-block"><a href="#" class="btn btn-primary py-2 mr-1">Book now</a> <a href="car-single2.php" class="btn btn-secondary py-2 ml-1">Details</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="car-wrap rounded ftco-animate">
                                <div class="img rounded d-flex align-items-end" style="background-image: url(images/S_Cross.jpg);">
                                </div>
                                <div class="text">
                                    <h2 class="mb-0"><a href="#">S-cross</a></h2>
                                    <div class="d-flex mb-3">
                                        <span class="cat">Suzuki</span>
                                        <p class="price ml-auto">₹100<span>/hours</span></p>
                                    </div>
                                    <p class="d-flex mb-0 d-block"><a href="#" class="btn btn-primary py-2 mr-1">Book now</a> <a href="car-single3.php" class="btn btn-secondary py-2 ml-1">Details</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="car-wrap rounded ftco-animate">
                                <div class="img rounded d-flex align-items-end" style="background-image: url(images/Kia_Carens.jpg);">
                                </div>
                                <div class="text">
                                    <h2 class="mb-0"><a href="#">Carens</a></h2>
                                    <div class="d-flex mb-3">
                                        <span class="cat">Kia</span>
                                        <p class="price ml-auto">₹200<span>/hours</span></p>
                                    </div>
                                    <p class="d-flex mb-0 d-block"><a href="#" class="btn btn-primary py-2 mr-1">Book now</a> <a href="car-single4.php" class="btn btn-secondary py-2 ml-1">Details</a></p>
                                </div>
                            </div>
                        </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="ftco-section ftco-about">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/rrrr.jpg);">
                    </div>
                    <div class="col-md-6 wrap-about ftco-animate">
                        <div class="heading-section heading-section-white pl-md-5">
                            <span class="subheading">About us</span>
                            <h2 class="mb-4">Welcome to Chill-Drive Car Rentals</h2>

                            <p>We are here to give you the best experience of your life. We want you and your family to enjoy to your fullest. Explore new, amazing and lovely places all over Kutch with the help of our cars. </p>
                            <p>Rent our cars with Drivers or without driver. We give our cars for any type of event. You can go to our offers and select any offer that is flexible according to your plan. We try to comfort and make our customers happy. If you enjoy Please share your feedback. </p>
                            <p><a href="car.php" class="btn btn-primary py-3 px-4">Search Vehicle</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="ftco-section">
            <div class="container">
                <div class="row justify-content-center mb-5">
                    <div class="col-md-7 text-center heading-section ftco-animate">
                        <span class="subheading">Services</span>
                        <h2 class="mb-3">Our Latest Services</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="services services-2 w-100 text-center">
                            <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-wedding-car"></span></div>
                            <div class="text w-100">
                                <h3 class="heading mb-2">Wedding Ceremony</h3>
                                <p>We give our best cars and best experince to make our special day memorable.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="services services-2 w-100 text-center">
                            <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-transportation"></span></div>
                            <div class="text w-100">
                                <h3 class="heading mb-2">City Transfer</h3>
                                <p>Make your trasfer easy, comfortable and Joyfull with us. Rent us for any type of trasfer.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="services services-2 w-100 text-center">
                            <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-car"></span></div>
                            <div class="text w-100">
                                <h3 class="heading mb-2">Airport</h3>
                                <p>Pre-book our cars for pick and drop. Let us make your journey On-time and comfortable.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="services services-2 w-100 text-center">
                            <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-transportation"></span></div>
                            <div class="text w-100">
                                <h3 class="heading mb-2">Whole City Tour</h3>
                                <p>It is very easy and convenient to vist city by book best package from us.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="ftco-section ftco-intro" style="background-image: url(images/bg_3.jpg);">
            <div class="overlay"></div>
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-md-6 heading-section heading-section-white ftco-animate">
                        <h2 class="mb-3">Do You Want To Earn With Us? So Don't Be Late.</h2>
                        <a href="job.php" class="btn btn-primary btn-lg">Become A Driver</a>
                    </div>
                </div>
            </div>
        </section>



        <section class="ftco-counter ftco-section img bg-light" id="section-counter">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                        <div class="block-18">
                            <div class="text text-border d-flex align-items-center">
                                <strong class="number" data-number="25">0</strong>
                                <span>Year <br>Experienced</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                        <div class="block-18">
                            <div class="text text-border d-flex align-items-center">
                                <strong class="number" data-number="10">0</strong>
                                <span>Total <br>Cars</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                        <div class="block-18">
                            <div class="text text-border d-flex align-items-center">
                                <strong class="number" data-number="1500">0</strong>
                                <span>Happy <br>Customers</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                        <div class="block-18">
                            <div class="text d-flex align-items-center">
                                <strong class="number" data-number="	1">0</strong>
                                <span>Total <br>Branches</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>





        <?php
        include "faq.php";
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

        </bod>