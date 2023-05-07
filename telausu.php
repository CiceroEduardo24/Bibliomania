<?php 
require_once"play.php";
?>
<?php ob_start();?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>usuario</title>
	<link rel="stylesheet" type="text/css" href="telausu.css">
		<script type="text/javascript">
	startList = function() {
    if (document.all&&document.getElementById) {
    navRoot = document.getElementById("menuDropDown");
    for (i=0; i<navRoot.childNodes.length; i++) {
    node = navRoot.childNodes[i];
    if (node.nodeName=="LI") {
    node.onmouseover=function() {
    this.className+=" over";
      }
      node.onmouseout=function() {
      this.className=this.className.replace
      (" over", "");
       }
       }
      }
     }
    }</script>
</head>
<body>
	<?php 
		require_once "conectar.php";
		if ($_SESSION['usuario']=='administrador') {
		header('Location:telaadmin.php');
	}else{}
?>
<div class="d1">
	<form method="POST" action="telausu.php" enctype="multipart/form-data">
     <input type="text" name="texto" style="position: absolute;top: 25%; right: 10%; height: 25px;width: 290px ;border-top-left-radius: 10px; border-bottom-left-radius: 10px; border-color:#0398fc;">
     <input type="image" src="imagens/pesquisar.png" height="25px" width="25px" style="position: absolute;top: 30%;right: 10.5%;">
     </form>
	<img src="imagens/iconeli.png" class="imgli">
	<h1 class="h1">Bibliomania</h1>
</div>
<div class="fundo">
<?php
if ($_GET) { 
$a=$_GET['nome_categ'];
require_once "conectar.php";
$s="SELECT * FROM livros,categorias WHERE  categorias.id_categ=livros.id_categ AND categorias.nome_categ='".$a."';";
}else  {
if ($_POST) {
require_once "conectar.php";
$txt = $_POST['texto'];
$s = "SELECT * FROM livros, categorias WHERE categorias.id_categ=livros.id_categ AND nome_liv LIKE'%$txt%';";
}
else {
$s = "SELECT * FROM livros,categorias WHERE  categorias.id_categ=livros.id_categ ;";
}}
$consulta = mysqli_query($conexao,$s);
if($_POST && mysqli_num_rows($consulta) == 0){?>
<div class="nada">
<?php echo 'Nenhum livro com o nome '.$txt.' foi encontrado.';?>
</div>
<?php
}

while ($l = mysqli_fetch_assoc($consulta)) {
?>
<a href="apresentacao.php?id_li=<?php echo $l['id_li']; ?>">
<div class="apre_li" >
<img src="<?php echo $l['img_li']; ?>" class="img_apre">
<h2 class="h22"><?php echo  $l['nome_liv']; ?></h2>
<p class="p22" ><?php echo $l['id_li']; ?></p>
<p class="p222"><?php echo $l['nome_categ']; ?></p>
<p class="p23"><?php
$_GET['id_li']=$l['id_li'];?>
<?php
var_dump($_GET);?>
</p>
</div>
</a>
<?php } ?>
</div>
	<input type="checkbox" id="box" class="box1">
	<label for="box" style="position:fixed;">
		<img src="imagens/menu.png" class="img">
 
	</label>
	<nav class="menu" style="position:fixed;">
<hr style="border-color:white; margin-top:48px; margin-bottom:-45px;">
<hr style="border-color: #002899; margin-top: 50px; margin-bottom:-45px;">
		<ul id="menuDropDown" >
			<li class="li_p"><a href="telausu.php" class="b">Home</a></li>
			<li class="li_p">
		<a class="a">Gêneros</a>
		   <ul>
               <?php 
               require_once"conectar.php";
               $ddf="SELECT * FROM categorias;";
               $conect= mysqli_query($conexao,$ddf);
               while ($l = mysqli_fetch_assoc($conect)) {
                ?>
		   	<li >
		   		<a class="b" href="telausu.php?nome_categ=<?php
		   		$_GET['nome_categ']=$l['nome_categ'];
		   		echo $l['nome_categ'];?>">
		   		<?php 
		   		require_once"categorias.php";
		   		echo $l['nome_categ'];  ?>
		   		</a></li>
		<?php } ?>

		   	</ul>			
		</ul>
      <ul>
      	<li>
      		<hr style="border-color: #002899; margin-top: 5px; margin-bottom: 5px;">
      	</li>
      </ul>
      <ul>
      <li>
      	<a href="pedidos.php" class="b">Pedidos</a>
      </li>
      <li class="li_p">
      	<a href="sobre.php" class="b">Sobre</a>
      </li>
    </ul>
	</nav>

		<input type="checkbox" id="check" class="box2">
		<label for="check" style="position: fixed;right: 1%;">
		<img src="<?php require_once "foto.php";?>" class="usu">
		</label>
 <div class="usuario" id="usu">
 	<hr style="border-color:white; margin-top:48px; margin-bottom:-45px;">
<hr style="border-color: #002899; margin-top: 50px; margin-bottom:-45px;">
      <img src="<?php require_once "foto2.php";?>" class="perfil">
      <h2 class="h2"><?php
	echo $_SESSION['usuario'];
  	?></h2>
 	<hr style="border-color:white;">
<hr style="border-color: #002899;">

<p class="inf">
	Email:<?php require_once "email.php";?>
	<br>
	Senha:<?php require_once "password.php"; ?></p>
     <hr style="border-color:white;">
<hr style="border-color: #002899;">

     <ul class="ul">

		   	<li><a class="b" href="histórico.php">Histórico</a></li>
		   	<li><a href="deletarfoto.php"class="b">Apagar conta</a></li>
		   	<li>
		   		<?php 
		   require_once "inicial.php";
		   ?></li>
  
		   </ul></div> 
 
</body>
</html>
<?php ob_end_flush();
?>