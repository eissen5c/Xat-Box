<html>
	
	<head>
		<meta charset="utf-8">
		<title>Software Engineering</title>
	</head>
	
	<style>
		.left{
			width:20%;
			height:100%;
			background: #708090;
			float:left;
		}
		.img-user{
			width:200px;
			height:200px;
			border-radius:50%;
			margin-left: 35px;
			margin-top:30px;
		}
		.admin{
			font-size: 25px;
			margin-left: 67px;
			margin-top:10px;
		}
		.li{
			margin-left:40px;
			font-size: 20px;
			margin-top:10px;
		}
		ul{
			list-style-type:none
		}
		.form{
			margin-left: 10px;
		}
		table, th, td {
			border: 1px solid black;
		}
	</style>
	
	<body>
		<div class="left">
			<img class="img-user" src="./image/me.jpg"></img>
			<p class="admin">Administrator</p>
			
			<ul>
				<li class="li"><a href="index.php">IP Filter</a></li>
				<li class="li" href=""><a href="index.php">Word Filter</a></li>
			</ul>
		</div>
		<div class="right">
			<form class="form">
				<label> Input IP: </label>
				<input></input>
				<button>Add</button>
			</form>
			<table>
				<tr>
					<th>List of IP</th>
					<tr>
						<td>192.168.10.242</td>
						
					</tr>	
				</tr>
			</table>
		</div>
	<body>
	
</html>