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
    <title>Registrar Perro</title>
</head>

<body>
    <header class="header">
        <nav class="nav">
            <div class="cont-info">
                <h1>Registrar Perro</h1>
                <p class='cont-info__p'>bienvenido <?php echo $usuario ?></p>
            </div>
            <ul>
                <li><a href="/dogApp/screens/consultarPerro.php">Ir a Consultas</a></li>
                <li><a href="/dogApp/php/control_logout.php">Cerrar Sesión</a></li>
            </ul>
        </nav>
    </header>
    <main class="main">
        <div class="cont-form">
            <h1 class="">Registro Local Canino</h1>
            <h2 class="">Formulario de Registro</h2>
            <form method="post" action="<?php
                                        echo htmlspecialchars($_SERVER['PHP_SELF']);
                                        ?>" enctype="multipart/form-data">
                <div class="cont-input">
                    <input class='' type="text" name="Dni" placeholder="Dni">
                </div>
                <div class="cont-input">
                    <input class='' type="text" name='Nombre' placeholder="Nombre">
                </div>
                <div class="cont-input">
                    <input class='' type="date" name='FechNac'>
                </div>
                <div class="cont-input-option">
                    <label for="macho">Macho</label>
                    <input type="radio" name="Genero" id="macho" checked value="macho">
                    <label for="hembra">Hembra</label>
                    <input type="radio" name="Genero" id="hembra" value="hembra">

                </div>
                <div class="cont-input-select">
                    <select class="" name="Raza" id="raza">
                        <option value="Pitbull">Pitbull</option>
                        <option value="Bulldog">Bulldog</option>
                        <option value="Shichu">Shichu</option>
                        <option value="Pequines">Pequines</option>
                        <option value="San Bernando">San Bernando</option>
                        <option value="Chihuahua">Chihuahua</option>
                    </select>
                </div>
                <div class="cont-input">
                    <input class='' type="file" name="Foto">
                </div>
                <div class="cont-input-button">
                    <input type="submit" name="submit" value="Registrar" class="">
                </div>
            </form>
            <?php
            if (isset($_POST['submit'])) {
                include('../php/control_registrarPerro.php');
            }
            ?>
        </div>

    </main>

</body>

</html>