<?php
 require_once"conectar.php";
$select="SELECT * FROM usuario;";
$consulta=mysqli_query($conexao,$select);
$abc=mysqli_fetch_assoc($consulta);
       $id_li=$abc['id_li'];
       $nome=$abc['nome_liv'];
       $autor=$abc['autor'];
       $edi=$abc['edição'];
       $genero=$abc['gênero'];
       $desc=$abc['descrição'];
       $arqu=$abc['c_arquivo'];
       $img=$abc['img_li'];
      ?> 
      