<?php
	$db_host = 'localhost';
	$db_name = 'drumcondrafc';
	$db_user = 'drums_admin';
	$db_password = 'NDF9QRpEHixAQtIS';

	$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);

	if (mysqli_connect_error()) {
		echo mysqli_connect_error();
		exit;
	}

	echo 'Connection Successful';


	$sql = "SELECT *
			FROM news
			ORDER BY published_at DESC
			LIMIT 6";

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
	<title>Welcome To Drumcondra FC: One Club - One Community</title>
</head>

<body>

	<div class="home-container">

		<?php include 'components/banner.php'; ?>

		<?php include 'components/header.php'; ?>

		<section class="news_and_fixtures">

			<div class="news_and_fixtures-news carousel">
				<?php foreach ($articles as $article): ?>
				<div class="slide fade">
					<img src="img/uploads/<?= $article['img'];?>" alt="" class="slide-img">
					<h1 class="slide-headline from-left">
						<?= $article['title']; ?>
					</h1>
					<p class="slide-text">
						<?= $article['headline'];?>
					</p>
				</div>
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
						<a href="#"> Fixtures </a>
						<a href="#" alt="More Fixtures and Results">
							<i class="fas fa-forward"></i>
						</a>
					</h1>
					<div class="card card-small border-top-navy">
						<div class="card-header">
							<div class="card-header-details">
								<h3>Sun 20th Nov</h3>
								<h4>Division X</h4>
								<h4>Under 11s</h4>
							</div>
							<div class="card-header-image">
								<i class="fas fa-calendar-alt navy-text "></i>
							</div>
						</div>
						<div class="card-content">
							<div class="team1">
								Drumcondra
							</div>
							<div class="vs">
								V's
							</div>
							<div class="team2">
								Marino
							</div>
						</div>
						<div class="card-action">
							<h3>Location</h3>
							<a href="http://maps.google.com">Pitch</a>
						</div>
					</div>
				</div>
				<div class="fixture2">
					<h1>
						<a href="#"> Results </a>
						<a href="#" alt="More Fixtures and Results">
							<i class="fas fa-forward"></i>
						</a>
					</h1>
					<div class="card card-small navy white-text border-top-yellow">
						<div class="card-header">
							<div class="card-header-details">
								<h3>Sun 20th Nov</h3>
								<h4>Division X</h4>
								<h4>Under 11s</h4>
							</div>
							<div class="card-header-image">
								<i class="fas fa-trophy yellow-text "></i>
							</div>
						</div>
						<div class="card-content">
							<div class="team1">
								Drumcondra
							</div>
							<div class="vs">
								V's
							</div>
							<div class="team2">
								Marino
							</div>
						</div>
						<div class="card-footer">
							<div>
								4
							</div>
							<div> - </div>
							<div> 1 </div>
						</div>
					</div>
				</div>

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
						<img src="img/uploads/<?= $article['img'];?>" alt="">
					</div>
					<div class="card-content card-content-plain">
						<h4>
							<?= $article['title'] ?>
						</h4>
						<p>
							<?= $article['headline'] ?>
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




	</div>


	<?php include 'components/scripts.php'; ?>
    <script>

    
    </script>
  
</body>
</html>