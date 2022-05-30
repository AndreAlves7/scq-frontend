<?php

/*Definir variaveis usadas nas funcoes*/ 
$estCamera1 = NULL;
$estCamera2 = NULL;
$estCamera3 = NULL;
$estPorta = NULL;
$estLock = NULL;
$est_atuadorBlinds=NULL;
$est_atuadorWindow=NULL;
$est_atuadorLamp=NULL;

/*------------------------------------- */
$valor_camera1 = file_get_contents("api/files/camera1/valor.txt");
$hora_camera1 = file_get_contents("api/files/camera1/hora.txt");
$nome_camera1 = file_get_contents("api/files/camera1/nome.txt");
$estado_camera1 = file_get_contents("api/files/camera1/estado.txt");

$valor_camera2 = file_get_contents("api/files/camera2/valor.txt");
$hora_camera2 = file_get_contents("api/files/camera2/hora.txt");
$nome_camera2 = file_get_contents("api/files/camera2/nome.txt");
$estado_camera2 = file_get_contents("api/files/camera2/estado.txt");

$valor_camera3 = file_get_contents("api/files/camera3/valor.txt");
$hora_camera3 = file_get_contents("api/files/camera3/hora.txt");
$nome_camera3 = file_get_contents("api/files/camera3/nome.txt");
$estado_camera3 = file_get_contents("api/files/camera3/estado.txt");

/* -----------------------------------------CAMERA 1,CAMERA 2,CAMERA 3*/

$valor_porta = file_get_contents("api/files/porta/valor.txt");
$hora_porta = file_get_contents("api/files/porta/hora.txt");
$nome_porta = file_get_contents("api/files/porta/nome.txt");
$estado_porta = file_get_contents("api/files/porta/estado.txt");

/* --------------------------------------------Porta*/
$valor_lock = file_get_contents("api/files/lock/valor.txt");
$hora_lock = file_get_contents("api/files/lock/hora.txt");
$nome_lock = file_get_contents("api/files/lock/nome.txt");
$estado_lock = file_get_contents("api/files/lock/estado.txt");

/* --------------------------------------------Fechadura*/
$valor_atuadorWindow = file_get_contents("api/files/atuadorWindow/valor.txt");
$hora_atuadorWindow = file_get_contents("api/files/atuadorWindow/hora.txt");
$nome_atuadorWindow = file_get_contents("api/files/atuadorWindow/nome.txt");
$estado_atuadorWindow = file_get_contents("api/files/atuadorWindow/estado.txt");
/* --------------------------------------------atuadorWindow*/
$valor_atuadorBlinds = file_get_contents("api/files/atuadorBlinds/valor.txt");
$hora_atuadorBlinds = file_get_contents("api/files/atuadorBlinds/hora.txt");
$nome_atuadorBlinds = file_get_contents("api/files/atuadorBlinds/nome.txt");
$estado_atuadorBlinds = file_get_contents("api/files/atuadorBlinds/estado.txt");
/* --------------------------------------------atuadorBlinds*/
$valor_atuadorLamp = file_get_contents("api/files/atuadorLamp/valor.txt");
$hora_atuadorLamp = file_get_contents("api/files/atuadorLamp/hora.txt");
$nome_atuadorLamp = file_get_contents("api/files/atuadorLamp/nome.txt");
$estado_atuadorLamp = file_get_contents("api/files/atuadorLamp/estado.txt");
/* --------------------------------------------atuadorLamp*/


/* Explicada em dashboard.php-------------------------------------------- */
function DefineEstado(&$var,$est){
	if($var == 'Ativo')
	{
		$est = 'bg-success';
	}
	else if($var == 'Suspenso')
	{
		$est = 'bg-warning';
	}
	else if($var == 'Desativo')
	{
	  $est = 'bg-danger';
	}
	else{
		$est = 'bg-primary';
		$var = "Null/Undefined";
	}
	return $est;
	}


	/*Chamada das funcoes para o estado e os Warnings */
    $estPorta=DefineEstado($estado_porta,$estPorta) ;
    $estCamera1=DefineEstado($estado_camera1,$estCamera1) ;
    $estCamera2=DefineEstado($estado_camera2,$estCamera2) ;
    $estCamera3=DefineEstado($estado_camera3,$estCamera3) ;
    $estLock=DefineEstado($estado_lock,$estLock);
	$est_atuadorBlinds=DefineEstado($estado_atuadorBlinds,$est_atuadorBlinds);
	$est_atuadorWindow=DefineEstado($estado_atuadorWindow,$est_atuadorWindow);
	$est_atuadorLamp=DefineEstado($estado_atuadorLamp,$est_atuadorLamp);
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
        
        	<a class="nav-link-active" aria-current="page" href="dashboard.php"> Voltar</a>
		
   		</div>
	</div>  
    
	<div class="container" style ="border-left: 6px solid rgb(26, 112, 170)">
	
	    <div class="card-header">
						
						
		<b>Tabela de Sensores/Atuadores > Geral </b>  
			
						
						
	    </div>
	</div>	
	
		

	<div class="container">
	<div class="dropdown">
  <button class="dropbtn">Historico de Acessos</button>
  <div class="dropdown-content">
  <a href="historico.php">Geral</a>
  <a href="historico1.php">Historico Dispositivos</a>

  
  </div>
