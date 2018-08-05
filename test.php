<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<title>Insert title here</title>


</head>
<body onload="getLocation()">
<div id="lokasi"></div>

<button type="button" id="cek">Cek lokasi</button>
<script>
$('#cek').on('click', function(){

    navigator.geolocation.getCurrentPosition(function(position) {

        // Get the coordinates of the current position.
        var latitude  = position.coords.latitude;
	    var longitude   = position.coords.longitude;
	    var $ = jQuery;
	    $.ajax({
	      type  : 'POST',
	      url   : 'function_getaddress.php',
	      data  : 'latitude='+latitude+'&longitude='+longitude,
	      success : function (e) {
	        if (e) {
	          $('#lokasi').html(e);
	          //$('#lat').val(latitude);
	          //$('#long').val(longitude);
	        }else{
	          $('#lokasi').html('Tidak Tersedia');
	        }
	      }
	    })

    });

});
    </script>
</body>
</html>