<?php
	require 'components/database.php';

	$conn = getDB();

	if (isset($_GET['id']) && is_numeric($_GET['id'])) {
	$sql = "SELECT *
			FROM news
			WHERE id=" . $_GET['id'];

	// var_dump($sql);

	$results = mysqli_query($conn, $sql);

	if ($results === FALSE) {
		echo mysqli_error($conn);
	} else {
		$article = mysqli_fetch_assoc($results);
	}

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