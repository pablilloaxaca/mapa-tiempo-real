<?php
	header('Access-Control-Allow-Origin: *');
	header('content-type: application/json; charset=utf-8');
	include("../conexion.php"); 
	$ide = $_GET['idve'];
	$sqlr= "SELECT v.nombre as nom, u.idvendedor, u.idmov, u.lat as lati, u.lng as longi, u.fecha FROM ubicacionv as u inner join vendedores as v on v.id = u.idvendedor where fecha in (select max(fecha) as fechain from ubicacionv where idvendedor = '$ide') ORDER BY fecha DESC";
	$resr = mysql_query($sqlr) or die ("Query error: " . mysql_error());
	while($regis = mysql_fetch_assoc($resr)){  
		$lat = $regis['lati'];
		$lng = $regis['longi'];
		$nom = $regis['nom'];
		$matriz['lat'] = $lat;
		$matriz['lng'] = $lng;
	}
 

$matches[] = $matriz;
$query = $matches; 
mysql_close($link);
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Content-Type');
echo json_encode($query);
?>


