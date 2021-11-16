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
  <title>Список категорий</title>
  <link rel="stylesheet" href="../styles/bootstrap.min.css">
</head>

<body>
  <div class="container pt-5">
    <h2 class="mb-4">Список категорий</h2>
    <a href="index.php">Вернуться назад</a><br>
    <a href="add_cat.php" role="button" class="btn btn-success">Добавить новую</a><br><br>
    <table class="table">
      <tr>
        <th>ID</th>
        <th>Название</th>
        <th>Действия</th>
      </tr>
      <?php
      $kruj = getAllCat();
      while ($krug = mysqli_fetch_array($kruj)) {
      $cat = getCatById($krug['categorie']);
      $cat = mysqli_fetch_array($cat);
print <<<HERE
<tr>
        <td>{$krug['id']}</td>
        <td>{$krug['name']}</td>
        <td>
          <a href="add_cat.php?id={$krug['id']}" role="button" class="btn btn-success">Редактировать</a>
          <a href="del_cat.php?id={$krug['id']}" role="button" class="btn btn-danger">Удалить</a>
        </td>
      </tr>
HERE;
      }
      ?>
    </table>
  </div>

</body>

</html>