<?php
 session_start();//вся процедура сверки логина и паролей работает на сессиях. Именно в них хранятся данные  пользователя, пока он находится на сайте. Запускать сессию нужно в начале странички

header('Refresh: 5; URL=http://www.mizinovsv.ru/index.php'); //redirect с задержкой 
echo "Вы будете перенаправлены на главную страницу через 5 секунд."; //вывод сообщения

if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную

if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }//заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную

if (empty($login) or empty($password)) //если пользователь не ввел логин или пароль, то выдаём ошибку и останавливаем выполнение скрипта
    {
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
    }
    
$login = stripslashes($login);//удаляет экранирование символов, произведенное функцией addslashes()
    
$login = htmlspecialchars($login);//преобразует специальные символы в HTML-сущности (обрабатываем их, чтобы теги и скрипты не работали на случай от действий умников-спамеров)

$password = stripslashes($password); //удаляет экранирование символов, произведенное функцией addslashes()
    
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

$result = mysql_query("SELECT * FROM `students` WHERE `login`='$login'"); //извлекаем из базы из таблицы студентов все данные о пользователе с введенным логином 
$myrow = mysql_fetch_array($result);
 
if (empty($myrow['password'])){ // если не нашли студента проверка на преподавателя
$result=mysql_query("SELECT * FROM `proffessors` WHERE `login`='$login'"); //извлекаем из базы из таблицы преподавателей все данные о пользователе с введенным логином
$myrow = mysql_fetch_array($result);}

if (empty($myrow['password'])) //если не нашли ни студента ни преподавателя
{
//если пользователя с введенным логином не существует
exit ("<br /><br />Извините, введённый вами login или пароль неверный!");
}
 
else {
//если существует, то сверяем пароли
 
if ($myrow['password']== md5( "$password" )){
//если пароли совпадают, то запускаем данному пользователю сессию
$_SESSION['login']=$myrow['login'];
$_SESSION['id']=$myrow['id'];//эти данные очень часто используются, поэтому сессия запускается с использованием этих данных
$_SESSION['pid']=$myrow['pid'];
$_SESSION['Acs']=$myrow['Acs'];
$_SESSION['Name']=$myrow['Name'];
$_SESSION['Secondname']=$myrow['Secondname'];
$_SESSION['Middlename']=$myrow['Middlename'];
//Выводим информацию, что пользователь авторизован и снизу ссылку для перехода на главную страницу (можно на любую поставить ссылку)
echo "<br /><br />Поздравляем! Вы успешно вошли на сайт! <br /><a href='/index.php'>Главная страница</a><br /><a href='/registration.php'>Регистрация</a>";
}
 
else {
//если пароли не совпали, выводим на экран информацию об этом и пользователя не авторизовываем
 
exit ("<br /><br />Извините, введённый вами login или пароль неверный!");
}
}
?>