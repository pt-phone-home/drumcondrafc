<?php
	require 'components/database.php';
	require 'components/article.php';
	$conn = getDB();

	if (isset($_GET['id'])) {
	
		$article = getArticle($conn, $_GET['id']);

} else {
	$article = null;
}

?>




<html lang="en">

<head>
	<?php include 'components/head.php';
    ?>
	<title>News - Drumcondra FC</title>
</head>

<body>

	<div class="news-container">

		<?php include 'components/banner.php'; ?>

		<?php include 'components/header.php'; ?>

		<div class="news-header">
			<h1>Latest News</h1>
			<i class="fas fa-newspaper"></i>

		</div>

		<div class="section-newsitem">
			<?php if ($article === null): ?>
			<p>News Item not found!</p>
			<?php else: ?>
			<div class="news-item-full">
				<h1>
					<?= htmlspecialchars($article['title'])?>
				</h1>
				<div class="news-item-full-img">
					<img src="img/uploads/<?= $article['img'];?>" alt="">
				</div>
				<div class="news-item-full-content">
					<p>
						<?= htmlspecialchars($article['content'])?>
					</p>
				</div>
				<div class="news-item-full-footer">
					<a href="news.php">Back to news</a>
					<a href="edit_newsitem.php?id=<?= $article['id']?>">Edit</a>
					<a href="delete-article.php?id=<?= $article['id']?>">Delete</a>
				</div>
			</div>
			<?php endif; ?>

		</div>

		<?php include 'components/footer.php'; ?>
		<?php include 'components/add.php'; ?>




	</div>


	<?php include 'components/scripts.php'; ?>
    <script>

    
    </script>
  
</body>
</html>