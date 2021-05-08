<?php
 require_once('config.php');
 function insertar($campos,$tabla,$valores,$imprimir=false){
	global $connect;
	$c_cf="insert into ".$tabla;
	if(!empty($campos)):
		$c_cf.=" (".$campos.") ";
	endif;
	$c_cf.=" values(".$valores.") ";
	if($imprimir==true):
		echo $c_cf."<br>";
	endif;
	$r_cf=$connect->query($c_cf);
	if(!$r_cf):
		return false;
	else:
		return true;
	endif;
}
function buscar($campos,$tabla,$condicion,$imprimir=false){
	global $connect;
	if($imprimir==true):
		echo "SELECT ".$campos." FROM ".$tabla." ".$condicion."<br>";
	endif;
	$c_cf=$connect->query("SELECT ".$campos." FROM ".$tabla." ".$condicion);
	return $c_cf;
}
function eliminar($tabla,$condicion){
	global $connect;
	$c_cf=$connect->query("DELETE FROM ".$tabla." ".$condicion);
	if(!$c_cf):
		return false;
	else:
		return true;
	endif;
}
function actualizar($campos,$tabla,$condicion,$imprimir=false){
	global $connect;
	$c_cf="update ".$tabla;
	$c_cf.=" set ".$campos;
	$c_cf.=" ".$condicion;
	if($imprimir==true):
		echo $c_cf."<br />";
	endif;
	$r_cf=$connect->query($c_cf);
	if(!$r_cf):
		return false;
	else:
		return true;
	endif;
}
?>