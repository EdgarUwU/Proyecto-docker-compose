<?php
$usuario=$_POST['usuario'];

$contraseña=$_POST['contraseña'];

session_start();

$_SESSION['usuario']=$usuario;

$conexion=mysqli_connect("db","edgar","pass","escuela");

$consulta="SELECT*FROM login where usuario='$usuario' and contraseña='$contraseña'";

$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_num_rows($resultado);

if($filas){
  
    header("location:mostrar_estudiantes.php");
}else{
    ?>
    <?php
    include("index.html");

  ?>
  <h1 class="bad">ERROR AL INGRESAR</h1>
  <?php
}
mysqli_free_result($resultado);

mysqli_close($conexion);
