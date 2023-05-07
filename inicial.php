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
?>