<?php
require_once "play.php";
require_once"conectar.php";
ob_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Título da página</title>
    <meta charset="utf-8">
  </head>
  <body>
      <?php  
     $select="SELECT c_photo FROM usuario WHERE nome_usu='".$_SESSION['usuario']."';";
     $consulta=mysqli_query($conexao,$select);
     $abc=mysqli_fetch_assoc($consulta);
     $foto=$abc['c_photo'];
     $resultado = @unlink($foto);
?>
<script type="text/javascript">
	window.location.href="apagarcon.php";
</script>
  </body>
</html>
<?php
ob_end_flush();?>
    