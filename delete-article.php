<?php
	require 'components/database.php';
	require 'components/article.php';
	require 'components/url.php';
	$conn = getDB();

	if (isset($_GET['id'])) {
	
		$article = getArticle($conn, $_GET['id'], 'id');

        if ($article) {

			$id = $article['id'];
            
        } else {
			die("article not found");	
		}

} else {
	die("id not supplied, article not found");
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $delete_article_sql = "DELETE FROM news 
                        WHERE id = ?";


    $delete_article_stmt = mysqli_prepare($conn, $delete_article_sql);

    if ($delete_article_stmt === false) {
        echo mysqli_error($conn);
    } else {
        mysqli_stmt_bind_param($delete_article_stmt, "i", $id);

        if (mysqli_stmt_execute($delete_article_stmt)) {
            redirect("/drumcondrafc/news.php");
        } else {
            echo mysqli_stmt_error($delete_article_stmt);
        };
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
			<a href="newsitem.php?id=<?= $article['id'];?>"> Cancel </a>
		</form>
		<a href="delete-article.php?id=<?= $article['id'];?>">Delete</a>


		<?php include 'components/footer.php'; 
        ?>




	</div>


	<?php include 'components/scripts.php'; ?>
    <script>

    
    </script>
  
</body>
</html>