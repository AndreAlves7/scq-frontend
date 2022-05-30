

<?php
/*Definir variaveis usadas nas funcoes*/ 
$estCamera1 = NULL;
$estCamera2 = NULL;
$estCamera3 = NULL;
$estPorta = NULL;
$estLock = NULL;

$warnCamera1 = NULL;
$warnCamera2 = NULL;
$warnCamera3 = NULL;
$warnPorta = NULL;
$warnLock = NULL;
$warn_atuadorBlinds=NULL;
$warn_atuadorWindow=NULL;
$warn_atuadorLamp=NULL;


/*-----------------------------------------*/
$valor_camera1 = file_get_contents("api/files/camera1/valor.txt");
$hora_camera1 = file_get_contents("api/files/camera1/hora.txt");
$nome_camera1 = file_get_contents("api/files/camera1/nome.txt");
$estado_camera1 = file_get_contents("api/files/camera1/estado.txt");
$warnings_camera1 = file_get_contents("api/files/camera1/warnings.txt");
$log_camera1 = file_get_contents("api/files/camera1/log.txt");

$valor_camera2 = file_get_contents("api/files/camera2/valor.txt");
$hora_camera2 = file_get_contents("api/files/camera2/hora.txt");
$nome_camera2 = file_get_contents("api/files/camera2/nome.txt");
$estado_camera2 = file_get_contents("api/files/camera2/estado.txt");
$warnings_camera2 = file_get_contents("api/files/camera2/warnings.txt");
$log_camera2 = file_get_contents("api/files/camera2/log.txt");

$valor_camera3 = file_get_contents("api/files/camera3/valor.txt");
$hora_camera3 = file_get_contents("api/files/camera3/hora.txt");
$nome_camera3 = file_get_contents("api/files/camera3/nome.txt");
$estado_camera3 = file_get_contents("api/files/camera3/estado.txt");
$warnings_camera3 = file_get_contents("api/files/camera3/warnings.txt");
$log_camera3 = file_get_contents("api/files/camera3/log.txt");

/* -----------------------------------------CAMERA 1,CAMERA 2,CAMERA 3*/

$valor_porta = file_get_contents("api/files/porta/valor.txt");
$hora_porta = file_get_contents("api/files/porta/hora.txt");
$nome_porta = file_get_contents("api/files/porta/nome.txt");
$estado_porta = file_get_contents("api/files/porta/estado.txt");
$warnings_porta = file_get_contents("api/files/porta/warnings.txt");
$log_porta = file_get_contents("api/files/porta/log.txt");

/* --------------------------------------------Porta*/
$valor_lock = file_get_contents("api/files/lock/valor.txt");
$hora_lock = file_get_contents("api/files/lock/hora.txt");
$nome_lock = file_get_contents("api/files/lock/nome.txt");
$estado_lock = file_get_contents("api/files/lock/estado.txt");
$warnings_lock = file_get_contents("api/files/lock/warnings.txt");
$log_lock = file_get_contents("api/files/lock/log.txt");

/* --------------------------------------------Fechadura*/~

$nome_atuador1 = file_get_contents("api/files/atuadorBlinds/nome.txt");
$warnings_atuadorBlinds = file_get_contents("api/files/atuadorBlinds/warnings.txt");
$nome_atuador2 = file_get_contents("api/files/atuadorLamp/nome.txt");
$warnings_atuadorLamp = file_get_contents("api/files/atuadorLamp/warnings.txt");
$nome_atuador3 = file_get_contents("api/files/atuadorWindow/nome.txt");
$warnings_atuadorWindow = file_get_contents("api/files/atuadorWindow/warnings.txt");
/*----------------------------------------------Atuadores*/



