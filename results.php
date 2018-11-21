<?php 
require 'components/init.php';
$db = new Database();
$conn = $db->getConn();
$results = Result::getAll($conn);

?>

<html lang="en">

<head>
	<?php include 'components/head.php';
    ?>
	<title>Results - Drumcondra A.F.C</title>
</head>

<body>

	<div class="fixtures-container">

		<?php include 'components/banner.php'; ?>

		<?php include 'components/header.php'; ?>
		<div class="news-header">
			<h1>Results List</h1>
			<i class="fas fa-trophy"></i>

		</div>

		<div class="fixtures">
			<?php foreach ($results as $res) :?>
			<div class="fixture_card">
				<h3>Week Beginning :</h3>
				<a href="resultitem.php?id=<?=$res['id']; ?>">
					<h1>
						<?=$res['week_start'] ;?>
					</h1>
				</a>
				<p>Click for a list of Results</p>

			</div>

			<?php endforeach; ?>




		</div>

		<?php include 'components/footer.php'; ?>
		<?php include 'components/add.php'; ?>
	</div>


	<?php include 'components/scripts.php'; ?>

</body>

</html>