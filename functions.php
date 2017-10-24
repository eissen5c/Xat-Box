<?php
if(!isset($_SESSION) and empty($_SESSION))
{
session_start();
}
function filterwords()
{
			$query ="SELECT * FROM filter";
			include('./myconnection.php');
			$result = $db_connection->query($query);
?>
	<div id="filterip">
	<center>Word Filter</center>
		<div id="filterlist">
		<table id="tablefilter">
		
			<tr>
				<td>Words</td>
				<td>OPTION</td>
			</tr>
			<?php
			while($data = $result->fetch_object())
			{
			?>
			<tr>
				<td><?php echo $data->words; ?></td>
				<?php
				$deletee = md5(rand(1,100));
				$filterid = $data->id;
				echo "<td><a href=\"./filterwords.php?filteractive=$deletee&filterid=$filterid\">DELETE</a></td>"
				?>
			</tr>
			<?php
			}
			?>
		
		</table>
		</div>
			<div id="filteroptions">
			<form method="POST" action="./filterwords.php">
				<center>
					<button type="submit" name="submit" class="filterbutton" >ADD</button>
				    <input type="text" name="filterword" />
				</center>
			</form>
			</div>
	</div>
<?php
}

function filterip()
{
			$query ="SELECT * FROM filterip ";
			include('./myconnection.php');
			$result = $db_connection->query($query);
?>
	<div id="filterip">
	<center>IP BLACKLIST</center>
		<div id="filterlist">
		<table id="tablefilter">
			<tr>
				<td>IP ADDRESS</td>
				<td>ACTIVE</td>
				<td>OPTION</td>
			</tr>
			<?php
			while($data = $result->fetch_object())
			{
			?>
			<tr>
				<td><?php echo $data->ipaddress; ?></td>
				<td>
				<?php
				$filterid = $data->id;
				if($data->Active == "F")
				{
				echo "<a href=\"./blacklist.php?filteractive=F&filterid=$filterid\">FALSE</a></td>";
				}
				else
				{
				echo "<a href=\"./blacklist.php?filteractive=T&filterid=$filterid\">TRUE</a></td>";
				}
				$deletee = md5(rand(1,100));
				echo "<td><a href=\"./blacklist.php?filteractive=$deletee&filterid=$filterid\">DELETE</a></td>"
				?>
			</tr>
			<?php
			}
			?>
		</table>
		</div>
			<div id="filteroptions">
			<form method="POST" action="./blacklist.php">
				<center>
					<button type="submit" name="filterenableall" class="filterbutton" >ENABLE ALL</button>
					<button type="submit" name="filterdisableall" class="filterbutton" >DISABLE ALL</button>
				</center>
			</form>
			</div>
	</div>
<?php
}
function loginform()
{
?>
 <div id="login-boxx" class="login-box">
			<div class="flash animated infinite"id="txttitle">Xat BoX</div>
			<img class=" headShake animated infinite img-user" src="./image/robot.png"></img>
			<div class="container-put">
				<form method="POST">
					<input autocomplete="off" name="email" id="email" onkeypress="kloginn();"class="put"  placeholder="Email" ></input>
					<input autocomplete="off" name="password" onkeypress="kloginn();"id="password" type="password"  class="put" placeholder="password" require></input>
					<button id="login" type="button" onclick="loginn();return false;">Login</button>
				</form>
			</div>
		</div>
<?php
}

