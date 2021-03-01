
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
      <li><a  href="../reporte_pdf/Reporte_pedido.php"><span class="icon-calendar icon"></span>Reportes</a></li>
      <li><a  href="../informe/informes.php"><span class="icon-wrench icon"></span>Informaci&oacuten</a></li>
      <li><a  href="../Promocion/promociones.php"><span class="icon-gift icon"></span>Promociones</a></li>
      <li><a  href="../index.php"><span class="icon-database icon"></span>Revisi&oacuten de Interfaz</a></li>
		</ul>
	</nav>
    <style>.ie-panel{display: none;background: #212121;padding: 10px 0;box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3);clear: both;text-align:center;position: relative;z-index: 1;} html.ie-10 .ie-panel, html.lt-ie-10 .ie-panel {display: block;}</style>
    <script type="text/javascript">
      function sololetras(e){
         key=e.keyCode || e.which;
         teclado=String.fromCharCode(key).toLowerCase();
         letras=" abcdefghijklmn&ntildeopqrstuvwxyz";
         especiales="8-37-38-46-164";
         teclado_especial=false;
         for(var i in especiales){
          if(key==especiales[i]){
            teclado_especial=true;break;
          }
         }
         if(letras.indexOf(teclado)==-1 && !teclado_especial){
          return false;
         }
      }
    </script>
    <script type="text/javascript">
      function solonumeros(e){
         key=e.keyCode || e.which;
         teclado=String.fromCharCode(key);
         numero="0123456789";
         especiales="8-37-38-46";
         teclado_especial=false;
         for(var i in especiales){
          if(key==especiales[i]){
            teclado_especial=true;
          }
         }
         if(numero.indexOf(teclado)==-1 && !teclado_especial){
          return false;
         }
      }
    </script>
    <script type="text/javascript">
      function maxlengthNumber(obj){
        console.log(obj.value);
        if(obj.value.length > obj.maxlength){
          obj.value = obj.value.slice(0. obj.maxlength);
        }
      }
    </script>
</header>
	
	<div class="contenedor-alfa3">
		


		 <section class="form_wrap">


 <tbody>

<?php
require_once("../clases/cls_administrador.php");
$obj_admin= new administrador();
$result=$obj_admin->consultar();
$datos= array();
?>

<?php
while($row= mysql_fetch_array($result))
{
?>                              <table  style="margin-left: 10px; background: #F5F3EE; border: solid 0.5px #F4F4F4 ;  "> 

	                            <tr style="background: #F4511E  ; color:#fff; text-align: center;">
                                    <td style="padding: 15px;">Identificador</td>
                                    <td style="padding: 15px;">Usuario</td>
                                    <td style="padding: 15px;">Contrase&ntildea</td>
                                    <td style="padding: 15px;">Nombre</td>
                                    <td style="padding: 15px;">Apellido</td>
                                    <td style="padding: 15px;">Direcci&oacuten</td>
                                    <td style="padding: 15px;">Tel&eacutefono</td>
                                    <td style="padding: 15px;">Correo</td>
                                    <td style="padding: 15px;">Acci&oacuten</td>

                                </tr>
                                <tr style=" text-align: center;">
                                    <td style="padding: 5px;"><?php echo($row['id_ad']); ?></td>
                                    <td style="padding: 5px;"><?php echo($row['usuario_ad']); ?></td>
                                    <td style="padding: 5px;"><?php echo($row['contrasenia_ad']); ?></td>
                                    <td style="padding: 5px;text-transform: uppercase;"><?php echo($row['nombre_ad']); ?></td>
                                    <td style="padding: 5px;text-transform: uppercase;"><?php echo($row['apellido_ad']); ?></td>
                                    <td style="padding: 5px;"><?php echo($row['direccion_ad']); ?></td>
                                    <td style="padding: 5px;"><?php echo($row['telefono_ad']); ?></td>
                                    <td style="padding: 5px;"><?php echo($row['correo_ad']); ?></td>
                                    <td style="padding: 5px;">
                                        <a  href="formEditarAdministrador.php?id_ad=<?php echo($row['id_ad']);?>"  style="text-decoration: none; background: rgb(232,129,9, .7); padding: 5px; border-radius: 5px; color: white" >Editar</a>

                                        
                                  

                                    </td>
                                </tr>
<?php	
}
?>
                            </table>

                            </tbody>
       
        </section>

        
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



















































