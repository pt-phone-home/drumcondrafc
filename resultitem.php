<?php
	require 'components/init.php';

	$db = new Database();
	$conn = $db->getConn();

	if (isset($_GET['id'])) {
	
		$results = Result::getByID($conn, $_GET['id']);

} else {
	$results = null;
}

?>




<html lang="en">

<head>
	<?php include 'components/head.php';
    ?>
	<title>Results - Drumcondra FC</title>
</head>

<body>

	<div class="news-container">

		<?php include 'components/banner.php'; ?>

		<?php include 'components/header.php'; ?>

		<div class="news-header">
			<h1>Results</h1>
			<i class="fas fa-trophy"></i>

		</div>

		<div class="section-newsitem">
			<?php if ($results): ?>
			<div class="news-item-full">
				<h1>Week Beginning
					<?= htmlspecialchars($results->week_start); ?>
				</h1>
				<div class="news-item-full-content">
					<p>
						<?= ($results->result_list); ?>
					</p>
				</div>
				<div class="news-item-full-footer">
					<a href="fixtures.php">Back to Results</a>
				</div>
			</div>

			<?php else: ?>
			<p>No fixtures found</p>

			<?php endif; ?>

		</div>

		<?php include 'components/footer.php'; ?>
		<?php include 'components/add.php'; ?>




	</div>


	<?php include 'components/scripts.php'; ?>
    <script>

    
    </script>
  
</body>
</html>