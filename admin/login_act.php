<?php
session_start();
include("../aot.php");
if(isset($_POST['login']) && $_POST["login"] != '')
{
	$login = mysqli_real_escape_string($db ,$_POST['login']);
}
else
{
	$_SESSION['error']['login_red'] = "is-invalid";
	$_SESSION['error']['login_text'] = 'Поле не заполнено';
}

if(isset($_POST['password']) && $_POST["password"] != '')
{
	$password = mysqli_real_escape_string($db ,$_POST['password']);
	$password = passToMd5($password);
}
else
{
	$_SESSION['error']['pass_red'] = "is-invalid";
	$_SESSION['error']['pass_text'] = 'Поле не заполнено';
}

if(isset($login) && isset($password))
{
	$sql_login = $db->query("SELECT * FROM `admin` WHERE `login` = '$login'");
	$sql_login = mysqli_fetch_array($sql_login);
	if($sql_login['id'] != '')
	{
		if($sql_login['password'] == $password)
		{
			$_SESSION['id'] = $sql_login['id'];
			$_SESSION['login'] = $sql_login['login'];
			$_SESSION['admin'] = $sql_login['admin'];
			header("Location: index.php");
		}
		else
		{
			$_SESSION['error']['pass_red'] = "is-invalid";
			$_SESSION['error']['pass_text'] = 'Пароль не верный!';
			header("Location: login.php");
		}
	}
	else
	{
		$_SESSION['error']['login_red'] = "is-invalid";
		$_SESSION['error']['login_text'] = 'Логин не верный!';
		header("Location: login.php");
	}
}
else
{
	header("Location: login.php");
}

?>