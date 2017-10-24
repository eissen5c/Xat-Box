<?php
if(empty($_SESSION))
{
session_start();
}
require_once('./myconnection.php');
$userID = 2;
$query = "SELECT * FROM chat "; 
$result = $db_connection->query($query);
$maxx = $result->num_rows;

$file = fopen("chat.txt","r");

$currentlength = 0;
if(!isset($_SESSION['currentlength']))
{
 $_SESSION['currentlength'] = $currentlength;
}

while(! feof($file))
  {
  $text = fgets($file);
  if(strpos($text, "\n") !==FALSE ) 
  {
  
  }
  $currentlength++;
}
if($_SESSION['currentlength'] != $currentlength)
{
 $_SESSION['currentlength'] = $currentlength;
exit;
 }

//$query = "SELECT * FROM chat INNER JOIN userpanganiban on userpanganiban.user_id = chat.user_id ORDER BY chat.id ASC LIMIT $minn,$maxx"; 
$query = "SELECT * FROM chat INNER JOIN userpanganiban on userpanganiban.user_id = chat.user_id ORDER BY chat.id ";  
 $result = $db_connection->query($query);


 
 while($data = $result->fetch_object())
{
	$query2 = "SELECT * FROM filter "; 
	$result2 = $db_connection->query($query2);
	$chat = $data->post;

	while($data2 = $result2->fetch_object())
	{
	$chat = str_replace("$data2->words","$data2->replace","$chat");
	$chat = str_replace(strtoupper($data2->words),"$data2->replace","$chat"
	
	);
	}
		if($userID == $data->user_id)
		{
		
?>
              <div class="msg_b"><img class="img-right" src="./image/me.jpg"></img>
                <p class="content-left"><?php echo "$data->fname: $chat";?></p>
              </div>
<?php   } 
		else
		{
		 
?>
              <div class="msg_a"><img class="img-left" src="./image/me.jpg"></img>
				<p class="content-left"><?php echo "$data->fname: $chat";?></p>
              </div>
<?php
		}
	
}
  
 ?>