<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Sistema de nómina</title>
    <link rel="stylesheet" type="text/css" media="screen" href="estilos/main.css" />
    <link href="https://fonts.googleapis.com/css?family=Alfa+Slab+One|Open+Sans|Roboto" rel="stylesheet">  
    <script src="main.js"></script>
    <meta name="viewport" content="width=device-width, user-scalable=no initial-scale=1.0, maximium-scale=1.0, minimum-scale=1.0">
    <script languaje="JavaScript">
        function abrir_popup(URL){

            window.open(URL,"ventana1","width=600, height=450, directories=no ,scrollbars=no, menubar=no, location=no, resizable=no")

        }
</script>
</head>
<header>
        <h1>Nómina</h1>
        <div class="navbar">
            <a href="index.php">Inicio</a>
            <a href="nomina.php">Nomina</a>
            <a href="empleados.php">Empleados</a>
        </div>
</header>   
<body>
    
<h2 style="color: #39c973">Crear nueva Nomina: </h2>

<form name="crearNomina" action="<?=$_SERVER['PHP_SELF']?>" method="POST"> 
    <table>
        <tr>
            <td colspan="3"><b>DATOS DEL EMPLEADO:</td>
        </tr>
        <tr>
            <td>
                <?php
                    $datoempl="";
                    //$datoempl= $_GET[''];
                    echo('<label for="person3"> IdEmpleado </label> </td> <td> <input name="idEmpleado" id="idcliente" value="'.$datoempl.'" readonly="true"/>');
                ?>
                <a onclick="javascript:abrir_popup('popup_liclt.php')" href="www.google.com"><button style="padding-top: 7px;"><img height="20px" style="" src="imagenes/buscar.ico" alt="buscar"></button></a>
            </td>
        </tr>
        <tr>    
	        <td><label for='person3'>Nombre:</label> </td> <td> <input id='nombre' value=''/></td>
	        <td><label for='person3'>RFC:</label> </td> <td>  <input id='rfc' value=''/></td>
        </tr>
        <tr>
            <td></td><td></td>
	        <td><label for='person3'> NSS: </label> </td> <td>  <input id='nss' value=''/></td>
        </tr>
        <tr>
            <td><label>&nbsp</label></td>
        </tr>
        <tr>
            <td colspan="3"><b>DATOS DE LA NOMINA:</td>
        </tr>
        <tr>
            <td>
                <label for='person3'> Mes: </label> 
            </td>
            <td> 
                <select name="mes" SIZE="1"> 
                    <option value="Enero">Enero</option> 
                    <option value="Febrero">Febrero</option> 
                    <option value="Marzo">Marzo</option> 
                    <option value="Abril">Abril</option> 
                    <option value="Mayo">Mayo</option> 
                    <option value="Junio">Junio</option> 
                    <option value="Julio">Julio</option> 
                    <option value="Agosto">Agosto</option> 
                    <option value="Septiembre">Septiembre</option> 
                    <option value="Octubre">Octubre</option> 
                    <option value="Noviembre">Noviembre</option> 
                    <option value="Diciembre">Diciembre</option> 
                <select>  
            <td><label for='person3'> Año </label> </td> <td>  <input name='año' value='2018'/> </td>
            </td>
        </tr>
<tr><td> <label> &nbsp </label> </td></tr>
<tr><td colspan="3"><b>SALARIO CONTRATO: </b></td></tr>
<tr>
<td><label for='person3'> Horas Contrato: </label></td>
<td><input class="caption" name='hcontrato' value='39'/></td>
<td><label for='person3'> Salario Base:</label> </td>
<td><input name='scontrato' value='29.26552' /></td>
</tr>
<tr><td> <label> &nbsp </label> </td></tr>
 <tr><td colspan="3"><b>SALARIO EXTRA: </b></td></tr>
<tr><td>
<label for='person3'> Horas Extra:</label> </td> <td>  <input name='hextra' value='0'/><td>
<label for='person3'> Salario Hora Extra:</label> </td> <td>  <input name='sextra' value='6.35645'/></td>
</td></tr>
<tr><td> <label> &nbsp </label> </td></tr>
 <tr><td colspan="3"><b>DIETAS Y PLUSES: </b></td></tr>
<tr><td>
<label for='person3'> Horas Dietas:</label> </td> <td>  <input name='hdieta' value='0'/><td>
<label for='person3'> Salario Horas Dieta:</label> </td> <td>   <input name='sdieta' value='1.56'/></td>
</td></tr>
<tr><td>
<label for='person3'> Plus Transporte:</label> </td> <td>  <input name='plust' value='31.20'/>
</td></tr>
<tr><td> <label> &nbsp </label> </td></tr>
 <tr><td colspan="3"><b>FESTIVOS Y NOCTURNOS: </b></td></tr>
<tr><td>
<label for='person3'> Hora Festivo: </label> </td> <td>  <input name='hfest' value='0'/> <td>
<label for='person3'> Salario Hora Festivo </label> </td> <td>  <input name='sfest' value='7.87775'/></td>
</td></tr>
<tr><td>
<label for='person3'> Hora Nocturna: </label> </td> <td>  <input name='hnocturn' value='0'/><td>
<label for='person3'> Salario Hora Nocturna: </label> </td> <td>  <input name='snorcturn' value='8.87775'/></td>
</td></tr>
<tr><td> <label> &nbsp </label> </td></tr>
<tr><td colspan="3"><b>RETENCIONES Y DEDUCCIONES: </b></td></tr>
<tr><td>
<label for='person3'> IRPF %: </label> </td> <td>  <input name='irpf' value='10'/><td>
<label for='person3'> % por Desempleo: </label> </td> <td>  <input name='desempleoa' value='2'/></td>
</td>
</tr></table>
</body>
</html>