(function(){
var app = angular.module('acreditacion',[]);
//controlador que se encarga de el registro de escuelas o de nuevos usuarios
app.controller('registro', ['$scope','$filter','$http','$timeout',function($scope,$filter,$http,$timeout){
$scope.$on('load',function(){$scope.loading=true});
$scope.$on('unload',function(){$scope.loading=false});

reg = this;
reg.form = {};

reg.login = function(){
$scope.login = true;
console.log(reg.form);
$scope.$emit('load');
$http.post('procesa.php?',reg.form).success(function(datos){
//reg.res = datos;
console.log(datos);
if (datos != undefined){
$scope.$emit('unload');
//location.reload();
//alert('recargando pagina!');
//window.location.href = 'index.php';
}
});
}
reg.guardar = function(){
reg.alumnospresentes = {};
if(reg.alumnos.length > 0){
reg.alumnospresentes.alumnos = reg.alumnos;	
reg.alumnospresentes.que = 'guardar';
reg.alumnospresentes.estadoal = reg.estadoal;
$scope.$emit('load');
$http.post('procesa.php',reg.alumnospresentes).success(function(datos){
console.log(datos);
$scope.$emit('unload');
reg.ver();
})
}else{
	alert('marque al menos uno!');
}
};
/*Parte visual y guarda en un array solo los id de los alumnos marcados*/
reg.alumnos = [];
reg.check = function(alu){
var posal = reg.alumnos.indexOf(alu.id_cargados);
//console.log(alu);
//activar / desactivar
var pos = $scope.alus.indexOf(alu);
var alumno = $scope.alus[pos];
if(alumno.Estado != 'Presente'){
if(alumno.activo == true){
	alumno.activo = false;
	if (posal !== -1) {
$scope.reg.alumnos.splice(posal,1);	
}
}else{
	alumno.activo = true;
	if (posal < 0) {	
	reg.alumnos.push(alu.id_cargados);
}
}
}

}

//cuando cambia de pantalla
reg.cambiacur = function(){
	reg.alumnos = [];
	for (var i = $scope.alus.length - 1; i >= 0; i--) {
				$scope.alus[i].activo = false;
			};		
}
//para ordenar
$scope.reverse = false;
$scope.predicate = 'apynom';
reg.orden = function(predicate){
	if($scope.predicate === predicate && $scope.reverse === true){
    $scope.reverse = false;
    }else{$scope.reverse = true;}
 	   $scope.predicate = predicate;
}

reg.cierra = function(attr){
if($scope.attr == attr){
$scope.attr = '';
//reg.limpia();
}
else if(!$scope.attr || $scope.attr != attr){	
$scope.attr = attr;
}
$scope.$emit('unload');
}



$scope.alus ={};
$scope.llavesalus=[];
reg.ver = function(){
$scope.$emit('load');
$http.post('ver.php').success(function(datos){
$scope.$emit('unload');
if(datos != ''){
$scope.alus ={};
$scope.llavesalus=[];
$scope.alus = datos;
$scope.llalus = datos[0];
for(var keyName in $scope.llalus){
var key=keyName;
$scope.llavesalus.push(key);
}
//reg.cierra(que);
}
})
}
//reg.ver();
}])})();