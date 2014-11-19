<?php
session_start();
?>

<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=windows-1251"> 
  <title>Регистрация</title>
  <link rel="StyleSheet" type="text/css" href="css/style.css">
<style type="text/css"></style>
</head>	
<body>
<table border="0" cellspacing="0" cellpadding="0" width="100%">
  <tbody>
  <tr>
    <td>
      <table border="0" width="100%" cellspacing="0" cellpadding="0">
        <tbody><tr>
          <td bgcolor="#4B69B0" background="img/PLogoV5-Bk.gif" border-spacing="0"><a href="/"><img border="0" src="img/PLogoV5-1.jpg" alt="Портал МЭИ(ТУ)"></a></td>
          <td bgcolor="#4B69B0" background="img/PLogoV5-Bk.gif">			
			<img border="0" src="img/niu.png" align="left"></td>
          <td bgcolor="#4B69B0" background="img/PLogoV5-Bk.gif">&nbsp;</td>
          <td bgcolor="#4B69B0" background="img/PLogoV5-Bk.gif">&nbsp;</td>
          <td width="130" align="center" bgcolor="#4B69B0"><img border="0" src="img/mpeilogo.png"></td>
          <td width="70" bgcolor="#4B69B0" background="img/PLogoV5-Bk.gif">&nbsp;</td>
        </tr>
      </tbody></table>
    </td>
  </tr>
  <tr>
    <td background="img/HLineBk.gif" bgcolor="#A2A2A2" height="4"><img border="0" src="img/HLine.gif" width="100%" height="4"></td>
  </tr>
</tbody></table>

<br><br><br><br>

  <?php

  echo "
  <center>
  <div class='edit'><form id='registration' form action='checkreg.php' method='post'>
   <a href='index.php'>Вернуться на главную</a>
   
 <center><table>
	<tr>
		<td><br>Логин</td>						
		<td><br> <input type='text' name='login'/></td><br>
	</tr>
	
	<tr>
		<td><br>Пароль</td>
		<td><br><input type='password' name='password'/></td>
	</tr>
	
	<tr>
		<td><br>Подтверждение пароля</td>
		<td><br><input type='password' name='password2'/></td>
	</tr>	
	
	<tr>
		<td><br>Номер группы (число)</td>						
		<td><br> <input type='number' min='1' max='20' name='GroupID'/></td>
	</tr>
		
	<tr>
		<td><br>Номер в журнале (число)</td>						
		<td><br> <input type='number' min='1' max='100' name='Numb'/></td>
	</tr>
	
	<tr>
		<td><br>Фамилия</td>						
		<td><br> <input type='text' name='Secondname'/></td>
	</tr>

	<tr>
		<td><br>Имя</td>						
		<td><br> <input type='text' name='Name'/></td>
	</tr>

	<tr>
		<td><br>Отчество</td>						
		<td><br><input type='text' name='Middlename'/></td>
	</tr>
 </table><br></center>
		<input class ='edit_kn' type='submit' value='Зарегистрировать' name='submit'  />		
		<input class ='edit_kn' type='reset' value='Очистить'  />		
</form></div> </center>";
?>
<br><br><br><br><br><br>
<table  border="0" cellspacing="0" cellpadding="0" width="100%" >
  <tbody>
  <tr>
    <td bgcolor="#A2A2A2" height="8" background="img/FLine.gif"><img border="0" src="img/FLine.gif" width="100%" height="8"></td>
  </tr>
  <tr>
    <td bgcolor="#4B69B0"><img border="0" src="/img/PFtrV5-1.jpg"></td>
  </tr>
 </tbody>
 </table>
</body>
</html>


































