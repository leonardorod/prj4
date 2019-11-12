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
	<script src="js/funcoes.js"></script>
	<script type="text/javascript">
		function editaLancto(id){
			postFormulario('lancamentos_edita.php', {id: id});
		}
	</script>
</head>
<body>
	<?php include('menu.php'); ?>
	<div class="container-fluid">
		<div class="row"><div class="col-12">&nbsp;
		<div class="row">
			<div class="col-12">
				<button class="btn btn-primary" type="button" onclick="editaLancto(0)"><b>Novo Lançamento</b></button>
			</div>
		</div>
		&nbsp;
		<div class="row">
			<div class="col-12">
				<table class="table-sm" align="center" width="100%">
					<thead class="text-light bg-primary">
						<th>ID</th>
						<th>Valor</th>
						<th>Tipo</th>
						<th>Classif</th>
						<th>Data</th>
					</thead>
					<tbody>
						<?$sql = "SELECT * FROM lanctos 
										JOIN pessoas ON (idpessoas = lct_idpessoas)
										JOIN tipo ON (idtipo = lct_idtipo)
										JOIN classe ON (idclasse = lct_idclasse)
									WHERE idpessoas = " . $_SESSION['idusuario'] . "
									ORDER BY idlanctos DESC";
						$res = $db->consultar($sql);
						foreach ($res as $reg) {
						?>
							<tr onclick="editaLancto(<?=$reg['idlanctos']?>)" class='table-primary text-dark'>
								<td><?= $reg['idlanctos'] ?></td>
								<td><?= $reg['lct_valor'] ?></td>
								<td><?= $reg['tipo_descricao'] ?></td>
								<td><?= $reg['cls_descricao'] ?></td>
								<td><?= $util->convertData($reg['lct_data']) ?></td>
							</tr>
						<?
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>