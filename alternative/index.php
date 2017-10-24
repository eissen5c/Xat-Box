<?php
include('./animate.php');
include('./css.php');
?>
<div id="login-boxx" class="login-box">
			<div class="flash animated infinite"id="txttitle">Xat BoX</div>
			<img class=" headShake animated infinite img-user" src="./image/robot.png"></img>
			<div class="container-put">
				<form method="POST" action="homev2.php">
					<input autocomplete="off" name="email" id="email" class="put"  placeholder="Email" ></input>
					<input autocomplete="off" name="password" id="password" type="password"  class="put" placeholder="password" require></input>
					<button type="submit" >Login</button>
				</form>
			</div>
		</div>