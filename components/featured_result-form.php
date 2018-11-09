<?php if (!empty($feat_result->errors)): ?>
<ul>
	<?php foreach ($feat_result->errors as $err):?>
	<li>
		<?= $err;?>
	</li>
	<?php endforeach; ?>
</ul>
<?php endif; ?>

<form action="" method="POST" class="contact-form article-form" enctype="multipart/form-data">
	<div class="form-group">
		<label for="date">Date:</label>
		<input type="text" name="date" id="date" placeholder="Date of Fixture (E.g. 20th Dec 2018)" value="<?= htmlspecialchars($feat_result->date);?>"
		 required>
	</div>
	<div class="form-group">
		<label for="squad">Squad:</label>
		<input type="text" name="squad" id="squad" placeholder="Enter Squad E.g. U10's" value="<?= htmlspecialchars($feat_result->squad) ;?>"
		 required>
	</div>
	<div class="form-group">
		<label for="home_team">Home Team:</label>
		<input type="text" name="home_team" id="home_team" placeholder="Enter team playing at home" value="<?= htmlspecialchars($feat_result->home_team) ;?>"
		 required>
	</div>
	<div class="form-group">
		<label for="away_team">Away Team:</label>
		<input type="text" name="away_team" id="away_team" placeholder="Enter team playing away" value="<?= htmlspecialchars($feat_result->away_team) ;?>"
		 required>
	</div>
	<div class="form-group">
		<label for="home_team_score">Home Team Score:</label>
		<input type="text" name="home_team_score" id="home_team_score" placeholder="Enter Home Team Score" value="<?= htmlspecialchars($feat_result->home_team_score) ;?>"
		 required>
	</div>
	<div class="form-group">
		<label for="away_team_score">Away Team Score:</label>
		<input type="text" name="away_team_score" id="away_team_score" placeholder="Enter Away Team Score" value="<?= htmlspecialchars($feat_result->away_team_score) ;?>"
		 required>
	</div>


	<button>Save</button>
	<a href="admin-page.php">Go Back</a>
</form>