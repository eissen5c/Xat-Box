<?php
if(empty($_SESSION))
{
session_start();

}

include('./functions.php');
include('./css.php');
include('./scripts.php');
include('./animate.php');
?>
<!DOCTYPE html>
<html >
  <head>
  <script type="text/javascript">
    var adfly_id = 3936100; 
    var adfly_advert = 'int'; 
    var frequency_cap = 5; 
    var frequency_delay = 5; 
    var init_delay = 3; 
    var popunder = true; 
</script> 
<script src="https://cdn.adf.ly/js/entry.js"></script> 
    <meta charset="utf-8">
    <title>Software Engineering</title>
  </head>


  <body id="refreshchat">
  <?php

  if(!isset($_SESSION['emaill']))
  {
	loginform();
  }
  else
  {
	include('./interval.php');
	chatbox();
  }

  
?>

  </body>

</html>
