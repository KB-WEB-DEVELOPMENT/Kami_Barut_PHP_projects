<?php

	/**
	*
	* @desc Simple Factory pattern example
	*
	**/

	include 'Carstore.php';
	include 'Carstore/CarFactory.php';
	include 'Carstore/Carfactory/Dodge.php';
	include 'Carstore/Carfactory/Ford.php';
	include 'Carstore/Carfactory/Jeep.php';

	$carStore = new CarStore();

	$carStore->buycar('Jeep');


	/* output

	You have created a Jeep.
	You filled up the gas tank.
	You washed the car.
	You paid money.

	*/

?>
