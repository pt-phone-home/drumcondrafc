<?php 
	require 'components/database.php';

	$errors = [];
	$title = '';
	$headline = '';
	$content = '';
	$published_at = '';

 if ($_SERVER['REQUEST_METHOD']== 'POST') {

		$title = $_POST['title'];
		$headline = $_POST['headline'];
		$content = $_POST['content'];
		$published_at = $_POST['published_at'];

		if ($title == '') {
			$errors[] = 'Title is Required';
		}
		if ($headline == '') {
			$errors[] = 'Headline is Required';
		}
		if ($content == '') {
			$errors[] = 'Content is Required';
		}

		if ($published_at != '') {
			$date_time = date_create_from_format('Y-m-d H:i:s', $published_at);

			if ($date_time === false) {
				$errors[] = 'Invalid date and time';
			}
		}

        if (empty($errors)) {
            $conn = getDB();
    
            $insert_article_sql = "INSERT INTO news (title, headline, content, published_at)
							VALUES (?, ?, ?, ?)";

            $insert_article_stmt = mysqli_prepare($conn, $insert_article_sql);
    
            if ($insert_article_stmt === false) {
                echo mysqli_error($conn);
            } else {

				if ($published_at == '') {
					$published_at = null;
				}

                mysqli_stmt_bind_param($insert_article_stmt, "ssss", $title, $headline, $content, $published_at);

                if (mysqli_stmt_execute($insert_article_stmt)) {
					$id = mysqli_insert_id($conn);
					
					if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') {
						$protocol = 'https';
					} else {
						$protocol = 'http';
					}

					echo "inserted record with the ID:". $id;
					header("Location: $protocol://" . $_SERVER['HTTP_HOST'] . "/drumcondrafc/newsitem.php?id=$id"); 
					exit;
                } else {
                    echo mysqli_stmt_error($insert_article_stmt);
                };
            }
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
			<h1>Add new article</h1>
		</section>
		<section class="form-container">
			<?php if (!empty($errors)): ?>
			<ul>
				<?php foreach ($errors as $err):?>
				<li>
					<?= $err;?>
				</li>
				<?php endforeach; ?>
			</ul>
			<?php endif; ?>

			<form action="" method="POST" class="contact-form article-form">
				<div class="form-group">
					<label for="title">News Title:</label>
					<input type="text" name="title" id="title" placeholder="Article Title" value="<?= htmlspecialchars($title);?>">
				</div>
				<div class="form-group">
					<label for="headline">Headline:</label>
					<input type="text" name="headline" id="headline" placeholder="Headline for article" value="<?= htmlspecialchars($headline) ;?>">
				</div>
				<div class="form-group">
					<label for="content">Article Content:</label>
					<textarea name="content" id="content" cols="30" rows="20" placeholder="Type the content of your article here"><?= htmlspecialchars($content) ;?></textarea>
				</div>
				<div class="form-group">
					<label for="published_at">Publication date and time:</label>
					<input type="datetime-local" name="published_at" id="published_at" value="<?= htmlspecialchars($published_at) ;?>">
				</div>
				<button>Add</button>
			</form>

		</section>











		<?php include 'components/footer.php'; 
        ?>




	</div>


	<?php include 'components/scripts.php'; ?>
    <script>

    
    </script>
  
</body>
</html>