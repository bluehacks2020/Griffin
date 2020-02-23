<?php
	require "dbconnection.php";
	session_start();
	$sql = "SELECT * FROM site_or_event WHERE tag!='Maintenance' AND tag!='Event'";
	$result = $mysql_conn->query($sql);
	
	$data = array();
	while($row = $result->fetch_assoc())
	{	
		if($row['name'] != "")
		{
			$data[] = $row;
		}
		else
		{
			break;
		}
	}

	echo json_encode($data);
   
?>