/*
-Esta função, quando chamada, Atribui um 'badge' diferente para cada tipo de input.
Se o nosso .txt não possui nenhuma das strings definidas temos o erro Null/Undefined,
neste caso a nova mensagem de erro é devolvida por ponteiro.
IMPORTANTE!!!!!: Apenas São Admitidas 3 Opcoes para Esta funcao, qualquer outra String Irá dar Null/Erro
-Ativo
-Desativo
-Suspenso
Estas opções não são case sensitive!
- Api Funcional, mas opcional para esta funcionalidade
*/
/*--------------------------------------PORTA */
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
/*
-Este codigo transforma os conteudos do file .txt -> warnings de cada sensor para um INT
de seguida atribui um badge diferente dependendo do intervalo a que o nosso numero inteiro pertence;
-NOTA!: Em caso default("Por exemplo Sao apenas inseridas palavras no .txt logo não existe numero inteiro para extrair")
O codigo atribui à variavel o valor : 0;
-Numeros negativos Dão Null/Undefined. Neste caso a variavel que representa a 
mensagem é devolvida por ponteiro com a nova mensagem de erro;
-Api Funcional, mas opcional para esta funcionalidade
*/ 
/*--------------------------CAM1*/
function DefineWarnings(&$var,$warn){
$var = (int) $var;

if(($var >=0) && ($var <= 1))
  {
      $warn = 'bg-success';
  }
  else if(($var >1) && ($var <= 5))
  {
      $warn = 'bg-warning';
  }
  else if($var > 5)
  {
     $warn = 'bg-danger';
  }

else{
    $warn = 'bg-primary';
    $var = "Null/Undefined";
}
return $warn;
}
/*Esta funcao devolve a primeira linha de cada log.txt------*/
function WriteTableDate($i){
  $lines = file("api/files/$i/log.txt");//file in to an array
  echo $lines[0];
  }

?>
<?php
	session_start();
    if( !isset($_SESSION['username']) ){
        header( "refresh:5; url=index.php" );
        die( "Acesso restrito!" );
    }
      /*Chamada e atribuição das funcoes para o estado e os Warnings */
    $estPorta=DefineEstado($estado_porta,$estPorta) ;
    $estCamera1=DefineEstado($estado_camera1,$estCamera1) ;
    $estCamera2=DefineEstado($estado_camera2,$estCamera2) ;
    $estCamera3=DefineEstado($estado_camera3,$estCamera3) ;
    $estLock=DefineEstado($estado_lock,$estLock) ;
    
    $warnCamera1=DefineWarnings($warnings_camera1,$warnCamera1);
    $warnCamera2=DefineWarnings($warnings_camera2,$warnCamera2);
    $warnCamera3=DefineWarnings($warnings_camera3,$warnCamera3);
    $warnPorta=DefineWarnings($warnings_porta,$warnPorta);
    $warnLock=DefineWarnings($warnings_lock,$warnLock);
    $warn_atuadorBlinds=DefineWarnings($warnings_atuadorBlinds,$warn_atuadorBlinds);
    $warn_atuadorWindow=DefineWarnings($warnings_atuadorWindow,$warn_atuadorWindow);
    $warn_atuadorLamp=DefineWarnings($warnings_atuadorLamp,$warn_atuadorLamp);


?>



<!DOCTYPE html>

<html lang="en">
<head>
<style>
  /*Style para os Switches dos Atuadores, Não funciona em dashboard.css */
  .switch {
    position: relative;
    display: inline-block;
    width: 60px;
    height: 34px;
  }
  
  .switch input { 
    opacity: 0;
    width: 0;
    height: 0;
  }
  
  .slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    -webkit-transition: .4s;
    transition: .4s;
  }
  
  .slider:before {
    position: absolute;
    content: "";
    height: 26px;
    width: 26px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
  }
  
  input:checked + .slider {
    background-color: #2196F3;
  }
  
  input:focus + .slider {
    box-shadow: 0 0 1px #2196F3;
  }
  
  input:checked + .slider:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(26px);
    transform: translateX(26px);
  }
  
  /* Rounded sliders */
  .slider.round {
    border-radius: 34px;
  }
  
  .slider.round:before {
    border-radius: 50%;
  }
  </style>
    <title>Serviço de Vigilância Inteligente</title>
	
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="dashboard.css"> 

</head>

