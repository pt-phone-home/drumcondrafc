<?php
require 'components/init.php';

// $_SESSION['is_logged_in'] = true;

if ($_SERVER['REQUEST_METHOD'] == "POST") {

	
	$conn = require 'components/db.php';

    if (User::authenticate($conn, $_POST['username'], $_POST['password'])) {
        Auth::login();
        Url::redirect("/drumcondrafc/admin-page.php");
    } else {
        $error = 'login incorrect';
    }
}

?>

<html lang="en">

<head>
	<?php include 'components/head.php';
    ?>
	<title>Admin Panel Log In</title>
</head>

<body>

	<div class="admin-container">

		<?php include 'components/banner.php'; ?>

		<?php include 'components/admin-header.php'; ?>

		<form action="login.php" method="POST">
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



		<?php include 'components/footer.php'; 
        ?>

	</div>


	<?php include 'components/scripts.php'; ?>
    <script>

    
    </script>
  
</body>
</html>