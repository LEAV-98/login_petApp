<?php

$host = 'localhost';
$usuarioHost = 'root';
$claveHost = '';
$bd = 'dogApp';

$conexion = mysqli_connect($host, $usuarioHost, $claveHost, $bd);
if (!$conexion) {
?>
    <p class="error">Fallo al intentar conectarse con la base de datos </p>
<?php
}
$nombre = $_POST['name'];
$usuario = $_POST['username'];
$clave = $_POST['password'];
$rol = $_POST['rol'];
// echo $usuario . $clave . $rol;
if ($usuario === '' || $clave === ''|| $nombre==='') {

?>
    <p class="error">Faltan completar campos </p>

    <?php
} else {
    $queryValidator = "SELECT count(users) as contar FROM LOGIN WHERE users ='$usuario'";
    $resultadoValidator = mysqli_query($conexion, $queryValidator);
    $row = mysqli_fetch_array($resultadoValidator);
    // echo $row['contar'];
    if ($row["contar"] == 0) { //Valida que no haya dos usuarios llamados igual
        $queryRegister = "INSERT INTO login (nombre,users,password,rol)VALUES('$nombre','$usuario','$clave','$rol')";
        if (mysqli_query($conexion, $queryRegister)) {
            // header("location: ../screens/login.php");
    ?>
            <p class="success">Usuario <?php echo $usuario ?> agregado exitosamente </p>

        <?php
        } else {

        ?>
            <p class="error">Error al ejecutar operación </p>

        <?php
        }
    } else {
        ?>
        <p class="error">Ya existe un correo ingresado  <?php echo $usuario ?></p>
<?php
    }
}
mysqli_close($conexion);
