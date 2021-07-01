<?php

session_start();
$usuario = $_SESSION['usuario'];
if (!isset($usuario)) {
    header("location: ../screens/login.php");
}

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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/admin.css">
    <title>Panel de Administración</title>
</head>

<body>
    <header class="header">
        <div class="cont-title d-flex justify-content-center align-items-center">
            <h1>Panel de administracion</h1>
            <p class='ml-5 text-capitalize'>Bienvenido <?php echo $usuario ?></p>
        </div>
        <a href="../php/control_logout.php">Cerrar Sesión</a>
    </header>
    <main>
        <section class="container mt-3">
            <a href="panelAdminRegisterUser.php" class="btn btn-success mb-3">Agregar Nuevo</a>
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th class="id">Id</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Contraseña</th>
                        <th scope="col">Rol</th>
                        <th scope="col" class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $sql = "select * from login ";
                    $result = mysqli_query($conexion, $sql);
                    $num_resultados = mysqli_num_rows($result);
                    if ($num_resultados === 0) {
                    ?>
                        <p class="nulo">No hay usuarios</p>
                    <?php
                    } else {
                    ?>
                        <div>
                            <?php
                            for ($i = 0; $i < $num_resultados; $i++) {
                                $row = mysqli_fetch_array($result);
                            ?>


                                <tr>
                                    <td class="id"><?php echo $row["id"] ?></td>
                                    <td><?php echo $row["users"] ?></td>
                                    <td> <?php echo $row["password"] ?></td>
                                    <td> <?php

                                            if (trim($row['rol']) == 'admin') {
                                                echo 'Administrador';
                                            } else {
                                                echo 'Usuario';
                                            }


                                            ?></td>
                                    <td class="d-flex justify-content-around"><a href="editarUser.php?id=<?php echo $row['id'] ?>" class="btn btn-primary">Editar</a>
                                        <a href="eliminarUser.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">Eliminar</a>
                                    </td>
                                </tr>
                        </div>

                <?php

                            }
                        }

                        mysqli_close($conexion);
                ?>
                </tbody>
            </table>
        </section>
    </main>
</body>

</html>