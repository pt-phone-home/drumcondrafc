<?php
	require 'components/database.php';
	require 'components/article.php';
	require 'components/url.php';
	require 'components/auth.php';
	session_start();
	if (!isLoggedIn()) {
		die('Unauthorised, please log in through the admin area');
		
	}
	$conn = getDB();

	if (isset($_GET['id'])) {
	
		$article = getArticle($conn, $_GET['id']);

        if ($article) {

			$id = $article['id'];
            $title = $article['title'];
            $headline = $article['headline'];
            $content = $article['content'];
            $published_at = $article['published_at'];
        } else {
			die("article not found");	
		}

} else {
	die("id not supplied, article not found");
}

if ($_SERVER['REQUEST_METHOD']== 'POST') {

	$title = $_POST['title'];
	$headline = $_POST['headline'];
	$content = $_POST['content'];
	$published_at = $_POST['published_at'];

	$errors = validateArticle($title, $headline, $content, $published_at);

	

    if (empty($errors)) {
    
            $update_article_sql = "UPDATE news 
									SET title = ?,
										headline = ?,
										content = ?,
										published_at = ?
									WHERE id = ?";
							

            $update_article_stmt = mysqli_prepare($conn, $update_article_sql);
    
            if ($update_article_stmt === false) {
                echo mysqli_error($conn);
            } else {

				if ($published_at == '') {
					$published_at = null;
				}

                mysqli_stmt_bind_param($update_article_stmt, "ssssi", $title, $headline, $content, $published_at, $id);

                if (mysqli_stmt_execute($update_article_stmt)) {
					
					redirect("/drumcondrafc/newsitem.php?id=$id");
					
                } else {
                    echo mysqli_stmt_error($update_article_stmt);
                };
            }
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