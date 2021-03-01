<?php
require_once("../clases/cls_pedido.php");
$obj_pedido= new pedido();
$row=$obj_pedido->consultarid_ped($_GET['id_ped']);
?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Administrador</title>
	<link rel="stylesheet" href="../css/editaralfareria.css">
  <link rel="stylesheet" href="../css/Alfarerias.css">
    <link rel="stylesheet" href="../css/alfa_admin.css">
	<link rel="stylesheet" href="../css/fonts1.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/administrador.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
	<div class="log">
   	<br>
   	<center>
          <IMG src="../images/logue.png"alt="Smiley face" height="140" width="130">
      </center>
   </div>
<div class="caer" style="background: #fff; width: 120px; height: 30px; padding: 5px; margin-left: 90%; border-radius: 10px;
    position: absolute; margin-top: -95px; background-color: rgb(232,129,9, .7);">

      <a style="text-decoration: none;   color: #fff;" href="<?php echo $logoutAction ?>"><span style="margin-right: 10px;"class="icon-exit icon"></span>Cerrar Sesi&oacuten</a>
   
</div>
   <div class="navigation-alfa1">
	<p><a href="../index_admin.php">Inicio </a> /<strong>Administrador</strong></p>
	
   </div>
 <header>
	<div class="menu_bar">
		<a href="#" class="bt-menu"><span class="icon-list2"></span>Menú</a>
	</div>
	<nav>
		<ul>
			<li><a  href="#"><span class="icon-tree icon"></span>Gest&iacuteon de desarrollo</a>
			<ul >
				<li><a  href="../alfareria/alfarerias.php"><span class="icon-home icon"></span>Alfarer&iacutea</a></li>
			    <li><a  href="../producto/productos.php"><span class="icon-mug icon"></span>Producto</a></li>
			    <li><a  href="administrador.php"><span class="icon-calendar icon"></span>Administrador</a></li>
                <li><a  href="../usuario/lista_usuarios.php"><span class="icon-address-book icon"></span>Clientes</a></li>
			</ul>
			</li>
      <li><a  href="pedido.php"><span class="icon-cart icon"></span>Pedidos</a></li>
      <li><a  href="#"><span class="icon-calendar icon"></span>Reportes</a></li>
      <li><a  href="../informe/informes.php"><span class="icon-wrench icon"></span>Informaci&oacuten</a></li>
      <li><a  href="../Promocion/promociones.php"><span class="icon-gift icon"></span>Promociones</a></li>
      <li><a  href="../index.php"><span class="icon-database icon"></span>Revisi&oacuten de Interfaz</a></li>
		</ul>
	</nav>
</header>
	

<div class="contenedor-alfa3" style="margin-top: -600px; width: 500px;">
    


     <section class="form_wrap " style="margin-left: 250px;">

                           <table  style="margin-left: 50px; background: #F5F3EE; border: solid 0.5px #F4F4F4 ;  "> 
                                   <caption> Detalle del pedido </caption> 

                <?php
                require_once ("../clases/cls_cliente.php");
                 $obj_cliente = new asignatura ();
                $resultcli= $obj_cliente->consult($_GET['id_cli']);
                ?>
                 <?php
                        while($row= mysql_fetch_array($resultcli))
                        {
                        ?> 
                                   <caption > Nombre del cliente:<label style="text-transform: uppercase;"> <?php echo($row['nombre_cli']); ?> <?php echo($row['apellido_cli']); ?></label> </caption> 
                                 <?php 
                        }
                        ?> 
                        <?php
                        require_once("../clases/cls_pedido.php");
                        $obj_pedido= new pedido();
                        $row=$obj_pedido->consultarid_ped($_GET['id_ped']);
                        ?>
                                   <caption >Fecha del prodido: <?php echo($row['fecha_ped']); ?> </caption>
                                   <caption >Total: <?php echo($row['total_ped']); ?> </caption>
<?php
 require_once ("../clases/cls_detalle.php");
 $obj_detalle = new detalle ();
 $resultdeta= $obj_detalle->consulte($_GET['id_ped']);
?>
                              <tr style="background: #F4511E  ; color:#fff;">
                                    <td style="padding: 15px;">Nº </td>
                                    <td style="padding: 15px;">Nombre del producto </td>
                                    <td style="padding: 15px;">Unidades</td>
                                    <td style="padding: 15px;">TOTAL</td>
                                </tr>
<?php
                        while($row= mysql_fetch_array($resultdeta))
                        {
                        ?>  
                                <tr style=" text-align: center;">
                                    <td style="padding: 5px;"><?php echo($row['pedido_id_ped']); ?></td>
                             
                              
                                    <td style="padding: 5px;"><?php echo($row['nombre_pro']); ?></td>
                                   
                                    <td style="padding: 5px;"><?php echo($row['cantidad_depe']); ?></td>
                                    <td style="padding: 5px;"><?php echo($row['sub_total_depe']); ?></td>
                                    
                                    
                                
                                </tr>
      <?php 
                        }
                        ?> 
                            </table>
                             
      
        </section>

  </div>

<footer style="margin-top: 450px;">
	 <div class="foot" >
            <p>
                        Copyright &copy; All rights reserved | Alfarer&iacuteas La Victoria      
            </p>
        </div>
</footer>

	

</body>
</html>



















































