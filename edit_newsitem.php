<?php
	require 'components/database.php';
	require 'components/article.php';
	$conn = getDB();

	if (isset($_GET['id'])) {
	
		$article = getArticle($conn, $_GET['id']);

        if ($article) {

            $title = $article['title'];
            $headline = $article['headline'];
            $content = $article['content'];
            $published_at = $article['published_at'];
        } else {
			die("article not found");	
		}

} else {
	die("id not supplied, article not found");
}

var_dump($article);
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

		<?php include 'components/header.php'; ?>

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