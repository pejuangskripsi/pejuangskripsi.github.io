<!DOCTYPE html>
<html>
<head>
	<title>Get Address</title>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<form method="POST" action="">
	<textarea id="lokasi" row="3"></textarea>
	<button type="button" id="ceklokasi">cek lokasi</button>
</form>


<!-- /.content-wrapper -->
   

    <script type="text/javascript">
  $('#ceklokasi').click(function() {
    navigator.geolocation.getCurrentPosition(function (position) {
         //console.log(posisi);
    var latitude  = position.coords.latitude;
    var longitude   = position.coords.longitude;
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
    }, function (e) {
        alert('Geolocation Tidak Mendukung Pada Browser Anda');
    }, {
        enableHighAccuracy: false,
        
    });
  });

   </script>


</body>
</html>