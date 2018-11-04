<?php
require 'components/url.php';


// $_SESSION['is_logged_in'] = true;

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $_SESSION['is_logged_in'] = false;
    
    if ($_POST['username'] == 'peter' && $_POST['password'] == 'hello') {
        session_regenerate_id(true);
        $_SESSION['is_logged_in'] = true;
        redirect("/drumcondrafc/admin-page.php");
    } else {
        $error = 'login incorrect';
    }
}

?>

<form action="login2.php" method="POST">
	<?php if (! empty($error)) :?>
	<p>
		<?= $error ;?>
	</p>
	<?php endif; ?>
	<div class="form-group">
		<label for="username">Username:</label>
		<input type="text" name="username" id="username">
	</div>
	<div class="form-group">
		<label for="password">Password:</label>
		<input type="password" id="password" name="password">
	</div>
	<button>Log in</button>
</form>