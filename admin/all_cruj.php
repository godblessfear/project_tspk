<?php session_start();include("../aot.php");?>
<?php
if(!isset($_SESSION['login']))
{
  header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Список кружков</title>
  <link rel="stylesheet" href="../styles/bootstrap.min.css">
</head>

<body>
  <div class="container pt-5">
    <h2 class="mb-4">Список кружков</h2>
    <a href="index.php">Вернуться назад</a><br>
    <a href="add_cruj.php" role="button" class="btn btn-success">Добавить новый</a><br><br>
    <table class="table">
      <tr>
        <th>ID</th>
        <th>Название</th>
        <th>Описание</th>
        <th>Изображение</th>
        <th>Место</th>
        <th>Расписание</th>
        <th>Преподаватель</th>
        <th>Категория</th>
        <th>Действия</th>
      </tr>
      <?php
      $kruj = getAllKruj();
      while ($krug = mysqli_fetch_array($kruj)) {
      $cat = getCatById($krug['categorie']);
      $cat = mysqli_fetch_array($cat);
print <<<HERE
<tr>
        <td>{$krug['id']}</td>
        <td>{$krug['name']}</td>
        <td>{$krug['description']}</td>
        <td>
          <img src="../img/{$krug['image']}" alt="username" style="border: 2px solid rgb(109, 109, 109); border-radius: 100%; width: 40px; height: 40px; object-fit: cover;">
        </td>
        <td>{$krug['mesto']}</td>
        <td>{$krug['raspisanie']}</td>
        <td>{$krug['teacher']}</td>
        <td>{$cat['name']}</td>
        <td>
          <a href="add_cruj.php?id={$krug['id']}" role="button" class="btn btn-success">Редактировать</a>
          <a href="del_cruj.php?id={$krug['id']}" role="button" class="btn btn-danger">Удалить</a>
        </td>
      </tr>
HERE;
      }
      ?>
    </table>
  </div>

</body>

</html>