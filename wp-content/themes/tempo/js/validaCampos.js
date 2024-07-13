function validarCampos(class_campos, id_alerta) {
    var campos = document.getElementsByClassName(class_campos);
    var camposValidos = true;
    var alerta = document.getElementById(id_alerta);

    for (var x = 0; x < campos.length; x++) {
        if (campos[x].value == "") {
            camposValidos = false;
            campos[x].classList.add("alerta");
        }

        else
            campos[x].classList.remove("alerta");
    }

    if (!camposValidos) {
        alerta.classList.remove("d-none")
        return false;
    }

    else {
        alerta.classList.add("d-none")
        return true;
    }

}