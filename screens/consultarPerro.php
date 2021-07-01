<?php
session_start();
$usuario = $_SESSION['usuario'];
if (!isset($usuario)) {
    header("location: ../screens/login.php");
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
    <link rel="stylesheet" href="../css/consultar.css">
    <title>Consultar Perro</title>
</head>

<body>
    <header class="header">
        <nav class="nav">
            <div class="cont-info">
                <h1>Consultar Perro</h1>
                <p class='cont-info__p'>bienvenido <?php echo $usuario ?></p>
            </div>
            <ul>
                <li><a href="/dogApp/screens/registrarPerro.php">Ir a Registros</a></li>
                <li><a href="/dogApp/php/control_logout.php">Cerrar Sesión</a></li>
            </ul>
        </nav>
    </header>
    <main class="main">
        <div class="cont_form">
            <h1>Registro Local Canino</h1>
            <h2>Consulta de Paciente perruno</h2>
            <form action="<?php
                            echo htmlspecialchars($_SERVER['PHP_SELF']);
                            ?>" method="post">
                <div class="cont-input">
                    <input type="text" class="" name="Nombre" placeholder="Nombre del perrito...">
                </div>
                <div class="cont-input-button">
                    <input type="submit" value="Consultar" name="submit" class="">
                </div>
            </form>
        </div>
        <?php
        if (isset($_POST['submit'])) {
            include('../php/control_consultarPerro.php');
        }
        ?>

    </main>
</body>

</html>