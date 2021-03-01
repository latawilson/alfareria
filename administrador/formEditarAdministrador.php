

<?php
require_once("../clases/cls_administrador.php");
$obj_asignatura= new administrador();
$row=$obj_asignatura->consultarId($_GET['id_ad']);
?>

<!DOCTYPE html>
<html lang="en">
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
</head>
<body>
	<div class="log">
   	<br>
   	<center>
          <IMG src="../images/logue.png"alt="Smiley face" height="140" width="130">
      </center>
   </div>
   <div class="caer" style="background: #fff; width: 130px; height: 30px; padding: 5px; margin-left: 89%; border-radius: 10px;
    position: absolute; margin-top: -145px; background-color: rgb(232,129,9, .7);">

      <a style="text-decoration: none;   color: #fff;" href="<?php echo $logoutAction ?>"><span style="margin-right: 10px;"class="icon-exit icon"></span>Cerrar Sesi&oacuten</a>
   
</div>

   <div class="navigation-alfa1">
	<p><a href="../index_admin.php">Inicio </a> /<a href="administrador.php">Administrador</a> / <strong>Editar Informaci&oacuten</strong></p>
	
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
			    <li><a  href="../producto/productos.php"><span class="icon-mug icon"></span>Productos</a></li>
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

	<div class="contenedor-alfa3">
		

 <section class="form_wrap">
    <section class="form_wrap">
    <section >
    <img src="../images/admin2.jpg" width="400" height="840">   
        </section>

        <form method="post" name="form1" action="editarAdministrador.php" class="form_contact">
            <h2>Informaci&oacuten</h2>
            <div class="user_info">
                <label for="names">Usuario</label>
                <input  type="text" id="names" name="usuario_ad" value="<?php echo($row['usuario_ad']); ?>" maxlength="30" oninput="maxlengthNumber(this);" onkeypress="return sololetras(event)" onpaste="return false" required >

                <label for="phone">Contrase&ntildea</label>
                <input type="text" name="contrasenia_ad" value="<?php echo($row['contrasenia_ad']); ?>"  maxlength="15"  required >

                <label for="phone">Nombres</label>
                <input style="text-transform: uppercase;"type="text"  name="nombre_ad" value="<?php echo($row['nombre_ad']); ?>" maxlength="30" oninput="maxlengthNumber(this);" onkeypress="return sololetras(event)" onpaste="return false" required >

                <label for="email">Apellidos</label>
                <input style="text-transform: uppercase;"type="text"  name="apellido_ad" value="<?php echo($row['apellido_ad']); ?>"  maxlength="30" oninput="maxlengthNumber(this);" onkeypress="return sololetras(event)" onpaste="return false" required>

                <label for="mensaje">Direcci&oacuten</label>
                <input style="text-transform: uppercase;"type="text"  name="direccion_ad" value="<?php echo($row['direccion_ad']); ?>" maxlength="200" oninput="maxlengthNumber(this);" onkeypress="return sololetras(event)" onpaste="return false" required >

                <label for="email">Tel&eacutefono</label>
                <input type="text"  name="telefono_ad" value="<?php echo($row['telefono_ad']); ?>" maxlength="10" oninput="maxlengthNumber(this);" required onkeypress="return solonumeros(event)" onpaste="return false" required="" >

                <label for="email">Correo</label>
                <input type="text"  name="correo_ad" value="<?php echo($row['correo_ad']); ?>"  maxlength="30" oninput="maxlengthNumber(this);" onkeypress="return sololetras(event)" onpaste="return false" required>

                <input name="id_ad" type="text" value="<?php echo($row['id_ad']); ?>">
                <input type="submit" value="Guardar" >
            </div>
        </form>

    </section>
			</section>



	</div>

<footer>
	 <div class="foot">
            <p>
                        Copyright &copy; All rights reserved | Alfarer&iacuteas La Victoria      
            </p>
        </div>
</footer>

	

</body>
</html>



















































