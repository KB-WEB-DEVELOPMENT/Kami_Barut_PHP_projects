RESTful web service:
------------------------
Technologies used: 

1. php curl --   http://php.net/manual/de/book.curl.php	
2. JQuery.getJSON() -- http://api.jquery.com/jquery.getjson/

3. Create client application using RESTful web service. 

3.1 gets a list of all movies, presents it as a list

(with a movie title and a release date for each movie)

3.2 user can add a comment for each movie

3.3 user can see additional information about each movie 

(its genre and comments added by other users)

Ressources:
--------------

4.1 RESTful Web services providing data for client application 

4.2 List of url wich are called

-  GET    http://localhost:8080/moviesweb/rest/movies    (lists all movies)
-  POST  http://localhost:8080/moviesweb/rest/comments     (adding new comment)
-  POST  http://localhost:8080/moviesweb/rest/movies/movieid   (lists additional data about each movie and users'comments)
 
5. Folders/Files structure
----------------------------

REST_API_WebService_Example/css/style.css

REST_API_WebService_Example/js/

query-ui-1.8.17.custom.min.js  (needed for jquery)

query-1.7.1min.js (needed for jquery)

js.js  (contains the getMoreDataForMovie() function)
                                                        
modal.js (contains the jquery addCommentDialog(), closedialog() and submitcomment() functions)

REST_API_WebService_Example/

Rest.php (The Rest class, contains the curl_get_call($url) and curl_post_call($url, $data) functions)
		
movies.php (displays the list of movies)	
		                 
add_comment.php (calls the modal dialog popup to add a comment)
		                 
processcomment.php (processes and stores the comment)
