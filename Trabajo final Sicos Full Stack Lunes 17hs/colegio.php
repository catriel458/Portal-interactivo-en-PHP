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


 
mysqli_query($conexion,"insert into turnos(nombre,apellido,dni,telefono,distrito,fecha,horario,tramite,profesion,observacion) values('$_REQUEST[nombre]','$_REQUEST[apellido]','$_REQUEST[dni]','$_REQUEST[telefono]','$_REQUEST[distritos]' ,'$_REQUEST[fecha]','$_REQUEST[horario]','$_REQUEST[tramite]','$_REQUEST[profesion]','$_REQUEST[obs]')") or
die("Problemas encontrados: ".mysqli_error($conexion));

echo "El Sr/a ".$_REQUEST['nombre']." ".$_REQUEST['apellido']." con DNI: ".$_REQUEST['dni']." fue registrado/a exitosamente";


?>

<a class ="volver" href="colegio.html"> Volver al formulario </a>

</body>
</html>