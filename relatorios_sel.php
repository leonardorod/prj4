<!DOCTYPE html>
<html>
<head>
	<meta charset="utf8" name="viewport" content="width=device-width, initial-scale=1">
	<title>Início</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		function geraRel(){
			var data_inicial = $("#data_inicial").val();
			var data_final = $("#data_final").val();
			$.post('relatorios_grava.php', {data_inicial: data_inicial, data_final: data_final},
				function(data){
					$("#relatorio").html(data);
				}, 'html');
		}
	</script>
</head>
<body>
	<? include('menu.php'); ?>
	<div class="container-fluid">
		&nbsp;
		<div class="row">
			<div class="col-4">
				<label for="data_inicial">Data Inicial:</label>
			</div>
			<div class="col-8">
				<input class="form-control" type="date" name="data_inicial" id="data_inicial">
			</div>
		</div>
		&nbsp;
		<div class="row">
			<div class="col-4">
				<label for="data_final">Data Final:</label>
			</div>
			<div class="col-8">
				<input class="form-control" type="date" name="data_final" id="data_final">
			</div>
		</div>
		&nbsp;
		<div class="row" align="center">
			<div class="col-12">
				<input type="button" class="btn btn-primary" name="listar" id="listar" value="Listar" onclick="geraRel()">
			</div>
		</div>
		&nbsp;
		<div id='relatorio' name='relatorio'></div>
	</div>
</body>
</html>