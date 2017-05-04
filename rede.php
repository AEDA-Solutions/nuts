<!doctype html>
<html>

	<head>
		<title> Nuts- Qualidade da rede</title>
		<meta charset="utf-8" />
	</head>
	<body>

		<table border="0" width="900" align="center">
			<tr>
				<td> <img src="imagens/logo.png" /> </td>
				<td align="right">
                   			<a href="index.php">Home</a> |
					<a href="quemsomos.php">Quem somos</a> |
					<a href="rede.php"> Análise de Rede </a> |
					<a href="login.php"> Login </a> |
					<a href="cadastro.php"> Cadastro </a> |
					<a href="contato.php">Contato</a>
				</td>
			</tr>
<tr>
				<td colspan="2">
					<img src="imagens/analisederede.png" />
				</td>
			</tr>

			<tr>
				<td colspan="2">

					<h1 align="center"> Análise de rede </h1> 
			<br>
		</table>
	</body>
</html>

<form style = "display: hidden" action = "treat_location.php" method = "post" id = "form">
	<input type="hidden" id="latitude" name="latitude" value=""/>
  	<input type="hidden" id="longitude" name="longitude" value=""/>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

<script>

window.onload = getLocation();


function getLocation() {
    if (navigator.geolocation) {
    	//navegador suporta geolocalizacao
        navigator.geolocation.getCurrentPosition(send_position,error_handler,options);
    } 

    else { 
        $("#latitude").val(false);
		$("#longitude").val(false);
    }
}

var options = {

	//variavel que armazena os parametros para a func getCurrentPosition()
  	enableHighAccuracy: true,
 	timeout: 5000,
  	maximumAge: 0
};

function error_handler(error){
	
	//funcao que trata possiveis erros da funcao getCurrentPosision()
	
    switch(error.code) {
        case error.PERMISSION_DENIED:
            //User denied the request for Geolocation."
            $("#latitude").val(false);
			$("#longitude").val(false);

            break;
        case error.POSITION_UNAVAILABLE:
            //Location information is unavailable."
            $("#latitude").val(false);
			$("#longitude").val(false);
            break;
        case error.TIMEOUT:
           //The request to get user location timed out."
           	$("#latitude").val(false);
			$("#longitude").val(false);
            break;
        case error.UNKNOWN_ERROR:
            //An unknown error occurred."
            $("#latitude").val(false);
			$("#longitude").val(false);
            break;
    }
}

function send_position(position) {

	var lat= position.coords.latitude;
	var long = position.coords.longitude;

	$("#latitude").val(lat);
	$("#longitude").val(long);
    $("#form").submit();	

}

</script>
