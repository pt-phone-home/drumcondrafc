<?php 
require 'components/init.php';
	
	$db = new Database();
	$conn = $db->getConn();

	$articles = Article::getALL($conn);
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


		<div class="admin-content">
			<?php if (Auth::isLoggedIn()): ?>
			<p>You are loggin.
				<a href="logout.php">Log out</a>
			</p>
			<h2>Admin Area</h2>
			<table>
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

			<p>
				<a href="new_newsitem.php">
					<h1>Add New Article</h1>
				</a>
			</p>
			<?php else: ?>
			<p>Your are not logged in... Please Log in
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