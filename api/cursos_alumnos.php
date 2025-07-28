<?php
session_start();
include '../src/conexion.php';
if(!isset($_SESSION['usr'])){
    http_response_code(401);
    echo json_encode(['error' => 'No autorizado']);
    exit;
}
$preceptor = mysql_real_escape_string($_SESSION['usr']);
// Ajustar la siguiente consulta a su esquema de base de datos
$sql = "SELECT id, apa, noma, cuila, curso FROM alumno INNER JOIN curso ON curso_idcurso = idcurso WHERE preceptor_id = '$preceptor'";
$res = mysql_query($sql);
$datos = [];
while($f = mysql_fetch_assoc($res)){
    $datos[] = [
        'id' => $f['id'],
        'alumno' => $f['apa'].' '.$f['noma'],
        'dni' => $f['cuila'],
        'curso' => $f['curso']
    ];
}
echo json_encode($datos);

