<?php
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


	$sql = "SELECT *
			FROM news
			ORDER BY published_at DESC
			LIMIT 6";

	$results = mysqli_query($conn, $sql);

	if ($results === FALSE) {
		echo mysqli_error($conn);
	} else {
		$articles = mysqli_fetch_all($results, MYSQLI_ASSOC);
	}

?>




<html lang="en">

<head>
	<?php include 'components/head.php';
    ?>
	<title>News - Drumcondra FC</title>
</head>

<body>

	<div class="news-container">

		<?php include 'components/banner.php'; ?>

		<?php include 'components/header.php'; ?>

		<div class="news-header">
			<h1>Latest News</h1>
			<i class="fas fa-newspaper"></i>

		</div>

		<div class="section-news">


		</div>

		<?php include 'components/footer.php'; ?>




	</div>


	<?php include 'components/scripts.php'; ?>
    <script>

    
    </script>
  
</body>
</html>