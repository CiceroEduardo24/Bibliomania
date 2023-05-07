<?php require_once "play.php";
     $select="SELECT Password FROM usuario WHERE nome_usu='".$_SESSION['usuario']."';";
     $consulta=mysqli_query($conexao,$select);
     $abc=mysqli_fetch_assoc($consulta);
     $pass=$abc['Password'];
     echo $pass;
   ?>