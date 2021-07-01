<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/dogApp/css/styles.css">
    <link rel="stylesheet" href="/dogApp/css/principal.css">
    <title>principalApp</title>
</head>

<body>
    <header class="header">
        <div class="cont-header">
            <h1>Aplicación para perritos</h1>
            <a href="/dogApp/screens/login.php">Login</a>
        </div>
    </header>
    <main>
        <h2 class="title">Numero total de perros: <?php

                                                    $host = 'localhost';
                                                    $usuarioHost = 'root';
                                                    $claveHost = '';
                                                    $bd = 'dogApp';

                                                    $conexion = mysqli_connect($host, $usuarioHost, $claveHost, $bd);
                                                    if (!$conexion) {
                                                    ?>
                <p class="error"> Fallo al intentar conectarse con la base de datos </p>
            <?php
                                                    }
                                                    $sqlConsulta = "SELECT count(*) as contar from perro ";
                                                    $result = mysqli_query($conexion, $sqlConsulta);
                                                    $num_resultados = mysqli_num_rows($result);
                                                    for ($i = 0; $i < $num_resultados; $i++) {
                                                        $row = mysqli_fetch_array($result);
                                                        echo $row['contar'];
                                                    }

            ?>
        </h2>

        <section class="tablas">
            <div class="chart-container">
                <canvas class="tabla1" id="myChart" width="400" height="400"></canvas>
            </div>
            <div class="chart-container">
                <canvas class="tabla1" id="myChart2" width="400" height="400"></canvas>
            </div>
        </section>

    </main>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.4.0/dist/chart.min.js"></script>
    <script>
        let ctx = document.getElementById('myChart').getContext('2d');
        let myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: [<?php
                            $host = 'localhost';
                            $usuarioHost = 'root';
                            $claveHost = '';
                            $bd = 'dogApp';

                            $conexion = mysqli_connect($host, $usuarioHost, $claveHost, $bd);
                            if (!$conexion) {
                            ?> < p class = "error" > Fallo al intentar conectarse con la base de datos < /p>
                    <?php
                            }
                            $sqlConsulta = "select raza,count(raza) as contar from perro group by raza";
                            $result = mysqli_query($conexion, $sqlConsulta);
                            $num_resultados = mysqli_num_rows($result);
                            for ($i = 0; $i < $num_resultados; $i++) {
                                $row = mysqli_fetch_array($result);
                                $raza = $row['raza'];
                                echo "'$raza'" . ',';
                            }


                    ?>
                ],
                datasets: [{
                    label: '# of Votes',
                    data: [
                        <?php
                        $host = 'localhost';
                        $usuarioHost = 'root';
                        $claveHost = '';
                        $bd = 'dogApp';

                        $conexion = mysqli_connect($host, $usuarioHost, $claveHost, $bd);
                        if (!$conexion) {
                        ?> < p class = "error" > Fallo al intentar conectarse con la base de datos < /p>
                        <?php
                        }
                        $sqlConsulta = "select raza,count(raza) as contar from perro group by raza";
                        $result = mysqli_query($conexion, $sqlConsulta);
                        $num_resultados = mysqli_num_rows($result);
                        for ($i = 0; $i < $num_resultados; $i++) {
                            $row = mysqli_fetch_array($result);
                            echo $row['contar'] . ',';
                        }


                        ?>
                    ],
                    backgroundColor: [
                        'rgba(221, 44, 205)',
                        'rgba(44, 181, 221)',
                        'rgba(255, 251, 0)',
                        'rgba(0, 255, 58)',
                        'rgba(0, 43, 255)',
                        'rgba(255, 0, 143)'
                    ],
                    borderColor: [
                        'rgba(221, 44, 205)',
                        'rgba(44, 181, 221)',
                        'rgba(255, 251, 0)',
                        'rgba(0, 255, 58)',
                        'rgba(0, 43, 255)',
                        'rgba(255, 0, 143)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,

            }
        });
    </script>
    <script>
        let ctx2 = document.getElementById('myChart2').getContext('2d');
        let myChart2 = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: ['Hembra', 'Macho'],
                datasets: [{
                    label: 'Género por perro',
                    data: [
                        <?php
                        $host = 'localhost';
                        $usuarioHost = 'root';
                        $claveHost = '';
                        $bd = 'dogApp';

                        $conexion = mysqli_connect($host, $usuarioHost, $claveHost, $bd);
                        if (!$conexion) {
                        ?> < p class = "error" > Fallo al intentar conectarse con la base de datos < /p>
                        <?php
                        }
                        $sqlConsulta = "SELECT count(genero) as contar,genero from perro group by genero";
                        $result = mysqli_query($conexion, $sqlConsulta);
                        $num_resultados = mysqli_num_rows($result);
                        for ($i = 0; $i < $num_resultados; $i++) {
                            $row = mysqli_fetch_array($result);
                            echo $row['contar'] . ',';
                        }


                        ?>
                    ],
                    backgroundColor: [
                        'rgba(239, 44, 3)',
                        'rgba(44, 57, 221)',
                    ],
                    borderColor: [
                        'rgba(239, 44, 3)',
                        'rgba(3, 20, 239)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,

            }
        });
    </script>
    </script>
</body>

</html>