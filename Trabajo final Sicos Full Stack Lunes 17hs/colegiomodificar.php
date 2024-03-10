<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar turno</title>
    <link rel="stylesheet" href="colegio2.css">
</head>
<body>

<?php 


$conexion = mysqli_connect("localhost","root","","colegio") or
die("Problemas con la conexiòn");

$registros = mysqli_query($conexion,"select * from turnos where dni = '$_REQUEST[dni]'")
or die("Problemas en el select:".mysqli_error($conexion));

if($reg = mysqli_fetch_array($registros)) {

?>

<form action="colegiomodificar2.php" method="post"> 

<label>Ingrese nueva fecha de turno </label>
<input type = "date" name = "fechanueva" value="<?php echo $reg['fecha']?>"><br>
<input type = "hidden" name = "fechavieja" value="<?php echo $reg['fecha']?>"><br>

<input class ="acciones" type = "submit" value="Modificar">

</form>

<?php

} else {
echo "No existe registro con ese DNI";
}

?>




</body>
</html>
