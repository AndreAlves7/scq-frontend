<?php
$nome_camera1 = file_get_contents("api/files/camera1/nome.txt");
$nome_camera2 = file_get_contents("api/files/camera2/nome.txt");
$nome_camera3 = file_get_contents("api/files/camera3/nome.txt");
$nome_porta = file_get_contents("api/files/porta/nome.txt");
$nome_lock = file_get_contents("api/files/lock/nome.txt");
$nome_atuadorWindow = file_get_contents("api/files/atuadorWindow/nome.txt");
$nome_atuadorLamp = file_get_contents("api/files/atuadorLamp/nome.txt");
$nome_atuadorBlinds = file_get_contents("api/files/atuadorBlinds/nome.txt");




 $i = 0;
 $a = 1;
 

/*------------------------------------- */
$valor_camera1 = file_get_contents("api/files/camera1/valor.txt");
$hora_camera1 = file_get_contents("api/files/camera1/hora.txt");
$nome_camera1 = file_get_contents("api/files/camera1/nome.txt");
$estado_camera1 = file_get_contents("api/files/camera1/estado.txt");
$log_camera1 = file_get_contents("api/files/camera1/log.txt");
$nomefile_camera1 = file_get_contents("api/files/camera1/nomefile.txt");

/*------------------------------------- CAMERA1*/ 

$valor_camera2 = file_get_contents("api/files/camera2/valor.txt");
$hora_camera2 = file_get_contents("api/files/camera2/hora.txt");
$nome_camera2 = file_get_contents("api/files/camera2/nome.txt");
$estado_camera2 = file_get_contents("api/files/camera2/estado.txt");
$log_camera2 = file_get_contents("api/files/camera2/log.txt");
$nomefile_camera2 = file_get_contents("api/files/camera2/nomefile.txt");

/*------------------------------------- CAMERA2*/ 

$valor_camera3 = file_get_contents("api/files/camera3/valor.txt");
$hora_camera3 = file_get_contents("api/files/camera3/hora.txt");
$nome_camera3 = file_get_contents("api/files/camera3/nome.txt");
$estado_camera3 = file_get_contents("api/files/camera3/estado.txt");
$log_camera3 = file_get_contents("api/files/camera3/log.txt");
$nomefile_camera3 = file_get_contents("api/files/camera3/nomefile.txt");

/*------------------------------------- CAMERA3*/ 

$valor_porta = file_get_contents("api/files/porta/valor.txt");
$hora_porta = file_get_contents("api/files/porta/hora.txt");
$nome_porta = file_get_contents("api/files/porta/nome.txt");
$estado_porta = file_get_contents("api/files/porta/estado.txt");
$log_porta = file_get_contents("api/files/porta/log.txt");
$nomefile_porta = file_get_contents("api/files/porta/nomefile.txt");

/*------------------------------------- Porta*/ 

$valor_lock = file_get_contents("api/files/lock/valor.txt");
$hora_lock = file_get_contents("api/files/lock/hora.txt");
$nome_lock = file_get_contents("api/files/lock/nome.txt");
$estado_lock = file_get_contents("api/files/lock/estado.txt");
$log_lock = file_get_contents("api/files/lock/log.txt");
$nomefile_lock = file_get_contents("api/files/lock/nomefile.txt");

/*------------------------------------- LOCK*/ 

$nome_atuadorBlinds = file_get_contents("api/files/atuadorBlinds/nome.txt");
$nomefile_atuadorBlinds = file_get_contents("api/files/atuadorBlinds/nomefile.txt");
$log_atuadorBlinds = file_get_contents("api/files/atuadorBlinds/log.txt");

$nome_atuadorLamp = file_get_contents("api/files/atuadorLamp/nome.txt");
$nomefile_atuadorLamp = file_get_contents("api/files/atuadorlamp/nomefile.txt");
$log_atuadorLamp = file_get_contents("api/files/atuadorLamp/log.txt");