</div>
	    <div class="card-body">
		
		    <table class="table">
		
		        <thead>
			        <tr style="color :rgb(40, 154, 230);">
      
				        <th scope="col">Tipo de Dispositivo IoT</th>
				        <th scope="col">Valor</th>
				        <th scope="col">Ultima Atualização</th>
				        <th scope="col">Estado</th>
			        </tr>
  
		        </thead>
		
		        <tbody>
    
			        <tr style="color :rgb(255, 255, 255);">
				        <th scope="row"><?php echo $nome_camera1; ?></th>
				        <td><?php echo $valor_camera1; ?></td>
				        <td><?php echo $hora_camera1; ?></td>
				        <td><span class="badge <?=$estCamera1;?>"><?php echo $estado_camera1;?></span></td>
			        </tr>

					<tr style="color :rgb(255, 255, 255);">
				        <th scope="row"><?php echo $nome_camera2; ?></th>
				        <td><?php echo $valor_camera2; ?></td>
				        <td><?php echo $hora_camera2; ?></td>
				        <td><span class="badge <?=$estCamera2;?>"><?php echo $estado_camera2;?></span></td>
			        </tr>

					<tr style="color :rgb(255, 255, 255);">
				        <th scope="row"><?php echo $nome_camera3; ?></th>
				        <td><?php echo $valor_camera3; ?></td>
				        <td><?php echo $hora_camera3; ?></td>
				        <td><span class="badge <?=$estCamera3;?>"><?php echo $estado_camera3;?></span></td>
			        </tr>

			        <tr style="color :rgb(255, 255, 255);">
				        <th scope="row"><?php echo $nome_porta; ?></th>
				        <td><?php echo $valor_porta; ?></td>
				        <td><?php echo $hora_porta; ?></td>
				        <td><span class="badge <?=$estPorta;?>"><?php echo $estado_porta;?></span></td>
			        </tr>
			
			        <tr style="color :rgb(255, 255, 255);">
				        <th scope="row"><?php echo $nome_lock; ?></th>
				        <td><?php echo $valor_lock; ?></td>
				        <td><?php echo $hora_lock; ?></td>
				        <td><span class="badge <?=$estLock;?>"><?php echo $estado_lock;?></span></td>
			        </tr>
					
					<tr style="color :rgb(255, 255, 255);">
				        <th scope="row"><?php echo $nome_atuadorWindow; ?></th>
				        <td><?php echo $valor_atuadorWindow; ?></td>
				        <td><?php echo $hora_atuadorWindow; ?></td>
				        <td><span class="badge <?=$est_atuadorWindow;?>"><?php echo $estado_atuadorWindow;?></span></td>
			        </tr>

					<tr style="color :rgb(255, 255, 255);">
				        <th scope="row"><?php echo $nome_atuadorBlinds; ?></th>
				        <td><?php echo $valor_atuadorBlinds; ?></td>
				        <td><?php echo $hora_atuadorBlinds; ?></td>
				        <td><span class="badge <?=$est_atuadorBlinds;?>"><?php echo $estado_atuadorBlinds;?></span></td>
			        </tr>

					<tr style="color :rgb(255, 255, 255);">
				        <th scope="row"><?php echo $nome_atuadorLamp; ?></th>
				        <td><?php echo $valor_atuadorLamp; ?></td>
				        <td><?php echo $hora_atuadorLamp; ?></td>
				        <td><span class="badge <?=$est_atuadorLamp;?>"><?php echo $estado_atuadorLamp;?></span></td>
			        </tr>
					
		        </tbody>
		    </table>
	    </div>
		
</div>
	

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
        
</html>
