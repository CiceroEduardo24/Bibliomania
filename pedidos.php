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
	<title>Pedidos</title>
	<link rel="stylesheet" type="text/css" href="pedidos.css">
</head>
<body>
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

	}?>
	<div class="d1">
		<h1 class="h1">Pedidos</h1>
	<form  action="pedidos.php"  class="form" name="formulario" method="POST">
    Nome do livro: <br><input type="text" name="nome" placeholder="Digite o nome do livro..." class="in" required><br>      
    Gênero:<br><input type="text" name="genero" placeholder="Digite o gênero..." class="in" required><br>
    Informações adicionais:<br><textarea id="msg" name="infadd" class="in2"></textarea><br>
    <a href="telausu.php"><input type="buton" name="voltar" value="Voltar" class="botões2"></a>
    <input type="reset" name="apagar" value="Apagar" class="botões">
    <input type="submit" name="enviar" value="Cadastrar" onclick="clicar()" class="botões"><br>
  
    <?php
if ($_POST) {
$n = $_POST['nome'];
$g = $_POST['genero'];
$i = $_POST['infadd'];
require_once "conectar.php";
require_once "selectidusu.php";  
$s = "INSERT INTO pedidos
VALUES(0,$id_usu,'$n','$g','$i')";
mysqli_query($conexao,$s);
echo "Pediddo enviado com sucesso!";}
    ?> 
     </form>
	</div>
	<div class="d2">
  </div>
 
</body>
</html>
<?php
ob_end_flush();
?>