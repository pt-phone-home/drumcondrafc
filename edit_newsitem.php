<?php
	require 'components/init.php';

	Auth::requireLogin();
	
	$conn = require 'components/db.php';

	if (isset($_GET['id'])) {
	
		$article = Article::getByID($conn, $_GET['id']);

        if (! $article) {
			die("article not found");	
			}

} else {
	die("id not supplied, article not found");
}

if ($_SERVER['REQUEST_METHOD']== 'POST') {

	$article->title = $_POST['title'];
	$article->headline = $_POST['headline'];
	$article->content = $_POST['content'];
	$article->published_at = $_POST['published_at'];
	$filename = $_FILES['image']['name'];

	$destination = "img/uploads/$filename";

	move_uploaded_file($_FILES['image']['tmp_name'], $destination);

	$article->img = $filename;

    
	if ($article->update($conn)) {
		Url::redirect("/drumcondrafc/newsitem.php?id={$article->id}");
	}

}
?>

<html lang="en">

<head>
	<?php include 'components/head.php';
    ?>
	<title>Edit News Article - Drumcondra FC</title>
</head>

<body>

	<div class="new_newsitem-container">

		<?php include 'components/banner.php'; ?>

		<?php include 'components/admin-header.php'; ?>

		<section class="new_newsitem-intro">
			<h1>Edit article</h1>
		</section>
		<section class="form-container">


			<?php include 'components/article-form.php';?>

		</section>

		<?php include 'components/footer.php'; ?>
	</div>
	<?php include 'components/scripts.php'; ?>
    <script>

    
    </script>
  
</body>
</html>