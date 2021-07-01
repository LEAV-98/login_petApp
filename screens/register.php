<?php
session_start();
if (isset($_SESSION['usuario'])) {
    header("location: ../screens/registrarPerro.php");
    // header("location: ../screens/login.php");
    //Validar cuando rol sea admin o user
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/login.css">

    <title>Register</title>
</head>

<body>
    <main class="main">

        <div class="cont_main">
            <form method="post" action="<?php
                                        echo htmlspecialchars($_SERVER['PHP_SELF']);
                                        ?>">
                <h1 class='titulo_form'>Registrarse</h1>
                <div class="cont-input"><input type="text" placeholder="Nombre" name="name"></div>
                <div class="cont-input"><input type="text" placeholder="Usuario" name="username"></div>
                <div class="cont-input"><input type="text" placeholder="Contraseña" name="password"></div>
                <div class="cont-input"><input type="submit" value="Registrarse" name="submit"></div>
            </form>
            <div class="enlaces">
                <!-- <a href="principalApp.php" class="enlace">Regresar</a> -->
                <a class="enlace" href="login.php">Ingresar</a>
            </div>


            <?php
            if (isset($_POST['submit'])) {
                include('../php/control_register.php');
            }
            ?>
        </div>

        <div class="cont_bg">
            <img src="../img/fondo_register.jpg" alt="">
        </div>
    </main>
</body>

</html>