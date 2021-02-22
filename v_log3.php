<?php require_once('Connections/cone.php');
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);
  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
if (!isset($_SESSION)) {
  session_start();
}

if (isset($_POST['txt_usuario'])) {
  $loginUsername=$_POST['txt_usuario'];
  $password=$_POST['txt_clave'];
  $MM_redirectLoginSuccess = "compras/cart.php?usuario_cli=$loginUsername";
  $MM_redirectLoginFailed = "loginres2.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_cone, $cone);
 
  $LoginRS__query=sprintf("SELECT id_cli, usuario_cli, contrasenia_cli FROM cliente WHERE BINARY usuario_cli=%s AND BINARY contrasenia_cli=%s ",
  GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text"),GetSQLValueString($nivel, "text"));    
  $LoginRS = mysql_query($LoginRS__query, $cone) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  $row=mysql_fetch_assoc($LoginRS);
  if ($loginFoundUser) {
    
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      
    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>