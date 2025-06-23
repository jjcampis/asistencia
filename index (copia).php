<?php 
//include 'src/conexion.php';
session_start();
//header('location:cargas.php');
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>COMERCIO 6</title>
    <link rel="stylesheet" type="text/css" media="screen" href="css/animate.css"/>
    <link rel="stylesheet" type="text/css" media="screen" href="css/nogutter.css"/>
<link rel="stylesheet" type="text/css" media="screen" href="css/tablas.css"/>
    <link rel='stylesheet prefetch' href='css/bootstrap.min.css'>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/estilo.css">
  </head>
  <body ng-app="acreditacion" ng-controller="registro as reg">
  <div class="container-fluid">
  <?php
  if(@!isset($_SESSION['usr']) || @!isset($_SESSION['login'])){
  ?>
  <div class="row">
  <div ng-if="!login" class="col-md-12 col-xs-12">
    <div class="wrapper">
      <form class="form-signin" ng-submit="reg.login()">
        <h2 class="form-signin-heading">Comercio N° 6</h2>
        <input type="text" class="form-control" name="usr" placeholder="Usuario" required="" autofocus="" ng-model="reg.form.usr"/>
        <input type="password" class="form-control" name="pass" placeholder="Contraseña" required="" ng-model="reg.form.pass"/>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Ingresar</button>   
      </form>
  </div>
</div>
</div>
<?php }else{?>
<div class="row">
  <div ng-if="login" class="col-md-12 col-xs-12">
    <div class="fadeInUp animated" ng-include="'alus.html'"></div>
  </div>
</div>
<?php }?>
</div>
<script src="src/js/angular.js"></script>
<script src="src/js/acreditacion.js"></script>
  </body>
</html>
