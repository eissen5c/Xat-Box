<?php
if(empty($_SESSION))
{
session_Start();
}
if($_SESSION['isAdmin'] == "0")
{
exit;
}
else
			$ipa = $_REQUEST['ipaddress'];
			$idd = $_REQUEST['id'];
				
			$query ="DELETE from filterip where ipaddress='$ipa' AND Active='T'";
			include('./myconnection.php');
			$result = $db_connection->query($query);


?>
