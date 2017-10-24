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
			
			$query ="SELECT * from filterip where ipaddress='$ipa' AND Active='T'";
			include('./myconnection.php');
			$result = $db_connection->query($query);
			if($data = $result->fetch_object())
			{
		    echo "Already Blocked";
			exit;
			}
			else
			{
			
			$query ="INSERT INTO filterip (`ipaddress`,`Active`,`user_id`) VALUES ('$ipa','T','$idd') ";
				if($result = $db_connection->query($query))
				{	
					echo "Block Success";
				}
				else
				{
					echo "Block Failed";
				}
			}
?>
