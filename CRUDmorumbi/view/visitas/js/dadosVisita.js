function buscarDadosVisita(idVisita) {    
    //AJAX

    var url = 'http://localhost/CRUDmorumbi/api/buscarVisita.php?idVisita=' + idVisita;
    var dados = document.querySelector('#divDadosVisita');

    dados.innerHTML = '';


    var dado = document.createElement('td');

    dados.appendChild(dado);
    
    var xhttp = new XMLHttpRequest();
    xhttp.open('GET', url, true);

    xhttp.onload = function() {
        //Executado após a resposta do servidor
        var retornoTexto = xhttp.responseText;

        console.log(retornoTexto);
        var visita = JSON.parse(retornoTexto);
        
        dado.innerHTML = "Nome do visitante: " + visita.nomeVisitante +
                "<br>CPF: " + visita.cpf +
                "<br>Data da Visita: " + visita.dataVisita+
                // Adicione outros campos conforme necessário
                "<br>Idolo: " + visita.idolos.nomeIdolo;
                "<br>Tipo da visita" + visita.tipoVisita.descVisita;

                
        //console.log(retornoTexto);
    }
    xhttp.send();
    

}