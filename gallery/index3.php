<?php

include("../sesion.php");
if($_SESSION["tipo_usuario"] == "Cliente"){ //NUEVO2
	include ('includes.php');


	$sql= mysqli_query($link, "select * from gallery order by ordering;") or die (mysqli_error($link));
	$sqlmaxcode= mysqli_query($link, "select max(code) from gallery;") or die (mysqli_error($link));

	$maxcode= mysqli_fetch_array($sqlmaxcode);
	$maxcode = $maxcode[0];
	if(is_null($maxcode))
		$maxcode = 0;
	?>

	<!DOCTYPE html>
	<html>
	<head>
		
		<title>Portafolio de servicios</title>
		<link rel="stylesheet" href="style.css" />
		<link rel="stylesheet" href="js/jquery-ui-1.11.4.custom/jquery-ui.min.css" />
		

	</head>
	<header>
		<nav class="navbar navbar-default" role="navigation">
			<ul class="nav nav-pills nav-justified">
				<li><?php echo "Bienvenido: ".utf8_decode($_SESSION["nomuser"]); ?></li>
				<!--<li> <a href=".php">Mis Datos</a></li>-->
				<li> <a href="../form_consulta_servicios_cliente2.php?codigo=0">Mis Servicios</a></li><!--NUEVO1-->
				<li> <a href="../form_registro_solicitud2.php?codigo=0">Solicitar Servicios</a></li>
				<li> <a href="index3.php?codigo=0">Portafolio de servicios</a></li>
				<li> <a href="../menu_ppal.php?codigo=0">Atras</a></li><!--NUEVO1-->
				<!--<li><a href="main/Usuarios/index.php">Usuarios</a></li>--><!--nuevo1-->
				<li><a href="../cerrar.php">Salir</a> </li>
			</ul>
		</nav>

	</header>
	<body>
		<div id="box">
			<h1 style="text-align:center;">Portafolio de servicios</h1>
			<form method="POST" name="form" action="../menu_ppal.php" ENCTYPE="multipart/form-data">
				<input type="hidden" name="action">
				<table id="images_table">
					<thead>
						<tr>
							<th>
								Click en la imagen para maximizarla
							</th>
							<th>
								Nombre
							</th>
							<th>
								Descripción
							</th>
				<!--<th>
					Selecccione la imagen
				</th>
				<th>
					Eliminar			
				</th>-->
			</tr>
		</thead>
		<tbody id="sortable">
			<?php
			$codesarray = array();
			while($info= mysqli_fetch_array($sql)):
				$codesarray[] = $info['code'];
				?>
				<tr>
					<td>
						<a data-overlay-trigger="overlay" href="#" rel="prettyPhoto" ><img src="<?= DIR_THUMBS . $info['file'] ?>" disabled/></a>
					</td>
					<td>
						<input type="text" name="name<?= $info['code']?>" value="<?= $info['name']?>" disabled / />
					</td>
					<td>
						<input type="" size="100" maxlength="100" name="description<?= $info['code']?>" value="<?= $info['description']?>" disabled />
					</td>

					
					<td>
							
						<!-- si presiono en realizar solicitud me direcciono a form_registro_solicitud3.php con el codigo del servicio que voy a  realizar la solicitud-->
						<a href="../form_registro_solicitud3.php?codigo=<?=$info['code']?>">Realizar solicitud</a><!--nuevo 4-->
						
				
					<!--<span class="ui-icon ui-icon-arrowthick-2-n-s"></span>-->
				</td>
			</tr>
			<?php
		endwhile;
		
		?>
	</tbody>
</table>
		<!--<div id="submit-button">
			<input type="submit" value="Enviar">
		</div>-->
	</form>
</div>
<div class="overlay" id="overlay">
	<div class="modal">
		<img src="" />
	</div>
</div>
<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/jquery-ui-1.11.4.custom/jquery-ui.min.js"></script>
<script>
	var maxcode = <?= $maxcode + 1 ?>;
	var filename = '';
	var codesarray = <?= json_encode($codesarray) ?>;
	var numrows = <?= count($codesarray) ?>;
	
	$("form").on('focus', 'input[type="file"]', function () {
		filename = $(this).val();
	});
	
	$("form").on('change', 'input[type="file"]', function(){
		var str = $(this).attr('name');
		var res = str.substring(6);
		//if (filename == '' && $.inArray(res,codesarray) == -1) {		
			maxcode++;
          //  alert('bbb');
          $('#images_table').append('<tr ' + (numrows % 2 == 0 ?'class="even"':'') + '><td></td><td><input type="text" name="name' + maxcode + '" /></td><td><input type="text" name="description' + maxcode + '" /></td><td><input type="file" name="image' + maxcode + '" /></td><td></td><td><input class="sortable-item" type="hidden" name="ordering' + maxcode + '" value="0" /><span class="ui-icon ui-icon-arrowthick-2-n-s"></span></td></tr>');
          numrows++;
		//}
		newfile = false;

		reorder();
	});
	
	$(function(){
		$("#sortable").sortable(
		{
			axis: "y",
			stop: function(event, ui) {
				reorder();
			}
		}
		);
	});

	function reorder()
	{
		i = 1;
		$(".sortable-item").each(function(){
			$(this).val(i);
			i++;
		})
	}
</script>
<script src="js/script.js"></script>
</body>
</html> 
<?php //NUEVO 2
}
else{
	echo '<script language = javascript>
	alert("Acceso no permitido....!")
	self.location = "../index.php"
	</script>';
}
?>


