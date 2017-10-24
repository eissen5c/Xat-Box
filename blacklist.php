<?php
include('./functions.php');
include('./css.php');
if(isset($_POST['filterenableall']))
{
			$query ="UPDATE filterip SET active='T' ";
			include('./myconnection.php');
			$result = $db_connection->query($query);
}
elseif(isset($_POST['filterdisableall']))
{
			$query ="UPDATE filterip SET active='F' ";
			include('./myconnection.php');
			$result = $db_connection->query($query);
}
else
{
		if((isset($_REQUEST['filterid'])) and ($_SESSION['isAdmin'] == "1") and (isset($_SESSION['emaill'])))
		{
		$filterid =$_REQUEST['filterid'];

			if($_REQUEST['filteractive'] == "F" and ($_SESSION['isAdmin'] == "1") and (isset($_SESSION['emaill'])))
			{
			$query ="UPDATE filterip SET active='T' where id='$filterid'";
			include('./myconnection.php');
			$result = $db_connection->query($query);
			}
			elseif($_REQUEST['filteractive'] == "T" and ($_SESSION['isAdmin'] == "1") and (isset($_SESSION['emaill'])))
			{
			$query ="UPDATE filterip SET active='F' where id='$filterid' ";
			include('./myconnection.php');
			$result = $db_connection->query($query);
			}
			elseif(isset($_REQUEST['filteractive']) and ($_SESSION['isAdmin'] == "1") and (isset($_SESSION['emaill'])))
			{
			$query ="DELETE FROM filterip where id='$filterid' ";
			include('./myconnection.php');
			$result = $db_connection->query($query);
			}

		}
}
 
filterip();