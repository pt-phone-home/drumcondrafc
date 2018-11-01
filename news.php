<?php
	require 'components/database.php';

	$sql = "SELECT *
			FROM news
			ORDER BY published_at DESC
			LIMIT 10";

	$results = mysqli_query($conn, $sql);

	if ($results === FALSE) {
		echo mysqli_error($conn);
	} else {
		$articles = mysqli_fetch_all($results, MYSQLI_ASSOC);
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

		<div class="section-news">
			<?php foreach ($articles as $article): ?>
			<div class="news-item">
				<h1>
					<?= $article['title']?>
				</h1>
				<div class="news-item-img">
					<img src="img/uploads/<?= $article['img'];?>" alt="">
				</div>
				<div class="news-item-content">
					<?= $article['content']?>
				</div>
				<div class="news-item-footer">
					<a href="newsitem.php?id=<?= $article['id'];?>">Read More</a>
				</div>
			</div>
			<?php endforeach; ?>

		</div>

		<?php include 'components/footer.php'; ?>




	</div>


	<?php include 'components/scripts.php'; ?>
    <script>

    
    </script>
  
</body>
</html>