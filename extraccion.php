<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Extraccion BD</title>
    <link rel="stylesheet" href="extraestilo.css">
</head>
<body>
    <h1>Informacion de los usuarios</h1>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Email</th>
        </tr>

<?php

$db_host = "localhost:3307";
$db_name = "form_bd";
$db_user = "root";
$db_pass = "";
 
$conexion = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
 
$usuarios = $_POST["nombre"];
 
$count_query = "SELECT count(*) as total FROM `usuarios` where `nombre`='$usuarios'";
$count_result = mysqli_query($conexion, $count_query);
$count_row = mysqli_fetch_assoc($count_result);
$total_usuarios = $count_row['total'];
 
$sql = "SELECT nombre, apellido, email FROM `usuarios` where nombre='$usuarios'";
$result = mysqli_query($conexion, $sql);
 
for ($i = 0; $i < $total_usuarios; $i++) {
    $row = mysqli_fetch_assoc($result);
    $nombre = $row["nombre"];
    $apellido = $row["apellido"];
    $email = $row["email"];
    echo "<tr>
            <td>$nombre</td>
            <td>$apellido</td>
            <td>$email</td>
          </tr>";
}
 
mysqli_close($conexion);

if (mysqli_connect_errno()) {
    echo "Fallo al conectar con la base de datos";
    exit();
}
?>
</table>
</body>
</html>