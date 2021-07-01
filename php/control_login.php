<?php
$host = 'localhost';
$usuarioHost = 'root';
$claveHost = '';
$bd = 'dogApp';

$conexion = mysqli_connect($host, $usuarioHost, $claveHost, $bd);
if (!$conexion) {
?>
    <p>Fallo al intentar conectarse con la base de datos </p>
<?php
}
// session_start();
$usuario = $_POST['username'];
$clave = $_POST['password'];
if ($usuario === '' || $clave === '') {
?>
    <p class='error'>Faltan completar campos </p>

    <?php
} else {
    // echo $usuario . ' y la contra ' . $clave;


    // $queryLogin = "SELECT COUNT(*) as contar FROM login where users='$usuario' and password ='$clave'";
    $usuario=strtolower($usuario);
    $queryLogin = "SELECT *, COUNT(users) as contar FROM `login` WHERE users ='$usuario' and password ='$clave'";
    $consulta = mysqli_query($conexion, $queryLogin);
    $array = mysqli_fetch_array($consulta);
    if ($array['contar'] != 0) {
        $_SESSION['usuario'] = $array['nombre'];

        // if ($array['rol'] == 'admin') {
        //     header("location: ../screens/panelAdmin.php");
        // } else {
        //     header("location: ../screens/registrarPerro.php");
        // }
        
        header("location: ../screens/registrarPerro.php");
        
    } else {
    ?>
        <p class='error'>Credenciales no válidas</p>

<?php
    }

    /*
    if ($array['contar'] > 0) {
        header("location: ../screens/registrarPerro.php");
    } else {
    ?>
        <p>Problemas al querer iniciar sesión</p>

<?php */
    //}
    mysqli_close($conexion);
}
