<?php  
   include('env.php');
   require '/usr/share/php/Smarty/Smarty.class.php';
   $smarty = new Smarty; 
   $smarty->compile_check = true;
   $smarty->debugging = false;
   $smarty->assign("titulo","Agenda Personal (tres capas)");  
   //Menu
   $menu=array(
               array('name'=>'Ingreso','url'=>'/pc_login.php'));
   $smarty->assign("menu",$menu);
   $smarty->assign("path",$path);
   //Contenido
   $smarty->assign("body","<h1>Agenda Personal<BR>INF513-SA</h1>");
   $smarty->display('bienvenido.html');
?>
