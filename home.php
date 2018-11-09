<?php
	require 'components/init.php';
	// NEWS QUERY

	$conn = require 'components/db.php';

	$paginator = new Paginator(1, 6, Article::getTotal($conn));

	$articles = Article::getPage($conn, $paginator->limit, $paginator->offset);

	$feat_paginator = new Paginator(1, 4, Article::getTotal($conn));

	$feat_articles = Article::getPage($conn, $feat_paginator->limit, $feat_paginator->offset);

	// FEATURED FIXTURE QUERY
	$featured_fixture_sql = "SELECT *
							FROM featured_fixture
							ORDER BY id DESC
							LIMIT 1";

	$featured_fixture_result = $conn->query($featured_fixture_sql);

	if ($featured_fixture_result === FALSE) {
		echo $conn->errorInfo();
	} else {
		$feat_fixture = $featured_fixture_result->fetchAll(PDO::FETCH_ASSOC);
	}

	// FEATURED RESULT QUERY
	$featured_score_sql = "SELECT *
							FROM featured_score
							ORDER BY id DESC
							LIMIT 1";
		
	$featured_score_result = $conn->query($featured_score_sql);

	if ($featured_score_result === FALSE) {
		echo $conn->errorInfo();
	} else {
		$feat_result = $featured_score_result->fetchAll(PDO::FETCH_ASSOC);
	}

?>


<html lang="en">

<head>
	<?php include 'components/head.php';
    ?>
	<title>Welcome To Drumcondra FC: One Club - One Community</title>
</head>

