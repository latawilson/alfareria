<?php
header('Content-Type: text/html; charset=ISO-8859-1');
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 

  $isValid = False; 

  if (!empty($UserName)) { 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 

    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "../loginres-adm.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($_SERVER['QUERY_STRING']) && strlen($_SERVER['QUERY_STRING']) > 0) 
    $MM_referrer .= "?" . $_SERVER['QUERY_STRING'];
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);

  $logoutGoTo = "../loginres-adm.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}

?>

<!doctype html>
<html lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta charset="UTF-8"/>
	<title>Informacion</title>
	<link rel="stylesheet" href="../css/alfarerias.css">
  <link rel="stylesheet" href="../css/alfa_admin.css">
  <link rel="stylesheet" href="../css/fonts1.css">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/esaespepa.css">
  <link rel="stylesheet" href="../css/administrador.css">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css" integrity="sha512-/zs32ZEJh+/EO2N1b0PEdoA10JkdC3zJ8L5FTiQu82LR9S/rOQNfQN7U59U9BC12swNeRAz3HSzIL2vpp4fv3w==" crossorigin="anonymous" />
</head>
<body>
   
<header  id="header">
<!--   á => &aacute;
&eacute => &eacute;
&iacute => &iacute;
&oacute => &oacute;
&ntilde = &ntilde; -->
  <!-- <div class="d-flex flex-column">
     <div>
          <IMG src="../images/logue.png"alt="Smiley face" height="140" width="130" class="img-fluid icofont-rounded-up">
</div> -->
   <div class="menu_bar">
    <a href="#" class="bt-menu"><span class="icon-list2"></span>Menú</a>
  </div>
  <nav>
    <ul>
     <li><a  href="#"><span class="icon-tree icon"></span>Gesti&oacuten de desarrollo</a>
       <ul >
        <li><a  href="../alfareria/alfarerias.php"><span class="icon-home icon"></span>Alfarerias</a></li>
        <li><a  href="../producto/productos.php"><span class="icon-mug icon"></span>Producto</a></li>
        <li><a  href="../administrador/administrador.php"><span class="icon-calendar icon"></span>Administrador</a></li>
        <li><a  href="../usuario/lista_usuarios.php"><span class="icon-address-book icon"></span>Clientes</a></li>
      </ul>
    </li>
    <li><a  href="../administrador/pedido.php"><span class="icon-cart icon"></span>Pedidos</a></li>
    <li><a  href="../reporte_pdf/Reporte_pedido.php"><span class="icon-calendar icon"></span>Reportes</a></li>
    <li><a  href="/informe/informes.php"><span class="icon-wrench icon"></span>Informaci&oacuten</a></li>
    <li><a  href="../Promocion/promociones.php"><span class="icon-gift icon"></span>Promociones</a></li>
    <li><a  href="../index.php"><span class="icon-database icon"></span>Revisi&oacuten de Interfaz</a></li>
  </ul>
</nav>
</div>
</header>
</div>
<div>
    <br>
    <center>
          <IMG src="../images/fon2.jpg" align="right">
      </center>
      <br>
   </div>

<br><br><br><br><br><br>
<main id="main">
 
  <div class="col-lg-12" style="padding-top:20px"></div>
  <div class="card">
    <div class="card-header">
      Gr&aacuteficas
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-lg-4">

          <canvas id="verti" width="400" height="400"></canvas>
          <!-- <canvas id="ori" width="400" height="400"></canvas> -->
          
        </div>
        <div class="col-lg-4">

          <!-- <canvas id="verti" width="400" height="400"></canvas> -->
          <canvas id="ori" width="400" height="400"></canvas>
        </div>
        <div class="col-lg-4">
          <canvas id="paye" width="400" height="400"></canvas>
          
        </div>
        
      </div>
    </div>


  </div>

  <div class="card">
    <div class="card-header">
      Graficas por Fechas
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-lg-2">
          <label for=""> fecha inicio</label>
          
          <select name="select_finicio" id="select_finicio" class="form-control"></select>
          
        </div>
        <div class="col-lg-5">
          <label for=""> fecha fin</label>
          <select name="select_fdin" id="select_fdin" class="form-control"></select>
          
        </div>
        <div class="col-lg-2">
          <label for="">&nbsp;</label>
          <button class="btn btn-danger" onclick="cargargraficosparametro()">BUSCAR</button>          
        </div>
        <div class="col-lg-4">

          <canvas id="verti_para" width="400" height="400">   </canvas>

          
        </div>
        <div class="col-lg-4">

          <canvas id="ori_para" width="400" height="400"></canvas>
        </div>
        <div class="col-lg-4">

          <canvas id="paye_para" width="400" height="400"></canvas>
          
        </div>
        
      </div>
    </div>
  </div>
  
</main>

<footer>
  <div class="foot">

    <p>
      Copyright &copy; All rights reserved | Alfarerias La Vitoria  
    </p>         
  </div>
</footer>



</body>
</html>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js" ></script> 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.css"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css"></script>

<script type="text/javascript" src="Chart.min.js"></script>

