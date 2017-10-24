<?php
session_start();

if(isset($_SESSION['userID']))
{
$userID = $_SESSION['userID'];

include("./myconnection.php");
$query = "DELETE from onlineusers where user_id ='$userID'";
$result = $db_connection->query($query);

if(session_destroy())

session_unset();
}
include('./functions.php');
loginform();
exit;
?>
<!--
<div id="login-boxx" class="login-box">
<img class="img-user" src="./image/robot.png"></img>
			<div class="container-put">
				<form method="POST">
					<input name="email" id="email" onkeypress="kloginn();"class="put"  placeholder="Email"></input>
					<input name="password" onkeypress="kloginn();"id="password" type="password"  class="put" placeholder="password"></input>
					<button type="button" onclick="loginn();return false;">Login</button>
				</form>
			</div>
			</div>
-->