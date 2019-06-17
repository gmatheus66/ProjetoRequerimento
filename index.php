<?php

include 'init.php';
$usuario = $_SESSION['usuario'];

?>
<html lang="en">
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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

            <!--Grid row-->

              <!--Grid column-->
<div class="d-flex justify-content-center bd-highlight mb-3">


    <div class="card bg-light mb-3" style="margin: 5%;height: 400px; width: 30%; ">
  <div class="card-body">
    <h5 class="card-title">Facilidade</h5>
    <img src="imagens/facilidade.svg" class="img-Divs-Home">
    <p class="card-text">Através do e-REQ você consegue bla bla Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
  </div>
</div><div class="card bg-light mb-3" style="margin: 5%;height: 400px;width: 30%; ">
  <div class="card-body">
    <h5 class="card-title">Status</h5>
    <img src="imagens/feedback.svg" class="img-Divs-Home">
    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
  </div>
</div><div class="card bg-light mb-3" style="margin: 5%;height: 400px;width: 30%; ">
  <div class="card-body">
    <h5 class="card-title">Sem papel</h5>
    <img src="imagens/papel.svg" class="img-Divs-Home">
    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
  </div>
</div>
  </div>
</div>
           
              <!--Grid column-->

        </main>
        <!--Main Layout-->

    </body>
</html>