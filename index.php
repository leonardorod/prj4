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
    <link rel="stylesheet" href="css/padrao.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      window.setTimeout(function(){
         document.getElementById("botao_alerta").click();
      }, 3000);

      function logar(){
        $("#operacao").val('logar');
        $("#form_login").submit();
      }

      function registrar(){

      }
    </script>
  
  </head>
  <body>
    <div class="container">
    <div class="row divMsg">
        <div class="col-md-4 col-sm-1 col-1"></div>
        <div class="col-md-4 col-sm-10 col-10"><?= $msg ?></div>   
        <div class="col-md-4 col-sm-1 col-1"></div>
    </div>
    <div class="sidenav d-none d-sm-block">
       <div class="login-main-text">
          <h2>Controle de gastos</h2>
          <p>Efetue o login ou um registro para continuar.</p>
       </div>
    </div>
    <div class="main">
       <div class="col-md-6 col-sm-12">
          <div class="login-form">
             <form method="post" action="conecta_login.php" id="form_login">
              <input type="hidden" id="operacao" name="operacao">
                <div class="form-group">
                   <label>Usuario</label>
                   <input type="text" class="form-control" placeholder="Usuario" id="usuario" name="usuario">
                </div>
                <div class="form-group">
                   <label>Senha</label>
                   <input type="password" class="form-control" placeholder="Senha" id="senha" name="senha">
                </div>
                <button type="button" class="btn btn-primary" onclick="logar()">Login</button>
                <button type="button" class="btn btn-info"  onclick="registrar()">Register</button>
             </form>
          </div>
       </div>
    </div>
    </div>
  </body>
</html>