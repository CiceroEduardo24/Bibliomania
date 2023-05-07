<?php 
require_once"play.php";
?>
<?php 
ob_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Apresentação</title>
	<link rel="stylesheet" type="text/css" href="apresentacao.css">
</head>
<body>
	<div class="d1">
	<div class="d3">
		<p class="p23">
	<?php
	if($_SESSION){
		if ($_SESSION['usuario']){
			?>
		   	<a href ="excluir.php"  class="b">Sair</a>
		    <?php

		}

	}
	else{?>

<script type="text/javascript">
	window.alert("Você não tem acesso!");
	window.location.href="index.php";
</script>
	<?php

	}
	
    var_dump($_GET['id_li']);
	$b=$_GET['id_li'];
	?>
	</p>
	<?php  
	require_once"conectar.php";
	require_once "selectidusu.php";
	$sele="SELECT * FROM histórico WHERE id_cad=$id_usu AND id_li=$b;";
	$adf = mysqli_query($conexao,$sele);
	if (mysqli_num_rows($adf) == 0) {
	$add="INSERT INTO histórico VALUES(0,$id_usu,$b)";
	$gfd=mysqli_query($conexao,$add);
	}
	$s = "SELECT * FROM livros,categorias WHERE categorias.id_categ=livros.id_categ AND id_li=$b;";
	$consulta = mysqli_query($conexao,$s);
	$l = mysqli_fetch_assoc($consulta);?>
		<h1 class="h1"><?php echo $l['nome_liv']; ?></h1>
		<img src="<?php echo $l['img_li']; ?>" class="img2">
		<a href="telausu.php"><input type="button" name="voltar" value="Voltar" class="botões2"></a>
		<a href="<?php echo $l['c_arquivo']; ?>" download><input type="button" name="voltar" value="Download" class="botões2"></a>
	</div>
	<div class="d4">
		<h1 class="h1">Informações</h1>
		<p><b>Título: </b><?php echo $l['nome_liv'].'.';?>
		<p class="p2"><b>Autor ou Coleção:</b><?php echo $l['autor'].'.';?><br>
		<b>Edição:</b><?php echo $l['edição'].'.';?><br>
		<b>Gênero:</b> <?php echo $l['nome_categ'].'.';?><br>
		<b>Descrição:</b><br>
		<?php echo $l['descrição'];?></p>

	</div>
	<div class="coment">
	<?php 
	require_once"conectar.php";
	$i=$_GET['id_li'];
	$sdf="SELECT * FROM comentarios,usuario WHERE usuario.id_cad=comentarios.id_cad AND id_li=$i;";
	$a=mysqli_query($conexao,$sdf); 
	while ($t=mysqli_fetch_assoc($a)) {
	?>

	<img src="<?php echo $t['c_photo']; ?>" class="imgcom">
	<h3 class="h3"><?php echo $t['nome_usu']; ?></h3>
	<h6 class="h6"><?php $date = new DateTime( $t['data'] );
                   echo $date-> format( 'd-m-Y' ); ?></h6>
	<p class="p1"><?php echo $t['comentario']; ?></p>
 <hr class="hr">
<?php } 
?>
 <div class="insert">
 	<form action="apresentacao.php?id_li=<?php echo $_GET['id_li']; ?>" method="POST">
      <textarea name="texto" style="position: absolute;top: 25%; right: 20%; height: 25px;width: 290px ;border-top-left-radius: 10px; border-bottom-left-radius: 10px;"></textarea>
     <input type="submit"  value="Enviar" class="envi">
 </form>
     <?php 
     if ($_POST) {
      $co=$_POST['texto'];
     require_once "conectar.php";
     $li=$_GET['id_li'];
     $d=date("y/m/d");
     $qq="INSERT INTO comentarios VALUES(0,'$d',$id_usu,$li,'$co');";
     $v=mysqli_query($conexao,$qq);
header('location:apresentacao.php?id_li='.$_GET['id_li']);
      }
      ?>
	</div>
</div>

	</div>
    <div class="d2">
    <img src="imagens\leitura.png" class="img">
  </div>
</body>
</html>
<?php ob_end_flush();
?>