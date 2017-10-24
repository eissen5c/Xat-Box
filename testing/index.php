<?php
if(empty($_SESSION))
{
session_start();
}


?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Software Engineering</title>
  </head>

  <style media="screen">
  html{
    background: #16a085;
  }
  .chat_box{
    background: white;
    width: 800px;
    height: 700px;
    margin: auto;
    margin-top: 0px;
    position: relative;
  }
  .chat_head{
    background: #d35400;
    padding: 15px;
    color: white;
  }
  .left-chat{
       width: 600px;
    height: 459px;
    float: left;
    overflow: scroll;
    overflow-x: hidden;
}
  .right-chat {
    width: 200px;
    height: 465px;
    float: right;
    overflow: scroll;
    overflow-x: hidden;
}
  .msg_a{
  margin-top: 10px;
  margin-left: 20px;
  padding: 15px;
  background: #99FFCC;
  position: relative;
  margin-right: 20px;
  border-radius: 5px;
}
.msg_a:before{
  content: "";
  width: 0px;
  height: 0px;
  border: 15px solid;
  border-color: transparent #99FFCC transparent transparent;
  position: absolute;
  left: -30px;
  top: 7px;
}
.msg_b{
  margin-top: 10px;
  margin-left: 20px;
  padding: 15px;
  background: #FFFF99;
  position: relative;
  margin-right: 20px;
  border-radius: 5px;
  text-align:right;
}
.msg_b:before{
  content: "";
  width: 0px;
  height: 0px;
  border: 15px solid;
  border-color: transparent transparent transparent #FFFF99;
  position: absolute;
  right: -30px;
  top: 7px;
}
.left-chat-footer{
  width: 800px;
  height: 100px;
}
textarea{
  width: 100%;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
}
.online{
    margin-top: 10px;
    margin-left: 20px;
    padding: 2px;
    background: #99FFCC;
    position: relative;
    margin-right: 11px;
    border-radius: 5px;
    text-align: center;
}
.img-left{
	width:50px;
	height:50px;
	border-radius:50%;
	float:left;
}
.img-right{
	width:50px;
	height:50px;
	border-radius:50%;
	float:right;
}
.content-left{
	padding: 1px;
	margin-left: 70px;
}
.content-right{
	padding: 1px;
	margin-right: 70px;
	text-decoration:none;
	color:blue;
}
.img-online{
	width:40px;
	height:40px;
	border-radius:50%;
	float:left;
	margin-left:5px;
	margin-top:5px;
}
.content-online{
	padding: 1px;
}
p.content-left {
    margin-right: 13%;
}
button#sendbutton {
    width: 23%;
    float: right;
    margin-top: 1%;
    margin-right: 1%;
    height: 69px;
    background-color: cornflowerblue;
    text-decoration: underline;
}
p#logoutbutton {
    margin: 0;
    /* text-decoration: none; */
}
div#adminpanel {
    border: solid;
    width: 96%;
    padding: 13px;
    background: aliceblue;
    margin-top: 15px;
}
  </style>
