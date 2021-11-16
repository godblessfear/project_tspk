<?php session_start();include("../aot.php");?>
<?php
if(!isset($_SESSION['login']))
{
	header("Location: index.php");
}
?>
<?php
if(isset($_GET['id']))
{
	$krug = getCatById($_GET['id']);
	$krug = mysqli_fetch_array($krug);
  if($krug['id'] != '')
  {
print <<<HERE
<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Редактировать {$krug['name']}</title>
  <link rel="stylesheet" href="../styles/bootstrap.min.css">
</head>

<body>
<div class="container pt-5">
<h1>Редактировать {$krug['name']}</h1>
<form method="POST" action="add_cat_act.php" enctype="multipart/form-data">
  <input type="hidden" name='id_kruj' value='{$krug['id']}'>
      <div class="form-group">
        <label>Название</label>
        <input type="text" class="form-control {$_SESSION['error']['name_red']}" name="name" placeholder="Введите название" value='{$krug['name']}'>
        <small class="invalid-feedback">{$_SESSION['error']['name_text']}</small>
      </div>
      <button type="submit" class="mt-4 btn btn-primary">Изменить</button>
    </form>
    <a href="all_cat.php">Вернуться назад</a>
 </div>
 </body>
HERE;
  }
  else
  {
    header("Location: add_cat.php");
  }
}
else
{
print <<<HERE
<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Добавить новую категорию</title>
  <link rel="stylesheet" href="../styles/bootstrap.min.css">
</head>

<body>
<div class="container pt-5">
<h1>Добавить новую категорию</h1>
<form method="POST" action="add_cat_act.php" enctype="multipart/form-data">
      <div class="form-group">
      	<label>Название</label>
        <input type="text" class="form-control {$_SESSION['error']['name_red']}" name="name" placeholder="Введите название">
        <small class="invalid-feedback">{$_SESSION['error']['name_text']}</small>
      </div>
      <button type="submit" class="mt-4 btn btn-primary">Создать</button>
    </form>
    <a href="all_cat.php">Вернуться назад</a>
 </div>
 </body>
HERE;
}

unset($_SESSION['error']);
?>