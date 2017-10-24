<?php
session_start();
	require_once('./myconnection.php');
	$post = trim($_REQUEST['chatinput']);
	$userID = 2;//$_SESSION['userID'];
	$fname = "EISSEN JULE";//$_SESSION['firstname'];
	
$myfile = fopen("chat.txt", "a") or die("Unable to open file!");
$txt = "$fname : $post\n";
fwrite($myfile, $txt);
fclose($myfile);



$query =" INSERT INTO chat (user_id,post,date) VALUES ( '{$userID}','{$post}',NOW() ) ";
$result = $db_connection->query($query);

include('./recievechat.php');
?>
