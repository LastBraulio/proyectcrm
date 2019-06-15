<?php

$cedula =$_POST['cedula'];
$pass =$_POST['pass'];

//$cedula ='4-752-2225';
//$pass ='123456';

require_once ("library/login.php");

$db = new Login();
echo $db->login_check($cedula,$pass);

?>