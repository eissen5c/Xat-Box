<?php
include('./functions.php');
include('./css.php');

 if(isset($_REQUEST['filterid']) and isset($_SESSION['isAdmin']) and isset($_SESSION['emaill']) )
 {
 $filterid = $_REQUEST['filterid'];
			$query ="DELETE FROM filter where id='$filterid' ";
			include('./myconnection.php');
			$result = $db_connection->query($query);
 }
 elseif(isset($_POST['filterword']) or isset($_POST['submit']) and isset($_SESSION['isAdmin']))
 {
 $word = $_POST['filterword'];
 $userID = $_SESSION['userID'];
 $len = strlen($word);
 $replace = "*";
 for($i = 0 ; $i < $len ; $i++)
 {
 $replace .= "*";
 
 }
 echo $replace ;
			$query ="INSERT INTO filter (`words`,`replace`,`user_id`) VALUES ('{$word}','{$replace}','{$userID}')";
			include('./myconnection.php');
			$result = $db_connection->query($query);
 }
 
 if(isset($_SESSION['isAdmin']))
 {
filterwords();
}