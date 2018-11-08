<?php
    //phpinfo();

    require 'components/init.php';

	Auth::requireLogin();
	
	$conn = require 'components/db.php';

	if (isset($_GET['id'])) {
	
		$article = Article::getByID($conn, $_GET['id']);

        if (! $article) {
			die("article not found");	
			}

} else {
	die("id not supplied, article not found");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    try {

        if (empty($_FILES)) {
            throw new Exception('Invalid Upload');
        }

        switch ($_FILES['image']['error']) {
            case UPLOAD_ERR_OK:
            break;
            case UPLOAD_ERR_NO_FILE:
                throw new Exception('No image uploaded');
                break;
            case UPLOAD_ERR_INI_SIZE:
                throw new Exception('Upload size limit exceeded');
                break;
            default:
                throw new Exception('An error occured');
        }

        if ($_FILES['image']['size'] > 5000000) {
            throw new Exception('File size is too large');
        }

        $mime_types = ['image/gif', 'image/tiff', 'image/png', 'image/jpg', 'image/jpeg'];

        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime_type = finfo_file($finfo, $_FILES['image']['tmp_name']);

        if (! in_array($mime_type, $mime_types)) {
            throw new Exception('File type not supported');
        }

        // sanitise the file name
        $pathinfo = pathinfo($_FILES['image']['name']);
        $base = $pathinfo['filename'];
        $base = preg_replace('/[^a-zA-Z0-9_-]/', '_', $base);
        $base = mb_substr($base, 0, 200);
        $filename = $base . "." . $pathinfo['extension'];

        // Move the uploaded file 
        $destination = "img/uploads/$filename";

        $i = 1;
        while (file_exists($destination)) {
            $filename = $base . "-$i." . $pathinfo['extension'];
            $destination = "img/uploads/$filename";
            $i++;
        }


       if (move_uploaded_file($_FILES['image']['tmp_name'], $destination)) {
            
            $previous_image = $article->img;

           if ($article->setImageFile($conn, $filename)) {

                if ($previous_image) {
                    unlink("img/uploads/$previous_image");
                }

               Url::redirect("/drumcondrafc/newsitem.php?id={$article->id}");
           }

       } else {
           throw new Exception('Unable to copy file to folder on server');
       }

    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}
?>

<html lang="en">

<head>
	<?php include 'components/head.php';
    ?>
	<title>Edit Article Image - Drumcondra FC</title>
</head>

<body>

	<div class="new_newsitem-container">

		<?php include 'components/banner.php'; ?>

		<?php include 'components/admin-header.php'; ?>

		<section class="new_newsitem-intro">
			<h1>Edit article Image</h1>
		</section>
		<?php if (isset($error)):?>
		<p>
			<?= $error ;?>
		</p>
		<?php endif ; ?>
		<section class="form-container">

			<form method="POST" enctype="multipart/form-data" class="contact-form">
				<div class="form-group">
					<label for="image">Upload Image</label>
					<input type="file" name="image" id="image">
				</div>
				<button>Upload</button>


			</form>


		</section>

		<?php include 'components/footer.php'; ?>
	</div>
	<?php include 'components/scripts.php'; ?>
    <script>

    
    </script>
  
</body>
</html>