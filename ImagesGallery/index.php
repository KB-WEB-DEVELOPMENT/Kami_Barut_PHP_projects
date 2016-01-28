<?php

	if (!empty($_FILES))	{

		require ("ImageResize.php");

		$img = $_FILES["img"];

		$ext = strtolower(substr($img["name"],-3));

		$allow_ext = array("jpg", "png", "gif");

		if (in_array($ext,$allow_ext))	{

			move_uploaded_file($img["tmp-name"], "images/" . $img["name"]);

			ImageResize::MinimizeImageSize("images/" . $img["name"], "images/min" , $img["name"] , 215, 112);

		}

		else {
				$error = "Your file is not an image file.";
		}

	}

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
 "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhttml" xml:lang="eng" lang="eng">
	<head>
		<script type="text/javascript" src="zoombox/jquery.js" ></script>
		<script type="text/javascript" src="zoombox/zoombox.js" ></script>
		<link rel="stylesheet" type="text/css" href= "theme/style.css" />
		<link rel="stylesheet" type="text/css" href= "zoombox/zoombox.css" />
	</head>

	<body>

		<?php

			if isset($error)	{

				echo $error;
			}

		?>

		<form method="post" action="index.php" enctype="multipart/form-data">


			<input type="file" name="img" 	/>
			<input type="file" name="Send" 	/>


		</form>

		<?php

			$folder = "images/min";
			$dir = opendir($folder);

			while ($file = readdir($dir))	{

				 $allow_ext = array("jpg", "png", "gif");
				 $ext = strtolower(substr($file, -3));

				 if (in_array($ext, $allow_ext))	{

	
				 echo '<div class="min">'   .


				 			'<a href="images/' . $file . ' " rel="zoombox">'	.
				 	
							'<img src="images/min/' . $file .  '"/>'	.

							'<h3>' . $file .  '</h3>'	.

				    		'</a>'	.

				 	  '</div>'   
			
				 }
		?>

	</body>
</html>	
