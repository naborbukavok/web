<?php
if (isset($_POST['submit']))
{
if(empty($_POST['login']))
{
echo "Вы не ввели логин";
echo"<button><a href='index.php'>На главную</a></button>";
}
elseif(empty($_POST['password']))
{
echo "Вы не ввели пароль";
echo"<button><a href='index.php'>На главную</a></button>";
}
elseif(empty($_POST['password2']))
{
echo "Вы не ввели подтверждение пароля";
echo"<button><a href='index.php'>На главную</a></button>";
}
elseif($_POST['password'] != $_POST['password2'])
{
echo "Введенные пароли не совпадают";
echo"<button><a href='index.php'>На главную</a></button>";
}
/*ДОБАВИТЬ ПРОВЕРКУ ФИО*/

else
{
$login=$_POST['login'];
$password=$_POST['password'];
//$password2=$_POST['password2'];
$GroupID=$_POST['GroupID'];
$Numb=$_POST['Numb'];
$Secondname=$_POST['Secondname'];
$Name=$_POST['Name'];
$Middlename=$_POST['Middlename'];
$password=md5("$password");

//выборка id из вашей таблицы зарегистрированных пользователей, сверка логина и пароля
$query = "SELECT id FROM `students` WHERE `login`='{$login}' AND `password`='{$password}'";
 
$login = stripslashes($login);//удаляет экранирование символов, произведенное функцией addslashes()
$login = htmlspecialchars($login);//преобразует специальные символы в HTML-сущности (обрабатываем их, чтобы теги и скрипты не работали на случай от действий умников-спамеров)
$password = stripslashes($password);
$password = htmlspecialchars($password);
$login = trim($login);//удаляет пробелы (или другие символы) из начала и конца строки
$password = trim($password);
// Задаём переменные для подключения к БД
$db_host = 'localhost';
$db_user = 'root';
$db_password = '';
$database = 'university';
// Подключаемся к БД 
mysql_connect($db_host, $db_user, $db_password);
//@mysql_query("SET NAMES 'cp1251'");
mysql_query("SET NAMES 'cp1251'");
mysql_select_db($database);
//Создаем таблицу
mysql_query("CREATE TABLE IF NOT EXISTS students 
(`id` int(10) unsigned NOT NULL auto_increment,
`login` VARCHAR( 255 ) NOT NULL,
`password` VARCHAR( 255 ) NOT NULL,
`GroupID` int(10) unsigned NOT NULL,
`Numb` int(10) unsigned NOT NULL,
`Secondname` CHAR( 50 ) NOT NULL,
`Name` CHAR( 50 ) NOT NULL,
`Middlename` CHAR( 50 ) NOT NULL,
`Acs` int(10) unsigned NOT NULL,
PRIMARY KEY  (`id`) )
ENGINE=innoDB AUTO_INCREMENT=1") or die(mysql_error());
$sql = mysql_query($query) or die(mysql_error());
if (mysql_num_rows($sql) > 0)
{
echo 'Такой логин уже существует';
}

else
{
//Записываем в БД данные форм
$query="INSERT INTO `students` (`id`, `login`, `password`,`GroupID`,`Numb`,`Secondname`,`Name`,`Middlename`,`Acs`)
VALUES ('','$login', '$password', '$GroupID','$Numb','$Secondname','$Name','$Middlename','2')";
$result = mysql_query($query);
if (!$result) {
$feedback = 'ОШИБКА - Ошибка базы данных';
$feedback .= mysql_error();
return $feedback;
}
echo"Регистрация прошла успешно";
echo"<button><a href='index.php'>На главную</a></button>";
}
}
}
?>