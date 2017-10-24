<?php
if(empty($_SESSION))
{
session_start();
}

if(!isset($_SESSION['userID']) )
{
echo '<meta http-equiv="refresh" content="0">';
exit;
}
else
{
include('./functions.php');
require_once('./myconnection.php');
$userID = $_SESSION['userID'];
onlineusers();
}