function onlineusers()
{
	if(!isset($_SESSION['userID']))
	{
	exit;
	}
	else
	{
		include('./myconnection.php');
		//$query = "SELECT * from onlineusers INNER JOIN userpanganiban on userpanganiban.user_id = onlineusers.user_id";
		$query = "SELECT * from onlineusers INNER JOIN userpanganiban on userpanganiban.user_id = onlineusers.user_id";
		$result = $db_connection->query($query);
		$userID = $_SESSION['userID'];
		while($data = $result->fetch_object())
		{
			$idd = $data->user_id;
			$query2 = "SELECT * from ProfilePicture WHERE user_id='$idd' AND isSet='T'";
			
			if($result2 = $db_connection->query($query2))
			{
				//$data2 = $result2->fetch_object();
				if($data2 = $result2->fetch_object())
				{
				$filename = $data2->profilepic;
				}
				else
				{
				$filename = "Profile.jpg";
				}
			}
			
		?>
			<div class="online"><img class="img-online" src="../webapp/user/profilepic/<?php echo $filename; ?>"></img>
				<p class="content-online"><?php echo "$data->fname";?></p>
				<?php
				if($_SESSION['isAdmin'] == "1")
					{
			?>
				<div id="useroptions">
				<input type="submit" class="useroptions" name="BLOCKIP" onclick="var result = confirm('Are your sure to Block this IP Address <?php echo "$data->ipaddress";?>');if (result) { ajaxFunction('./options.php?id=<?php echo "$data->user_id ";?>&ipaddress=<?php echo "$data->ipaddress";?>','right-chat');}" value="Block">
				<input type="submit" class="useroptions" name="UNBLOCKIP" onclick="var result = confirm('Are your sure to Unblock this IP Address <?php echo "$data->ipaddress";?>');if (result) { ajaxFunction('./options2.php?id=<?php echo "$data->user_id ";?>&ipaddress=<?php echo "$data->ipaddress";?>','right-chat');}" value="Unblock">
			<?php
					}
			?>
				<!--<input type="button" class="useroptions" name="kick" onclick="alert('KICKED');" value="Kick">-->
				</div>
				<?php
				
				?>
			</div>
		<?php
		}
		//	$query ="DELETE FROM onlineusers WHERE user_id =$userID AND time < NOW() -  INTERVAL 1 MINUTE";
		//$result = $db_connection->query($query);
	}
}

function chatbox()
{
	if(!isset($_SESSION['userID']))
	{
	exit;
	}

  ?>
  
    <div id="chat_box" class="chat_box">
		  <div class="chat_head"><center>GROUP CHAT<div id="onlinee"></div></center>
		  <div id="adminpanel">
			<?php
			$userID = $_SESSION['userID'];
			$query ="SELECT * FROM useradmin WHERE user_id=$userID";
			include('./myconnection.php');
			$result = $db_connection->query($query);
			if($result)
			{
			
			
			while($data = $result->fetch_object())
			{
				if($data->user_id == $userID)
				{
				$_SESSION['isAdmin'] = "1";
					?>
					Admin :  
					<a href="./filterwords.php" target="blank_" class="content-right" >Filtering</a>
					<a href="./blacklist.php" target="blank_" class="content-right">IP Blacklist</a>
					<?php

				}
			}
			
			}
			else
			{
			echo "ADMINISTRATOR ONLY";
			}
			?>
		
		  </div>
	  <?php 
	  $firstnamee = $_SESSION['firstt'];
	  $myip = $_SESSION['ipaddress'];
	  ?>
		  <div id="accountname">WELCOME <?php echo "$firstnamee ($myip)"; ?>
		  <p id="logoutbutton" ><a href="./team.php" target="blank_" class="content-right" >OUR TEAM</a><a href="#" class="content-right" onclick="logoutt();">LOGOUT</a></p>
		  </div>
	  </div>
	  
        <div id="row" class="row">
          <div class="col-sm-8">
		<div id="left-chat" class="left-chat">
		<!--Conversation Here!!-->
		</div>
          </div>
          <div class="col-sm-4">
            <div id="right-chat" class="right-chat">
              <div class="online"><img class="img-online" src="../webapp/user/profilepic/Profile.jpg"></img>
                <p class="content-online"><?php echo $_SESSION['firstt'];?></p>
              </div>
            </div>
            <div class=".left-chat-footer">
              <textarea id="textarea" maxlength="255" name="name" style="margin-top: 0px;
				margin-top: 5px;
				margin-bottom: 0;
				height: 74px;
				width: 75%;
				resize: none;
				margin-left: 3px;
				font-size: 34px;" onkeydown="sendchat();"></textarea>
				<button type="submit" id="sendbutton" onclick="sendchat2();">SEND</button>
            </div>
          </div>
        </div>
		Emoticon codes : | :) Smiley | :D Big Smile | :( Sad | ;) Wink | :'( Crying | :eissen: THE SRUM MASTER <br/>
    </div>

	<?php
		}
	
	?>