<body>

	<div class="home-container">

		<?php include 'components/banner.php'; ?>

		<?php include 'components/header.php'; ?>

		<section class="news_and_fixtures">

			<div class="news_and_fixtures-news carousel">
				<?php foreach ($feat_articles as $article): ?>
				<a href="newsitem.php?id=<?=$article['id']; ?>">
					<div class="slide fade">
						<?php if ($article['img']): ?>
						<img src="img/uploads/<?= $article['img'];?>" alt="" class="slide-img">
						<?php else :?>
						<img src="img/uploads/default.jpg" alt="" class="slide-img">
						<?php endif ;?>
						<h1 class="slide-headline from-left">
							<?= htmlspecialchars($article['title']); ?>
						</h1>
						<p class="slide-text">
							<?= htmlspecialchars($article['headline']);?>
						</p>
					</div>
				</a>
				<?php endforeach; ?>
				<!--
				<div class="slide fade">
					<img src="http://placehold.it/500x500" alt="" class="slide-img">
					<h1 class="slide-headline from-left">News Item 2</h1>
					<p class="slide-text">This is subtext</p>
				</div>
				<div class="slide fade">
					<img src="http://placehold.it/600x600" alt="" class="slide-img">
					<h1 class="slide-headline from-left">News Item 3</h1>
					<p class="slide-text">This is subtext</p>
				</div>
				-->

			</div>



			<div class="news_and_fixtures-fixtures">
				<div class="fixture1">

					<h1>
						<a href="fixtures.php"> Fixtures
							<i class="fas fa-forward"></i>
						</a>
					</h1>
					<div class="card card-small border-top-navy">
						<div class="card-header">
							<?php foreach ($feat_fixture as $fix):?>
							<div class="card-header-details">
								<h3>
									<?= $fix['date'];?>
								</h3>
								<br>
								<!-- <h4>Division X</h4> -->
								<h2>
									<?= htmlspecialchars($fix['squad']);?>
								</h2>
							</div>
							<div class="card-header-image">
								<i class="fas fa-calendar-alt navy-text "></i>
							</div>
						</div>
						<div class="card-content">
							<div class="team1">
								<?= htmlspecialchars($fix['home_team']);?>
							</div>
							<div class="vs">
								V's
							</div>
							<div class="team2">
								<?= htmlspecialchars($fix['away_team']);?>
							</div>
						</div>
						<div class="card-action">
							<p>
								<h2>Location:
									<?= htmlspecialchars($fix['location']);?>
								</h2>
								<h3>Time:
									<?= $fix['time'];?>
								</h3>
							</p>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
				<div class="fixture2">
					<h1>
						<?php foreach ($feat_result as $res): ?>
						<a href="#"> Results </a>
						<a href="#" alt="More Fixtures and Results">
							<i class="fas fa-forward"></i>
						</a>
					</h1>
					<div class="card card-small navy white-text border-top-yellow">
						<div class="card-header">
							<div class="card-header-details">
								<h3>
									<?= $res['date'];?>
								</h3>
								<br>
								<!--<h4>Division X</h4>-->
								<h2>
									<?= htmlspecialchars($res['squad']);?>
								</h2>
							</div>
							<div class="card-header-image">
								<i class="fas fa-trophy yellow-text "></i>
							</div>
						</div>
						<div class="card-content">
							<div class="team1">
								<?= htmlspecialchars($res['home_team']);?>
							</div>
							<div class="vs">
								V's
							</div>
							<div class="team2">
								<?= htmlspecialchars($res['away_team']); ?>
							</div>
						</div>
						<div class="card-footer">
							<div>
								<?= $res['home_team_score'];?>
							</div>
							<div> - </div>
							<div>
								<?= $res['away_team_score'];?>
							</div>
						</div>
					</div>
				</div>
				<?php endforeach; ?>

			</div>

		</section>

		<div class="news_and_ads-background">

		</div>
		<section class="news_and_ads">
			<div class="news_and_ads-news">
				<h1>Latest News</h1>
				<?php foreach ($articles as $article): ?>
				<div class="card card-large border-top-navy">
					<div class="card-image">
						<?php if ($article['img']) :?>
						<img src="img/uploads/<?= $article['img'];?>" alt="">
						<?php else:?>
						<img src="img/uploads/default.jpg" alt="">
						<?php endif ; ?>
					</div>
					<div class="card-content card-content-plain">
						<h4>
							<?= htmlspecialchars($article['title']) ?>
						</h4>
						<p>
							<?= htmlspecialchars($article['headline']) ?>
						</p>
					</div>
					<div class="card-footer">
						<a href="newsitem.php?id=<?=$article['id'];?>">Read More</a>
					</div>
				</div>
				<?php endforeach; ?>
				<!--
				<div class="card card-large border-top-navy">
					<div class="card-image">
						<img src="http://placehold.it/200x200" alt="">
					</div>
					<div class="card-content card-content-plain">
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt quaerat laborum dolores ratione quae ipsa.</p>
					</div>
					<div class="card-footer">
						<a href="#">Read More</a>
					</div>
				</div>
				<div class="card card-large border-top-navy">
					<div class="card-image">
						<img src="http://placehold.it/200x200" alt="">
					</div>
					<div class="card-content card-content-plain">
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat corporis corrupti at in expedita consequatur.</p>
					</div>
					<div class="card-footer">
						<a href="#">Read More</a>
					</div>
				</div>
				<div class="card card-large border-top-navy">
					<div class="card-image">
						<img src="http://placehold.it/200x200" alt="">
					</div>
					<div class="card-content card-content-plain">
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat corporis corrupti at in expedita consequatur.</p>
					</div>
					<div class="card-footer">
						<a href="#">Read More</a>
					</div>
				</div>
				<div class="card card-large border-top-navy">
					<div class="card-image">
						<img src="http://placehold.it/200x200" alt="">
					</div>
					<div class="card-content card-content-plain">
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat corporis corrupti at in expedita consequatur.</p>
					</div>
					<div class="card-footer">
						<a href="#">Read More</a>
					</div>
				</div>
				<div class="card card-large border-top-navy">
					<div class="card-image">
						<img src="http://placehold.it/200x200" alt="">
					</div>
					<div class="card-content card-content-plain">
						<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat corporis corrupti at in expedita consequatur.</p>
					</div>
					<div class="card-footer">
						<a href="#">Read More</a>
					</div>
				</div>
				-->



				<div class="news_and_ads-news-action">
					<a href="news.php">More News</a>
				</div>
			</div>

			<div class="news_and_ads-ads">
				<div class="card border-navy">
					Sponsor One
				</div>
				<div class="card border-navy">
					Sponsor Two
				</div>
				<div class="card border-navy">
					Sponsor Three
				</div>

			</div>

		</section>



		<?php include 'components/footer.php'; 
        ?>

		<?php include 'components/add.php'; ?>




	</div>


	<?php include 'components/scripts.php'; ?>
    <script>

    
    </script>
  
</body>
</html>