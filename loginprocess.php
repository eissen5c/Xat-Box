<?php
if(empty($_SESSION))
{
session_start();
}
include('./functions.php');
include('./css.php');
//include('./scripts.php');

function getUserIP()
{
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }
	$ip = $_SERVER['REMOTE_ADDR'];
   return $ip;
   
}

require_once('./myconnection.php');
$email = $_REQUEST['email'];
$password = $_REQUEST['password'];
$_SESSION['login'] = "0";

if(!empty($email) AND !empty($password))
{
$password = md5($_REQUEST['password']);
$query = "SELECT * FROM userpanganiban WHERE verified = '1'";

$result = $db_connection->query($query);

while($data = $result->fetch_object())
{
	if(($email == $data->email) AND ($password == $data->password))
	{
		
	$userr = $data->user_id; 
	$query2 = "select COUNT(*)as cnt from onlineusers where user_id =$userr";
	$result2 = $db_connection->query($query2);	
	$data2 = $result2->fetch_object();
	
	
	if($data2->cnt != 0)
	{
	$_SESSION['login'] = "1";
	}
	else
	{
	$_SESSION['emaill'] = $email;
	$_SESSION['passwordd'] = $password;
	$_SESSION['userID'] = $data->user_id;
    $_SESSION['firstt'] = $data->fname;
	$_SESSION['ipaddress'] = getUserIP();
	$_SESSION['isAdmin'] = "0";
		?>	
	<style>
	div#login-boxx {
    margin-top: 1%;
    margin-left: 19.7%;
}
	</style>
	<?php
	$myip = $_SESSION['ipaddress'];
	$query = "INSERT INTO onlineusers (`user_id`,`time`,`ipaddress`) VALUES ('$data->user_id',NOW(),'{$myip}')";
	$result = $db_connection->query($query);
	include('./scripts.php');
	chatbox();
	exit;
	}

	
	}
	}

}


?>
<div class="flash animated infinite"id="txttitle">Xat BoX</div>
			<img class=" headShake animated infinite img-user" src="./image/robot.png"></img>
			<div class="container-put">
				<form method="POST">
					<input autocomplete="off" name="email" id="email" onkeypress="kloginn();"class="put"  placeholder="Email" ></input>
					<input autocomplete="off" name="password" onkeypress="kloginn();"id="password" type="password"  class="put" placeholder="password" ></input>
					<?php
					if(empty($email))
					{
					?>
					<p style="color:red">Email is empty</p>
					<?php
					}
					elseif(empty($password))
					{
					?>
					<p style="color:red">Password is empty</p>
					<?php
					}
					elseif($_SESSION['login'] == "1")
					{
					$_SESSION['login'] = "0";
						?>
						<p style="color:red">Someone is using your account</p>
						<?php
					}
					else
					{
					?>
					<p style="color:red">Credentials not found</p>
					<?php } ?>
					<button id="login" type="button" onclick="loginn();return false;" style="margin-top: -1%;">Login</button>
				</form>
			</div>
