<?php 
	
	include 'route.php';
	// include 'src/home.php';
	// include 'src/about.php';
	// include 'src/contact.php';

	$route = new Route();

	$route->add('/', function()	{
		echo "This is the homepage.";	
	});
		
	$route->add('/about', function()	{
		echo "This is the about page.";	
	});

	$route->add('/contact', function()	{
		echo "This is the the contact page.";	
	});


	$route->submit();	

	// Enter in browser: localhost/routing-project/  output: This is the homepage.
	// Enter in browser: localhost/routing-project/  output: This is the about page.
	// Enter in browser: localhost/routing-project/  output: This is the contact page.

?>
