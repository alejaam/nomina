function datosEmpleado(idEmp,nombre,rfc,nss){
    opener.document.crearNomina.idEmpleado.value = idEmp;
    opener.document.crearNomina.nombre.value = nombre;
    opener.document.crearNomina.rfc.value = rfc;
    opener.document.crearNomina.nss.value = nss;
    window.close();
};

function busquedaTiempoReal(){
    var texto = document.getElementById("buscarEmpleado").value;

    var parametros = {
        "texto" : texto
    };

    $.ajax({
        data: parametros,
        url: "ajax/valida.php",
        type: "POST",
        success: function(response){
            $("#datos").html(response);
        }
    });
}