<?php
session_start();

if(isset($_SESSION['login']))
{
header("Location: index.php");
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
  <title>Template</title>
  <link rel="stylesheet" href="../styles/bootstrap.min.css">
</head>
<div class="container pt-5">
    <h2 class="mb-4">Авторизация</h2>

    <form method="POST" action="login_act.php">
      <div class="form-group">
        <label>Логи</label>
        <input type="text" class="form-control {$_SESSION['error']['login_red']}" name='login' placeholder="Введите логин">
        <small class="invalid-feedback">{$_SESSION['error']['login_text']}</small>
      </div>
      <div class="form-group">
        <label>Пароль</label>
        <input type="password" class="form-control {$_SESSION['error']['pass_red']}" name='password' placeholder="Введите пароль">
        <small class="invalid-feedback">{$_SESSION['error']['pass_text']}</small>
      </div>
      <button type="submit" class="btn btn-primary">Войти</button>
    </form>
  </div>
</body>

</html>
HERE;
unset($_SESSION['error']);
}

?>
