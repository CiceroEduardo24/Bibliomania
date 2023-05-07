<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>cadastro</title>
  <link rel="stylesheet" type="text/css" href="cadastro.css">
  <script type="text/javascript">
  </script>
</head>
<body>
  <div class="d1">
    <h1 class="h1">Cadastro</h1>
    <form  action="cadastro.php"  class="form" name="formulario" method="POST" enctype="multipart/form-data">
     
    Nome de usuario:<br><input type="text" name="usuario" placeholder="Digite nome de usuario..." class="in" required><br>
    Email:<br> <input type="text" name="email" placeholder="Digite seu e-mail..." class="in" required><br>
    Senha:<p class="hjhj">no maxímo 10 caracteres</p><br> <input type="password" name="senha" id="senha" placeholder="Digite a senha..." class="in" required ><br>
    Foto de Usuario:<br> <input type="file" name="arquivo" class="file" accept="image/*" required><br>
    <a href="index.php"><input type="button" name="voltar" value="Voltar" class="botões2"></a>
    <input type="reset" name="apagar" value="Apagar" class="botões">
    <input type="submit" name="enviar" value="Cadastrar" onclick="clicar()" class="botões"><br><br>
<?php 
if ($_POST) {
//conectar com o aquivo onde estara a conexão com o banco de dados
require_once "conectar.php";
//ira checar se o e-mail ja esta cadastrado
  $u=$_POST['usuario'];
    $e= "SELECT * FROM usuario WHERE nome_usu='$u'; ";
    $consulta = mysqli_query($conexao,$e);
if (mysqli_num_rows($consulta)>0) { 
  echo "Usuario ja cadastrado!";
  }
else{
//caso o email esteja cadastrado ele avisara "e-mail já cadastrado" se não ira checar o nome de usuario
   require_once "conectar.php";
     $email=$_POST['email'];
    $d = "SELECT * FROM usuario WHERE email='$email'; ";
    $consulta = mysqli_query($conexao,$d);
if (mysqli_num_rows($consulta)>0) { 
    echo "E-mail ja existente!";
    }
else{
/*caso o usuario ou nome de utilizador ja esteja cadastrado ele ira avisar, se não ele ira encaminhar
as inf para o banco de dados*/

if ($_POST ) {
        $usu =$_POST['usuario'];
          $e_mail=$_POST['email'];
          $se = $_POST['senha'];
//ira fazer a conexão com o filezilla para fazer upload da foto de perfil do usuario
            $servidor_ftp = 'files.000webhost.com';
            $usuario_ftp = 'biblio12314';
            $senha_ftp   = 'e10du9ar8do7';
            $arquivo = $_FILES['arquivo'];
            $nome_arquivo = $arquivo['name'];
            $arquivo_temp = $arquivo['tmp_name'];
            $pasta="fotocad/";

            $extensao = strrchr( $nome_arquivo, '.' );
            $nomeFoto = $usu.$extensao;
            $caminho = $pasta.$nomeFoto;
            $conexao_ftp = ftp_connect( $servidor_ftp );
            $login_ftp = ftp_login( $conexao_ftp, $usuario_ftp, $senha_ftp );
            
            if (!$login_ftp) {
                exit('Usuário ou senha FTP incorretos.');
            }
            if ( @ftp_put( $conexao_ftp,"public_html/".$caminho,$arquivo_temp, FTP_BINARY ) ) {
               echo "Arquivo enviado com sucesso!";  
            } else { 
                echo 'Erro ao enviar arquivo!';
            }
            ftp_close( $conexao_ftp );
//simplesmente ira inserir as informçãos através da conexão 
            $s = "INSERT INTO usuario VALUES(0,'$usu','$e_mail','$se','$caminho')";
            mysqli_query($conexao,$s);
            }
/*depois que o nome de usuario e e-mail não estiverem cadastrados
 ele irá enviar um e-mail de boa vindas ao usuario ataravés do phpmailer que está na pasta do arquivo, é extremamente preciso que o phpmailer esteja dentro da pasta do site para que funcione.*/
?> 
<div style="background-color:transparent;
    height: 100px;
    width: 50px;
    color:transparent;
     border-radius: 80px 0px 80px 0px;
    border-color:transparent;
    border-style: solid;
    margin-left: 0%;
    margin-top: -1000%;
    position: absolute;
    overflow: auto;
    float: right;
    z-index: 1; ">
<?php
//todas esses codigos tem que estar ocultos dentro de uma div com uma scrollbar para que não bug a pagina.
date_default_timezone_set('America/Fortaleza');
require 'PHPMailer/PHPMailerAutoload.php';
$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 2;
$mail->Debugoutput = 'html';
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = "bibliomania.livros231@gmail.com";
$mail->Password = "1b2i3b4l5i6o7m8a9n0i1a";
$mail->setFrom( 'bibliomania.livros231@gmail.com', 'bibliomania');
$mail->addReplyTo('bibliomania.livros231@gmail.com', 'bibliomania');
$mail->addAddress($email, $nome);
$mail->AddEmbeddedImage(".../imagens/user.png", "img", "user.png");
$mail->Subject = 'Seja bem-vindo!';
$conteudo_email= "
Olá $nome, tudo bem?<br> Bem vindo a Bibliomania, sua biblioteca virtual.<br>
Aproveite nosso site ao máximo, desfrute de incriveis histórias.<br>
O que acontece depois?<br>
Não sabemos, porém, leia bastante.<br>
Um abraço,<br>
@Bibliomania
";
$mail->IsHTML(true);
$mail->Body =  $conteudo_email ;
if (!$mail->send()) {?>
     <script type="text/javascript">
        window.alert('Erro !');
  </script><?php  
    echo "Error: " . $mail->ErrorInfo;
} else {?>
     <script type="text/javascript">
      window.alert("Cadastro concluido!" )
      window.location.href="index.php";
  </script><?php  
}

  }?> 
</div>
<?php
  }
  }
   ?>
   </form>
</div>
  <div class="d2">
  </div>
</body>
</html>