<?php
	require 'classes/Database.php';
	require 'classes/Article.php';
	$db = new Database();
	$conn = $db->getConn();

	$articles = Article::getALL($conn);
	

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
					<?= htmlspecialchars($article['title'])?>
				</h1>
				<div class="news-item-img">
					<img src="img/uploads/<?= $article['img'];?>" alt="">
				</div>
				<div class="news-item-content">
					<?= htmlspecialchars($article['content'])?>
				</div>
				<div class="news-item-footer">
					<a href="newsitem.php?id=<?= $article['id'];?>">Read More</a>
				</div>
			</div>
			<?php endforeach; ?>

		</div>

		<?php include 'components/footer.php'; ?>
		<?php include 'components/add.php'; ?>




	</div>


	<?php include 'components/scripts.php'; ?>
    <script>

    
    </script>
  
</body>
</html>