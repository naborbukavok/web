<?php
 session_start();//��� ��������� ������ ������ � ������� �������� �� �������. ������ � ��� �������� ������  ������������, ���� �� ��������� �� �����. ��������� ������ ����� � ������ ���������

header('Refresh: 5; URL=http://www.mizinovsv.ru/index.php'); //redirect � ��������� 
echo "�� ������ �������������� �� ������� �������� ����� 5 ������."; //����� ���������

if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } //������� ��������� ������������� ����� � ���������� $login, ���� �� ������, �� ���������� ����������

if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }//������� ��������� ������������� ������ � ���������� $password, ���� �� ������, �� ���������� ����������

if (empty($login) or empty($password)) //���� ������������ �� ���� ����� ��� ������, �� ����� ������ � ������������� ���������� �������
    {
    exit ("�� ����� �� ��� ����������, ��������� ����� � ��������� ��� ����!");
    }
    
$login = stripslashes($login);//������� ������������� ��������, ������������� �������� addslashes()
    
$login = htmlspecialchars($login);//����������� ����������� ������� � HTML-�������� (������������ ��, ����� ���� � ������� �� �������� �� ������ �� �������� �������-��������)

$password = stripslashes($password); //������� ������������� ��������, ������������� �������� addslashes()
    
$password = htmlspecialchars($password);

$login = trim($login);//������� ������� (��� ������ �������) �� ������ � ����� ������
$password = trim($password);
// ����� ���������� ��� ����������� � ��
$db_host = 'localhost';
$db_user = 'root';
$db_password = '';
$database = 'university';
// ������������ � �� 
mysql_connect($db_host, $db_user, $db_password);
//@mysql_query("SET NAMES 'cp1251'");
mysql_query("SET NAMES 'cp1251'");
mysql_select_db($database);

$result = mysql_query("SELECT * FROM `students` WHERE `login`='$login'"); //��������� �� ���� �� ������� ��������� ��� ������ � ������������ � ��������� ������� 
$myrow = mysql_fetch_array($result);
 
if (empty($myrow['password'])){ // ���� �� ����� �������� �������� �� �������������
$result=mysql_query("SELECT * FROM `proffessors` WHERE `login`='$login'"); //��������� �� ���� �� ������� �������������� ��� ������ � ������������ � ��������� �������
$myrow = mysql_fetch_array($result);}

if (empty($myrow['password'])) //���� �� ����� �� �������� �� �������������
{
//���� ������������ � ��������� ������� �� ����������
exit ("<br /><br />��������, �������� ���� login ��� ������ ��������!");
}
 
else {
//���� ����������, �� ������� ������
 
if ($myrow['password']== md5( "$password" )){
//���� ������ ���������, �� ��������� ������� ������������ ������
$_SESSION['login']=$myrow['login'];
$_SESSION['id']=$myrow['id'];//��� ������ ����� ����� ������������, ������� ������ ����������� � �������������� ���� ������
$_SESSION['pid']=$myrow['pid'];
$_SESSION['Acs']=$myrow['Acs'];
$_SESSION['Name']=$myrow['Name'];
$_SESSION['Secondname']=$myrow['Secondname'];
$_SESSION['Middlename']=$myrow['Middlename'];
//������� ����������, ��� ������������ ����������� � ����� ������ ��� �������� �� ������� �������� (����� �� ����� ��������� ������)
echo "<br /><br />�����������! �� ������� ����� �� ����! <br /><a href='/index.php'>������� ��������</a><br /><a href='/registration.php'>�����������</a>";
}
 
else {
//���� ������ �� �������, ������� �� ����� ���������� �� ���� � ������������ �� ��������������
 
exit ("<br /><br />��������, �������� ���� login ��� ������ ��������!");
}
}
?>