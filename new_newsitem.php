<?php 
 if ($_SERVER['REQUEST_METHOD']== 'POST') {
	 var_dump($_POST);
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

			<form action="" method="POST" class="contact-form article-form">
				<div class="form-group">
					<label for="title">News Title:</label>
					<input type="text" name="title" id="title" placeholder="Article Title">
				</div>
				<div class="form-group">
					<label for="content">Article Content:</label>
					<textarea name="content" id="content" cols="30" rows="10" placeholder="Type the content of your article here"></textarea>
				</div>
				<div class="form-group">
					<label for="published_at">Publication date and time:</label>
					<input type="datetime-local" name="published_at" id="published_at">
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