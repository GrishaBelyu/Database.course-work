<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="1.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid">
    <ul class="nav nav-justified">
        <li><a href="index.html">Главная</a></li>
        <li><a href="mysqli.php">Собаки и клубы</a></li>
        <li><a href="Exibitions.php">Выставки</a></li>
        <li><a href="Log_in.php">Регистрация</a></li>
    </ul>
</div>
<form action="log_in_check.php" method="post">
    <div class="form-group">
        <label for="exampleInputEmail1">Login</label>
        <input type="text" name="login" class="form-control" id="exampleInputEmail1" placeholder="Enter login">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Sign in</button>
</form>
<br>
<form action="log_out_check.php" method="post">
    <button type="submit" name="sub_out" class="btn btn-primary mr-3">Sign out</button>
</form>
<?php
// Проверяем, пусты ли переменные логина и id пользователя
if (empty($_SESSION['login']) or empty($_SESSION['id']))
{
    // Если пусты, то мы не выводим ссылку
    echo "Вы вошли на сайт, как гость";
}
else
{
    // Если не пусты, то мы выводим ссылку
    echo "Вы вошли на сайт, как ".$_SESSION['login']."<br><a  href='admin.php'>Страничка для внесения/изменения данных</a>";
}
//session_destroy();
?>
</body>
</html>