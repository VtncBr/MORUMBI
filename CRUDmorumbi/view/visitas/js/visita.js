const baseUrl = document.getElementById('hddBaseUrl').value;

const inputNome = document.getElementById('txtNome');
const inputCpf = document.getElementById('txtCpf');
const inputData = document.getElementById('txtData');
const inputIdolo = document.getElementById('selIdolo');
const inputVisita = document.getElementById('selVisita');

const divErros = document.getElementById('divMsgErro');

// Estrutura FormData para enviar os parâmetros no corpo da requisição do tipo POST

function inserirVisitante() {
   
    var dados = new FormData();
    dados.append("nomeVisitante", inputNome.value);
    dados.append("cpf", inputCpf.value);
    dados.append("dataVisita", inputData.value);
    dados.append("idolo", inputIdolo.value);
    dados.append("tipoVisita", inputVisita.value); 

    var xhttp = new XMLHttpRequest();

    var url = baseUrl + "/api/inserir_visitante.php";

    xhttp.open("POST", url);
    xhttp.onload = function () {
        var resposta = xhttp.responseText;

        if (resposta) {
            divErros.innerHTML = resposta;
            divErros.style.display = "block";
        } else {
            // Redirecionar para a listagem
            window.location = "listar.php";
        }
    };
    xhttp.send(dados);
}

