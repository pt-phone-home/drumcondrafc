<?php 
require 'components/auth.php';
session_start(); 
	

?>
<html lang="en">

<head>
	<?php include 'components/head.php';
    ?>
	<title>Drumcondra FC Admin Panel</title>
</head>

<body>

	<div class="admin-container">

		<?php include 'components/banner.php'; ?>

		<?php include 'components/admin-header.php'; ?>


		<div class="admin-content">
			<?php if (isLoggedIn()): ?>
			<p>You are loggin.
				<a href="logout.php">Log out</a>
			</p>
			<p>
				<a href="new_newsitem.php">
					<h1>Add New Article</h1>
				</a>
			</p>
			<p>
				<a href="edit_newsitem.php">
					<h1>Edit News Article</h1>
				</a>
			</p>
			<?php else: ?>
			<p>Your are not logged in... Please Log in
				<a href="login.php">Log In</a>

			</p>
			<?php endif; ?>



		</div>



		<?php include 'components/footer.php'; 
        ?>




	</div>


	<?php include 'components/scripts.php'; ?>
    <script>

    
    </script>
  
</body>
</html>