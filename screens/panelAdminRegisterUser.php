<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/admin.css">
    <title>AgregarUsuarioAdmin</title>
</head>

<body>
    <header class="header">
        <h1>Panel de administracion</h1>
        <a href="panelAdmin.php">Volver</a>
    </header>
    <main>
        <div class="cont-form">
            <h2>Agregando un nuevo usuario</h2>
            <form method="post" class="form" action="<?php
                                                        echo htmlspecialchars($_SERVER['PHP_SELF']);
                                                        ?>">
                <div><input type="text" placeholder="Nombre" name='name'></div>
                <div><input type="text" placeholder="Usuario" name='username'></div>
                <div><input type="text" placeholder="Contraseña" name='password'></div>
                <div class="cont-input-select">
                    <select class="input-selected" name="rol" id="rol">
                        <option value="admin">Administrador</option>
                        <option value="user">Usuario</option>
                    </select>
                </div>
                <div><input type="submit" class='submitEdit' name="submit" value="Registrar"></div>
                <?php
                if (isset($_POST['submit'])) {
                    include('../php/control_adminRegistrer.php');
                }
                ?>
            </form>
        </div>

    </main>
</body>

</html>