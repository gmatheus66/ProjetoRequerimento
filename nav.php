<?php

$usuario = $_SESSION['usuario'];

?>
<style>

  a.ani{
    opacity: 0;
    /*transform: translateX(140px);*/
    animation: mostrar 0.7s linear forwards;
    animation-delay: 0.8s;
  }
@keyframes mostrar{
  0%{
    opacity: 0;
    transform: translateY(40px);
  }
  100%{
    opacity: 1;
    transform: translateY(0);
  }
}
</style>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar">
            <div class="container">
              <a class="navbar-brand nav-link ani" href="index.php"><strong>e-REQ</strong></a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-7" aria-controls="navbarSupportedContent-7" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent-7">
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item active">
                  </li>
                    <?php if (!logado()): ?>
                  <li class="nav-item">
                    <a class="nav-link ani" href="cadastro.php">Cadastro</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link ani" href="login.php">Entrar</a>
                  </li>
                    <?php endif; ?>
                    <?php if ($usuario == "aluno"): ?>
                      <li class="nav-item">
                        <a class="nav-link" href="requerimento.php">Requerimento</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="status.php">Meus Requerimentos</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="logout.php">Sair</a>
                      </li>

                    <?php endif;?>
                    <?php if ($usuario == "funcionario"): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="statusfc.php">Requerimentos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Sair</a>
                    </li>
                    <?php endif; ?>
                </ul>
                
              </div>
            </div>
          </nav>