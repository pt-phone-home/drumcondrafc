<?php
	require 'classes/Database.php';
	require 'classes/Article.php';
	require 'components/url.php';
	require 'components/auth.php';
	session_start();

	if (!isLoggedIn()) {
		die('Unauthorised, please log in through the admin area');
		
	}
	$db = new Database();
	$conn = $db->getConn();

	if (isset($_GET['id'])) {
	
		$article = Article::getByID($conn, $_GET['id']);

        if (! $article) {
			die("article not found");	
			}

} else {
	die("id not supplied, article not found");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($article->delete($conn)) {
        redirect("/drumcondrafc/news.php");
    }
}
?>

<html lang="en">

<head>
	<?php include 'components/head.php';
    ?>
	<title>Submit News Article - Drumcondra FC</title>
</head>

<body>

	<div class="new_newsitem-container">

		<?php include 'components/banner.php'; ?>

		<?php include 'components/header.php'; ?>

		<section class="new_newsitem-intro">
			<h1>Delete news article</h1>


		</section>
		<form method="POST">
			<p>Are you sure?</p>
			<button>DELETE</button>
			<a href="newsitem.php?id=<?= $article->id;?>"> Cancel </a>
		</form>
		<a href="delete-article.php?id=<?= $article->id;?>">Delete</a>


		<?php include 'components/footer.php'; 
        ?>




	</div>


	<?php include 'components/scripts.php'; ?>
    <script>

    
    </script>
  
</body>
</html>