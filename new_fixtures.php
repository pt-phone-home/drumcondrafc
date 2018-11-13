<?php 
	require 'components/init.php';

	Auth::requireLogin();

$fixture = new Fixture();

 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
// Capture Text data from Form
	$conn = require 'components/db.php';

    $fixture->week_start = $_POST['date'];
    $fixture->fixture_list = $_POST['content'];

    
		if ($fixture->fixtureList($conn)) {
			Url::redirect("/drumcondrafc/fixtures.php");
		}
			

	}

?>


<html lang="en">

<head>
	<?php include 'components/head.php';
    ?>
	<title>Submit News Article - Drumcondra FC</title>
</head>

<body onLoad="iFrameOn();">

	<div class="new_newsitem-container">

		<?php include 'components/banner.php'; ?>

		<?php include 'components/admin-header.php'; ?>

		<section class="new_newsitem-intro">
			<h1>Add list of weekly fixtures</h1>
		</section>
		<section class="form-container">


			<?php include 'components/fixture-form.php';?>

		</section>











		<?php include 'components/footer.php'; 
        ?>




	</div>


	<?php include 'components/scripts.php'; ?>

<script>
	CKEDITOR.replace('content');
</script>


</body>

</html>