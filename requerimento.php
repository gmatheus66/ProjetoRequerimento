<?php $topico = $_POST['topico'] ?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/requerimento.css">
  <title>Requerimento</title>
</head>
<body>
  <div class="fieldset">
    <form method="POST" onclick="menu()">
      <fieldset class="topico">
        <legend>Tópico</legend>
        <select id="test" name="topico" class="slectTop">
          <option value="Matricula">Matricula</option>
          <option value="Curso">Curso</option>
          <option value="Outros">Outros</option>
        </select>
      </fieldset>
    </form>
      <fieldset id="subtopico1" class="subtopico" style="display: none;">
        <legend>Subtópico</legend>
        <select class="slectTop">
          <option value="1">Ajuste de Matrícula</option>
          <option value="2">Cancelamento de Matrícula</option>
          <option value="3">Complementação de Matrícula</option>
          <option value="4">Declaração de Matrícula ou Matrícula Vínculo</option>
          <option value="5">Reabertura de Matrícula</option>
          <option value="6">Trancamento de MAtrícula</option>
        </select>
      </fieldset>
      <fieldset id="subtopico2" class="subtopico" style="display: none;">
        <legend>Subtópico</legend>
        <select class="slectTop">
          <option value="1">Cancelamento de Disciplina</option>
          <option value="2">Dispensa da prática de Educação Física</option>
          <option value="3">Decalração Tramitação de Diploma</option>
          <option value="4">Histórico Escolar</option>
          <option value="5">Isenção de disciplinas cursadas</option>
          <option value="6">Matriz curricular</option>
        </select>
      </fieldset>
      <fieldset id="subtopico3" class="subtopico" style="display: none;">
        <legend>Subtópico</legend>
        <select class="slectTop">
          <option value="1">Admissão por Transferência e Análise Curricular</option>
          <option value="2">Autorização para cursar disciplinas em outras Instituições de Ensino Superior</option>
          <option value="3">Certifica de Conclusão</option>
          <option value="4">Certidão - Autenticidade</option>
          <option value="5">Cópia Xerox de Documento</option>
          <option value="6">Declaração de Colação de grau e Tramitação de Diploma</option>
          <option value="7">Declaração de Monitoria</option>
          <option value="8">Declaraço de Estágio</option>
          <option value="9">Ementa de displina</option>
          <option value="10">Guia de trsnferência</option>
          <option value="11">Justificativa de Falta(s) ou Prova 2° chamada</option>
          <option value="12">Reintegração</option>
          <option value="13">Reintegração para Cursar</option>
          <option>Solicitação de Conselho de Classe</option>
        </select>
      </fieldset>
      <fieldset class="motivo">
        <legend>Motivo</legend>
        <textarea name="motivo" placeholder="Motivo" class="obs" rows="6" cols="50"></textarea>
      </fieldset>
    <fieldset class="obs">
      <legend>Observação</legend>
      <!-- <input type="text" name="obs" placeholder="Observações" class="obs"> -->
      <textarea name="obs" placeholder="Observações" class="obs" rows="6" cols="50"></textarea>
    </fieldset>
  </div>
  <script type="text/javascript">
    function menu(){
      var item = document.getElementById('test').value;
      if (item == "Matricula") {
        document.getElementById('subtopico1').style.display = "block";
        document.getElementById('subtopico2').style.display = "none";
        document.getElementById('subtopico3').style.display = "none";
      }else if (item == "Curso") {
        document.getElementById('subtopico2').style.display = "block";
        document.getElementById('subtopico1').style.display = "none";
        document.getElementById('subtopico3').style.display = "none";
      }else if (item == "Outros") {
        document.getElementById('subtopico3').style.display = "block";
        document.getElementById('subtopico2').style.display = "none";
        document.getElementById('subtopico1').style.display = "none";
      }
    }
  </script>
</body>
</html>