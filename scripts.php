<script>
 /*/window.onunload = window.onbeforeunload = (logoutt());
window.onpagehide(function() {
    return "Are you sure?";
}
 
 */

//then inside your Interval insert this:
var backup;
var refInterval;
var refInterval2;
var refInterval3 = window.setInterval('statuss()', 1000); 
 function statuss()
 {
	 if (navigator.onLine) 
	 {
	   document.getElementById('onlinee').style.backgroundColor = "greenYellow";
	 }
	 else 
	 {
	   document.getElementById('onlinee').style.backgroundColor = "red";
	 }
 }
  window.onbeforeunload = function()
  {
  if(event.keyCode == 116) 
			{
			
			}
			else
			{
  logoutt();
  }
//return 'Are you sure you want to leave?';
};
		function logoutt()
		{
		ajaxFunction('./logout.php','login-boxx');
		ajaxFunction('./logout.php','refreshchat');
		clearInterval(myVar);
		}
		function ajaxFunction(php_file,div_id){

		var xmlhttp;
		var result;
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
					 var obj = document.getElementById(div_id);
					// clearInterval(refInterval);
					// clearInterval(refInterval2);
					 
					 
				
		}  
		else
		{
				
				document.getElementById(div_id).value = document.getElementById(div_id).value;
				
		}
				} //function onreadystatechange
		xmlhttp.open("GET",php_file,true);
		xmlhttp.send(null);
		scrolldown();
		}//function ajaxFunction
		function eraseText() 
		{
		 document.getElementById("textarea").value = "";
		}
		function sendchat2()
				{
				 
					var str = document.getElementById("textarea").value;
					if(str.trim() == "")
							{
								alert("Empty Text");
								eraseText();
							}
							else
							{
							/*var mydiv = document.getElementById("left-chat");
							var newcontent = document.createElement('div');
							newcontent.innerHTML = '<div class="msg_b"><img class="img-right" src="../webapp/user/profilepic/Profile.jpg"></img><p class="content-left">'+document.getElementById("textarea").value+'</p></div>';
							mydiv.appendChild(newcontent);
							*/
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
										setTimeout(document.getElementById("textarea").focus(),1000);
										
									} 
									else 
									{
										newElement.value = "wait "+counter.toString()+" seconds to send again";
										
									}
								}, 1000);
								
								document.getElementById("textarea").disabled = true;
								document.getElementById("sendbutton").disabled = true;
								//
								ajaxFunction('./sendchat.php?chatinput='+document.getElementById("textarea").value,'left-chat');
								
									eraseText();
								var element2 = document.getElementById("left-chat");
										element2.scrollTop = element2.scrollHeight;
								
								//element.scrollTop = element.scrollHeight;
								//window.scrollTo(0,document.getElementById('left-chat').scrollHeight);
								//window.scrollTo(0,document.body.scrollHeight);
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
				function scrolldown()
				{
					var element = document.getElementById("left-chat");
					element.style.top = "0%";

					//alert(element.scrollTop + '>' + element.scrollHeight);
					if (element.scrollTop > element.scrollHeight - 700) 
					{
						element.scrollTop = element.scrollHeight;
					}
					else if(element.scrollTop == 0)
					{
						element.scrollTop = element.scrollHeight;
					}
				

					
					
				
		}
		
		
			function kloginn()
		{
			if(event.keyCode == 13) 
			{
			loginn();
			}
		}
		function loginn()
		{
		document.getElementById("email").disabled = true;
		document.getElementById("password").disabled = true;
		document.getElementById("login").disabled = true;
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
			document.getElementById("email").disabled = false;
			document.getElementById("password").disabled = false;
			document.getElementById("login").disabled = false;
			document.getElementById('login-boxx').innerHTML=xmlhttp.responseText;
			var element = document.getElementById("left-chat");
			element.scrollTop = element.scrollHeight;
			ajaxFunction("./recievechat.php","left-chat");
			ajaxFunction("./onlineusers.php","right-chat");
		 refInterval = window.setInterval('ajaxFunction("./recievechat.php","left-chat")', 3000); 
			 refInterval2 = window.setInterval('ajaxFunction("./onlineusers.php","right-chat")', 1000); 
		}  
		else  
		{
				document.getElementById(div_id).value = document.getElementById(div_id).value;
		}
				} //function onreadystatechange
		xmlhttp.open("GET","./loginprocess.php?email="+email+"&password="+password,true);
		xmlhttp.send(null);
		var element2 = document.getElementById("left-chat");
										element2.scrollTop = element2.scrollHeight;
		}//function ajaxFunction
		
</script>