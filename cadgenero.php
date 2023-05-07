<?php require_once"play.php";
?>                
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Cadastrar gênero</title>
  <link rel="stylesheet" type="text/css" href="cadge.css">
</head>
<body>
     <?php
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

	}?>
  <div class="d1">
    <h1 class="h1">Cadastrar gênero</h1>

                  <form action="cadgenero.php" class="form" method="POST">
                  <input type="text" name="nome" style="height: 5%;border-style: solid;border-radius:10px;"><br>
                  <input type="submit" name="enviar" value="Cadastrar" class="botões">
                  <a href="telaadmin.php"><input type="button" name="voltar" value="Voltar" class="botões"></a><br>
                  <?php 
                  if ($_POST) {
                  require_once "conectar.php";
                  $email=$_POST['nome'];
                  $d = "SELECT * FROM categorias WHERE nome_categ='$email'; ";
                  $consulta = mysqli_query($conexao,$d);
            if (mysqli_num_rows($consulta)>0) { 
                echo "Gênero já cadastrado!";
                }            
           else{
           if ($_POST ) {

                 $h=$_POST['nome'];
                 require_once"conectar.php"; 
                  $sele="INSERT INTO categorias VALUES(0,'$h');";
                  mysqli_query($conexao,$sele);}}}
                    ?>  
                    </form>
                  </div>
  <div class="d2">
  </div>
</body>
</html>