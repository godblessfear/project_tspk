<?php
session_start();
if(isset($_SESSION['login']))
{
print <<<HERE
<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Админ панель</title>
  <link rel="stylesheet" href="../styles/bootstrap.min.css">
</head>

<body>
<div class="container">
<h1>Админ панель</h1>
HERE;
	echo "<h3><a href='all_cruj.php'>Все кружки</a></h3><br>";
	echo "<h3><a href='all_cat.php'>Все категории</a></h3><br>";
	echo "<h3><a href='exit.php'>Выход</a></h3>";
print <<<HERE
</div>
</body>
HERE;
}
else
{
	header("Location: login.php");
}

?>


