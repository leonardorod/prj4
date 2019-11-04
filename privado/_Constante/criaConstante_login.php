<html lang="pt">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Leo</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/login.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
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
          <h2>Criação do Constante</h2>
          <p>Efetue o login para continuar.</p>
       </div>
    </div>
    <div class="main">
       <div class="col-md-6 col-sm-12">
          <div class="login-form">
             <form method="post" action="criaConstante.php" id="form_login">
              <input type="hidden" id="operacao" name="operacao">
                <div class="form-group">
                   <label>Senha</label>
                   <input type="password" class="form-control" placeholder="Senha" id="senha" name="senha">
                </div>
                <button type="button" class="btn btn-primary" onclick="logar()">Login</button>
             </form>
          </div>
       </div>
    </div>
  </body>
</html>