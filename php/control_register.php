<?php
$host = 'localhost';
$usuarioHost = 'root';
$claveHost = '';
$bd = 'dogapp';

$conexion = mysqli_connect($host, $usuarioHost, $claveHost, $bd);
if (!$conexion) {
?>
    <p class="error">Fallo al intentar conectarse con la base de datos </p>
<?php
}
$usuario = $_POST['username'];
$nombre = $_POST['name'];
$clave = $_POST['password'];
if ($usuario === '' || $clave === '' || $nombre ==='') {
?>
    <p class="error">Faltan completar campos </p>

    <?php
} else {
    if(!filter_var($usuario,FILTER_VALIDATE_EMAIL)){ //Vaidacion de email
        ?>
    <p class="error">Formato de correo no válido</p>

    <?php
    }else{
        if(strlen($clave) < 6){
            ?>
            <p class="error">Contraseña debe tener como minimo 6 caracteres</p>
        
            <?php
        }else{
            $queryValidator = "SELECT count(users) as contar FROM LOGIN WHERE users ='$usuario'";
            $resultadoValidator = mysqli_query($conexion, $queryValidator);
            $row = mysqli_fetch_array($resultadoValidator);
            if($row["contar"] != 0){
                ?>
                <p class="error">Usuario <?php echo $usuario ?> ya existe</p>
    
            <?php
            }else{
                $usuario=strtolower($usuario);
                 $queryRegister = "INSERT INTO login (nombre,users,password,rol) VALUES('$nombre','$usuario','$clave','user')";
                if (mysqli_query($conexion, $queryRegister)) {
                ?>
                    <script>
                        alert('Creado exitosamente')
                        location.href = '../screens/login.php'
                    </script>
                <?php
                // header("location: ../screens/login.php");
                } 
                else {
                     ?>
                         <p class="error">Error al ejecutar operación </p>
                    <?php
                    }
                 }
            
             }
         }
    }
mysqli_close($conexion);
