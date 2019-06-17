<?php

include 'init.php';
$usuario = $_SESSION['usuario'];

?>
<html lang="en">
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Saira+Semi+Condensed&display=swap" rel="stylesheet">
 <link rel="stylesheet" href="css/style.css">
    <body>
        <header>
          <!--Navbar-->
          <?php include 'nav.php' ?>
          <!-- Navbar -->
          <!-- Full Page Intro -->
          <div class="view" style="background-image: url('imagens/bg2.jpg'); background-repeat: no-repeat;  background-position: center center; width: 100%;height: 1000px;">
            <!-- Mask & flexbox options-->
            <div class="mask rgba-black-light align-items-center">
              <!-- Content -->
              <div class="container">
                <!--Grid row-->
                <div class="row">
                  <!--Grid column-->
                  <div class="col-md-12 mb-4 white-text text-center">
                    <h1 class="h1-reponsive white-text text-uppercase font-weight-bold mb-0 pt-md-5 pt-5 wow fadeInDown titulo" data-wow-delay="0.3s"><strong>IFPE - Requerimentos Online</strong></h1>
<!--                     <hr class="hr-light my-4 wow fadeInDown" data-wow-delay="0.4s">
                    <h5 class="text-uppercase mb-4 white-text wow fadeInDown" data-wow-delay="0.4s"><strong>Photography & design</strong></h5>
                    <a class="btn btn-outline-white wow fadeInDown" data-wow-delay="0.4s">portfolio</a>
                    <a class="btn btn-outline-white wow fadeInDown" data-wow-delay="0.4s">About me</a> -->
                  </div>
                  <!--Grid column-->
                </div>
                <!--Grid row-->
              </div>
              <!-- Content -->
            </div>
            <!-- Mask & flexbox options-->
          </div>
          <!-- Full Page Intro -->
        </header>
        <!-- Main navigation -->
        <!--Main Layout-->
        <main>

          <div class="flex">
        <div class="text-center">
          <h2 class="card-title titleFuncionalidades">Vantagens</h2>
          <hr style="width:30%;height:4px; border:none; color:#78ad41; background-color:#78ad41; margin-top: 40px; margin-bottom: 0px;"/>
        </div>

      </div>
    <div class="d-flex justify-content-center bd-highlight mb-3">

    <div class="card bg-light mb-3" style="margin: 5%;height: 400px; width: 30%;">
  <div class="card-body">
    <h5 class="card-title">Facilidade</h5>
    <img src="imagens/facilidade.png" class="img-Divs-Home">
    <p class="card-text">Atravéz do e-REQ você consegue pedir seu requerimento de uma forma mais rápida e sem papel. Com nossa plataforma online você consegue ter mais praticidade na hora de pedir seu requerimento. Sem toda a chatisse de preencher papel e com muito mais facilidade.</p>
  </div>
</div>

<div class="card bg-light mb-3" style="margin: 5%;height: 400px;width: 30%; ">
  <div class="card-body">
    <h5 class="card-title">Status</h5>
    <img src="imagens/feedback.png" class="img-Divs-Home">
    <p class="card-text">Fica fácil acompanhar o status do seu requerimento na nossa tela de acompanhamento, nela você consegue verificar se ele foi aceito ou recusado, caso seja recusado poderá verificar a razão e refazer o requerimento caso necessário.</p>
  </div>
</div><div class="card bg-light mb-3" style="margin: 5%;height: 400px;width: 30%; ">
  <div class="card-body">
    <h5 class="card-title">Sem papel</h5>
    <img src="imagens/papel.png" class="img-Divs-Home">
    <p class="card-text">Além de toda a praticidade e funcionalidade ainda estará contribuindo para o meio ambiente, pois nossa plataforma diminuirá o consumo de papel já que toda o processo é feito online.</p>
  </div>
</div>
  </div>
</div>
          </div> 
              <!--Grid column-->

        </main>
        <!--Main Layout-->

    </body>
</html>