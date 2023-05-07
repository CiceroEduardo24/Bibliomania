<?php 
require_once"play.php";
?>
<?php
 require_once"conectar.php";
$select="SELECT * FROM usuario WHERE nome_usu='".$_SESSION['usuario']."';";
$consulta=mysqli_query($conexao,$select);
$abc=mysqli_fetch_assoc($consulta);
$id_usu=$abc['id_cad'];  
?>