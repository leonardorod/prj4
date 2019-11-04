<?php 
  //Inicia Sessão
  session_start(); 
  //
  //Desativa os erros e permite apenas avisos
  error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
  //
  //Verifica se já está logado
  if($_SESSION['logado']){
    header('Location: inicio.php');
    exit;
  }
  //
  //Inclui classes
  require_once("Class/Util.class.php");
  $util = new Util();
  //
  //Monta variaveis de exibição
  if (isset($_SESSION['mensagem'])) {
    $msg = $util->mostraMensagem($_SESSION['tipoMsg'], $_SESSION['mensagem']);
    unset($_SESSION['mensagem'], $_SESSION['tipoMsg']);
  }
?>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Leo</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      window.setTimeout(function(){
         document.getElementById("botao_alerta").click();
      }, 3000);

    </script>

  </head>
  <body>
    <div class="row divMsg">
      <div class="col-md-4 col-sm-1 col-1"></div>
      <div class="col-md-4 col-sm-10 col-10"><?= $msg ?></div>   
      <div class="col-md-4 col-sm-1 col-1"></div>
    </div>
    <div class="wrapper fadeInDown">
      <div id="formContent">
        <div class="fadeIn first">
          <br><br>
          <!-- <img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="User Icon" /> -->
        </div>
        <form action="conecta_login.php" method="post">
          <input type="text" id="usuario" class="fadeIn second" name="usuario" placeholder="Usuario">
          <input type="password" id="senha" class="fadeIn third" name="senha" placeholder="Senha">
          <input type="hidden" id="operacao" name="operacao" value="logar">
          <input type="submit" class="fadeIn fourth" value="Logar">
        </form>
      </div>
    </div>
  </body>
</html>