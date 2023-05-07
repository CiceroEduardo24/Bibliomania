<?php 
require_once"play.php";
?>
<?php 
ob_start();
?><!DOCTYPE html>
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
	$s = "SELECT * FROM livros WHERE id_li=$b;";
	$consulta = mysqli_query($conexao,$s);
	$l = mysqli_fetch_assoc($consulta);?>
		<h1 class="h1"><?php echo $l['nome_liv']; ?></h1>
		<img src="<?php echo $l['img_li']; ?>" class="img2">
		<a href="histórico.php"><input type="buton" name="voltar" value="Voltar" class="botões2"></a>
		<input type="buton" name="download" value="Download" class="botões2">
	</div>
	<div class="d4">
		<h1 class="h1">Informações</h1>
		<p class="p2"><b>Autor ou Coleção:</b><?php echo $l['autor'].'.';?><br>
		<b>Edição:</b><?php echo $l['edição'].'.';?><br>
		<b>Gênero:</b> <?php echo $l['gênero'].'.';?><br>
		<b>Descrição:</b><br>
		<?php echo $l['descrição'].'.';?></p>

	</div>
	<div class="coment">
		<h2>Comentarios:</h2>
		<hr class="hr">
	<img src="imagens\luffy.png" class="imgcom">
	<h3 class="h3">Administrador</h3><h6 class="h6">-23/12/21-</h6>
	<p class="p1">
	

    Muito massa, simplesmente adorei!!</p>
 <hr class="hr">

	</div>

	</div>
    <div class="d2">
    <img src="imagens\leitura.png" class="img">
  </div>
</body>
</html>
<?php 
ob_end_flush();
?>