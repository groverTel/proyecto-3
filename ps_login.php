<?php 
  include('/usr/share/php/adodb/adodb.inc.php');
  include('env.php');
  $user=$_GET['user'];
  $password=$_GET['password'];
  
  $db = ADONewConnection($dbdriver); 
  $db->debug = false; 
  $db->Connect($dbserver, $dbuser, $dbpassword, $dbname); 
  $rs = $db->Execute("SELECT * FROM permiso WHERE per_cod='$user' AND perm_pass='$password';"); 
  $db->Close();
  
  if ($rs && $rs->RecordCount() > 0) {
      $perm = $rs->GetArray();
      
      $db = ADONewConnection($dbdriver);
      $db->debug = false;
      $db->Connect($dbserver, $dbuser, $dbpassword, $dbname);
      $rsUser = $db->Execute("SELECT * FROM persona WHERE per_cod='$user';");
      $datauser = $rsUser->GetArray();
      
      $rsGrup = $db->Execute("SELECT * FROM grupo WHERE grup_cod='".$perm[0]['grup_cod']."';");
      $datagrup = $rsGrup->GetArray();
      $db->Close();
      
      session_start();
      $_SESSION['nivel'] =$datagrup[0]['grup_cod'];
      $_SESSION['ci'] = trim($datauser[0]['per_cod']);
      $_SESSION['usuario'] = trim($datauser[0]['per_nom']).' '.trim($datauser[0]['per_appm']); 
      header ("Location: pc_menu.php");
  } else {
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
      $smarty->assign("body","<h1>No tiene Acceso al Sistema o Datos Incorrectos</h1>");
      $smarty->display('bienvenido.html'); 
  }     
?>
