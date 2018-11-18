<?php 
require 'components/init.php';
	
	$db = new Database();
	$conn = $db->getConn();

	if (isset($_GET['page'])) {
		$paginator = new Paginator($_GET['page'], 20, Article::getTotal($conn));
	} else {
		$paginator = new Paginator(1, 10, Article::getTotal($conn));
	}
	$articles = Article::getPage($conn, $paginator->limit, $paginator->offset);

	//$articles = Article::getALL($conn);
?>
<html lang="en">

<head>
	<?php include 'components/head.php';
    ?>

	<title>Drumcondra FC Admin Panel</title>
</head>

<body>

	<div class="admin-container">

		<?php include 'components/banner.php'; ?>

		<?php include 'components/admin-header.php'; ?>
		<div class="contact-header">
			<h1>Admin Area</h1>
			<i class="fas fa-toolbox"></i>
		</div>

		<div class="admin-content">
			<?php if (Auth::isLoggedIn()): ?>
			<div class="admin-login">
				<p>You are logged in.
					<a href="logout.php">Log out</a>
				</p>
			</div>
			<div class="admin-area-articles">
				<h2 class="admin-area-articles-heading">Articles</h2>
				<p class="admin-area-articles-new">
					<a href="new_newsitem.php">
						<h1>Add New Article</h1>
					</a>
				</p>
				<table class="admin-area-articles-table">
					<thead>
						<th>Title</th>
						<th>Published/Updated Date</th>
						<th colspan=2>Admin Options</th>
					</thead>
					<tbody>
						<?php foreach ($articles as $article): ?>
						<tr>

							<td>
								<a href="newsitem.php?id=<?= $article['id'];?>">
									<?= htmlspecialchars($article['title'])?>
								</a>
							</td>
							<td>
								<?= $article['published_at'];?>
							</td>
							<td>
								<a href="edit_newsitem.php?id=<?= $article['id'];?>">Edit</a>
							</td>
							<td>
								<a href="delete-article.php?id=<?= $article['id'];?>">Delete</a>
							</td>

						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
				<div class="pagination">
					<?php require 'components/pagination.php'; ?>
				</div>
			</div>

			<div class="admin-area-fixtures">
				<h2 class="admin-area-fixtures-heading">Fixtures & Results</h2>
				<p class="admin-area-fixtures-fixtures">
					<a href="new_fixtures.php">
						<h1>Add Weeks Fixtures</h1>
					</a>
				</p>
				<p class="admin-area-fixtures-results">
					<a href="#!">
						<h1>Add Weeks Results</h1>
					</a>
				</p>
				<p class="admin-area-fixtures-featured_fixture">
					<a href="new_featured_fixture.php">
						<h1>Add New Featured Fixture</h1>
					</a>
				</p>
				<p class="admin-area-fixtures-featured_result">
					<a href="new_featured_result.php">
						<h1>Add New Featured result</h1>
					</a>
				</p>
			</div>
			<?php else: ?>
			<p class="not-logged-in">Your are not logged in... Please
				<a href="login.php">Log In</a>

			</p>
			<?php endif; ?>



		</div>



		<?php include 'components/footer.php'; 
        ?>




	</div>


	<?php include 'components/scripts.php'; ?>
    <script>

    
    </script>
  
</body>
</html>