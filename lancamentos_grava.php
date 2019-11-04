<?php
include_once("conecta_login.php");

if ($_POST['operacao'] == "gravar") {
	$db->setTabela('lanctos', 'idlanctos');
	echo "gravar";
	unset($dados);

	$dados['id'] = $_POST['idlancto'];
	$dados['lct_valor'] = $_POST['lct_valor'];
	$dados['lct_data'] = $_POST['lct_data'];
	$dados['lct_idtipo'] = $_POST['lct_idtipo'];
	$dados['lct_idclasse'] = $_POST['lct_idclasse'];

	$db->gravarInserir($dados, true);
	if ($_POST['idlancto'] > 0) {
		$id = $_POST['idlancto'];
	}else{
		$id = $db->getUltimoID();
	}
	header('Location: lancamentos_edita.php?id=' . $id);
	exit;
}
?>