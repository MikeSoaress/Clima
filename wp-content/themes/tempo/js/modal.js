function exibeModalSimples(mensagem)
{
    document.getElementById('msgModalSimples').innerText = mensagem;    
    var modal = new bootstrap.Modal(document.getElementById('modalSimples'));
    modal.show();
}

function exibeModalRedirecionamento(mensagem, url)
{
    document.getElementById('msgModalRedirecionamento').innerText = mensagem; 
    document.getElementById('redirecionador_modal').setAttribute('href', url);  
    var modal = new bootstrap.Modal(document.getElementById('modalRedirecionamento'));
    modal.show();
}