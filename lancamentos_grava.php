<?php
include_once("conecta_login.php");

if ($_POST['operacao'] == "gravar") {
	$db->setTabela('lanctos', 'idlanctos');
	 // echo "gravar";
	
	// exit;
	unset($dados);

	$dados['id'] 			= $_POST['idlancto'];
	$dados['lct_idpessoas'] = $util->igr($_SESSION['idusuario']);
	$dados['lct_valor'] 	= $util->vgr($_POST['lct_valor']);
	$dados['lct_data'] 		= $util->sgr($_POST['lct_data']);
	$dados['lct_idtipo']	= $util->igr($_POST['lct_idtipo']);
	$dados['lct_idclasse'] 	= $util->igr($_POST['lct_idclasse']);
	$dados['lct_obs'] 		= $util->sgr($_POST['lct_obs']);

	$db->gravarInserir($dados, true);
	if ($_POST['idlancto'] > 0) {
		$id = $_POST['idlancto'];
	}else{
		$id = $db->getUltimoID();
	}
	header('Location: lancamentos_edita.php?id=' . $id);
	exit;
}

if ($_POST['operacao'] == "excluir") {
	$db->setTabela('lanctos', 'idlanctos');
	 
	 $db->excluir($_POST['idlancto'], 'Excluir');
	

	header('Location: lancamentos_edita.php');
	exit;
}

if ($_POST['operacao'] == "geraClassif") {
	$sql = 'SELECT * FROM classe WHERE cls_idtipo = ' . $_POST["idtipo"] ;
	echo $util->comboBoxSql('lct_idclasse', 'cls_descricao', 'idclasse', $sql, $db, $_POST['select']);
	exit;
}
?>