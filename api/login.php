<?php
session_start();
include '../src/conexion.php';
$input = json_decode(file_get_contents('php://input'), true);
$usuario = mysql_real_escape_string($input['usr']);
$pass = mysql_real_escape_string($input['pass']);
$sql = "SELECT * FROM preceptor WHERE usuario = '$usuario' AND password = '$pass'";
$res = mysql_query($sql);
if(mysql_num_rows($res)){
    $row = mysql_fetch_assoc($res);
    $_SESSION['usr'] = $row['idlogin'];
    $_SESSION['login'] = $row['usuario'];
    echo json_encode(['success' => true, 'user' => $row['usuario']]);
} else {
    http_response_code(401);
    echo json_encode(['success' => false]);
}
