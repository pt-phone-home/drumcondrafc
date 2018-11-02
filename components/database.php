<?php 


/**
 * Get the database connection
 * 
 * @return object connection to a MSQL server
 * 
 */

function getDB() {
	
	$db_host = 'localhost';
	$db_name = 'drumcondrafc';
	$db_user = 'drums_admin';
	$db_password = 'NDF9QRpEHixAQtIS';

	$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);

	if (mysqli_connect_error()) {
		echo mysqli_connect_error();
		exit;
	}

	echo 'Connection Successful';
	return $conn;
}





    