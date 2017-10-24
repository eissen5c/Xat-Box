<?php
session_start();
	require_once('./myconnection.php');
	$post = str_replace("'","''",htmlspecialchars(trim($_REQUEST['chatinput'])));
	$userID = $_SESSION['userID'];
	$fname = $_SESSION['firstt'];

			  $myip = $_SESSION['ipaddress'];
			  $query3 = "SELECT * FROM filterip WHERE Active = 'T'";
			  
			  $result3 = $db_connection->query($query3);
			  
				  while($data3 = $result3->fetch_object())
				  {
					if($data3->ipaddress == $myip)
					{
					?>
					<div class="msg_a"><img class="img-left" src="./image/robot.png"></img>
						<p class="content-left"><?php echo "Your ip $myip has been blacklisted";?></p>
					</div>
					<?php
					exit;
					}
				  }
				  
				  
$myfile = fopen("chat.txt", "a") or die("Unable to open file!");
$txt = "$fname : $post\n";
fwrite($myfile, $txt);
fclose($myfile);



$query =" INSERT INTO chat (user_id,post,date) VALUES ( '{$userID}','{$post}',NOW() ) ";
$result = $db_connection->query($query);
if ($result)
{
include('./recievechat.php');
}
?>
