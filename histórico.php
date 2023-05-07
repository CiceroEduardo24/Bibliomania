<?php require_once"play.php";?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>usuario</title>
	<link rel="stylesheet" type="text/css" href="telausu.css">
</head>
<body>
	<?php 
		require_once "conectar.php";
		if($_SESSION){
		if ($_SESSION['usuario']){

		}

	}
	else{?>

<script type="text/javascript">
	window.alert("Você não tem acesso!");
	window.location.href="index.php";
</script>
	<?php

	}
?>
		
<div class="d1">
	<form method="POST" action="histórico.php" enctype="multipart/form-data">
     <input type="text" name="texto" style="position: absolute;top: 25%; right: 15%; height: 25px;width: 290px ;border-top-left-radius: 10px; border-bottom-left-radius: 10px;">
     <input type="image" src="imagens/pesquisar.png" height="25px" width="25px" style="position: absolute;top: 30%;right: 15.15%;">
     </form>
     <a href="telausu.php" class="aaa">
	<img src="imagens/iconeli.png" class="imgli">
	<h1 class="h1">Bibliomania</h1>
</a>
</div>
<div class="fundo">

<?php 
if ($_POST) {
require_once "conectar.php";
require_once "selectidusu.php";
$txt = $_POST['texto'];
$s = "SELECT * FROM livros,histórico,categotias WHERE histórico.id_li=livros.id_li AND categorias.id_categ=livros.id_categ AND id_cad=$id_usu AND livros.nome_liv LIKE'%$txt%';";
}
else {
require_once "selectidusu.php";
     $s="SELECT * FROM livros,histórico,categorias WHERE histórico.id_li=livros.id_li AND categorias.id_categ=livros.id_categ AND id_cad=$id_usu;";
}

$consulta = mysqli_query($conexao,$s);
if($_POST && mysqli_num_rows($consulta) == 0){?>
<div class="nada">
<p>
<?php echo 'Nenhum livro com o nome '.$txt.' foi encontrado no seu histórico.Clique aqui para '?><a href="histórico.php" class="aaa">voltar</a><?php; ?>
</p>
</div>
<?php
}
while ($l = mysqli_fetch_assoc($consulta)) {
?>
<a href="aprehisto.php?id_li=<?php echo $l['id_li']; ?>">
<div class="apre_li" >
<img src="<?php echo $l['img_li']; ?>" class="img_apre">
<h2 class="h22"><?php echo  $l['nome_liv']; ?></h2>
<p class="p22" ><?php echo $l['id_li']; ?></p>
<p class="p222"><?php echo $l['nome_categ']; ?></p>
<p class="p23"><?php
require_once "play.php";
$_GET['id_li']=$l['id_li'];?>
<?php
var_dump($_GET);?>
</p>
</div>
</a>
<?php } ?>
</div>
</body>
</html>