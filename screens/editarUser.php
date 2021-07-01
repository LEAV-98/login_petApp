<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/admin.css">
    <title>Editar Usuario</title>
</head>

<body>
    <header class="header">
        <h1>Panel de administracion</h1>
        <a href="panelAdmin.php">Volver</a>
    </header>
    <main>
        <section>
            <?php
            $id = $_GET['id'];
            // echo $id;
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
            $sql = "SELECT * from login where id='$id'";
            $result = mysqli_query($conexion, $sql);
            $num_resultados = mysqli_num_rows($result);

            for ($i = 0; $i < $num_resultados; $i++) {
                $row = mysqli_fetch_array($result);
            ?>
                <div class='cont-form'>
                    <h2 class='text-center'>Editando <?php echo $row['users'] ?></h2>
                    <form class='form'>
                        <div><input type="text" placeholder="id" style="display: none;" name='id' value="<?php echo $row['id'] ?>"></div>
                        <div><input type="text" placeholder="usuario" name='username' value="<?php echo $row['users'] ?>"></div>
                        <div><input type="text" placeholder="contraseña" name='password' value="<?php echo $row['password'] ?>"></div>
                        <div class="cont-input-select">
                            <select class="" name="rol" id="rol">
                                <option value=" admin" <?php
                                                        if ($row['rol'] == 'user') {
                                                            echo "selected";
                                                        }
                                                        ?>>Administrador</option>
                                <option value='user' <?php
                                                        if ($row['rol'] == 'user') {
                                                            echo "selected";
                                                        }
                                                        ?>>Usuario</option>
                            </select>
                        </div>
                        <div><input type="submit" class='submitEdit' name="submit" value="Actualizar"></div>
                        <?php
                        if (isset($_GET['submit'])) {
                            $id = $_GET['id'];
                            $userEdit = $_GET['username'];
                            $passwordEdit = $_GET['password'];
                            $rolEdit = $_GET['rol'];
                            // echo  $row['users'];
                            // echo $userEdit . $passwordEdit . $rolEdit . $id;
                            if ($userEdit == '' || $passwordEdit == '' || $rolEdit == '') {
                        ?>
                                <p class="error">Campos vacíos</p>
                                <?php
                            } else {
                                if ($row['users'] == $userEdit) {
                                ?>
                                    <p class="error">Mismo nombre de usuario</p>
                                    <?php
                                } else {
                                    if ($row['password'] == $passwordEdit) {
                                    ?>
                                        <p class="error">Misma contraseña</p>
                                        <?php
                                    } else {
                                        $sqlEdit = "UPDATE login set users='$userEdit',password='$passwordEdit',rol='$rolEdit' WHERE id=$id";
                                        // echo $sqlEdit;
                                        if (mysqli_query($conexion, $sqlEdit)) {
                                        ?>
                                            <p class="success">Actualizado correctamente</p>
                                        <?php
                                        } else {
                                        ?>
                                            <p class="error">La actualizacion ha fallado</p>
                        <?php
                                        }
                                    }
                                }
                            }
                        }




                        mysqli_close($conexion);

                        ?>
                    </form>
                </div>
            <?php
            }
            // mysqli_close($conexion);

            ?>
        </section>
    </main>
</body>

</html>