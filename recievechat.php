<?php
if(empty($_SESSION))
{
session_start();
}

if(!isset($_SESSION['userID']) )
{
echo '<meta http-equiv="refresh" content="0">';
exit;
}
else
{
include('./functions.php');
require_once('./myconnection.php');
$userID = $_SESSION['userID'];
$query = "SELECT * FROM chat "; 
$result = $db_connection->query($query);
$maxx = $result->num_rows;

$file = fopen("chat.txt","r");

			  $myip = $_SESSION['ipaddress'];
			  $query3 = "SELECT * FROM filterip WHERE Active = 'T'";
			  
			  $result3 = $db_connection->query($query3);
			  
				  while($data3 = $result3->fetch_object())
				  {
					if($data3->ipaddress == $myip)
					{
					?>
					<style>
					p.content-left
					{
						height: 39px;
					}
					</style>
					<div class="msg_a"><img class="img-left" src="./image/robot.png"></img>
						<p id="contentt" class="content-left"><?php echo "Your ip $myip has been blacklisted";?></p>
					</div>
					<?php
					exit;
					}
				  }
			
//$query = "SELECT * FROM chat INNER JOIN userpanganiban on userpanganiban.user_id = chat.user_id ORDER BY chat.id ASC LIMIT $minn,$maxx"; 
$query = "SELECT *,chat.date as dt FROM chat INNER JOIN userpanganiban on userpanganiban.user_id = chat.user_id ORDER BY chat.id ";  
 $result = $db_connection->query($query);

 
 while($data = $result->fetch_object())
{
	$query2 = "SELECT * FROM filter "; 
	$result2 = $db_connection->query($query2);
	$chat = $data->post;
	$userID = $_SESSION['userID'];
	$userID2 = $data->user_id;
	 
	$query3 = "SELECT * FROM ProfilePicture Where isSet ='T' and user_id=$userID2";
	$result3 = $db_connection->query($query3);

	if($data3 = $result3->fetch_object())
	{
	$filename = $data3->profilepic;
	}
	else
	{
	$filename = "../webapp/user/profilepic/Profile.jpg";
	}
	
	if(file_exists("../webapp/user/profilepic/$filename"))
	{
	$filenamee = "../webapp/user/profilepic/$filename";
	}
	else
	{
	$filenamee = "../webapp/user/profilepic/Profile.jpg";
	}
	
	
	
	while($data2 = $result2->fetch_object())
	{
	$chat = str_replace("$data2->words","$data2->replace","$chat");
	$chat = str_replace(strtoupper($data2->words),"$data2->replace","$chat");
	
	$emo = '<img class="img" aria-hidden="1" height="23" src="https://www.facebook.com/images/emoji.php/v6/f29/1/24/1f642.png" width="24" alt="">';
	$chat = str_replace(":)","$emo","$chat");
	
	$emo = '<img class="img" aria-hidden="1" height="23" src="https://www.facebook.com/images/emoji.php/v6/fa8/1/24/1f641.png" width="24" alt="">';
	
	$chat = str_replace(":(","$emo","$chat");
	
	$emo = '<img class="img" aria-hidden="1" class="img" height="23" src="https://www.facebook.com/images/emoji.php/v6/f51/1/16/1f603.png" width="24">';
	
	$chat = str_replace(":D","$emo","$chat");
	
	$emo = '<img class="img" aria-hidden="1" class="img" height="23" src="https://www.facebook.com/images/emoji.php/v6/z11/1/32/1f609.png" width="24">';
	
	$chat = str_replace(";)","$emo","$chat");
	
	$emo = '<img class="img" aria-hidden="1" class="img" height="23" src="https://www.facebook.com/images/emoji.php/v6/zfa/1/32/1f62d.png" width="24">';
	
	$chat = str_replace(":'(","$emo","$chat");
	
	$emo = '<img class="_bth img" src="https://scontent.fmnl4-1.fna.fbcdn.net/v/t1.0-1/p40x40/12301663_896240110459557_972978331655653104_n.jpg?oh=62d7b8cb9fb821ae0f559ca454a6a3b8&amp;oe=58C91B04" height="24" width="24" alt="">';
	
	$chat = str_replace(":eissen:","$emo","$chat");
	
	}
		if($userID == $data->user_id)
		{	
?>
              <div class="msg_b"><img class="img-right" src="<?php echo $filenamee ;?>"></img>
                <p class="content-left"><?php echo "$chat";?></p>
				
              </div>
<?php   } 
		else
		{
	 
?>
              <div class="msg_a"><img class="img-left" src="<?php echo $filenamee ;?>"></img>
				<p class="content-left"><?php echo "$data->fname: $chat";?></p>
				<p id="datetimechat"><?php echo "$data->dt"; ?></p>
              </div>

<?php
		}
	
}
  }
 ?>
 <script>

 </script>