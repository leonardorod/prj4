<?php include_once("conecta_login.php"); ?>
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
	  <div class="card-body container-fluid">
	  	<div class="form-group row">
	  		<div class="col-2">
	  			<label for="valor">Valor:</label>
	  		</div>
	  		<div class="col-10">
	  			<input type="text" id="valor">
	  		</div>
	  	</div>
	  	<div class="form-group row">
	  		<div class="col-2">
		  		<label for="tipo">Tipo:</label>
		  	</div>
	  		<div class="col-10">
	  			<select name="selectTipo" id="idtipo">
	  				<?
	  					$sql = "SELECT * FROM tipo";
	  					$res = $db->consultar($sql);

	  					foreach ($res as $reg) {
	  						echo "<option value='" . $reg['idtipo'] . "'> " . $reg['tipo_descricao'] . "</option>";
	  					}
	  				?>
	  			</select>
		  	</div>
	  	</div>
	  	<div class="form-group row">
	  		<div class="col-2">
		  		<label for="tipo2">&nbsp;</label>
		  	</div>
		  	<div class="col-10">
		  		<input type="text" id="tipo2">
		  	</div>
	  	</div>
	  </div>
	  <div class="card-footer container-fluid">
	  	<div class="row">
	  		<div class="btn btn-primary col-3">Gravar</div>
	  		<div class="col-1"></div>
		  	<div class="btn btn-secondary col-3">Cancelar</div>
		  	<div class="col-1"></div>
		  	<div class="btn btn-danger col-3">Deletar</div>
		  	<div class="col-1"></div>
	  	</div>
	  </div>
	</div>
</body>
</html>