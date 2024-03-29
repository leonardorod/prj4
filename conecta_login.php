<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
if(!realpath("privado/constantes.lo")){
	header("Location: privado/_Constante/criaConstante_login.php");
	exit;
}
require_once("Class/DB.class.php");
require_once("Class/Util.class.php");
require_once("Class/usuario.class.php");
require_once("privado/constantes.lo");
//
//Se não existe define como null para evitar avisos de erro
if (!isset($_POST['operacao'])) {
	$_POST['operacao'] = null;
}
if (!isset($_SESSION['logado'])) {
	$_SESSION['logado'] = null;
}
//
//inicia as classes nescessarias
$util = new Util();
$db = new Db($SERVIDOR, $PORTA, $USUARIO, $SENHA, $DB_NAME);
//
//Conecta com o banco de dados
$db->conectar();
//
//inicio das operações
//
//Efetua o login
if ($_POST['operacao'] == "logar") {
 	$db->setTabela("pessoas", "idpessoas");
 	$user = new Usuario($_POST['usuario'], $_POST['senha']);
	$resultado = $user->conferirSenha($db);
	if ($resultado['retorno']){
		//
		$_SESSION['logado'] 						= true;
		$_SESSION['user'] 							= $_POST['usuario'];
		$_SESSION['idusuario']				 	    = $resultado['idpessoas'];
		header('Location: inicio.php');
		exit;
	}else{
		$_SESSION['logado'] = false;
		$_SESSION['mensagem'] = "Usuario ou senha incorretos!!!<br>Tente novamente";
    	$_SESSION['tipoMsg'] = "danger";
		header('location: index.php');
		exit;
		}
}

//
//Operação para deslogar do sistema
if ($_POST['operacao'] == "Sair") {
	session_destroy();
	header('Location: index.php');
	exit;
}

//
//Caso tente acessar as paginas pela url e nao esteja logado
if (!$_SESSION['logado']) {
	$util->mostraErro("Você não esta logado.<br>Para continuar é necessário que faça o login!", "index.php");
	exit;
}

?>
