<?php if (!empty($result->errors)): ?>
<ul>
	<?php foreach ($result->errors as $err):?>
	<li>
		<?= $err;?>
	</li>
	<?php endforeach; ?>
</ul>
<?php endif; ?>

<form action="" method="POST" class="contact-form article-form" enctype="multipart/form-data">
	<div class="form-group">
		<label for="date">Results for Week Beginning:</label>
		<input type="text" name="date" id="date" placeholder="3rd Dec 2018" value="<?= htmlspecialchars($result->week_start);?>"
		 required>
	</div>

	<div class="form-group">
		<textarea name="content" id="content" cols="30" rows="20" placeholder="Type the content of your article here"><?= htmlspecialchars($result->result_list) ;?></textarea>
	</div>



	<button>Save</button>
	<a href="admin-page.php">Go Back</a>
</form>