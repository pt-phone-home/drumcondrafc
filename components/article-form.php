<?php if (!empty($article->errors)): ?>
<ul>
	<?php foreach ($article->errors as $err):?>
	<li>
		<?= $err;?>
	</li>
	<?php endforeach; ?>
</ul>
<?php endif; ?>

<form action="" method="POST" class="contact-form article-form" enctype="multipart/form-data" name="myform" id="myform">
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
		<!--
		<div id="wisiwyg_cp" class="wisiwyg">
			<input type="button" onClick="iHeading();" value="H1">
			<input type="button" onClick="iSubHeading();" value="H2">
			<input type="button" onClick="iStandard();" value="Normal Text">
			<input type="button" onClick="iBold();" value="B">
			<input type="button" onClick="iUnderline();" value="U">
			<input type="button" onClick="iItalic();" value="I">
			<input type="button" onClick="iHorizontalRule();" value="HR">
			<input type="button" onClick="iUnorderedList;" value="UL">
			<input type="button" onClick="iOrderedList;" value="OL">
			<input type="button" onClick="iLink;" value="Link">
			<input type="button" onClick="iUnLink;" value="UnLink">
		</div>
		-->

		<textarea name="content" id="content" cols="30" rows="20" placeholder="Type the content of your article here"><?= htmlspecialchars($article->content) ;?></textarea>
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
	<!--
	<input type="button" name="myBtn" value="Save" onClick="javascript:submit_form();">
	-->
	<a href="admin-page.php">Go Back</a>
</form>