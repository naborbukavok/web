<?php
session_start();//открытие сессии
unset($_SESSION['login']);//закрытие сессии по логину
session_destroy();//удаление сессии
header("Location: http://www.mizinovsv.ru/index.php");//Перенаправление на эту страницу после нажатия кнопки ВЫЙТИ
?>