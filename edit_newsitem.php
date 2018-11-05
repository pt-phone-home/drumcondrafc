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

if ($_SERVER['REQUEST_METHOD']== 'POST') {

	$article->title = $_POST['title'];
	$article->headline = $_POST['headline'];
	$article->content = $_POST['content'];
	$article->published_at = $_POST['published_at'];
    
	if ($article->update($conn)) {
		redirect("/drumcondrafc/newsitem.php?id={$article->id}");
	}

}
?>

<html lang="en">

<head>
	<?php include 'components/head.php';
    ?>
	<title>Edit News Article - Drumcondra FC</title>
</head>

<body>

	<div class="new_newsitem-container">

		<?php include 'components/banner.php'; ?>

		<?php include 'components/admin-header.php'; ?>

		<section class="new_newsitem-intro">
			<h1>Edit article</h1>
		</section>
		<section class="form-container">


			<?php include 'components/article-form.php';?>

		</section>

		<?php include 'components/footer.php'; ?>
	</div>
	<?php include 'components/scripts.php'; ?>
    <script>

    
    </script>
  
</body>
</html>