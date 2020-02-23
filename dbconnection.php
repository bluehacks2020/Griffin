<?php
//webhost
	// $server = "localhost";
	// $username = "id11278499_root";
	// $password = "asd123";
	// $database = "id11278499_nutecha";

//htdocs
	$server = "localhost";
	$username = "root";
	$password = "";
	$database = "bh2020";

	$mysql_conn = new mysqli($server, $username, $password, $database);
	if($mysql_conn === false)
	{
    	die("ERROR: Could not connect. " . mysqli_connect_error());
	}

?>