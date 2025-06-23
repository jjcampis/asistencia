<?php
session_start();
include 'src/conexion.php';
$json = file_get_contents('php://input');
$data = json_decode($json);
@$persona = $_SESSION['usr'];
//var_dump($data -> usr);
@$que = $data -> que;
switch ($que){
case 'login':
$u = mysql_real_escape_string($data -> usr);
$p = mysql_real_escape_string($data -> pass);

$sql = "select * from preceptor where usuario = '$u' and password ='$p';";
echo $sql;
$res = mysql_query($sql);

//echo mysql_num_rows($res);
if(mysql_num_rows($res) ){
while($f = mysql_fetch_array($res)){
$arr = array(
'usr' => $f['idlogin'],
'login' => $f['usuario']
);
}
$js = json_encode($arr);
echo $js;
$_SESSION['usr'] = $arr['usr'];
$_SESSION['login'] = $arr['login'];
}
if(mysql_num_rows($res) == 0){
	echo "error";
}
break;

case 'salir':
break;
}
?>