<?php
namespace REST_API_WebService_Example;

	$rest = new REST_API_WebService_Example\Rest();

	$response = $rest->curl_get_call($url);
	
	$movies = json_decode($response);
	
	$i = 0;

	echo "<!DOCTYPE html>" .
			"<html>" 	.
				"<head>"	.
					'<script type=\"text/javascript"' . 'src=\"js/query-1.7.1min.js"></script>' .
					'<script type=\"text/javascript"' . 'src=\"js/query-ui-1.8.17.custom.min.js"></script>'	.
					'<script type=\"text/javascript"' . 'src=\"js/js.js"></script>'	.
					'<script type=\"text/javascript"' . 'src=\"js/modal.js"></script>'	.
					'<link rel=\"stylesheet"' . 'type="text/css"' . 'href=\"css/style.css"/>' 	.
					'<link rel=\"stylesheet"' . 'type="text/css"' . 'href=\"css/jquery-ui-1.8.17.custom.css" />'	. 
				"</head>"	.
				"<body>"	.
					"<div>" .
					 	'<div class="cell">' . 
					 		'<div style="width:20px">&nbsp;</div>' .
					 		"<div>Name</div>"  .	
					 		"<div>Release Date</div>"  .
					 		"<div>Action</div>"  .
					    "</div>"

						foreach ($movies as $movie) {

							$i++;

							echo '<div style="clear:both"></div>' .
								 	'<div class="cell"'  .
								 		'<div style="width:20px">' . $i . "</div>" .
								 		"<div>&nbsp;"  . $movie->name . "</div>" .
								 		"<div>&nbsp;"  . $movie->release_date . "</div>" .
								 		'<div>
								 			<p' .  'onclick=\"' . 'addCommentDialog(\"' . $movie->id . ',' . urlencode($movie->name) . '\"); return false;>
					                     		Add Comments
					                     	</p>
					                     	&nbsp;&nbsp
					                     	<p id="more"' . $movie->id . 'onclick=\"getMoreDataForMovie(\"' . $movie->id . '\"); return false;>
					                     		More
					                     	</p> 	
					                    </div>
					                </div>
					                <div id="' . $movie->id . 'class="genresDiv"></div>'; 
					    }

					"</div>"	.
				"</body>";	

?>
