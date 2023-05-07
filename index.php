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
	<meta name="viewport" content="widht=device-widht, initial-scale=1,maximum-scale=1">
	<title>tela de login</title>
	<link rel="stylesheet" type="text/css" href="index.css">
</head>
<body >
	<script type="text/javascript">
		function mouseoverPass(obj) {
  var obj = document.getElementById('myPassword');
  obj.type = "text";
}
function mouseoutPass(obj) {
  var obj = document.getElementById('myPassword');
  obj.type = "password";
}
	</script>
<div class="d1">
	
</div>
<div class="d2">
	<form method="POST" action="index.php">
		<h1 class="h1">Login</h1>
	<p class="p1">
		Usuario: <input type="text" name="usu"  placeholder="Usuario..." class="in"><br><br>
		Senha: <input type="password" name="senha" id="myPassword" placeholder="Digite a senha..." class="in2">
		<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABDUlEQVQ4jd2SvW3DMBBGbwQVKlyo4BGC4FKFS4+TATKCNxAggkeoSpHSRQbwAB7AA7hQoUKFLH6E2qQQHfgHdpo0yQHX8T3exyPR/ytlQ8kOhgV7FvSx9+xglA3lM3DBgh0LPn/onbJhcQ0bv2SHlgVgQa/suFHVkCg7bm5gzB2OyvjlDFdDcoa19etZMN8Qp7oUDPEM2KFV1ZAQO2zPMBERO7Ra4JQNpRa4K4FDS0R0IdneCbQLb4/zh/c7QdH4NL40tPXrovFpjHQr6PJ6yr5hQV80PiUiIm1OKxZ0LICS8TWvpyyOf2DBQQtcXk8Zi3+JcKfNafVsjZ0WfGgJlZZQxZjdwzX+ykf6u/UF0Fwo5Apfcq8AAAAASUVORK5CYII=" onclick="mouseoverPass();" onmouseout="mouseoutPass();"  id="olho" class="olho"/><br>
		<input type="submit" name="logar" value="login" class="login" size="30px"><br><br>
	</p>
	<p class="p2">
  Ainda não e cadastrado?<br>
  clique <a href="cadastro.php" class="a">aqui</a>
</p>
</form>
<?php if ($_POST) {
require_once "conectar.php";
	$us = $_POST['usu'];
	$senha = $_POST['senha'];
	$s = "SELECT * FROM usuario WHERE nome_usu='$us' AND password= '$senha'; ";
	$consulta = mysqli_query($conexao,$s);
if (mysqli_num_rows($consulta)>0){
		$_SESSION['usuario'] = $us;
		header("Location:telausu.php");
}
	else if(($us == "administrador") && ($senha == "admin")){
		$_SESSION['usuario'] = $us;
		header("Location:telaadmin.php");
	}
 		else{
 			 ?> <br><br><?php echo "Usuario não encontrado!";
 		}
}
 
?> 

</div>
</script>
</body>
</html>
<?php 
//psr
ob_end_flush();?>