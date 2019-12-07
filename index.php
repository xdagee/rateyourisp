<?php 
// connection
require_once 'db_config/db_config.php';

// ratings
if (isset($_POST['insert'])) {
	
	// variables to rep values to be posted
	$telco = $_POST['telco'];
	$region = $_POST['region'];
	$area = $_POST['area'];
	$reliability = $_POST['reliability'];
	$pricing = $_POST['pricing'];
	$support = $_POST['support'];

	// SQL Query
	$sql = "INSERT INTO tbl_ratings 
	(
		col_telco, col_region, col_area, col_reliability, col_pricing, col_support
		) VALUES (
		:telco, :region, :area, :reliability, :pricing, :support
	)";

	// preparing the SQL query
	$query = $dbh->prepare($sql);

	// binding the variables to the values
	$query->bindParam(':telco', $telco, PDO::PARAM_STR);
	$query->bindParam(':region', $region, PDO::PARAM_STR);
	$query->bindParam(':area', $area, PDO::PARAM_STR);
	$query->bindParam(':reliability', $reliability, PDO::PARAM_STR);
	$query->bindParam(':pricing', $pricing, PDO::PARAM_STR);
	$query->bindParam(':support', $support, PDO::PARAM_STR);

	// now let's execute the query
	$query->execute();
}

// email subscribing
if (isset($_POST['subscribe'])) {
	
	// variables to rep values to be posted
	$email = $_POST['email'];

	// SQL Query
	$sql = "INSERT INTO tbl_email_subscribers 
	(
		col_email
		) VALUES (
		:email
	)";

	// preparing the SQL query
	$query = $dbh->prepare($sql);

	// binding the variables to the values
	$query->bindParam(':email', $email, PDO::PARAM_STR);

	// now let's execute the query
	$query->execute();
}

?>