$nome_atuadorWindow = file_get_contents("api/files/atuadorWindow/nome.txt");
$nomefile_atuadorWindow = file_get_contents("api/files/atuadorWindow/nomefile.txt");
$log_atuadorWindow = file_get_contents("api/files/atuadorWindow/log.txt");
/* --------------------------------------------ATUADORES */

/*Definição Standart das variaveis gerais*/
$nome_Display = $nome_camera1 ;
$nomefile_Display = $nomefile_camera1;
$log_Display = $log_camera1;



 $lines = file("api/files/".$nomefile_Display."/log.txt");

/*Este codigo Interpreta o Botao escolhido pelo name ="buttonx", dependendo do input este da às variaveis gerais
os valores desejado, assim podemos ter apenas um historico para todos os sensores
*/

 if(isset($_POST['button1'])) {

	$nome_Display =$nome_camera1 ;
	$nomefile_Display = $nomefile_camera1;
	$log_Display =$log_camera1 ;
	$lines = file("api/files/".$nomefile_Display."/log.txt");
}

if(isset($_POST['button2'])) {

	$nome_Display =$nome_camera2 ;
	$nomefile_Display = $nomefile_camera2;
	$log_Display =$log_camera2 ;
	$lines = file("api/files/".$nomefile_Display."/log.txt");
}

if(isset($_POST['button3'])) {

	$nome_Display =$nome_camera3 ;
	$nomefile_Display = $nomefile_camera3;
	$log_Display =$log_camera3 ;
	$lines = file("api/files/".$nomefile_Display."/log.txt");
}

if(isset($_POST['button4'])) {

	$nome_Display =$nome_porta ;
	$nomefile_Display = $nomefile_porta;
	$nome_Display_Value = $valor_porta;
	$log_Display =$log_porta;
	$lines = file("api/files/".$nomefile_Display."/log.txt");
}

if(isset($_POST['button5'])) {

	$nome_Display =$nome_lock ;
	$nomefile_Display = $nomefile_lock;
	$log_Display =$log_lock;
	$lines = file("api/files/".$nomefile_Display."/log.txt");
}
if(isset($_POST['button6'])) {

	$nome_Display =$nome_atuadorBlinds ;
	$nomefile_Display = $nomefile_atuadorBlinds;
	$log_Display =$log_atuadorBlinds;
	$lines = file("api/files/".$nomefile_Display."/log.txt");
}
if(isset($_POST['button7'])) {

	$nome_Display =$nome_atuadorLamp ;
	$nomefile_Display = $nomefile_atuadorLamp;
	$log_Display =$log_atuadorLamp;
	$lines = file("api/files/".$nomefile_Display."/log.txt");
}
if(isset($_POST['button8'])) {

	$nome_Display =$nome_atuadorWindow ;
	$nomefile_Display = $nomefile_atuadorWindow;
	$log_Display =$log_atuadorWindow;
	$lines = file("api/files/".$nomefile_Display."/log.txt");
}
/*Esta funcao vai a cada linha do nosso log.txt e transforma todos os $delimiters em espaços (" ") para que o explode
consiga detetar todas as palavras.
De seguida separa utilizado o explode separa a data da hora e do valor,
De seguida envia um echo da data enquanto passa a $hora e o $valor por um ponteiro, para ser mostrada
 posteriormente por um echo $hora / echo $valor*/
 function WriteTableDate(&$hour,&$i,&$nomefile_Display,&$value){
/*Define os Delimitadores:(" " e ;) para o explode*/
	$delimiters = [' ',';'];

	$lines = file("api/files/".$nomefile_Display."/log.txt");//file in to an array
/*str_replace transforma todos os $delimiters em espaços, assim o explode pode detetar todas as palavras. */
	$newline = str_replace($delimiters, $delimiters[0], $lines);

	$datelines= explode(" ", $newline[$i]);
	/*Echo do primeiro vetor (Data)*/
	echo $datelines[0]; //line 2 
	/*Guarda o segundo vetor em variavel (Hora)*/
	$hour = $datelines[1];
	/*Guarda o terceiro vetor em variavel (Value)*/
	$value = $datelines[2];
	$i++;
	}
	
	/*Simples contador para dar o index de acesso*/
	function IndexNumber(&$a){
		echo $a;
		$a++;
	}	

	
