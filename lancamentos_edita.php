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
</head>
<body>
	<? include('menu.php'); ?>
	<div class="card">
	  <div class="card-header">Lançamentos</div>
	  <div class="card-body">
	  	<div class="form-group">
	  		<label for="valor">Valor:</label>
	  		<input type="text" id="valor">
	  	</div>
	  	<div class="form-group">
	  		<label for="tipo">Tipo:</label>
	  		<input type="text" id="tipo">
	  	</div>
	  	<div class="form-group">
	  		<label for="tipo2"></label>
	  		<input type="text" id="tipo2">
	  	</div>
	  </div>
	  <div class="card-footer">
	  	<div class="btn btn-primary">Gravar</div>
	  	<div class="btn btn-secondary">Cancelar</div>
	  	<div class="btn btn-danger">Deletar</div>
	  </div>
	</div>
</body>
</html>