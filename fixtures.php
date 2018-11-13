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

		<div class="fixtures">
			<?php foreach ($fixtures as $fix) :?>
			<div class="card">
				<h1>
					<?=$fix['week_start'] ;?>
				</h1>

			</div>

			<?php endforeach; ?>
			<div class="card">
				<h1></h1>

			</div>



		</div>

		<?php include 'components/footer.php'; ?>
		<?php include 'components/add.php'; ?>
	</div>


	<?php include 'components/scripts.php'; ?>

</body>

</html>