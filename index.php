<html>
	<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Mapa 2</title>
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=true"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
	<script type="text/javascript">
		function initialize(num) {
			var i = 0 + num;
			<?php 
				include("../conexion.php"); 
				$iduser = $_GET['user'];
				$sqlr= "SELECT v.nombre as nom, u.iduser, u.idmov, u.lat as lati, u.lng as longi, u.fecha FROM ubicacionv as u inner join users as v on v.id = u.idvendedor where fecha in (select max(fecha) as fechain from ubicacionv where idvendedor = $iduser) ORDER BY fecha DESC";
				$resr = mysql_query($sqlr) or die ("Query error: " . mysql_error());
				while($regis = mysql_fetch_assoc($resr)){  
					$lat = $regis['lati'];
			        $lng = $regis['longi'];
			        $nom = $regis['nom'];
			?>
			var myLatLng = new google.maps.LatLng( <?php echo $lat ?>, <?php echo $lng ?> ),
			myOptions = {
			    zoom: 15,
			    center: myLatLng,
			    mapTypeId: google.maps.MapTypeId.ROADMAP
			}
			<?php } ?>
			if(i==0){
			 	map = new google.maps.Map( document.getElementById( 'map' ), myOptions );
			 	marker = new google.maps.Marker( {position: myLatLng, map: map} );
			}
			marker.setMap( map );
			cargarmap( map, marker );
		}
		setInterval("initialize(1)",3000); //refresh every minute  */
		function cargarmap( map, marker ){
			$.ajax({
                type: "GET",
                dataType: 'json',
                url: "getubi.php",
                crossDomain: true,
                success: function(responseData, textStatus, jqXHR) {   
	                var lat;
                    var lng;
                    $.each(responseData, function(i,item){
                        lat  = item.lat;
                        lng = item.lng;
                    }); 
                    console.log(lat + lng);                           
                    marker.setPosition(new google.maps.LatLng(lat, lng));
			        map.panTo( new google.maps.LatLng(lat, lng));
			    },
                    error: function (responseData, textStatus, errorThrown){
                        /*console.warn(responseData, textStatus, errorThrown);*/
                    }
                });
             }
    </script>
</head>
<body onload="initialize(0);">
	<div id="map" style="height:300px;width:100%;" ></div>

	</body>
</html>
