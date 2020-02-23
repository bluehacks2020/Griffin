
 <?php
	require "dbconnection.php";
	session_start();
	$sql = "SELECT * FROM site_or_event";
	$result = $mysql_conn->query($sql);
	
	$data = array();
	while($row = $result->fetch_assoc())
	{	
		$data[] = $row;
	}

	echo json_encode($data);
   
?>