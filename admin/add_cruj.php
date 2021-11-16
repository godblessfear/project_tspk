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
	$krug = getKrujById($_GET['id']);
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
<form method="POST" action="add_cruj_act.php" enctype="multipart/form-data">
  <input type="hidden" name='id_kruj' value='{$krug['id']}'>
      <div class="form-group">
        <label>Название</label>
        <input type="text" class="form-control {$_SESSION['error']['name_red']}" name="name" placeholder="Введите название" value='{$krug['name']}'>
        <small class="invalid-feedback">{$_SESSION['error']['name_text']}</small>
      </div>
      <div class="form-group">
        <label>Описание</label>
        <textarea class="form-control {$_SESSION['error']['description_red']}" cols="30" rows="10" name='description' placeholder="Введите описание">{$krug['description']}</textarea>
        <div class="invalid-feedback">{$_SESSION['error']['description_text']}</div>
      </div>
      <div class="custom-file">        
        <input type="file" class="custom-file-input {$_SESSION['error']['file_red']}" name="image">
        <label class="custom-file-label">Изображение</label>
        <small class="invalid-feedback">{$_SESSION['error']['file_text']}</small>
      </div>
      <br><br>
      <div class="form-group">
        <input type="text" class="form-control {$_SESSION['error']['mesto_red']}" value='{$krug['mesto']}' name="mesto" placeholder="Введите место проведения">
        <small class="invalid-feedback">{$_SESSION['error']['mesto_text']}</small>
      </div>
      <div class="form-group">
        <input type="text" class="form-control {$_SESSION['error']['raspisanie_red']}" name="raspisanie" value='{$krug['raspisanie']}' placeholder="Введите расписание кружка">
        <small class="invalid-feedback">{$_SESSION['error']['raspisanie_text']}</small>
      </div>
      <div class="form-group">
        <input type="text" class="form-control {$_SESSION['error']['teacher_red']}" value='{$krug['teacher']}' name="teacher" placeholder="Введите преподавателя кружка">
        <small class="invalid-feedback">{$_SESSION['error']['teacher_text']}</small>
      </div>
      <label>Категория</label>
      <select class="custom-select" value='{$krug['categorie']}' name='categorie'>  
HERE;
$cats = getAllCat();
while ($cat = mysqli_fetch_array($cats)) {
  echo "<option value='{$cat['id']}'>{$cat['name']}</option>";
}
print <<<HERE
</select>
      <button type="submit" class="mt-4 btn btn-primary">Изменить</button>
    </form>
    <a href="all_cruj.php">Вернуться назад</a>
 </div>
 </body>
HERE;
  }
  else
  {
    header("Location: add_cruj.php");
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
  <title>Добавить новый кружок</title>
  <link rel="stylesheet" href="../styles/bootstrap.min.css">
</head>

<body>
<div class="container pt-5">
<h1>Добавить новый кружок</h1>
<form method="POST" action="add_cruj_act.php" enctype="multipart/form-data">
      <div class="form-group">
      	<label>Название</label>
        <input type="text" class="form-control {$_SESSION['error']['name_red']}" name="name" placeholder="Введите название">
        <small class="invalid-feedback">{$_SESSION['error']['name_text']}</small>
      </div>
      <div class="form-group">
        <label>Описание</label>
        <textarea class="form-control {$_SESSION['error']['description_red']}" cols="30" rows="10" name='description' placeholder="Введите описание"></textarea>
        <div class="invalid-feedback">{$_SESSION['error']['description_text']}</div>
      </div>
      <div class="custom-file">        
        <input type="file" class="custom-file-input {$_SESSION['error']['file_red']}" name="image">
        <label class="custom-file-label">Изображение</label>
        <small class="invalid-feedback">{$_SESSION['error']['file_text']}</small>
      </div>
      <br><br>
      <div class="form-group">
        <input type="text" class="form-control {$_SESSION['error']['mesto_red']}" name="mesto" placeholder="Введите место проведения">
        <small class="invalid-feedback">{$_SESSION['error']['mesto_text']}</small>
      </div>
      <div class="form-group">
        <input type="text" class="form-control {$_SESSION['error']['raspisanie_red']}" name="raspisanie" placeholder="Введите расписание кружка">
        <small class="invalid-feedback">{$_SESSION['error']['raspisanie_text']}</small>
      </div>
      <div class="form-group">
        <input type="text" class="form-control {$_SESSION['error']['teacher_red']}" name="teacher" placeholder="Введите преподавателя кружка">
        <small class="invalid-feedback">{$_SESSION['error']['teacher_text']}</small>
      </div>
      <label>Категория</label>
      <select class="custom-select" name='categorie'>  
HERE;
$cats = getAllCat();
while ($cat = mysqli_fetch_array($cats)) {
	echo "<option value='{$cat['id']}'>{$cat['name']}</option>";
}
print <<<HERE
</select>
      <button type="submit" class="mt-4 btn btn-primary">Создать</button>
    </form>
    <a href="all_cruj.php">Вернуться назад</a>
 </div>
 </body>
HERE;
}

unset($_SESSION['error']);
?>
		