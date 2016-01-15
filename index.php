<html lang="en">+
<?php 
	include("pages/head.php");
 ?>

<!-- Div principal el cual contendra la generacion dinamica de la pag -->
<!-- div_contenido -->
	<body data-spy="scroll" data-target="#topnav">
		<div id="div_contenido">
		 <?php 
		 	include("pages/body.php");
		  ?>
		</div>
<!-- fin del div_contenido -->

		<?php 
			include("pages/footer.php");
		 ?>
		<script src="componentes/jquery-1.11.1.min.js"></script>
		<script src="componentes/bootstrap.min.js"></script>
	</body>
</html>