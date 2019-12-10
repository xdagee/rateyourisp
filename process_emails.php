<?php

	// database connection file
	require_once 'db_config/db_config.php';

	// email subscrinbing
	// variables to rep values to be posted
	$email = $_POST['email'];

	// SQL Query
	$sql = "INSERT INTO tbl_email_subscribers (col_email) VALUES (:email)";

	// preparing the SQL query
	$query = $dbh->prepare($sql);

	// binding the variables to the values
	$query->bindParam(':email', $email, PDO::PARAM_STR);

	// now let's execute the query
	$query->execute();

?>