<?php session_start();include("../aot.php");?>
<?php
if(!isset($_SESSION['login']))
{
  header("Location: index.php");
}
else
{
	$catid = $_GET['id'];
	$sql = $db->query("DELETE FROM `categories` WHERE `id` = '$catid'");
	header("Location: all_cat.php");
}
?>