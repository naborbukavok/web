<?php
if (isset($_POST['submit']))
{
if(empty($_POST['login']))
{
echo "�� �� ����� �����";
echo"<button><a href='index.php'>�� �������</a></button>";
}
elseif(empty($_POST['password']))
{
echo "�� �� ����� ������";
echo"<button><a href='index.php'>�� �������</a></button>";
}
elseif(empty($_POST['password2']))
{
echo "�� �� ����� ������������� ������";
echo"<button><a href='index.php'>�� �������</a></button>";
}
elseif($_POST['password'] != $_POST['password2'])
{
echo "��������� ������ �� ���������";
echo"<button><a href='index.php'>�� �������</a></button>";
}
/*�������� �������� ���*/

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

//������� id �� ����� ������� ������������������ �������������, ������ ������ � ������
$query = "SELECT id FROM `students` WHERE `login`='{$login}' AND `password`='{$password}'";
 
$login = stripslashes($login);//������� ������������� ��������, ������������� �������� addslashes()
$login = htmlspecialchars($login);//����������� ����������� ������� � HTML-�������� (������������ ��, ����� ���� � ������� �� �������� �� ������ �� �������� �������-��������)
$password = stripslashes($password);
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
//������� �������
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
echo '����� ����� ��� ����������';
}

else
{
//���������� � �� ������ ����
$query="INSERT INTO `students` (`id`, `login`, `password`,`GroupID`,`Numb`,`Secondname`,`Name`,`Middlename`,`Acs`)
VALUES ('','$login', '$password', '$GroupID','$Numb','$Secondname','$Name','$Middlename','2')";
$result = mysql_query($query);
if (!$result) {
$feedback = '������ - ������ ���� ������';
$feedback .= mysql_error();
return $feedback;
}
echo"����������� ������ �������";
echo"<button><a href='index.php'>�� �������</a></button>";
}
}
}
?>