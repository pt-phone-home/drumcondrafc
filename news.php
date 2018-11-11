<?php
	require 'components/init.php';

	$db = new Database();
	$conn = $db->getConn();
// GETTING THE NEWS QUERY WITH PAGINATOR
	if (isset($_GET['page'])) {
		$paginator = new Paginator($_GET['page'], 3, Article::getTotal($conn));
	} else {
		$paginator = new Paginator(1, 3, Article::getTotal($conn));
	}
	$articles = Article::getPage($conn, $paginator->limit, $paginator->offset);
	
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
					<?php if ($article['img']) :?>
					<img src="img/uploads/<?= $article['img'];?>" alt="">
					<?php else :?>
					<img src="img/uploads/default.jpg" alt="">
					<?php endif; ?>
				</div>
				<div class="news-item-content">
					<?= $article['content']?>
				</div>
				<div class="news-item-footer">
					<a href="newsitem.php?id=<?= $article['id'];?>">Read More</a>
				</div>
			</div>
			<?php endforeach; ?>
			<?php require 'components/pagination.php'; ?>
		</div>

		<?php include 'components/footer.php'; ?>
		<?php include 'components/add.php'; ?>




	</div>


	<?php include 'components/scripts.php'; ?>
    <script>

    
    </script>
  
</body>
</html>