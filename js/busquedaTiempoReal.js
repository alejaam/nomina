function calcularNomina(idEmp,tipoNomina,nombre,rfc,nss,sueldoBase){
    opener.document.crearNomina.idEmpleado.value = idEmp;
    if(tipoNomina == 'Q'){
        opener.document.crearNomina.tipoNomina.value = 'Quincenal';
        var salarioMinimo = 88.36;
        var factorValesDespensa = 0.40;
        var valesDespensa = (salarioMinimo * factorValesDespensa)*5;
        opener.document.crearNomina.valesDespensa.value = valesDespensa;

    }else{
        opener.document.crearNomina.tipoNomina.value = 'Semanal';
        var salarioMinimo = 88.36;
        var factorValesDespensa = 0.22;
        var valesDespensa = (salarioMinimo * factorValesDespensa)*5;
        opener.document.crearNomina.valesDespensa.value = valesDespensa;
    }
    opener.document.crearNomina.nombre.value = nombre;
    opener.document.crearNomina.rfc.value = rfc;
    opener.document.crearNomina.nss.value = nss;
    opener.document.crearNomina.sueldoBase.value = sueldoBase;
    
    
    var fondoAhorro = sueldoBase * 0.10;
    opener.document.crearNomina.fondoAhorro.value = fondoAhorro;
    opener.document.crearNomina.ayudaGasolina.value = 150;
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