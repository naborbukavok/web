<?php
session_start();
// ��� ��������� �������� �� �������. � ������ �������� ������  ������������, ���� �� ��������� �� �����.
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
  
$sql = "SELECT `menu`.`tid` AS tid, `menu`.`content` AS content FROM `menu`";
$result = mysql_Query($sql, $link);
if (!$result) {
       echo "������ ���������� ������� ������� � ��";
       mysql_close($link) ;
	   exit;
     };
/*
	if ($Acs == 1){
	echo"<br><br><center><div class='razdel'>�������� ������� ������ �������:</div><br><br>";
   while ($row = mysql_fetch_object($result))
  {
	echo "<table><td><a href=\"main.php?iID=".$row->tid."\" class='index_button'>".$row->content."</a></td></table>";
  }}
?>*/

	//����� ��������� ������ ������� ��� ���������
	if ($Acs == 2){
	echo"<br><br><center><div class='razdel'>�������� ������� ������ �������:</div><br><br>";
	while ($row = mysql_fetch_array($result))	{
	if ($row['tid']>2) { 
	echo "<table><td><a href=\"main.php?id=".$id."\" class='index_button'>".$row['content']."</a></td></table>";
	}}}

	//����� ��������� ������ ������� ��� ��������������
	if ($Acs == 1){
	echo"<br><br><center><div class='razdel'>�������� ������� ������ �������:</div><br><br>";
	while ($row = mysql_fetch_array($result))	{
	if ($row['tid']<3) { 
	echo "<table><td><a href=\"main2.php?pid=".$pid."\" class='index_button'>".$row['content']."</a></td></table>";
	}}}
?>
<br><br><br><br><br><br><br><br><br><br><br><br>
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

