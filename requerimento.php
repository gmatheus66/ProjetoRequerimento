<?php
include 'init.php';
include  "phpBD/conect.php";
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/requerimento.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="js/jquery-3.4.0.min.js"></script>
  <title>Requerimento</title>
</head>
<body>

<header>
<?php include 'nav.php' ?>
<div class="view" style="background-image: url('imagens/bg2.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
</header>

  <div class="fieldset">
    <form method="POST" action="catch_requerimento.php" enctype="multipart/form-data">

        <fieldset class="topico" >
            <legend>Tópico:</legend>
            <select id="test" name="topico" class="slectTop form-control custom-select">
                <option selected>Escolha</option>
                <option id="matricula" value="Matricula">Matricula</option>
                <option id="curso" value="Curso">Curso</option>
                <option id="outros" value="Outros">Outros</option>
        </select>
      </fieldset>


        <div class="sub"></div>
        <fieldset id="subtopico123" class="subtopico" style="display: none;">
            <legend>Subtópico:</legend>
            <select id="select" class="slectTop form-control custom-select" name="subtopico">

            </select>
        </fieldset>



        <fieldset class="motivo">
          <legend>Motivo:</legend>
          <textarea name="motivo" placeholder="Motivo" class="obs form-control motivo mot1" id="exampleFormControlTextarea1" rows="6" cols="50" maxlength="180"></textarea>
        </fieldset>

        <fieldset class="obs obser">
          <legend>Observação:</legend>
          <textarea name="observacao" placeholder="Observações" class="obs form-control observacao obs1" id="exampleFormControlTextarea1" rows="6" cols="50" maxlength="180"></textarea>
        </fieldset>

        <fieldset class="anexo">
          <legend>Anexo:</legend>
          <input type="file" class="btn btn-outline-warning" name="anexo"/>
        </fieldset>

        <input type="submit" class="btn btn-outline-success btn-lg">
      </form>

  </div>
  <script type="text/javascript">

        let mot = $('.mot1');
        let obs = $('.obs1');

     mot.on('blur' , (evt)=>{
         console.log($(evt.target).serialize());
        if(mot.val().length > 0){
            mot.addClass('is-valid');

            console.log("mot " + mot.val().length);
        }
        else{
            mot.addClass('is-invalid');
            console.log("mot " + mot.val().length);
        }
    });

    obs.on('blur' , function(evt){
        if(mot.val().length > 0){
            obs.addClass('is-valid')
            console.log("obs " + obs.val().length);
        }
        else{
            obs.addClass('is-invalid');
            console.log("obs " + obs.val().length);
        }
    });

    $('#test').on('click', function(evt) {
        
        if ($(evt.target).val() == "Matricula"){
            $('#subtopico123').show(1000, function () {
                $('#select').find('option').remove().end();
                $('#select').append('<option value="Ajuste de Matrícula">Ajuste de Matrícula</option>');
                $('#select').append('<option value="Cancelamento de Matrícula">Cancelamento de Matrícula</option>');
                $('#select').append('<option value="Complementação de Matrícula">Complementação de Matrícula</option>');
                $('#select').append('<option value="Declaração de Matrícula ou Matrícula Vínculo">Declaração de Matrícula ou Matrícula Vínculo</option>');
                $('#select').append('<option value="Reabertura de Matrícula">Reabertura de Matrícula</option>');
                $('#select').append('<option value="Trancamento de Matrícula">Trancamento de Matrícula</option>');

            });


            //alert('foi foi');
        }
        if($(evt.target).val() == "Curso"){
            $('#subtopico123').show(1000, function () {
                $('#select').find('option').remove().end();
                $('#select').append('<option value="Cancelamento de Disciplina">Cancelamento de Disciplina</option>');
                $('#select').append('<option value="Dispensa da prática de Educação Física">Dispensa da prática de Educação Física</option>');
                $('#select').append(' <option value="Decalração Tramitação de Diploma">Decalração Tramitação de Diploma</option>');
                $('#select').append('<option value="Histórico Escolar">Histórico Escolar</option>');
                $('#select').append('<option value="Isenção de disciplinas cursadas">Isenção de disciplinas cursadas</option>');
                $('#select').append('<option value="Matriz curricular">Matriz curricular</option>');
            })
        }
        if ($(evt.target).val() == "Outros"){
            $('#subtopico123').show(1000, function () {
                $('#select').find('option').remove().end();
                $('#select').append('<option value="Admissão por Transferência e Análise Curricular"> Admissão por Transferência e Análise Curricular</option>');
                $('#select').append('<option value="Autorização para cursar disciplinas em outras Instituições de Ensino Superior">Autorização para cursar disciplinas em outras Instituições de Ensino Superior</option>\n');
                $('#select').append('<option value="Certifica de Conclusão">Certifica de Conclusão</option>');
                $('#select').append('<option value="Certidão - Autenticidade">Certidão - Autenticidade</option>');
                $('#select').append('<option value="Cópia Xerox de Documento">Cópia Xerox de Documento</option>');
                $('#select').append('<option value="Declaração de Colação de grau e Tramitação de Diploma">Declaração de Colação de grau e Tramitação de Diploma</option>');
                $('#select').append('<option value="Declaração de Monitoria">Declaração de Monitoria</option>');
                $('#select').append('<option value="Declaraço de Estágio">Declaraço de Estágio</option>');
                $('#select').append('<option value="Ementa de displina">Ementa de displina</option>');
                $('#select').append('<option value="Guia de trasnferência">Guia de transferência</option>');
                $('#select').append('<option value="Justificativa de Falta(s) ou Prova 2° chamada">Justificativa de Falta(s) ou Prova 2° chamada</option>');
                $('#select').append('<option value="Reintegração">Reintegração</option>');
                $('#select').append('<option value="Reintegração para Cursar">Reintegração para Cursar</option>');
                $('#select').append('<option value="Solicitação de Conselho de Classe">Solicitação de Conselho de Classe</option>');
            })
        }
        console.log($(evt.target).val());
        //console.log($('#matricula').val());
    });

  </script>


</body>
</html>
