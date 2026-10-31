<?php
include('env.php');
require '/usr/share/php/Smarty/Smarty.class.php';

session_start();
if (!isset($_SESSION['nivel'])) {
    header("Location: pc_login.php");
    exit();
}

$smarty = new Smarty;
$smarty->compile_check = true;
$smarty->debugging = false;

// Configurar el título
$smarty->assign("titulo", "Agenda Personal - Reporte");
$smarty->assign("path", $path);
$smarty->assign("user", $_SESSION['usuario']);

// Configurar el menú
$menu = array(
    array('name' => 'Personas', 'url' => '/personas.php'),
    array('name' => 'Mensajes', 'url' => '/mensajes.php'),
    array('name' => 'Aniversarios', 'url' => '/aniversarios.php'),
    array('name' => 'Reporte', 'url' => '/reporte.php'),
    array('name' => 'Salir', 'url' => '/ps_logout.php')
);
$smarty->assign("menu", $menu);

$smarty->display('reporte.html');
?>
