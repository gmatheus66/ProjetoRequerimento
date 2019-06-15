/* javascript do select */

document.getElementById("btnCarregar").onclick = function () {
    var Cadastro = document.getElementById("Cadastro");

    var opt0 = document.createElement("option");
    opt0.value = "0";
    opt0.text = "";
    Cadastro.add(opt0, Cadastro.options[0]);

    var opt1 = document.createElement("option");
    opt1.value = "al";
    opt1.text = "Aluno";
    Cadastro.add(opt1, Cadastro.options[1]);

    var opt2 = document.createElement("option");
    opt2.value = "ad,";
    opt2.text = "Administrador";
    Cadastro.add(opt2, Cadastro.options[2]);

};


document.getElementById("btnInfo").onclick = function () {
    var Cadastro = document.getElementById("Cadastro");
    console.log("O indice é: " + Cadastro.selectedIndex);
    console.log("O texto é: " + Cadastro.options[Cadastro.selectedIndex].text);
    console.log("A chave é: " + Cadastro.options[Cadastro.selectedIndex].value);
};
