<?php if (!empty($feat_fixture->errors)): ?>
<ul>
	<?php foreach ($feat_fixture->errors as $err):?>
	<li>
		<?= $err;?>
	</li>
	<?php endforeach; ?>
</ul>
<?php endif; ?>

<form action="" method="POST" class="contact-form article-form" enctype="multipart/form-data">
	<div class="form-group">
		<label for="date">Date:</label>
		<input type="text" name="date" id="date" placeholder="Date of Fixture (E.g. 20th Dec 2018)" value="<?= htmlspecialchars($feat_fixture->date);?>"
		 required>
	</div>
	<div class="form-group">
		<label for="squad">Squad:</label>
		<input type="text" name="squad" id="squad" placeholder="Enter Squad E.g. U10's" value="<?= htmlspecialchars($feat_fixture->squad) ;?>"
		 required>
	</div>
	<div class="form-group">
		<label for="home_team">Home Team:</label>
		<input type="text" name="home_team" id="home_team" placeholder="Enter team playing at home" value="<?= htmlspecialchars($feat_fixture->home_team) ;?>"
		 required>
	</div>
	<div class="form-group">
		<label for="away_team">Away Team:</label>
		<input type="text" name="away_team" id="away_team" placeholder="Enter team playing away" value="<?= htmlspecialchars($feat_fixture->away_team) ;?>"
		 required>
	</div>
	<div class="form-group">
		<label for="location">Location:</label>
		<input type="text" name="location" id="location" placeholder="Where is the game being played?" value="<?= htmlspecialchars($feat_fixture->location) ;?>"
		 required>
	</div>
	<div class="form-group">
		<label for="time">Time:</label>
		<input type="text" name="time" id="time" placeholder="What time is the game at? E.g. 10:30am" value="<?= htmlspecialchars($feat_fixture->time) ;?>"
		 required>
	</div>


	<button>Save</button>
	<a href="admin-page.php">Go Back</a>
</form>