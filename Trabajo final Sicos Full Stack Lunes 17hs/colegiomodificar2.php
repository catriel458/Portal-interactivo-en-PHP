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

mysqli_query($conexion,"update turnos set fecha ='$_REQUEST[fechanueva]' where fecha = '$_REQUEST[fechavieja]'") or 
die("Problemas en el select:".mysqli_error($conexion));
echo "La fecha fue modificada con exito";

?>

<a class ="volver" href="colegio.html"> Volver al formulario </a>

</body>
</html>