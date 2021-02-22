
  <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesi&oacuten|La Victoria</title>
    <link rel="stylesheet" href="css/sesion.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />

    <link href="SpryAssets/SpryValidationPassword.css" rel="stylesheet" type="text/css" />
    <script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
    <script src="SpryAssets/SpryValidationPassword.js" type="text/javascript"></script>

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
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

    <div class="logo">
          <center><IMG src="images/logue.PNG"alt="Smiley face" height="130" width="115"></center>
      </div>
      <div class="site-navbar" role="banner">
       <nav class="site-navigation text-right text-md-center" role="navigation">
        <div class="container">
          <FONT FACE="Arial Rounded MT Bold" >
          <ul class="site-menu js-clone-nav d-none d-md-block">
            <li><a href="index.php">inicio</a></li>
            <li class="has-children active">
              <a href="#">informaci&oacuten</a>
             <ul class="dropdown">
                <li><a href="proposito.php">Prop&oacutesito</a></li>
                <li><a href="historia.php">Historia</a></li>
                <li><a href="autorid.php">Autoridades</a></li>
              </ul>
            </li>
            <li class="has-children">
              <a href="alfareria.php">alfarer&iacuteas</a>

            </li>
            <li class="has-children">
              <a href="#">Galer&iacutea</a>
              <ul class="dropdown">
                <li><a href="decoracion.php?id_clas=2">DECORACI&oacuteN </a></li>
                 <li><a href="jardin.php?id_clas=1">JARDINER&iacuteA </a></li>
                  <li><a href="teja.php?id_clas=3">TEJA </a></li>
              </ul>
            </li>
      <!--    <li><a href="contact.php">Contácto</a></li>-->
           
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li><a href="loginres-adm.php"><span class="icon icon-person"></span></a></li>
          </ul>
       
        </div>
      </nav>
</div>
    <div class="contenedor-form">
        <div class="toggle">
            <span> Crear Cuenta</span>
        </div>
        
        <div class="formulario">
            <h2>Iniciar Sesi&oacuten</h2>
            <form id="form1" name="form1" method="post" action="v_log2.php">
                <input id="sprytextfield1"  name="txt_usuario"type="text" placeholder="Usuario" required>
                <input id="sprypassword1" name="txt_clave" type="password" placeholder="Contraseña" required>
                <input name="btn_ingresar" type="submit" value="Iniciar Sesión">
            </form>
        </div>
        
        <div class="formulario">
            <h2>Crea tu Cuenta</h2>
            <form method="post" name="form1" action="usuario/agregarUsuario.php">
                <input name="nombre_cli" type="text" placeholder="Nombres"   minlength="6" maxlength="15" oninput="maxlengthNumber(this);" onkeypress="return sololetras(event)" onpaste="return false" required >
                
                <input minlength="6" name="apellido_cli" type="text" placeholder="Apellidos" maxlength="15" oninput="maxlengthNumber(this);" onkeypress="return sololetras(event)" onpaste="return false" required>

                <input minlength="6" name="usuario_cli" type="text" placeholder="Usuario" required>
                
                <input minlength="8" name="contrasenia_cli" type="password" placeholder="Contraseña" required>

                <input minlength="6" name="telefono_cli"  min="0" type="text" placeholder="Teléfono" maxlength="10" oninput="maxlengthNumber(this);" required onkeypress="return solonumeros(event)" onpaste="return false" required="" type="number">

                <input minlength="10" name="direccion_cli" type="text" placeholder="Dirección" required maxlength="200"> 
                
                <input type="submit" value="Registrarse">
            </form>
        </div>
        <div class="reset-password">
            <a href="#">Olvid&eacute mi Contrase&ntildea?</a>
        </div>
    </div>

    <footer>
     <div class="foot">
          
            <p>
                        Copyright &copy; All rights reserved | Alfarerias La Victoria
            
            </p>
      
          
        </div>
    </footer>
<script type="text/javascript">
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprypassword1 = new Spry.Widget.ValidationPassword("sprypassword1");
</script>
    <script src="js/jquery-3.1.1.min.js"></script>    
    <script src="js/main.js"></script>
</body>
</php>