<?php

$usuario = $_SESSION['usuario'];

?>

<nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar">
            <div class="container">
              <a class="navbar-brand" href="index.php"><strong>e-REQ</strong></a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-7" aria-controls="navbarSupportedContent-7" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent-7">
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item active">
                    <a class="nav-link" href="index.php">Início<span class="sr-only">(current)</span></a>
                  </li>
                    <?php if (!logado()): ?>
                  <li class="nav-item">
                    <a class="nav-link" href="cadastro.php">Cadastro</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="login.php">Entrar</a>
                  </li>
                    <?php endif; ?>
                    <?php if ($usuario == "aluno"): ?>
                  <li class="nav-item">
                    <a class="nav-link" href="requerimento.php">Requerimento</a>
                  </li>
                        <li class="nav-item">
                            <a class="nav-link" href="status.php">Meus Requerimentos</a>
                        </li>

                    <?php endif;?>
                    <?php if ($usuario == "funcionario"): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="statusfc.php">Requerimentos</a>
                    </li>
                    <?php endif; ?>
                </ul>
                
              </div>
            </div>
          </nav>