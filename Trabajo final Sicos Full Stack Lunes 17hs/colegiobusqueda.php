<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar turno</title>
    <link rel="stylesheet" href="colegio2.css">
</head>
<body>

<?php 


$conexion = mysqli_connect("localhost","root","","colegio") or
die("Problemas con la conexiòn");

$registros = mysqli_query($conexion,"select nombre,apellido,dni,telefono,fecha,horario from turnos where dni = '$_REQUEST[dni]'")
or die("Problemas en el select:".mysqli_error($conexion));

if($reg = mysqli_fetch_array($registros)) {

if($reg['horario'] == 'h1') {
$ho = '10:00';
}

elseif($reg['horario'] == 'h2') {
    $ho = '10:30';
    }

elseif($reg['horario'] == 'h3') {
    $ho = '11:00';
    }
elseif($reg['horario'] == 'h4') {
    $ho = '11:30';
    }

elseif($reg['horario'] == 'h5') {
    $ho = '12:00';
    }      

elseif($reg['horario'] == 'h6') {
    $ho = '12:30';
    }     
        
echo "La persona ".$reg['nombre']." ".$reg['apellido']." con DNI: ".$reg['dni']."<br>";
echo "Tiene turno: ".$reg['fecha']." a las ".$ho;

} else {
echo "No existe una persona con ese DNI";
}
mysqli_close($conexion);

?>

<a class ="volver" href="colegio.html"> Volver al formulario </a>

</body>
</html>