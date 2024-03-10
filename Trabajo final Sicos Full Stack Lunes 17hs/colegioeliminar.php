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

$registros = mysqli_query($conexion,"select dni from turnos where dni = '$_REQUEST[dni]'")
or die("Problemas en el select:".mysqli_error($conexion));

if($reg = mysqli_fetch_array($registros)) {


mysqli_query($conexion,"delete from turnos where dni = '$_REQUEST[dni]'") or
die("Problemas encontrados: ".mysqli_error($conexion));

echo "El DNI ".$_REQUEST['dni']." Fue dado de baja exitosamente";

} else {
echo "No existe una persona con ese DNI";
}
mysqli_close($conexion);
?>

<a class ="volver" href="colegio.html"> Volver al formulario </a>

</body>
</html>
