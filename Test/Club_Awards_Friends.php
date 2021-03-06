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
        <li><a href="Breed_club.php">Породы клуба</a></li>
        <li><a href="Club_Awards.php">Награды клуба</a></li>
    </ul>
</div>
<header class="container-fluid">
    <ul class="nav nav-justified">
        <li><a href="Club_Awards_Vityaz.php">Витязь</a></li>
        <li><a href="Club_Awards_Sobachonok.php">Собачонок</a></li>
        <li><a href="Club_Awards_Friend.php">Дружок</a></li>
        <li><a href="Club_Awards_Friends.php"> Друзья</a></li>
        <li><a href="Club_Awards_Fidelity.php"> Верность</a></li>
        <li><a href="Club_Awards_Moscow.php"> Москвич</a></li>
        <li><a href="Club_Awards_people.php"> Народный</a></li>
    </ul>
</header>
<?php
error_reporting(0);
// В массиве данные для получения доступа к
$settings = [
    'host' => 'localhost',
    'user' => 'root',
    'password' => '',
    'db_name' =>'coursework'
];

$link = mysqli_connect($settings['host'],$settings['user'],$settings['password'],$settings['db_name']);

if(!$link)
{
    die('Db connection Error!' .mysqli_connect_errno().' error message'.mysqli_connect_error());
}

mysqli_set_charset ($link , 'utf8');

$query = "SELECT dogsparticipants.Awards, dogsparticipants.Nickname, dogsparticipants.Breed, club.Name_club FROM dogsparticipants INNER JOIN club ON club.id = dogsparticipants.Club_id AND club.Name_club = \"Друзья\" AND dogsparticipants.Awards IS NOT NULL";

$result = mysqli_query($link, $query) or die("Ошибка".mysqli_error($link));

if($res === false)
{
    echo mysqli_error($link);
}
else
{
    $rows = mysqli_num_rows($result);//Количество строк в запросе

    echo "<table class=\"table\"><tr><th>Награда</th><th>имя участника</th><th>Порода участника</th><th>название клуба</th></tr>";
    for($i = 0; $i < $rows ; ++$i)
    {
        $row = mysqli_fetch_row($result);
        echo "<tr>";
        for ($j = 0 ; $j < 4 ; ++$j) echo "<td>$row[$j]</td>";
        echo "</tr>";
    }
    echo "</table>";
    mysqli_free_result($result);
}
mysqli_close($link);

?>
</body>
</html>