<!DOCTYPE HTML>
<!--
	Hyperspace by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>rateyourisp</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Sidebar -->
			<section id="sidebar">
				<div class="inner">
					<nav>
						<ul>
							<li><a href="#intro">welcome</a></li>
							<li><a href="#rate">rate your telco</a></li>
							<li><a href="#work">how it works</a></li>
							<li><a href="#stay">stay in the loop</a></li>
						</ul>
					</nav>
				</div>
			</section>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Welcome -->
					<section id="intro" class="wrapper style4 fullscreen fade-up">
						<div class="inner">
							<h1>rateyourTelcos.</h1>
							<h3>the one and only independent and trusted platform to know and share how our telecos are doing across the country.</h3>
							<i>enough with the price hikes, throttling of bandwidth data, unavailability of services and lack or no support from our telcos. <br> the time is now, <b>#saveourdata</b>, and <b>rate a telco now</b>. </i>
							<p></p>
							<ul class="actions">
								<li><a href="#rate" class="button scrolly">rate them now</a></li>
							</ul>
						</div>
					</section>

				<!-- Rate -->
					<section id="rate" class="wrapper style1 fade-up">
						<div class="inner">
							<h2>Rate your telco</h2>
							<p>express your grievances by filling out the form to rate the kind of ISP you are on and the services been provided.</p>
							
								<section>
									<form method="post">
										<div class="row gtr-uniform">
											<!-- telco -->
											<div class="col-8 col-12-xsmall">
												<label for="telco">Which telecommunication network do you use?</label>
												<select name="telco" required="telco">
													<option value="" selected="">select your teleco</option>
													<option value="100" name="telco">AirtelTigo</option>
													<option value="200" name="telco">Glo</option>
													<option value="300" name="telco">MTN</option>
													<option value="400" name="telco">Vodafone</option>
												</select>
											</div> <br>

											<!-- region -->
											<div class="col-6 col-12-xsmall">
												<label for="region">Which region are you in?</label>
												<select name="region" required="region">
													<option value="" selected="">select your region</option>
													<option value="1">Ahafo Region</option>
													<option value="2">Ashanti Region</option>
													<option value="3">Bono Region</option>
													<option value="4">Bono East Region</option>
													<option value="5">Central Region</option>
													<option value="6">Eastern Region</option>
													<option value="7">Greater Accra Region</option>
													<option value="8">Northern Region</option>
													<option value="9">North East Region</option>
													<option value="10">Oti Region</option>
													<option value="11">Savannah Region</option>
													<option value="13">Volta Region</option>
													<option value="13">Western Region</option>
													<option value="14">Western North Region</option>
													<option value="15">Upper East Region</option>
													<option value="16">Upper West Region</option>
												</select>
											</div>

											<!-- area -->
											<div class="col-6 col-12-xsmall">
												<label for="area">Which area do you live in?</label>
												<input type="text" name="area" required="area" placeholder="enter your area" />
											</div>

											<!-- connectivity -->
											<div class="col-8 col-12-xsmall">
												<label for="reliability">How reliable is the network connectivity in your area?</label>

												<input type ="radio" name="reliability" value="1" id="1" required="reliability" />
												<label for="1">very poor</label>

												<input type ="radio" name="reliability" value="2" id="2" required="reliability" />
												<label for="2">poor</label>

												<input type="radio" name="reliability" value="3" id="3" required="reliability" />
												<label for="3">okay</label>
												
												<input type="radio" name="reliability" value="4" id="4" required="reliability" />
												<label for="4">good</label>

												<input type="radio" name="reliability" value="5" id="5" required="reliability" />
												<label for="5">very good</label>

												<input type="radio" name="reliability" value="6" id="6" required="reliability" />
												<label for="6">excellent</label>	
											</div>
											
											<!-- data bundle -->
											<div class="col-10 col-12-xsmall">
												<label for="pricing">How expensive is data bundle on your telecommunication network?</label>

												<input type="radio" name="pricing" value="7" id="7" required="pricing" />
												<label for="7">very expensive</label>

												<input type="radio" name="pricing" value="8" id="8" required="pricing" />
												<label for="8">expensive</label>

												<input type="radio" name="pricing" value="9" id="9" required="pricing" />
												<label for="9">okay</label>

												<input type="radio" name="pricing" value="10" id="10" required="pricing" />
												<label for="10">affordable</label>

												<input type="radio" name="pricing" value="11" id="11" required="pricing" />
												<label for="11">very affordable</label>

												<input type="radio" name="pricing" value="12" id="12" required="pricing" />
												<label for="12">cheap</label>
											</div>

											<!-- customer service -->
											<div class="col-8 col-12-xsmall">
												<label for="support">How is their customer service support?</label>

												<input type="radio" name="support" id="13" value="13" required="support" />
												<label for="13">very poor</label>

												<input type="radio" name="support" id="14" value="14" required="support" />
												<label for="14">poor</label>

												<input type="radio" name="support" id="15" value="15" required="support" />
												<label for="15">okay</label>

												<input type="radio" name="support" id="16" value="16" required="support" />
												<label for="16">good</label>

												<input type="radio" name="support" id="17" value="17" required="support" />
												<label for="17">very good</label>

												<input type="radio" name="support" id="18" value="18" required="support" />
												<label for="18">excellent</label>
											</div>

											<div class="col-6 col-12-xsmall">
												<ul class="actions">
													<li>
														<input type="submit" name="insert" value="Submit Your Ratings" class="primary" />
													</li>
												</ul>
											</div>
										</div>
									</form>
								</section>
						</div>
					</section>

				<!-- Work -->
					<section id="work" class="wrapper style3 fade-up">
						<div class="inner">
							<h2>How it works</h2>
							<p>the system works by collating all results from Ghanaians and providing a rank based on the feedbaok of what the results says. <br> rateyourISP stands for <b>fairness</b>, <b>openess</b>, <b>truth</b> and <b>integrity</b>.</p>
							<div class="features">
								<section>
									<span class="icon solid major fa-code"></span>
									<h3>Fairness</h3>
									<p>The information provided is not altered in a way to favor a particular telecommunication company and it is as from what Ghanaians are saying.</p>
									
								</section>
								<section>
									<span class="icon solid major fa-lock"></span>
									<h3>Openness</h3>
									<p>The platform is open to all Ghanaians who are willing to take sometime and rate their telecomunication company and the data is open and available for Ghanains to access it.</p>
								</section>
								<section>
									<span class="icon solid major fa-cog"></span>
									<h3>Truth</h3>
									<p>The results is a true reflection of what Ghanaians are saying and it hasn't been altered in anyway only to provide a rating based on the results from the data.</p>
								</section>
								<section>
									<span class="icon solid major fa-desktop"></span>
									<h3>Intergrity</h3>
									<p>We stand by our words that we won't go against what has been stated as our core values to prividing the state of a telecommunication company in the country.</p>
								</section>
							</div>
						</div>
					</section>

				<!-- Stay -->
				<section id="stay" class="wrapper style1 fade-up">
					<div class="inner">
						<h2>Stay in the loop</h2>
						<p>intrested in other indept analytical report on the various telecommunication companies? <br> kindly subscribe to our email newsletter.</p>
						<div class="split style1">
							<section>
								<form method="post">
									<div class="row gtr-uniform">
										<div class="col-8 col-12-xsmall">
											<label for="email">Your email address</label>
											<input type="text" name="email" required="email" />
										</div>	
									</div>
									<p></p>
									<ul class="actions">
										<li><input type="submit" name="subscribe" value="subscribe" class="primary"></li>
									</ul>
								</form>
							</section>
							<section>
								<ul class="contact">
									<li>
										<h3>Email</h3>
										<a href="#">info@rateyourISP.org</a>
									</li>
									
									<li>
										<h3>We are Social</h3>
										<ul class="icons">
											<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
											<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
											<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
										</ul>
									</li>
								</ul>
							</section>
						</div>
					</div>
				</section>
					

			</div>

		<!-- Footer -->
			<footer id="footer" class="wrapper style1-alt">
				<div class="inner">
					<ul class="menu">
						<li>&copy; rateyourTelco. All rights reserved. 2019 </li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
					</ul>
				</div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>