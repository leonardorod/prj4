<?
// echo "a";exit;
include_once("conecta_login.php"); 

$sql = "SELECT * 
			FROM lanctos
				JOIN pessoas ON (idpessoas = lct_idpessoas)
				JOIN tipo ON (idtipo = lct_idtipo)
				JOIN classe ON (idclasse = lct_idclasse)
			WHERE lct_data >= '{$_POST['data_inicial']}'
				AND lct_data <= '{$_POST['data_final']}'
			ORDER BY lct_data";
// echo $sql;exit;
$res = $db->consultar($sql);
?>
<table class="table-sm" align="center" width="100%">
				<thead class="text-light bg-primary">
					<th>ID</th>
					<th>Valor</th>
					<th>Tipo</th>
					<th>Classif</th>
					<th>Data</th>
				</thead>
				<tbody>
<?
foreach ($res as $reg) {
	?>
	<tr class='table-primary text-dark'>
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