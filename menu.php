<nav class="navbar navbar-expand-md bg-primary navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="inicio.php">Home</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="lancamentos_consulta.php">Lançamentos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="relatorios.php">Relatórios</a>
      </li>
    </ul>
    <div>
      <form action="conecta_login.php" method="post">
        <input type="hidden" id="operacao" name="operacao" value="Sair">
        <button type="submit" class="btn btn-danger">Sair</button>
      </form>
    </div>
  </div>
</nav>