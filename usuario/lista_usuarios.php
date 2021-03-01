
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Usuario</title>
	<link rel="stylesheet" href="../css/editaralfareria.css">
  <link rel="stylesheet" href="../css/Alfarerias.css">
    <link rel="stylesheet" href="../css/alfa_admin.css">
	<link rel="stylesheet" href="../css/fonts1.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/administrador.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
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
	<p><a href="../index_admin.php">Inicio </a> /<strong>Usuario</strong></p>
	
   </div>
 <header>
	<div class="menu_bar">
		<a href="#" class="bt-menu"><span class="icon-list2"></span>Menú</a>
	</div>
	<nav>
		<ul>
			<li><a  href="#"><span class="icon-tree icon"></span>Gesti&oacuten de desarrollo</a>
			<ul >
				<li><a  href="../alfareria/alfarerias.php"><span class="icon-home icon"></span>Alfarer&iacutea</a></li>
			    <li><a  href="../producto/productos.php"><span class="icon-mug icon"></span>Producto</a></li>
			    <li><a  href="../administrador/administrador.php"><span class="icon-calendar icon"></span>Administrador</a></li>
          <li><a  href="lista_usuarios.php"><span class="icon-address-book icon"></span>Clientes</a></li>
			</ul>
			</li>
      <li><a  href="../administrador/pedido.php"><span class="icon-cart icon"></span>Pedidos</a></li>
      <li><a  href="../reporte_pdf/Reporte_pedido.php"><span class="icon-calendar icon"></span>Reportes</a></li>
      <li><a  href="../informe/informes.php"><span class="icon-wrench icon"></span>Informaci&oacuten</a></li>
      <li><a  href="../Promocion/promociones.php"><span class="icon-gift icon"></span>Promociones</a></li>
      <li><a  href="../index.php"><span class="icon-database icon"></span>Revisi&oacuten de Interfaz</a></li>
		</ul>
	</nav>
</header>
	
<div class="contenedor-alfa3" style="margin-top: -750px; width: 800px;">
		


		 <section class="form_wrap " style="margin-left: 110px;">




<?php
require_once("../clases/cls_usuario.php");
$obj_usu= new usuario();
$result=$obj_usu->consultar();
$datos= array();
?>

                           <table  style="margin-left: 55px; background: #F5F3EE; border: solid 0.5px #F4F4F4 ;  "> 

                              <tr style="background: #F4511E  ; color:#fff;">
                                    <td style="padding: 15px;">Nº Usuarios</td>
                                    <td style="padding: 15px;">Nombres</td>
                                    <td style="padding: 15px;">Apellidos</td>
                                    <td style="padding: 15px;">Usuario</td>
                                    <td style="padding: 15px;">Contrase&ntildea</td>
                                    <td style="padding: 15px;">Tel&eacutefono</td>
                                    <td style="padding: 15px;">Direcci&oacuten</td>
                                </tr>
<?php
while($row= mysql_fetch_array($result))
{
  ?>

                                <tr style=" text-align: center;">
                                    <td style="padding: 5px;"><?php echo($row['id_cli']); ?></td>
                                    <td style="padding: 5px;"><?php echo($row['nombre_cli']); ?></td>
                                    <td style="padding: 5px;"><?php echo($row['apellido_cli']); ?></td>
                                    <td style="padding: 5px;"><?php echo($row['usuario_cli']); ?></td>
                                    <td style="padding: 5px;"><?php echo($row['contrasenia_cli']); ?></td>
                                    <td style="padding: 5px;"><?php echo($row['telefono_cli']); ?></td>
                                    <td style="padding: 5px;"><?php echo($row['direccion_cli']); ?></td>
                                    
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



















































