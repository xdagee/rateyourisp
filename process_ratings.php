<?php 
    // db connection file
    require_once 'db_config/db_config.php';

    // process_ratings.php => to process user ratings
	
	// variables to rep values to be posted
	$telco = $_POST['telco'];
	$region = $_POST['region'];
	$area = $_POST['area'];
	$reliability = $_POST['reliability'];
	$pricing = $_POST['pricing'];
	$support = $_POST['support'];

	// SQL Query
	$sql = "INSERT INTO tbl_ratings (
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

?>