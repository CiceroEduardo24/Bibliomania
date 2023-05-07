<?php 
     ob_start();
     require_once "play.php";
     $select="SELECT c_photo FROM usuario WHERE nome_usu='".$_SESSION['usuario']."';";
     $consulta=mysqli_query($conexao,$select);
     $abc=mysqli_fetch_assoc($consulta);
     $foto=$abc['c_photo'];
     echo $foto;
     ob_end_flush();
   ?>