<?php include_once("conecta_login.php"); 
// print_r($_SESSION);
 if (isset($_SESSION['mensagem'])) {
    $msg = $util->mostraMensagem($_SESSION['tipoMsg'], $_SESSION['mensagem']);
    unset($_SESSION['mensagem'], $_SESSION['tipoMsg']);
    
  }
 ?>
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
	<script src="js/funcoes.js"></script>
	<link rel="stylesheet" href="css/padrao.css">
	<script type="text/JavaScript">
		$(document).ready(
			function(){
				var tipo = $("#lct_idtipo :selected").val();
				var idselect = $("#idselect").val();
				if (tipo != 0) {
					geraClassif(idselect);
				}
			}
		);

		function cancelar(){
			postFormulario('lancamentos_edita.php', {id: 0});
		}

		function operacao(op){
			if (op == 'excluir') {
				if(!confirm('Deseja excluir esse registro?')){
					return;
				}
			}
			$("#operacao_edita").val(op);
			$("#form_edita").submit();
		}
		function geraClassif(select){
			var tipo = $("#lct_idtipo :selected").val();
			$.post('lancamentos_grava.php', {operacao: 'geraClassif', idtipo: tipo, select: select},
				function(data){
					$("#classif").html(data);
				}, 'html');
		}
	</script>
</head>
<body>
	<? include('menu.php'); 
		if (!empty($_REQUEST['id'])) {
			$sql = "SELECT * FROM lanctos 
					LEFT JOIN tipo ON (idtipo = lct_idtipo)
					LEFT JOIN classe ON (idclasse = lct_idclasse)
				WHERE idlanctos = " . $_REQUEST['id'];
			$reg = $db->retornaUmReg($sql);
		}
	?>
	<div class="row divMsg">
        <div class="col-md-4 col-sm-1 col-1"></div>
        <div class="col-md-4 col-sm-10 col-10"><?= $msg ?></div>   
        <div class="col-md-4 col-sm-1 col-1"></div>
    </div>
	<div class="card">
	  <div class="card-header">Lançamentos</div>
	    <form action="lancamentos_grava.php" id="form_edita" method="post">
	    	<input type="hidden" name="idlancto" id="idlancto" value="<?= $reg['idlanctos']?>">
	    	<input type="hidden" name="operacao" value="" id="operacao_edita">
		    <div class="card-body container-fluid">
		  		<div class="form-group row">
		  			<div class="col-2">
		  				<label for="lct_valor">Valor:</label>
		  			</div>
		  			<div class="col-10">
		  				<input type="number" min="0.00" max="10000.00" step="0.01" id="lct_valor" name="lct_valor" class="form-control" value="<?= $reg['lct_valor']?>">
		  			</div>
		  		</div>
		  		<div class="form-group row">
		  			<div class="col-2">
		  				<label for="lct_valor">Data:</label>
		  			</div>
		  			<div class="col-10">
		  				<input type="date" id="lct_data" name="lct_data" class="form-control" value="<?= $reg['lct_data']?>">
		  			</div>
		  		</div>
		  		<div class="form-group row">
		  			<div class="col-2">
			  			<label for="lct_idtipo">Tipo:</label>
			  		</div>
		  			<div class="col-10">
		  				<?
		  					$sql = "SELECT * FROM tipo";
		  					echo $util->comboBoxSql('lct_idtipo', 'tipo_descricao', 'idtipo', $sql, $db, $reg['idtipo'], 'onchange="geraClassif(0)"');
		  				?>
			  		</div>
		  		</div>
		  		<div class="form-group row">
		  			<div class="col-2">
			  			<label for="lct_idclasse">&nbsp;</label>
			  		</div>
			  		<div class="col-10" id="classif">
			  			<input type="hidden" name="idselect" id="idselect" value="<?= $reg['lct_idclasse']?>">
			  		</div>
		  		</div>
		  		<div class="form-group row">
		  			<div class="col-2">
		  				<label for="lct_valor">OBS:</label>
		  			</div>
		  			<div class="col-10">
		  				<input type="text" id="lct_obs" name="lct_obs" class="form-control" value="<?= $reg['lct_obs']?>">
		  			</div>
		  		</div>
		  	</div>
		</form>
	  <div class="card-footer container-fluid">
	  	<div class="row">
	  		<div class="btn btn-primary col-3" onclick="operacao('gravar')">Gravar</div>
	  		<div class="col-1"></div>
		  	<div class="btn btn-secondary col-3" onclick="cancelar()">Cancelar</div>
		  	<div class="col-1"></div>
		  	<div class="btn btn-danger col-3" onclick="operacao('excluir')">Excluir</div>
		  	<div class="col-1"></div>
	  	</div>
	  </div>
	</div>
</body>
</html>