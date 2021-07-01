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

$nombre_consulta = $_REQUEST['Nombre'];
if ($nombre_consulta === '') {
?>
    <p class="error">Ingrese un nombre valido</p>
    <?php

} else {
    $sql = "select * from perro where nombre like '%" . $nombre_consulta . "%'";
    $result = mysqli_query($conexion, $sql);
    $num_resultados = mysqli_num_rows($result);


    if ($num_resultados === 0) {
    ?>
        <p class="nulo">No hay un perro que se llama <?php echo $nombre_consulta ?></p>
    <?php
    } else {
    ?>

        <p class="exito">Numero de perros encontrados: <?php echo $num_resultados ?> </p>
        <div class="resultados">
            <?php
            for ($i = 0; $i < $num_resultados; $i++) {
                $row = mysqli_fetch_array($result);
                $imagen = '/dogApp/screens/archivos/' . $row['foto'];
            ?>

                <div class="cont-resultado">
                    <div class="cont-img">
                        <img src="<?php echo $imagen ?>" alt="">
                    </div>
                    <div class="cont-texto">
                        <p>Nombre: <?php echo $row["nombre"] ?></p>
                        <p>Código: <?php echo $row["codigo"] ?></p>
                        <p>Raza: <?php echo $row["raza"] ?></p>
                        <p>Género: <?php echo $row["genero"] ?></p>
                        <p>Fecha de Nacimiento: <?php echo $row["fechaNac"] ?></p>
                    </div>
                </div>

    <?php

            }
        }
    }
    mysqli_close($conexion);
    ?>
        </div>