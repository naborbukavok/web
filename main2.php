<?php
session_start();
$id=$_SESSION['id'];
$pid=$_SESSION['pid'];
$Acs=$_SESSION['Acs'];
$Name=$_SESSION['Name'];
$Secondname=$_SESSION['Secondname'];
$Middlename=$_SESSION['Middlename'];
?>
<html>
<head>
  <title>������� ������������� ������� �� �������� ������</title>
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
          <td bgcolor="#4B69B0" background="img/PLogoV5-Bk.gif" border-spacing="0"><a href="/"><img border="0" src="img/PLogoV5-1.jpg" alt="������ ���(��)"></a></td>
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
	
<?php
if(isset($_SESSION['login']))
{$login='������������, '.$_SESSION['login'].'!';}
// ���������, ����� �� ���������� ������ � id ������������
if (empty($_SESSION['login']) or empty($_SESSION['id']))
// ���� �����, ��
{
echo "<br><div class=''>
<center>�� ����� �� ����, ��� �����
<a href='login.php' class='index_button_v'>�����</a>
<a href='registration.php' class='index_button_v'>�����������</a></div><br>
</center>
  <tr><td background='img/HLineBk.gif' bgcolor='#A2A2A2' height='4'><img border='0' src='img/HLine.gif' width='100%' height='4'></td></tr>";
}
else
{
echo "<br><div class=''>
<center> �� ����� �� ����, ��� $Secondname $Name!
<a href='close.php' class='index_button_v'>�����</a></div><br></center>
  <tr><td background='img/HLineBk.gif' bgcolor='#A2A2A2' height='4'><img border='0' src='img/HLine.gif' width='100%' height='4'></td></tr>";
}
//����������� � ��
if (!$link = mysql_connect('localhost', 'root', '')) 
  {
  echo '������ ����������� � ���� ������ <br> <a href=/index.php>��������� � ��������� �����������</a>';
  exit;  
  }
mysql_query("SET NAMES 'cp1251'", $link);
mysql_select_db('university', $link);
  
 /* $sql = "SELECT `themes`.`ThemID` AS TID, `themes`.`ThemUID` AS TUID,
                    `users`.`UName` AS TUName, `themes`.`ThemDate` AS TDate,
                    `themes`.`ThemContent` AS TContent FROM `themes`, `users`
                    WHERE (`tasks`.`pid` = `users`.`UID`)

					AND (`themes`.`iID` = ".$iTID.")
					
					ORDER BY TDate";
*/
     $result = mysql_Query($sql, $link);
     if (!$result) {
       echo "������ ���������� ������� � ��";
       mysql_close($link) ;
	   exit;
     };
?>
  