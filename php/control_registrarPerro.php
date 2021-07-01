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
$dni = $_REQUEST['Dni'];
$nombre = $_REQUEST['Nombre'];
$fechaNac = $_REQUEST['FechNac'];
$raza = $_REQUEST['Raza'];
$genero = $_REQUEST['Genero'];
// $foto = $_REQUEST['Foto'];


$nombreArchivo = $_FILES['Foto']['name'];
$guardado = $_FILES['Foto']['tmp_name'];

if (!file_exists('archivos')) {
    mkdir('archivos', 0777, true);
    if (file_exists('archivos')) {
        if (move_uploaded_file($guardado, 'archivos/' . $nombreArchivo)) {
    ?>
            <p class="success">Archivo guardado con exito </p>
        <?php
        } else {
        ?>
            <p class="error">Archivo no se pudo guardar </p>
        <?php
        }
    }
} else {
    if (move_uploaded_file($guardado, 'archivos/' . $nombreArchivo)) {
        ?>
        <p class="success">Archivo guardado con exito </p>
    <?php
    } else {
    ?>
        <p class="error">Archivo no se pudo guardar </p>
    <?php
    }
}

if ($dni === '' || $nombre === '' || $fechaNac === '' || $raza === '' || $genero === '' || $nombreArchivo === '') {
    ?>
    <script>
        alert('Falta completar datos')
    </script>
    <?php
} else {
    $sql = "INSERT INTO perro values ('$dni','$nombre','$fechaNac','$genero','$raza','$nombreArchivo')";
    // echo $sql;

    if (mysqli_query($conexion, $sql)) {
    ?>
        <p class="success">Perro registrado correctamente </p>
    <?php
    } else {
    ?>
        <p class="error">Error al ejecutar operación </p>

<?php
    }
}

mysqli_close($conexion);
