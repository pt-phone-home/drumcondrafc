<?php 
	require 'components/init.php';

	Auth::requireLogin();

$feat_result = new Result();

 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     // Capture Text data from Form
     $conn = require 'components/db.php';
 
    $feat_result->date = $_POST['date'];
    $feat_result->squad = $_POST['squad'];
    $feat_result->home_team = $_POST['home_team'];
    $feat_result->away_team = $_POST['away_team'];
    $feat_result->home_team_score = $_POST['home_team_score'];
    $feat_result->away_team_score = $_POST['away_team_score'];

    if ($feat_result) {
        $feat_result->createFeatured($conn);
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
			<h1>Add new featured result</h1>
		</section>
		<section class="form-container">


			<?php include 'components/featured_result-form.php';?>

		</section>











		<?php include 'components/footer.php'; 
        ?>




	</div>


	<?php include 'components/scripts.php'; ?>




</body>

</html>