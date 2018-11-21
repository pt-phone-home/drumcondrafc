<?php 
	require 'components/init.php';

	Auth::requireLogin();

$result = new Result();

 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
// Capture Text data from Form
	$conn = require 'components/db.php';

    $result->week_start = $_POST['date'];
    $result->result_list = $_POST['content'];

    
		if ($result->resultList($conn)) {
			Url::redirect("/drumcondrafc/results.php");
		}
			

	}

?>


<html lang="en">

<head>
	<?php include 'components/head.php';
    ?>
	<title>Submit Results - Drumcondra FC</title>
</head>

<body onLoad="iFrameOn();">

	<div class="new_newsitem-container">

		<?php include 'components/banner.php'; ?>

		<?php include 'components/admin-header.php'; ?>

		<section class="new_newsitem-intro">
			<h1>Add list of weekly results</h1>
		</section>
		<section class="form-container">


			<?php include 'components/result-form.php';?>

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