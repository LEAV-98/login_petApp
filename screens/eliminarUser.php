<?php
$idDelete = $_GET['id'];
echo $idDelete;
$host = 'localhost';
$usuarioHost = 'root';
$claveHost = '';
$bd = 'dogApp';

$conexion = mysqli_connect($host, $usuarioHost, $claveHost, $bd);
if (!$conexion) {
?>
    <p class="">Fallo al intentar conectarse con la base de datos </p>
<?php
}
$sqlDelete = "DELETE FROM login where id = '$idDelete'";
if (mysqli_query($conexion, $sqlDelete)) {
?>
    <script>
        alert('Eliminado correctamente')
        location.href = 'panelAdmin.php'
    </script>
<?php
} else {
?>
    <script>
        alert('Falla al querer eliminar')
        location.href = 'panelAdmin.php'
    </script>
<?php
}
mysqli_close($conexion);
