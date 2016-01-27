<?php

$movieid = $_GET["id"];
$moviename = $_GET["moviename"];


	echo "<!DOCTYPE html>" .
			"<html>" 	.
			
				"<head>"	.
					'<script type="text/javascript"' . 'src="js/query-1.7.1min.js"></script>' .
					'<script type="text/javascript"' . 'src="js/query-ui-1.8.17.custom.min.js"></script>'	.
					'<script type="text/javascript"' . 'src="js/js.js"></script>'	.
					'<script type="text/javascript"' . 'src="js/modal.js"></script>'	.
					'<link rel="stylesheet"' . 'type="text/css"' . 'href="css/style.css"/>' 	.
					'<link rel="stylesheet"' . 'type="text/css"' . 'href="css/jquery-ui-1.8.17.custom.css" />'	. 
				"</head>"	.

				"<body>"	.	

					"Movie title:<b>"  $moviename . "</b>"	.

					'<form id="commentform" action=""  methood="post">'	.
						'Comment:<br><textarea cols="25" name="comment"></textarea><br>'	.
						'Name:<br><input type="text" name="name" /><br>'	.
						'input type="submit" name="submit" value="Submit" onclick="submitcomment(); return false; "/>'	.	
						'input type="submit" name="submit" value="Cancel" onclick="closedialog(); return false; "/>'	.
					'</form>'	.
				"</body>"	.
			"</html>" 			
?>