<script>
		function ajaxFunction(php_file,div_id){

		var xmlhttp;
		if (window.XMLHttpRequest)
		{  
			xmlhttp=new XMLHttpRequest();                                
		}
		if (window.ActiveXObject)    
		{  
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
			xmlhttp.onreadystatechange=function()
		{
		if(xmlhttp.readyState==4) 
		{
				document.getElementById(div_id).innerHTML=xmlhttp.responseText;
				var textarea = document.getElementById('left-chat');
				textarea.scrollTop = textarea.scrollHeight;
		}  
				} //function onreadystatechange
		xmlhttp.open("GET",php_file,true);
		xmlhttp.send(null);
		
		}//function ajaxFunction
		function eraseText() 
		{
		 document.getElementById("textarea").value = "";
		}
		function sendchat2()
				{
					if(document.getElementById("textarea").value == "")
							{
								alert("Empty Text");
							}
							else
							{
								var counter = 6;
								var newElement = document.getElementById("textarea");
								var id;
								
								id = setInterval(function() {
									counter--;
									if(counter < 0) {
										document.getElementById("textarea").disabled = false;
										document.getElementById("sendbutton").disabled = false;
										eraseText();
										clearInterval(id);
									} else {
										newElement.value = "wait "+counter.toString()+" seconds to send again";
									}
								}, 1000);
								
								document.getElementById("textarea").disabled = true;
								document.getElementById("sendbutton").disabled = true;
								//
								ajaxFunction('./sendchat.php?chatinput='+document.getElementById("textarea").value,'left-chat');
									eraseText();
									var textarea = document.getElementById(div_id);
									textarea.scrollTop = textarea.scrollHeight;		
							}
					
					
				}
		
				function sendchat()
				{
					if(event.keyCode == 13) 
					{
						sendchat2();
					}
					return false;
					
				}
		ajaxFunction("./recievechat.php","left-chat");
		//var refInterval = window.setInterval('ajaxFunction("./recievechat.php","left-chat")', 3000); 
		var refInterval = window.setInterval('ajaxFunction("./recievechat.php","left-chat")', 3000); 
		
</script>
  <body id="refreshchat">
  <?php

  if(!isset($_SESSION['emaill']))
  {
 ?>
 	<style>
		html{
			background: #16a085;
		}
		.login-box{
			background:white;
			width: 500px;
			height: 500px;
			position:relative;
			margin:auto;
			margin-top: 80px;
			border-radius: 5px 5px 5px 5px;
		}
		.img-user{
			width: 206px;
    height: 196px;
    border-radius: 50%;
    margin-left: 130px;
    margin-top: 40px;
		}
		.put{
			width: 100%;
			height: 50px;
			margin-top:10px;
			font-size:25px;
		}
		.container-put{
			margin-left:30px;
			margin-right:30px;
			margin-top: 20px;
		}
		button{
			margin-top:10px;
			height:50px;
			width:100%;
			font-size:20px;
			background: green;
		}
	</style>
  <div id="login-boxx" class="login-box">
			<img class="img-user" src="./image/me.jpg"></img>
			<div class="container-put">
				<form method="POST">
					<input name="email" id="email" onkeypress="kloginn();"class="put"  placeholder="Email"></input>
					<input name="password" onkeypress="kloginn();"id="password" type="password"  class="put" placeholder="password"></input>
					<button type="button" onclick="loginn();return false;">Login</button>
				</form>
			</div>
		</div>
		<script>
		function kloginn()
		{
			if(event.keyCode == 13) 
			{
			loginn();
			}
		}
		function loginn()
		{
		
		var email = document.getElementById('email').value;
		var password = document.getElementById('password').value;
		var xmlhttp;
		if (window.XMLHttpRequest)
		{  
			xmlhttp=new XMLHttpRequest();                                
		}
		if (window.ActiveXObject)    
		{  
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
			xmlhttp.onreadystatechange=function()
		{
		if(xmlhttp.readyState==4) 
		{
				
				document.getElementById('login-boxx').innerHTML=xmlhttp.responseText;
		}  
		else  
		{
		//loading += ".";  
		//document.getElementById(div_id).innerHTML="<h1>LOADING</h1>";
		}
				} //function onreadystatechange
		xmlhttp.open("GET","./loginprocess.php?email="+email+"&password="+password,true);
		xmlhttp.send(null);
		
		}//function ajaxFunction
		
		</script>
  <?php
  exit;
    chatbox();
  }
  else
  {
  chatbox();
  }

function chatbox()
{
  ?>
    <div class="chat_box">
      <div class="chat_head"><center>GROUP CHAT</center>
		  <div id="accountname">WELCOME <?php echo $_SESSION['firstname']; ?>
		  <p id="logoutbutton" ><a href="#" class="content-right" onclick="alert('test');">LOGOUT</a></p>
		  </div>
	  </div>
	  
        <div class="row">
          <div class="col-sm-8">
		<div id="left-chat" class="left-chat">
		<!--Conversation Here!!-->
		</div>
          </div>
          <div class="col-sm-4">
            <div class="right-chat">
              <div class="online"><img class="img-online" src="./image/me.jpg"></img>
                <p class="content-online"><?php echo $_SESSION['firstname'];?></p>
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
			
			<div id="adminpanel">
			<?php
			require_once('./myconnection.php');
			$userID = $_SESSION['userID'];
			$query ="SELECT * FROM useradmin WHERE user_id=$userID";
			
			if($result = $db_connection->query($query))
			{
			
			
			while($data = $result->fetch_object())
			{
				if($data->user_id == $userID)
				{
				?>
				<a href="#" class="content-right" onclick="alert('test');">Filtering</a>
				<a href="#" class="content-right" onclick="alert('test');">IP Blacklist</a>
				<?php
				exit;
				}
				
				
			exit;	
			}
			
			}
			?>
			ADMINISTRATOR ONLY
		  </div>
          </div>
        </div>





    </div>
	<?php
	}
	?>
  </body>

</html>
