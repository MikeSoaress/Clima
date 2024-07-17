function exibeModalSimples(mensagem) {
    // Define a mensagem do modal
    document.getElementById('msgModalSimples').innerHTML = mensagem;
    
    // Exibe o modal Bootstrap
    var modalElement = document.getElementById('modalSimples');
    var modal = new bootstrap.Modal(modalElement);
    modal.show();
}

function exibeModalRedirecionamento(mensagem, url)
{
    // Define a mensagem do modal
    document.getElementById('msgModalRedirecionamento').innerText = mensagem; 

    // Define url de destino
    var btn_redirecionamento = document.getElementById('redirecionador_modal');  
    btn_redirecionamento.setAttribute('href', url);

    // Exibe o modal Bootstrap
    var modalElement = document.getElementById('modalRedirecionamento');
    var modal = new bootstrap.Modal(modalElement);
    modal.show();
}