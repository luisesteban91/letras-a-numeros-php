<?php
try{
	//var_dump($_POST);
     if($_POST){
		//echo ($_POST['numero']);

		$numUnidades = array(
			'0',
			'1',
			'2',
			'3',
			'4',
			'5',
			'6',
			'7',
			'8',
			'9',
		);
		$numDecenas = array(
			'0',
			'1',
			'2',
			'3',
			'4',
			'5',
			'6',
			'7',
			'8',
			'9',
		);
		$numCentenas = array(
			'0',
			'1',
			'2',
			'3',
			'4',
			'5',
			'6',
			'7',
			'8',
			'9',
		);
		$numMillares = array(
			'0',
			'1',
			'2',
			'3',
			'4',
			'5',
			'6',
			'7',
			'8',
			'9',
		);
		$numEspeciales = array(
			'0',
			'1',
			'2',
			'3',
			'14',
			'15',
		);


		$palabraUnidades = array(
			' ',
			'y uno',
			'y dos',
			'y tres',
			'y cuatro',
			'y cinco',
			'y seis',
			'y siete',
			'y ocho',
			'y nueve',
		);

		$palabraDecenas = array(
			' ',
			'diez ',
			'veinte ',
			'treinta ',
			'cuarenta ',
			'cincuenta ',
			'sesenta ',
			'setenta ',
			'ochenta ',
			'noventa ',
		);

		$palabraCentenas = array(
			' ',
			'ciento ',
			'docientos ',
			'trecientos ',
			'cuatrocientos ',
			'qunientos ',
			'secientos ',
			'setecientos ',
			'ochocientos ',
			'novecientos ',
		);

		$palabraMillares = array(
			' ',
			'mil ',
			'dosmil ',
			'tresmil ',
			'cuatromil ',
			'cincomil ',
			'seismil ',
			'sietemil ',
			'ochomil ',
			'nuevemil ',
		);
		$palabraEspeciales = array(
			' ',
			'once',
			'doce',
			'trece',
			'catorce',
			'quince',
		);

		$respuestaGeneral = ''; 
		$numeros = str_split($_POST['numero']); //convertir el nuemro recibido en array
		$numerosItem = str_split($_POST['numero']); //convertir el nuemro recibido en array
		$tamaño = strlen($_POST['numero']); //convertilo en numero para saber que tipo es-
		$count = 0;
		$saltar = false;

		//DETERMINAR QUE TIPO DE CIFRA ES:
		$a1 = array("", "1", "2", "3", "4");
		$a2 = array("", "unidades", "decenas", "centenas", "millares");
		$tipo = str_replace($a1, $a2, $tamaño);

		foreach($numeros as $numero){

            $tamaño = count($numerosItem);
			$tipo = str_replace($a1, $a2, $tamaño);

			if($tipo == 'millares'){
				// echo "millares:<br>";
				// echo $numero;
				$respuesta = str_replace($numMillares, $palabraMillares, $numero);
				// echo $respuesta."<br>";
				$respuestaGeneral = $respuestaGeneral.$respuesta;
			}elseif($tipo == 'centenas'){
				// echo "centenas:<br>";
				// echo $numero;
				$respuesta = str_replace($numCentenas, $palabraCentenas, $numero);
				// echo $respuesta."<br>";
				$respuestaGeneral = $respuestaGeneral.$respuesta;
			}
			if($tipo == 'decenas'){
				if(implode($numerosItem) == 11){
					$respuesta = "once";
					$respuestaGeneral = $respuestaGeneral.$respuesta;
					$saltar = true;
					
				}elseif(implode($numerosItem) == 12){
					$respuesta = "doce";
					$respuestaGeneral = $respuestaGeneral.$respuesta;
					$saltar = true;
					
				}elseif(implode($numerosItem) == 13){
					$respuesta = "trece";
					$respuestaGeneral = $respuestaGeneral.$respuesta;
					$saltar = true;
					
				}elseif(implode($numerosItem) == 14){
					$respuesta = "catorce";
					$respuestaGeneral = $respuestaGeneral.$respuesta;
					$saltar = true;
					
				}elseif(implode($numerosItem) == 15){
					$respuesta = "quince";
					$respuestaGeneral = $respuestaGeneral.$respuesta;
					$saltar = true;
					
				}else{
					// echo "decenas:<br>";
					// echo $numero;
					$respuesta = str_replace($numDecenas, $palabraDecenas, $numero);
					// echo $respuesta."<br>";
					$respuestaGeneral = $respuestaGeneral.$respuesta;
				}
				
			}else{
				if($tipo == 'unidades' && !$saltar){
					// echo "unidades:<br>";
					// echo $numero;
					$respuesta = str_replace($numUnidades, $palabraUnidades, $numero);
					// echo $respuesta."<br>";
					$respuestaGeneral = $respuestaGeneral.$respuesta;
				}
			}
			
				
			

			unset($numerosItem[$count]);
			
			$count++;
		}
    }
}catch(Exception $e){
    echo "algo slaio mal: ".$e;
}
?>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>Convertir numero a letras</title>
		
		<script src="https://code.jquery.com/jquery-3.2.1.min.js" ></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		
		<style>
			body {
			padding-top: 20px;
			padding-bottom: 20px;
			}
		</style>
	</head>
	
	<body>
		
		<div class="container">		
			<div class="panel panel-primary">
				<div class="panel-body">
					
					<form id="form1" method="post" action="index.php" enctype="multipart/form-data">
						
						<h4 class="text-center">ingresa un numero</h4>
						
						<div class="form-group">
							<label class="col-sm-2 control-label">nuemero</label>
							<div class="col-sm-8">
								<input type="num" name="numero">
							</div>
							
							<button type="submit" class="btn btn-primary">enviar</button>
						</div>

						<h5 class="text-center">Respuesta: <?php echo $respuestaGeneral; ?> </h5>
						
					</form>
					
				</div>
			</div>
		</div>
	</body>
</html>



