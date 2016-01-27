<?php
namespace REST_API_WebService_Example;

	$rest = new REST_API_WebService_Example\Rest();

	$url = "http://127.0.0.1:8080/moviesweb/rest/movies";

	$response = $rest->curl_get_call($url);

	$comment = $_POST["comment"];

	$movieid = $_POST["movieid"];

	$username = $_POST["username"];

	$dataArray = array();

	$dataArray["movieid"] = $movieid;

	$dataArray["username"] = $username;

	$dataArray["comment"] =	$comment;	

	$data = json_encode($dataArray);

	$response = $rest->curl_post_call($url,$data);

?>
