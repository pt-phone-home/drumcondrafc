<?php 
require 'components/init.php';
$db = new Database();
$conn = $db->getConn();
$fixtures = Fixture::getAll($conn);

?>

<html lang="en">

<head>
	<?php include 'components/head.php';
    ?>
	<title>Fixtures - Drumcondra A.F.C</title>
</head>

<body>

	<div class="fixtures-container">

		<?php include 'components/banner.php'; ?>

		<?php include 'components/header.php'; ?>
		<div class="news-header">
			<h1>Fixture List</h1>
			<i class="fas fa-newspaper"></i>

		</div>

		<div class="fixtures">
			<?php foreach ($fixtures as $fix) :?>
			<div class="fixture_card">
				<h3>Week Beginning :</h3>
				<a href="fixtureitem.php?id=<?=$fix['id']; ?>">
					<h1>
						<?=$fix['week_start'] ;?>
					</h1>
				</a>
				<p>Click for a list of fixtures</p>

			</div>

			<?php endforeach; ?>




		</div>

		<?php include 'components/footer.php'; ?>
		<?php include 'components/add.php'; ?>
	</div>


	<?php include 'components/scripts.php'; ?>

</body>

</html>