<script type="text/javascript">
  Cargahori();
  Carga();
  Cargapaye();
  
  function cargargraficosparametro(){
    Cargabusqueda();
    polar();
    linea();
  }
  function Carga(){
    $.ajax({
      url:'controlador.php',
      type : 'POST'

    }).done(function(resp){
      if(resp.length>0){
        var data = JSON.parse(resp);
        var fecha=[];
        var cantidad=[];
        var colores= [];
        for (var i =0; i < data.length; i++) {
          fecha.push(data[i][0]);
          cantidad.push(data[i][5]);
          colores.push(colorRGB());
        }
        grafica(fecha, cantidad,colores, 'bar', " monto",'verti');
        // document.getElementById("ori").style.display = "none";
        // document.getElementById("verti").style.display = "block";
      }
    })
  }
  function Cargahori(){
    $.ajax({
      url:'controlador.php',
      type : 'POST'

    }).done(function(resp){
      if(resp.length>0){
        var data = JSON.parse(resp);
        var fecha=[];
        var cantidad=[];
        var colores= [];
        for (var i =0; i < data.length; i++) {
          fecha.push(data[i][4]);
          cantidad.push(data[i][5]);
          colores.push(colorRGB());
        }
        grafica(fecha, cantidad,colores, 'horizontalBar', "grafica en lineas de fechas",'ori');
        // document.getElementById("verti").style.display = "none";
        // document.getElementById("ori").style.display = "block";
      }
      
    })
  }

  function Cargapaye(){
    $.ajax({
      url:'controlador.php',
      type : 'POST'

    }).done(function(resp){
      if(resp.length>0){
        var data = JSON.parse(resp);
        var fecha=[];
        var cantidad=[];
        var colores= [];
        for (var i =0; i < data.length; i++) {
          fecha.push(data[i][3]);
          cantidad.push(data[i][5]);
          colores.push(colorRGB());
        }
        grafica(fecha, cantidad,colores, 'pie', "grafica en lineas de fechas",'paye');
        // document.getElementById("verti").style.display = "none";
        // document.getElementById("ori").style.display = "block";
      }
      
    })
  }

  function generarNumero(numero){
    return (Math.random()*numero).toFixed(0);
  }

  function colorRGB(){
    var coolor = "("+generarNumero(255)+"," + generarNumero(255) + "," + generarNumero(255) +")";
    return "rgb" + coolor;
  }
  traer();

  /////////////////////
  /////////////////////
  function traer(){
    var mifecha = new Date();
    var anio= mifecha.getFullYear();
    var cadena="";
    for (var i = 2015; i < anio+1; i++) {
      cadena+="<option value="+i+">"+i+"</option>";
    }
    $("#select_finicio").html(cadena);
    $("#select_fdin").html(cadena)

  }

  function Cargabusqueda(){
    var fechainicio =$("#select_finicio").val();    
    var fechafin = $("#select_fdin").val();
    $.ajax({

      url:'para.php',
      type : 'POST',
      data:{
        inicio: fechainicio,
        fin: fechafin
      }

    }).done(function(resp){
      if(resp.length>0){
        var fecha=[];
        var cantidad=[];
        var colores= [];
        var data = JSON.parse(resp);
        for (var i =0; i < data.length; i++) {
          fecha.push(data[i][0]);
          cantidad.push(data[i][1]);
          colores.push(colorRGB());
        }
        grafica(fecha, cantidad,colores,'doughnut', "grafica en barras de fechas",'verti_para');
      }
    })
  }

  function polar(){
    var fechainicio =$("#select_finicio").val();    
    var fechafin = $("#select_fdin").val();
    $.ajax({

      url:'para.php',
      type : 'POST',
      data:{
        inicio: fechainicio,
        fin: fechafin
      }
    }).done(function(resp){
      if(resp.length>0){
        var fecha=[];
        var cantidad=[];
        var colores= [];
        var data = JSON.parse(resp);
        for (var i =0; i < data.length; i++) {
          fecha.push(data[i][0]);
          cantidad.push(data[i][1]);
          colores.push(colorRGB());
        }
        grafica(fecha, cantidad,colores,'polarArea', "grafica en barras de fechas",'ori_para');
      }
    })
  }
  function linea(){
    var fechainicio =$("#select_finicio").val();    
    var fechafin = $("#select_fdin").val();
    $.ajax({

      url:'para.php',
      type : 'POST',
      data:{
        inicio: fechainicio,
        fin: fechafin
      }

    }).done(function(resp){

      if(resp.length>0){
        var fecha=[];
        var cantidad=[];
        var colores= [];
        var data = JSON.parse(resp);
        for (var i =0; i < data.length; i++) {
          fecha.push(data[i][0]);
          cantidad.push(data[i][1]);
          colores.push(colorRGB());
        }
        grafica(fecha, cantidad,colores,'line', "grafica en linea",'paye_para');
      }
    })
  }
  
  
  ///

  function grafica(fecha,  cantidad,colores, tipo, encabezado,id){
    var ctx = document.getElementById(id);
    var myChart = new Chart(ctx, {
      type: tipo,
      data: {
        labels:fecha,
        datasets: [{
          label: encabezado,
          data: cantidad,
          backgroundColor: colores,
          borderColor:colores,
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]
        }
      }
    });
  }




</script>
