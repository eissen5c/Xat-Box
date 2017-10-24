
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
    height: 550px;
    float: left;
    overflow: scroll;
    overflow-x: hidden;
  }
  .right-chat{
    width: 200px;
    height: 550px;
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
a.content-right {
    margin-left: 70%;
}
p.content-left {
    margin-right: 13%;
}
  </style>

  <body>
    <div class="chat_box">
      <div class="chat_head"><center>GROUP CHAT</center>WELCOME EISSEN5C <a href="#" class="content-right">LOGOUT</a></div>
        <div class="row">
          <div class="col-sm-8">
            <div id="left-chat" class="left-chat">
              <div class="msg_a"><img class="img-left" src="./image/me.jpg"></img>
				<p class="content-left">Crush : Hello :)</p>
              </div>
              <div class="msg_b"><img class="img-right" src="./image/me.jpg"></img>
                <p class="content-right">Crush : Hello :)</p>
              </div>
            </div>


          </div>
          <div class="col-sm-4">
            <div class="right-chat">
              <div class="online"><img class="img-online" src="./image/me.jpg"></img>
                <p class="content-online">JOSEPH</p>
              </div>
            </div>
            <div class=".left-chat-footer">
              <textarea id="textarea" maxlength="255" name="name" style="margin-top: 0px;
				margin-top: 5px;
				margin-bottom: 0;
				height: 74px;
				width: 75%;
				resize: none;
				margin-left: 3px;" onkeydown="sendchat();"></textarea>
            </div>
			<script>
			
				function sendchat()
				{
				
					if(event.keyCode == 13) 
					{
						
							if(document.getElementById("textarea").value == "")
							{
								alert("Empty Text");
							}
							else
							{
								ajaxFunction('./sendchat2.php?chatinput='+document.getElementById("textarea").value,'left-chat');
								eraseText();
								var textarea = document.getElementById(div_id);
								textarea.scrollTop = textarea.scrollHeight;
								return true;
							}
						
					return false;
					}
				}
				 function ajaxFunction(php_file,div_id){

		//alert(php_file+div_id);
		var xmlhttp;
		if (window.XMLHttpRequest){  xmlhttp=new XMLHttpRequest();                                }
		if (window.ActiveXObject)     {  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");}
		xmlhttp.onreadystatechange=function(){
		if(xmlhttp.readyState==4) 
		{
			if (xmlhttp.responseText != "")
			{
			document.getElementById(div_id).innerHTML=xmlhttp.responseText;
			var textarea = document.getElementById(div_id);
			textarea.scrollTop = textarea.scrollHeight;
			}
			else
			{
			
			}
		}  
		else  
		{
		//loading += ".";  
		//document.getElementById(div_id).innerHTML="<h1>LOADING</h1>";
		
		}
				} //function onreadystatechange
		xmlhttp.open("GET",php_file,true);
		xmlhttp.send(null);
		
		}//function ajaxFunction
		function eraseText() 
		{
		 document.getElementById("textarea").value = "";
		}	
	
		ajaxFunction("./recievechat2.php","left-chat");
		
		var refInterval = window.setInterval('ajaxFunction("./recievechat2.php","left-chat")', 1000); 
			</script>
          </div>
        </div>





    </div>
  </body>

</html>
