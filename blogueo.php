<?php 

  $usuario = $_SESSION['MM_Username']; 
  $estado = false; 
  
 if(isset($_SESSION['MM_Username'])){ 
     $estado = true; 
 } 
 ?>