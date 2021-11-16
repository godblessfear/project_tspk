<?php session_start();include("../aot.php") ?>
<?php
if(!isset($_SESSION['login']))
{
	header("Location: index.php");
}
?>
<?php
if(isset($_POST['name']) && $_POST['name'] != '')
{

	$name = mysqli_real_escape_string($db, $_POST['name']);
}
else
{
	$_SESSION['error']['name_red'] = 'is-invalid';
	$_SESSION['error']['name_text'] = 'Поле не заполнено';
}


if(isset($_POST['id_kruj']))
{
		$id_kruj = $_POST['id_kruj'];	
		if(isset($name))
		{
			$sql = $db->query("UPDATE `categories` SET `name`='$name' WHERE `id` = '$id_kruj'");
			if($sql)
			{
				header("Location: all_cat.php");
			}
		}
		
	else
	{
		header("Location: add_cat.php?id={$id_kruj}");
	}
}
else
{
	if(isset($name))
	{		
			$sql = $db->query("INSERT INTO `categories`(`name`) VALUES ('$name')");
			if($sql)
			{
				header("Location: all_cat.php");
			}
	}
	else
	{
		header("Location: add_cat.php");
	}

}
?>