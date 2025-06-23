<?php
include 'src/conexion.php';
//$sql = "SELECT id, apa, noma, cuila, curso FROM alumno INNER JOIN curso ON curso_idcurso = idcurso left join netbook on id_net = netbook_id_net WHERE curso_idcurso IN (1,2,9) ORDER BY idcurso ASC, apa ASC";
$sql = "SELECT id, apa, noma, cuila, curso,estado
FROM alumno INNER JOIN curso ON curso_idcurso = idcurso left join asistencias on alumno = id AND fecha like CURDATE() left join estado on estado_idestado = idestado  left join netbook on id_net = netbook_id_net WHERE curso_idcurso IN (1,2,9) ORDER BY idcurso ASC, apa ASC";
$res = mysql_query($sql);
if (mysql_num_rows($res)!=0) {
while ($f = mysql_fetch_array($res)){
$arr[] = array(
'id_cargados' => $f['id'],
'Alumno' => $f['apa']." ".$f['noma'],
'Dni' => $f['cuila'],
'Curso' => $f['curso'],
'Estado' => $f['estado']
);
}
$js = json_encode($arr);
echo $js;
}
?>