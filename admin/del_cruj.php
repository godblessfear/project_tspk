<?php session_start();include("../aot.php");?>
<?php
if(!isset($_SESSION['login']))
{
  header("Location: index.php");
}
else
{
	$krujid = $_GET['id'];
	$sql = $db->query("DELETE FROM `krujok` WHERE `id` = '$krujid'");
	header("Location: all_cruj.php");
}
?>