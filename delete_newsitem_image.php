<?php
    //phpinfo();

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $previous_image = $article->img;

    if ($article->setImageFile($conn, null)) {
        if ($previous_image) {
            unlink("img/uploads/$previous_image");
        }

        Url::redirect("/drumcondrafc/newsitem.php?id={$article->id}");
    }
}   
?>

<html lang="en">

<head>
	<?php include 'components/head.php';
    ?>
	<title>Delete Article Image - Drumcondra FC</title>
</head>

<body>

	<div class="new_newsitem-container">

		<?php include 'components/banner.php'; ?>

		<?php include 'components/admin-header.php'; ?>

		<section class="new_newsitem-intro">
			<h1>Edit article Image</h1>
		</section>
		<section class="form-container">

			<form method="POST" class="contact-form">

				<p>Are you sure?</p>

				<button>Delete</button>
				<a href="edit_newsitem_image.php?id=<?= $article->id;?>">Cancel</a>
			</form>


		</section>

		<?php include 'components/footer.php'; ?>
	</div>
	<?php include 'components/scripts.php'; ?>
    <script>

    
    </script>
  
</body>
</html>