<?php
// Start the session
session_start();
include "connection.php";
// die();


if (isset($_POST['datasend'])) {

  
  $resuly = mysqli_query($conn, "INSERT INTO job (name, email, message, license) VALUES ('" . $_POST['name'] . "','" . $_POST['email'] . "','" . $_POST['license'] . "','" . $_POST['message'] . "')");

  if($resuly){
    header('location: job.php?success=sent');
  }

}



?>


<?php

include "header.php";


$query = "SELECT * FROM job";
$cars = mysqli_query($conn, $query);

?>



<!-- <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/8.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container-fluid">
      
    </div>
  </section> -->
<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/8.jpg');" data-stellar-background-ratio="0.5">
  <div class="overlay"></div>
  <div class="container">
    <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
      <div class="col-md-9 ftco-animate pb-5">
        <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Jobs<i class="ion-ios-arrow-forward"></i></span></p>
        <h1 class="mb-3 bread">Become A Driver</h1>
      </div>
    </div>
  </div>
</section>


<section class="ftco-section contact-section">
  <div class="container">
    <div class="row d-flex mb-5 contact-info">
      <div class="col-md-4">
        <div class="row mb-5">
          <div class="col-md-12" style=" overflow: hidden;">
            <div class="border w-100 p-4 rounded mb-2 d-flex">

              <img src="https://zoom.cab/wp-content/uploads/2020/07/become-a-driver.jpg" alt="">
            </div>
          </div>

        </div>
      </div>
      <div class="col-md-8 block-9 mb-md-5">

        <form action="job.php" method="POST" class="bg-light p-5 contact-form">
          
          <div class="form-group">
            <h2 class="d-flex justify-content-center"><strong>Become a Driver</strong></h2>
            <input type="hidden" name="datasend">
          </div>

        <?php  if(isset($_GET['success'])){
         echo "<div class='form-group'>
            <div class='alert alert-success' role='alert'>
              Your Application Submitted
            </div>
          </div>";
          } ?>

          <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Full name" required>
          </div>
          <div class="form-group">
            <input type="text" name="email" class="form-control" placeholder="Email address" required>
          </div>
          <div class="form-group">
            <input type="text" name="license" class="form-control" placeholder="License Number" required>
          </div>
          <div class="form-group">
            <textarea name="message" id="" cols="30" rows="7" class="form-control" placeholder="Message" required></textarea>
          </div>
          <div class="form-group">
            <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
          </div>
        </form>

      </div>
    </div>
  </div>
</section>
<?php

include "footer.php";
?>
<!-- loader -->
<div id="ftco-loader" class="show fullscreen">
  <svg class="circular" width="48px" height="48px">
    <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
    <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
  </svg>
</div>


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