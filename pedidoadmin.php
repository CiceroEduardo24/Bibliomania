<?php require_once "play.php";?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pedidos</title>
	<style type="text/css">
		body{
			background-color: #0398fc;
		}
		.d1{
    background: linear-gradient(#0398fc, #004f85,#001829) ;
    height: 90%;
    width: 90%;
    border-color:white;
    border-style: solid;
    margin-left: 5%;
    margin-top: 50px;
    position: absolute;
    float: right;
    z-index: 2;
    color: white;
    }
    .h1{ text-align: center;
    	font-family: Roboto;
    	margin-top: -0%;
    	height: 10%;
       	background-color:#004f85;
    	color: white;}
    table{ margin-left:15%;
    	border-color: white;
          }
    .td{color:blue; 
    }
    
	</style>
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
		<a href="telaadmin.php"><input type="submit" name="voltar" value="Voltar" style="position: absolute; height:5% ; width:5%;"></a>
<table border="1" >
<tr><h1 class="h1">PEDIDOS</h1></tr>
<tr>
<td class="td" bgcolor="white" >Nome do usuario</td>
<td class="td" bgcolor="white">Nome do livro</td>
<td class="td" bgcolor="white">Gênero</td>
<td class="td" bgcolor="white">Informações adicionais</td>
<td class="td" bgcolor="white"></td>
</tr>
<?php 
require_once"conectar.php";
$s="SELECT * FROM pedidos,usuario WHERE usuario.id_cad=pedidos.id_cad;";
$consulta=mysqli_query($conexao,$s);
while ($t=mysqli_fetch_assoc($consulta)) {
	?> 
<tr>
<td><?php echo $t['nome_usu'];  ?></td>
<td><?php echo $t['nome_livro'];  ?></td>
<td><?php echo $t['genero_livro'];  ?></td>
<td><?php echo $t['inf_add'];  ?></td>
<td>
	<a href="excluir_ped.php?id_p=<?php 
		   		$_GET['id_p']=$t['id_p'];
		   		echo $t['id_p'];
                ?>" style="display:block;">
                <img src="imagens/Excluir.png" style="width:7%; right: 2%; margin-top: 3%;">
            </a>
</td>
</tr>
<?php } ?>
</table>
	</div>
</body>
</html>