
	<?php

	include "header.php";
	include "connection.php";

	// Perform database query to fetch car data
	$query = "SELECT * FROM cars";
	$cars = mysqli_query($conn, $query);
	if ($cars) {
	?>


		<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/3.jpg');" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
					<div class="col-md-9 ftco-animate pb-5">
						<p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Pricing <i class="ion-ios-arrow-forward"></i></span></p>
						<h1 class="mb-3 bread">Pricing</h1>
					</div>
				</div>
			</div>
		</section>

		<section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
					<div class="col-md-12 ftco-animate">
						<div class="car-list">
							<table class="table">
								<thead class="thead-primary">
									<tr class="text-center">
										<th>&nbsp;</th>
										<th>&nbsp;</th>
										<th class="bg-primary heading">Per Hour Rate</th>
										<th class="bg-dark heading">Per Day Rate</th>

									</tr>
								</thead>
								<tbody>
									<?php
									// Loop through each row of data
									while ($row = mysqli_fetch_assoc($cars)) {
									?>
										<tr class="">
											<td class="car-image">
												<div class="img" style="background-image:url(<?php echo $row['image']; ?>);"></div>
											</td>
											<td class="product-name">
												<h3><?php echo $row['name']; ?></h3>
												<p class="mb-0 rated">
													<span>rated:</span>
													<span class="ion-ios-star"></span>
													<span class="ion-ios-star"></span>
													<span class="ion-ios-star"></span>
													<span class="ion-ios-star"></span>
													<span class="ion-ios-star"></span>
												</p>
											</td>

											<td class="price">
												<p class="btn-custom"><a href="index.php?carId=<?php echo $row['id'] ?>">Rent a car</a></p>
												<div class="price-rate">
													<h3>
														<span class="num"><small class="currency">₹</small> <?php echo $row['hourly_price']; ?></span>
														<span class="per">/per hour</span>
													</h3>
													<span class="subheading">Fuel Charge on customer.</span>
												</div>
											</td>

											<td class="price">
												<p class="btn-custom"><a href="index.php?carId=<?php echo $row['id'] ?>">Rent a car</a></p>
												<div class="price-rate">
													<h3>
														<span class="num"><small class="currency">₹</small> <?php echo $row['daily_price']; ?></span>
														<span class="per">/per day</span>
													</h3>
													<span class="subheading">Fuel Charge on customer.</span>
												</div>
											</td>
										</tr><!-- END TR-->

									<?php }
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</section>


	<?php } ?>
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