<body> 
    <br>
    <br>
    <div class="fixed-header" style="background-color: 	rgba(48,48,48,0.4);">
        <div class = "index"> 
            <a class="nav-link-active" aria-current="page" href="dashboard.php"> Home</a>
            <a class="nav-link-active" aria-current="page" href="historico.php"> Histórico </a>
            <a class="nav-link-active" aria-current="page" href="Logout.php"> Logout</a>
        </div>
    </div>
    <div class="container" style ="border-left: 6px solid rgb(26, 112, 170)">
        
           <h1> Olá Utilizador </h1>
           <p>Bem vindo</p>

    </div>
    
    <div class="container">
        <div class="row">
                <div class="col-sm-2">
                    <img src="images/camera-FFFFFF-6BB2DC.png"  style="width:175px" alt="Icon">
                </div>
                <div class="col-sm-3">
                  <div class="text-center">
                  <br>
						            <p><b>Ultima Atualização:</b> <?php WriteTableDate("camera1") ?></p>
                        <p><a href="historico.php"> Histórico</a></p>
						      </div>
                    
                </div>
                
                <div class="col-sm-6">
                  <div class="row" style="color:rgb(177, 190, 199);">
                      <div class = "col-sm-3" style="text-align: center;">
                        <p>Nome</p>
                      </div>
                      <div class = "col-sm-3" style="text-align: center;">
                        <p>Estado</p>
                      </div>
                      <div class = "col-sm-6" style="text-align: center;">
                        <p>Warnings</p>
                      </div>
                    </div>
                  <div class="row" style="height: 69%;text-align: center;padding: 5% 0;">
                      <div class = "col-md-3">
                        <p><span class="badge bg-secondary"><?php echo $nome_camera1; ?></span></p>
                      </div>
                      <div class = "col-md-3">
                        <p><span class="badge <?=$estCamera1;?>"><?php echo $estado_camera1; ?></span></p>
                      </div>
                      <div class = "col-md-6">
                        <p><span class="badge <?=$warnCamera1;?>"><?php echo $warnings_camera1; ?></span></p>
                      </div>
                  </div>

                </div>
        </div>
        <br>
        <div class="row">
                <div class="col-sm-2">
                    <img src="images/camera-FFFFFF-6BB2DC.png"  style="width:175px" alt="Icon">
                </div>
                <div class="col-sm-3">
                  <div class="text-center">
                  <br>
						        <p><b>Ultima Atualização:</b> <?php WriteTableDate("camera2") ?></p>
                    <p><a href="historico.php"> Histórico</a></p>
						      </div>
                    
                </div>
                
                <div class="col-sm-6">
                  <div class="row" style="color:rgb(177, 190, 199);">
                      <div class = "col-sm-3" style="text-align: center;">
                        <p>Nome</p>
                      </div>
                      <div class = "col-sm-3" style="text-align: center;">
                        <p>Estado</p>
                      </div>
                      <div class = "col-sm-6" style="text-align: center;">
                        <p>Warnings</p>
                      </div>
                  </div>
                  <div class="row" style="height: 69%;text-align: center;padding: 5% 0;">
                      <div class = "col-md-3">
                        <p><span class="badge bg-secondary"><?php echo $nome_camera2; ?></span></p>
                      </div>
                      <div class = "col-md-3">
                        
                        <p><span class="badge <?=$estCamera2;?>"><?php echo $estado_camera2; ?></span></p>
                      </div>
                      <div class = "col-md-6">
                      <p><span class="badge <?=$warnCamera2;?>"><?php echo $warnings_camera2; ?></span></p>
                    </div>
                  </div>

                </div>
        </div>
        <br>
        <div class="row">
                <div class="col-sm-2">
                    <img src="images/camera-FFFFFF-6BB2DC.png"  style="width:175px" alt="Icon">
                </div>
                <div class="col-sm-3">
                <div class="text-center">
                    <br>
						<p><b>Ultima Atualização:</b> <?php WriteTableDate("camera3") ?></p>
                        <p><a href="historico.php"> Histórico</a></p>
						</div>
                    
                </div>
                
                <div class="col-sm-6">
                  <div class="row" style="color:rgb(177, 190, 199);">
                      <div class = "col-sm-3" style="text-align: center;">
                  <p>Nome</p>
                    </div>
                    <div class = "col-sm-3" style="text-align: center;">
                  <p>Estado</p>
                    </div>
                    <div class = "col-sm-6" style="text-align: center;">
                  <p>Warnings</p>
                    </div>
                </div>
                <div class="row" style="height: 69%;text-align: center;padding: 5% 0;">
                      <div class = "col-md-3">
                  <p><span class="badge bg-secondary"><?php echo $nome_camera3; ?></span></p>
                    </div>
                    <div class = "col-md-3">
                  <p><span class="badge <?=$estCamera3;?>"><?php echo $estado_camera3; ?></span></p>
                    </div>
                    <div class = "col-md-6">
                    <p><span class="badge <?=$warnCamera3;?>"><?php echo $warnings_camera3; ?></span></p>
                    </div>
                    </div>

                </div>
        </div>
        <br>
        <div class="row">
                <div class="col-sm-2">
                    <img src="images/door-close-FFFFFF-6BB2DC.png"  style="width:175px" alt="Icon">
                </div>
                
                <div class="col-sm-3">
                <div class="text-center">
                    <br>
						<p><b>Ultima Atualização:</b> <?php WriteTableDate("porta") ?></p>
                        <p><a href="historico.php"> Histórico</a></p>
						</div>
                </div>
                
                <div class="col-sm-6">
                  <div class="row" style="color:rgb(177, 190, 199);">
                      <div class = "col-sm-3" style="text-align: center;">
                  <p>Nome</p>
                    </div>
                    <div class = "col-sm-3" style="text-align: center;">
                  <p>Estado</p>
                    </div>
                    <div class = "col-sm-6" style="text-align: center;">
                  <p>Warnings</p>
                    </div>
                </div>
                <div class="row" style="height: 69%;text-align: center;padding: 5% 0;">
                      <div class = "col-md-3">
                  <p><span class="badge bg-secondary"><?php echo $nome_porta; ?></span></p>
                    </div>
                    <div class = "col-md-3">
                  <p><span class="badge <?=$estPorta;?>"><?php echo $estado_porta; ?></span></p>
                    </div>
                    <div class = "col-md-6">
                    <p><span class="badge <?=$warnPorta;?>"><?php echo $warnings_porta; ?></span></p>
                    </div>
                    </div>

                </div>
        </div>
        <br>
        <div class="row">
                <div class="col-sm-2">
                    <img src="images/lock-FFFFFF-6BB2DC.png"  style="width:175px" alt="Icon">
                </div>
                
                <div class="col-sm-3">
                <div class="text-center">
                    <br>
                    
						<p><b>Ultima Atualização:</b> <?php WriteTableDate("lock") ?></p>
                        <p><a href="historico.php"> Histórico</a></p>
						</div>
                </div>
                
                <div class="col-sm-6">
                  <div class="row" style="color:rgb(177, 190, 199);">
                      <div class = "col-sm-3" style="text-align: center;">
                  <p>Nome</p>
                    </div>
                    <div class = "col-sm-3" style="text-align: center;">
                  <p>Estado</p>
                    </div>
                    <div class = "col-sm-6" style="text-align: center;">
                  <p>Warnings</p>
                    </div>
                </div>
                <div class="row" style="height: 69%;text-align: center;padding: 5% 0;">
                      <div class = "col-md-3">
                  <p><span class="badge bg-secondary"><?php echo $nome_lock; ?></span></p>
                    </div>
                    <div class = "col-md-3">
                  <p><span class="badge <?=$estLock;?>"><?php echo $estado_lock; ?></span></p>
                    </div>
                    <div class = "col-md-6">
                    <p><span class="badge <?=$warnLock;?>"><?php echo $warnings_lock; ?></span></p>
                    </div>
                    </div>
                
        </div>
      <div class ="container">
        <!-- ATUADORES -->
      <div class="text-center" ><h1>Atuadores</h1> </div>
        <div class="row" style="height: 100%;text-align: center;padding: 1% 0;border:3px solid rgba(57, 104, 162, 0.6);">
                      <div class = "col-md" style="border-right:3px solid rgba(57, 104, 162, 0.6);">
                      <a style="font-weight: bold;"> <?php echo $nome_atuador1; ?> </a>
                      <br>
                      <img src="images/blinds.png"  style="width:175px" alt="Icon">
                      <br>
                      <br>
                      <label class="switch">
                          <input type="checkbox">
                            <span class="slider round"></span>
                        </label>
                        <p><a href="historico.php"> Histórico</a> <span class="badge <?=$warn_atuadorBlinds;?>"><?php echo $warnings_atuadorBlinds; ?></span></p> 
                    </div>
                    <div class = "col-md" style="border-right:3px solid rgba(57, 104, 162, 0.6);">
                    <a style="font-weight: bold;"> <?php echo $nome_atuador2; ?></a>
                      <br>
                    <img src="images/lamp.png"  style="width:175px" alt="Icon">
                    <br>
                      <br>
                      <label class="switch">
                          <input type="checkbox">
                            <span class="slider round"></span>
                        </label>
                        <p><a href="historico.php"> Histórico</a> <span class="badge <?=$warn_atuadorLamp;?>"><?php echo $warnings_atuadorLamp; ?></span></p> 
                        
                    </div>
                    <div class = "col-md">
                    <a style="font-weight: bold;"> <?php echo $nome_atuador3; ?> </a>
                      <br>
                    <img src="images/window.png"  style="width:175px" alt="Icon">
                    <br>
                      <br>
                      <label class="switch">
                          <input type="checkbox" >
                            <span class="slider round"></span>
                        </label>
                        <p><a href="historico.php"> Histórico</a> <span class="badge <?=$warn_atuadorWindow;?>"><?php echo $warnings_atuadorWindow; ?></span></p> 
                    </div>
                    </div>
                </div>
            </div>
  </div> 
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
        
</html>


