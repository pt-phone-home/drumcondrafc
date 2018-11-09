<?php 
	require 'components/init.php';

	Auth::requireLogin();

$feat_fixture = new Fixture();

 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     // Capture Text data from Form
     $conn = require 'components/db.php';
 
    $feat_fixture->date = $_POST['date'];
    $feat_fixture->squad = $_POST['squad'];
    $feat_fixture->home_team = $_POST['home_team'];
    $feat_fixture->away_team = $_POST['away_team'];
    $feat_fixture->location = $_POST['location'];
    $feat_fixture->time = $_POST['time'];

    if ($feat_fixture) {
        $feat_fixture->createFeatured($conn);
        Url::redirect("/drumcondrafc/home.php");
    }
 
    }

?>


<html lang="en">

<head>
	<?php include 'components/head.php';
    ?>
	<title>Featured Fixture - Drumcondra FC</title>
</head>

<body>

	<div class="new_newsitem-container">

		<?php include 'components/banner.php'; ?>

		<?php include 'components/admin-header.php'; ?>

		<section class="new_newsitem-intro">
			<h1>Add new featured fixture</h1>
		</section>
		<section class="form-container">


			<?php include 'components/featured_fixture-form.php';?>

		</section>











		<?php include 'components/footer.php'; 
        ?>




	</div>


	<?php include 'components/scripts.php'; ?>




</body>

</html>