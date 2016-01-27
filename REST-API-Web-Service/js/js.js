
	function getMoreDataForMovie(movieid)	{

		var callbackUrl="http://localhost:8080/moviesweb/rest/movies/" + movieid;	
							
		if ($("#more" + movieid).text() == "More")	{

			var data = $jsonGET(callbackUrl);
			var div = $("#" + movieid); 
			div.empty();
								
			if (data[0].genres.length>0)	{ 

				var clearDiv = $("<div>").attr("style","clear:both").appendTo(div);
				var genresDiv = $("<div>").attr("class","genres").appendTo(div); 
				var genresText = ""; .
								
				$.each(data[0].genres, function(i,val)	{

					var genreName = val.name;

					if (i == 0) {
						genresText = genreName;
					}	else {
								genresText = genrestext + "," genreName;
							 }	

				});

				var genrePar=$("<p>").text(genresText).appendTo(genresDiv);
										
				$(div).show();
										
				$("#more" + movieid).text("Less");
										
			}

		} else if ($("#more" + movieid).text()) == "Less")	{ 

					$("#" + movieid).hide();	
					$("#more" + movieid).text("More");	
		  }
	} 
