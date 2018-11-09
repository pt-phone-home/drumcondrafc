<?php if (!empty($article->errors)): ?>
<ul>
	<?php foreach ($article->errors as $err):?>
	<li>
		<?= $err;?>
	</li>
	<?php endforeach; ?>
</ul>
<?php endif; ?>

<form action="" method="POST" class="contact-form article-form" enctype="multipart/form-data">
	<div class="form-group">
		<label for="title">News Title:</label>
		<input type="text" name="title" id="title" placeholder="Article Title" value="<?= htmlspecialchars($article->title);?>">
	</div>
	<div class="form-group">
		<label for="headline">Headline:</label>
		<input type="text" name="headline" id="headline" placeholder="Headline for article" value="<?= htmlspecialchars($article->headline) ;?>">
	</div>
	<div class="form-group">
		<label for="summernote">Article Content:</label>
		<textarea name="content" id="summernote$(document).ready(function() {
  $('#summernote').summernote();
});" cols="30" rows="20" placeholder="Type the content of your article here"><?= htmlspecialchars($article->content) ;?></textarea>
	</div>
	<!-- <div class="form-group">
		<label for="published_at">Publication date and time:</label>
		<input type="datetime-local" name="published_at" id="published_at" value="<//?= htmlspecialchars($article->published_at) ;?>">
	</div> -->
	<div class="form-group">
		<label for="image">Upload Image (Optional):</label>
		<input type="file" name="image" id="image">
	</div>



	<button>Save</button>
	<a href="admin-page.php">Go Back</a>
</form>