?>



<!DOCTYPE html>

<html lang="en">
<head>

    <title>Historico</title>
	
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		
	<link rel="stylesheet" href="dashboard.css"> 

</head>

<body> 
	
	<br>
    <br>
	<div class="fixed-header" style="background-color: 	rgba(48,48,48,0.4);">
		<div class = "index"> 
        
        	<a class="nav-link-active" aria-current="page" href="dashboard.php"> Home</a>	
			<a class="nav-link-active" aria-current="page" href="historico.php"> Voltar</a>
		
   		</div>
	</div>  
    
	<div class="container" style ="border-left: 6px solid rgb(26, 112, 170)">
	
	    <div class="card-header">		
						
			<b>Tabela de Sensores > <span class="badge bg-primary"> <?php echo $nome_Display ?> </span></b> 
							
	    </div>
	</div>	
	
		

	<div class="container">
		<!-- Definicao dos botoes para escolher o tipo de informacao demonstrada -->
	<form method="post">
		<div class="dropdown">
  		<button class="dropbtn">Historico de Acessos</button>
  			<div class="dropdown-content">
 				<a href="historico.php"> Geral</a>
  				<p><input class="btn btn-outline-primary" type="submit" name="button1" value=<?php echo $nomefile_camera1; ?>></p>
  				<p><input class="btn btn-outline-primary" type="submit" name="button2" value=<?php echo $nomefile_camera2; ?>></p>
  				<p><input class="btn btn-outline-primary" type="submit" name="button3" value=<?php echo $nomefile_camera3; ?>></p>
  				<p><input class="btn btn-outline-primary" type="submit" name="button4" value=<?php echo $nomefile_porta; ?>></p>
  				<p><input class="btn btn-outline-primary" type="submit" name="button5" value=<?php echo $nomefile_lock; ?>></p>
  				<p><input class="btn btn-outline-primary" type="submit" name="button6" value=<?php echo $nomefile_atuadorBlinds; ?>></p>
  				<p><input class="btn btn-outline-primary" type="submit" name="button7" value=<?php echo $nomefile_atuadorLamp; ?>></p>
  				<p><input class="btn btn-outline-primary" type="submit" name="button8" value=<?php echo $nomefile_atuadorWindow; ?>></p>
				
	
  				</div>
			</div>
		</form>
	    <div class="card-body">
		
		    <table class="table">
		
		        <thead>
			        <tr style="color :rgb(40, 154, 230);">
      
				        <th scope="col">Index de Acessos</th>
				        <th scope="col">Data de Atualização</th>
				        <th scope="col">Hora de Acesso</th>
						<th scope="col">Valor do Acesso</th>

			        </tr>
  
		        </thead>
		
		        <tbody>
					<!-- Chamada das funcoes para mostrar as tabelas, aqui utilizamos o foreach 
					para atualizar o numero de linhas no log.txt
				-->
    					<?php foreach ($lines as $item): ?>
					
			        <tr style="color :rgb(255, 255, 255);">
				        <th scope="row"><?php IndexNumber($a) ?>º</th>
                        
				        <td><?php WriteTableDate($hour,$i,$nomefile_Display,$value)?></td>
				        <td><?php echo $hour ?></td> 
						<td><?php echo $value ?></td> 
			        </tr>

						<?php endforeach; ?>	
					
		        </tbody>
		    </table>
	    </div>
		
		<br>
		
</div>
   	
	
        
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
        
</html>
