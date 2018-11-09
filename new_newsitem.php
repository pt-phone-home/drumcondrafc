<?php 
	require 'components/init.php';

	Auth::requireLogin();

$article = new Article();

 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
// Capture Text data from Form
	$conn = require 'components/db.php';

	$article->title = $_POST['title'];
	$article->headline = $_POST['headline'];
	$article->content = $_POST['content'];
	$filename = $_FILES['image']['name'];

	$destination = "img/uploads/$filename";

	move_uploaded_file($_FILES['image']['tmp_name'], $destination);

	$article->img = $filename;




	// $article->published_at = $_POST['published_at'];
    
		if ($article->create($conn)) {
			Url::redirect("/drumcondrafc/newsitem.php?id={$article->id}");
		}
			

	}

?>


<html lang="en">

<head>
	<?php include 'components/head.php';
    ?>
	<title>Submit News Article - Drumcondra FC</title>
</head>

<body>

	<div class="new_newsitem-container">

		<?php include 'components/banner.php'; ?>

		<?php include 'components/admin-header.php'; ?>

		<section class="new_newsitem-intro">
			<h1>Add new article</h1>
		</section>
		<section class="form-container">


			<?php include 'components/article-form.php';?>

		</section>











		<?php include 'components/footer.php'; 
        ?>




	</div>


	<?php include 'components/scripts.php'; ?>




</body>

</html>