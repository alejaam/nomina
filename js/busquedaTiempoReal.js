function calcularNomina(idEmp,tipoNomina,nombre,rfc,nss,sueldoBase,fechaIngreso){
    opener.document.crearNomina.idEmpleado.value = idEmp;
    var sueldo = sueldoBase;
    var sueldoDiario = 0;
    
    if(tipoNomina == 'Q'){
        opener.document.crearNomina.tipoNomina.value = 'Quincenal';
        
        sueldoBase = sueldoBase/2;
        opener.document.crearNomina.sueldoBase.value = sueldoBase;
        var salarioMinimo = 88.36;
        var factorValesDespensa = 0.40;
        var valesDespensa = (salarioMinimo * factorValesDespensa)*10;
        opener.document.crearNomina.valesDespensa.value = valesDespensa;
        
    }else{
        opener.document.crearNomina.tipoNomina.value = 'Semanal';
        sueldoBase = sueldoBase/4;
        opener.document.crearNomina.sueldoBase.value = sueldoBase;
        var salarioMinimo = 88.36;
        var factorValesDespensa = 0.40;
        var valesDespensa = (salarioMinimo * factorValesDespensa)*5;
        opener.document.crearNomina.valesDespensa.value = valesDespensa;
    }
    opener.document.crearNomina.nombre.value = nombre;
    opener.document.crearNomina.rfc.value = rfc;
    opener.document.crearNomina.nss.value = nss;
    
    var fondoAhorro = sueldoBase * 0.10;
    opener.document.crearNomina.fondoAhorro.value = fondoAhorro;
    opener.document.crearNomina.ayudaGasolina.value = 150;
    
    var bonoProductividad = 0;
    opener.document.crearNomina.bonoProductividad.value = bonoProductividad;
    var fecha = new Date();
    var aguinaldo = 0;
    var primaVacacional = 0;
    var diasAntiguedad = 0;
    var totalPercepciones = 0;
    sueldoDiario = sueldoBase/20;
    var añoIngreso = fechaIngreso.substr(0,4);
    var antiguedad = fecha.getFullYear() - añoIngreso;
    var isr = 0;
    opener.document.crearNomina.isr.value = isr;
    var prestamos = 0;
    opener.document.crearNomina.prestamos.value = prestamos;
    if(antiguedad>1){
        aguinaldo = (sueldoBase/20)*10;
        opener.document.crearNomina.aguinaldo.value = aguinaldo;
    }else{
        opener.document.crearNomina.aguinaldo.value = 0;
    }
    switch(antiguedad){
        case 0:
            diasAntiguedad = 0;
            break;
        case 1:
            diasAntiguedad = 6;
            break;
        case 2:
            diasAntiguedad = 8;
            break;
        case 3:
            diasAntiguedad = 10;
            break;
        case 4:
            diasAntiguedad = 12;
            break;
        case 5:
        case 6:
        case 7: 
        case 8:
        case 9:
            diasAntiguedad = 14;
            break;
        case 10:
        case 11:
        case 12: 
        case 13:
        case 14:
            diasAntiguedad = 16;
            break;
        case 15:
        case 16:
        case 17: 
        case 18:
        case 19:
            diasAntiguedad = 18;
            break;  
        case 20:
        case 21:
        case 22: 
        case 23:
        case 24:
            diasAntiguedad = 20;
            break;
    }
    primaVacacional = (sueldoDiario * diasAntiguedad)*0.25;
    opener.document.crearNomina.primaVacacional.value = primaVacacional;
    totalPercepciones = fondoAhorro + valesDespensa + 150 + primaVacacional + aguinaldo;
    opener.document.crearNomina.totalPercepcion.value = totalPercepciones;
    var factorsbc = (365 + primaVacacional + diasAntiguedad) / 365;
    var sbcIMSS = sueldoDiario * factorsbc;
    var infonavit = (sbcIMSS*20)*.06;
    opener.document.crearNomina.imss.value = sbcIMSS.toFixed(2);
    opener.document.crearNomina.infonavit.value = infonavit.toFixed(2);
    var totalDeducciones = infonavit + sbcIMSS;
    opener.document.crearNomina.totalDeduccion.value = totalDeducciones.toFixed(2);
    var totalNomina = totalPercepciones - totalDeducciones;
    opener.document.crearNomina.nominaNeto.value = totalNomina.toFixed(2);
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