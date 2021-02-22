<!DOCTYPE html>
<html lang="en">
<head>
    <title>Gad La Victoria</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="../fonts/icomoon/style.css">

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/magnific-popup.css">
    <link rel="stylesheet" href="../css/jquery-ui.css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">


    <link rel="stylesheet" href="../css/aos.css">

    <link rel="stylesheet" href="../css/style.css">
    
  </head>
  <body>
    <div class="site-wrap">
         <header class="site-navbar" role="banner">
      <div class="site-navbar-top">
        <div class="container">
          <div class="row align-items-center">

            <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
              <form action="" class="site-block-top-search">
              </form>
            </div>

            <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
              <div >
                <a href="index.php" class="js-logo-clone"><IMG src="../images/fon2.jpg"alt="Smiley face" width="425" ></a>
              </div>
            </div>

                     <div class="col-6 col-md-4 order-3 order-md-3 text-right">
              <div class="site-top-icons">
                <ul>
                  <li class="d-inline-block d-md-none ml-md-0"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a></li>
                </ul>
              </div> 
            </div>

          </div>
        </div>
      </div> 
      <nav class="site-navigation text-right text-md-center" role="navigation">
        <div class="container">
   <FONT FACE="Arial Rounded MT Bold" >
          <ul class="site-menu js-clone-nav d-none d-md-block">
            <li><a href="../index.php">inicio</a></li>
            <li class="has-children active">
              <a href="#">informaci&oacuten</a>
             <ul class="dropdown">
                <li><a href="../proposito.php">Prop&oacutesito</a></li>
                <li><a href="../historia.php">Historia</a></li>
                <li><a href="../autorid.php">Autoridades</a></li>
              </ul>
            </li>
            <li class="has-children">
              <a href="#">alfarer&iacuteas</a>
            </li>
            <li class="has-children">
              <a href="#">Galer&iacutea</a>
              <ul class="dropdown">
                <li><a href="../decoracion.php">Decoraci&oacuten</a></li>
              </ul>
            </li>
            <li><a href="../compras/tienda.php">Tienda </a></li>
           
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li><a href="../loginres.php"><span class="icon icon-person"></span></a></li>
            
          </ul>
        </FONT>
        </div>
      </nav>
    </header>

     <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a class="col-me"href="../index.php">Inicio</a> <span class="mx-2 mb-0">/</span> <strong class="text-black1">Autoridades</strong></div>
        </div>
      </div>
    </div>  
<body>      
<br>
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12 pb-5">
                        <div class="table-responsive">


                            <table id="datatable-1" class="table table-datatable table-striped table-hover">

                            <thead>
                                <tr>
                                    <td>Usuario número</td>
                                    <td>Nombres</td>
                                    <td>Apellidos</td>
                                    <td>Usuario</td>
                                    <td>Contrase&ntildea</td>
                                    <td>Tel&eacutefono</td>
                                    <td>Direcci&oacuten</td>
                                    <td></td>
                                    
                                </tr>

                            </thead>
                            <tbody>

<?php
require_once("../clases/cls_usuario.php");
$obj_usu= new usuario();
$result=$obj_usu->consultar();
$datos= array();
?>

<?php
while($row= mysql_fetch_array($result))
{
?>
                                <tr>
                                    <td><?php echo($row['id_cli']); ?></td>
                                    <td><?php echo($row['nombre_cli']); ?></td>
                                    <td><?php echo($row['apellido_cli']); ?></td>
                                    <td><?php echo($row['usuario_cli']); ?></td>
                                    <td><?php echo($row['contrasenia_cli']); ?></td>
                                    <td><?php echo($row['telefono_cli']); ?></td>
                                    <td><?php echo($row['direccion_cli']); ?></td>
                                    <td>
                                        <a class="btn btn-warning btn-sm" href="formEditarUsuario.php?id_cli=<?php echo($row['id_cli']);?>" ><span class="glyphicon glyphicon-pencil"></span>Editar</a>
                                        

                                    </td>
                                </tr>
<?php	
}
?>
                            

                            </tbody>
                        </table>

                            

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<footer class="site-footer border-top">
      <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-5 mb-lg-0 ">
            <div class="row">
                 <div class="col-md-6 col-lg-6">
                          <form action="#" method="post">
                            <label for="email_subscribe" class="footer-heading">Comentario</label>
                <div class="form-group">
                  <input type="text" class="form-control py-4" id="email_subscribe" placeholder="Email">
                   <input type="text" class="form-control py-5" id="email_subscribe" placeholder="Comentario">
                  <input type="submit" class="btn btn-sm btn-primary" value="Enviar">
                </div>
              </form>
            </div>
               <div class="col-md-6 col-lg-6">
                <div class="block-5 mb-5">
                 <h3 class="footer-heading mb-4">Datos de Contácto</h3>
               <ul class="list-unstyled">
                <li class="address">E30 antes de la entrada al canton Pujili La Victoria, Barrio Centro, Calle Vicente Rocafuerte y Adolfo Jimenez</li>
                <li class="phone"><a href="tel://032224485">+3 268 263 9</a></li>
                <li class="email">lavictoria@gmail.com</li>
              </ul>
                
              </div>
            </div>

            </div>
          </div>
          <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
             <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.291737107317!2d-78.68970398572695!3d-0.9308921356031277!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91d48a5bcfaf886f%3A0xabdef50cc7b4c2f1!2sParroquia+Rural+La+victoria!5e0!3m2!1ses!2sec!4v1547433259292" width="450" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>

        </div>
         <div class="pie2">
          <br>
            <p>
            Copyright &copy;<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.write(new Date().getFullYear());</script> Jefferson Moreno  ! Edgar Silva by <a>UTC</a>
            </p>
          </div>       
      
      </div>
    </footer>
</body>
</html>    