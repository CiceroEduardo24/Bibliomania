<?php
     require_once "play.php";
     ?>
     <?php ob_start();?>
     <!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Título da página</title>
    <meta charset="utf-8">
  </head>
  <body style="background-color: #0398fc;">
      <?php
      require_once "selectidusu.php";
     require_once "conectar.php";
     $select="DELETE FROM comentarios WHERE id_cad=$id_usu;";
     $selec="DELETE FROM histórico WHERE id_cad=$id_usu;";
     $sele="DELETE FROM pedidos WHERE id_cad=$id_usu;";
     $sel="DELETE FROM usuario WHERE id_cad=$id_usu;";
     mysqli_query($conexao,$select);
     mysqli_query($conexao,$selec);
     mysqli_query($conexao,$sele);
     mysqli_query($conexao,$sel);
     
?>
<script type="text/javascript">
	window.alert("Conta apagada com sucesso!");
	window.location.href="index.php";
</script>

  </body>
</html>
<?php
    ob_end_flush();  ?>