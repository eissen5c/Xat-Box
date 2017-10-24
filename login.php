<html>

	<head>
		<meta charset="utf-8">
		<title>Software Engineering</title>
	</head>
	
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
			width:250px;
			height:250px;
			border-radius:50%;
			margin-left: 130px;
			margin-top:40px;
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
	
	<body>
		<div class="login-box">
			<img class="img-user" src="./image/me.jpg"></img>
			<div class="container-put">
				<form>
					<input class="put" placeholder="Email"></input>
					<input class="put" placeholder="password"></input>
					<button>Login</button>
				</form>
			</div>
		</div>
	</body>
	
</html>