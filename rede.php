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
<script src = "get_location.js"></script>
<script type="text/javascript">
	window.onload = getLocation(function (x){
	if(x!=false){
		$("#latitude").val(x['latitude']);
		$("#longitude").val(x['longitude']);
	   	$("#form").submit();
	}
	else{}
		$("#form").submit();
});
</script>
