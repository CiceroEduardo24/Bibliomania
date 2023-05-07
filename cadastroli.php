<?php require_once"play.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Compartilhar livros</title>
	<link rel="stylesheet" type="text/css" href="cadastroli.css">
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
		<h1 class="h1">Compartilhar livro</h1>
	<form  action="cadastroli.php"  class="form" name="formulario" method="POST" enctype="multipart/form-data">
    Nome: <br><input type="text" name="nome" placeholder="Digite o nome do livro..." class="in" required><br>
    Autor: <br><input type="text" name="autor" placeholder="Digite o nome do autor..." class="in" required> <br> 
    Gênero:<br><select name="genero">
    	<option value=""></option>
      <?php
              require_once"conectar.php";
               $ddf="SELECT * FROM categorias;";
               $conect= mysqli_query($conexao,$ddf);
               while ($l = mysqli_fetch_assoc($conect)) {
                ?><option value="<?php echo $l['id_categ'];?>"><?php echo $l['nome_categ'];?></option>
             <?php }?>
    </select><br>
    Edição:<br><input type="text" name="edicao"><br>
    Imagem do livro:<br><input type="file" name="img" accept="image/*" required><br>
    Arquivo: <br><input type="file" name="arquivo" accept="application/pdf,application/vnd.ms-excel" required><br>
    Descrição:<br><textarea id="msg" class="in2" name="descricao" required></textarea><br>
    <a href="telaadmin.php"><input type="buton" name="voltar" value="Voltar" class="botões2"></a>
    <input type="reset" name="apagar" value="Apagar" class="botões">
    <input type="submit" name="enviar" value="Cadastrar" onclick="clicar()" class="botões"><br>
<?php
   require_once "conectar.php";
   if ($_POST) {
      if ( ! isset( $_FILES['arquivo'] )) {
         exit('Nenhum arquivo enviado!');
      }
      else{

         $no=$_POST['nome'];
         $ae=$_POST['autor'];
         $ge=$_POST['genero'];
         $edi=$_POST['edicao'];
         $desc=$_POST['descricao'];
         $servidor_ftp = 'localhost';
         $usuario_ftp = 'biblio12314';
         $senha_ftp   = 'e10du9ar8do7';
         $arquivo = $_FILES['arquivo'];
         $nome_arquivo = $arquivo['name'];
         $arquivo_temp = $arquivo['tmp_name'];
         $pasta = "pdfs/";
         
         $extensao = strrchr( $nome_arquivo, '.' );
         $nomearq = $no.$extensao;
         $caminho = $pasta.$nomearq;
         $conexao_ftp = ftp_connect( $servidor_ftp );
         $login_ftp = @ftp_login( $conexao_ftp, $usuario_ftp, $senha_ftp );
         
         if (!$login_ftp) {
            exit('Usuário ou senha FTP incorretos.');
         }
         if ( @ftp_put( $conexao_ftp,"/".$caminho, $arquivo_temp, FTP_BINARY ) ) {
            echo 'Arquivos enviados com sucesso!';
         } else {
            echo 'Erro ao enviar arquivos!';
         }
         ftp_close( $conexao_ftp ); 
         $servidor = 'localhost';
         $usuario = 'biblio12314';
         $senha   = 'e10du9ar8do7';
         $img = $_FILES['img'];
         $past = "pdfs/img_li/";
         
         $nome_img = $img['name'];
         $arq_temp = $img['tmp_name'];
         $exten = strrchr( $nome_img, '.' );
         $nomeim = $no.$exten;
         $cam = $past.$nomeim;
         $cone_ftp = ftp_connect( $servidor );
         $logar_ftp = @ftp_login( $cone_ftp, $usuario, $senha );
         
         if (!$logar_ftp) {
            exit('Usuário ou senha FTP incorretos.');
         }
         if ( @ftp_put( $cone_ftp,"/".$cam, $arq_temp, FTP_BINARY ) ) {
            echo '';
         } else {
            echo '';
         }

         ftp_close( $cone_ftp );        
         $sql = "INSERT INTO livros VALUES(0,'$no','$ae','$edi','$ge','$desc','$caminho','$cam');";
         mysqli_query($conexao,$sql);
      }
   }
?>
    </form>
	</div>
	<div class="d2">
  </div>
</body>
</html>