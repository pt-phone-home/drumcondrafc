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
	<button>Save</button>
	<a href="admin-page.php">Go Back</a>
</form>