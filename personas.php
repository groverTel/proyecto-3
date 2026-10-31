<?php
include('env.php');
include('/usr/share/php/adodb/adodb-errorpear.inc.php');
include('/usr/share/php/adodb/tohtml.inc.php');
include("/usr/share/php/adodb/adodb.inc.php");
require '/usr/share/php/Smarty/Smarty.class.php';

function trim_array($array) {
    if (is_array($array)) {
        foreach ($array as $key => $value) {
            $array[$key] = trim_array($value);
        }
    } else if (is_string($array)) {
        return trim($array);
    }
    return $array;
}


session_start();
if (!isset($_SESSION['nivel'])) {
    header("Location: pc_login.php");
    exit();
}

// Configurar el menú dinámicamente según el nivel de usuario
if ($_SESSION['nivel'] == 2) { // Propietario
    $menu = array(
        array('name' => 'Personas', 'url' => '/personas.php'),
        array('name' => 'Mensajes', 'url' => '/mensajes.php'),
        array('name' => 'Aniversarios', 'url' => '/aniversarios.php'),
        array('name' => 'Reporte', 'url' => '/reporte.php'),
        array('name' => 'Salir', 'url' => '/ps_logout.php')
    );
} else { // Amigo u otros
    $menu = array(
        array('name' => 'Personas', 'url' => '/personas.php'),
        array('name' => 'Mensajes', 'url' => '/mensajes.php'),
        array('name' => 'Salir', 'url' => '/ps_logout.php')
    );
}

$opcion = isset($_REQUEST['opcion']) ? $_REQUEST['opcion'] : 0;

switch($opcion)
{
    case 1: { // Mostrar formulario Nuevo
        if ($_SESSION['nivel'] == 2) { // Es el Propietario
            $smarty = new Smarty;
            $smarty->compile_check = true;
            $smarty->debugging = false;
            $smarty->assign("titulo","Agenda Personal - Nuevo Amigo");
            $smarty->assign("menu",$menu);
            $smarty->assign("path",$path);
            $smarty->assign("user",$_SESSION['usuario']);
            $smarty->assign("ps","personas.php");  
            $smarty->display('personas-nuevo.html');                   
        } else {
            echo "Acceso denegado.";
        }
    } break;  

    case 10: { // Procesar Nuevo
        $cod=$_POST['cod'];
        $nom=$_POST['nom'];
        $appm=$_POST['appm'];
        $prof=$_POST['prof'];
        $tel=$_POST['tel'];
        $cel=$_POST['cel'];
        $email=$_POST['email'];
        $dir=$_POST['dir'];
        $fnac=$_POST['fnac'];
        $lnac=$_POST['lnac'];
        $pass=$_POST['pass'];
        
        $db = ADONewConnection($dbdriver);
        $db->debug = false;
        $sqlper="INSERT INTO persona VALUES ('$cod', '$nom', '$appm','$prof', '$tel', '$cel', '$email', '$dir', '$fnac', '$lnac', true, now(), now() );";
        $sqlperm="INSERT INTO permiso VALUES ('$cod',1,'$pass','".date("Y-m-d")."','".date("Y-m-d",strtotime(date("Y-m-d")."+ 365 days"))."', true, now(),now());";
        
        $db->Connect($dbserver, $dbuser, $dbpassword, $dbname);
        $rs = $db->Execute($sqlper.'  '.$sqlperm);
        $content="<h1>La Operación se realizó con Éxito.</h1>";
        $db->Close();
        
        if (!$rs){
            $e = ADODB_Pear_Error();
            $p1=stripos($e->message, '[');
            $p2=stripos($e->message, ']');
            $msg_error=substr($e->message, $p1,$p2-$p1+1);
            $content="<h1>No se pudo realizar la Operación.</h1> <h4>".$msg_error."</h4>";
        }
        
        $smarty = new Smarty;
        $smarty->compile_check = true;
        $smarty->debugging = false;
        $smarty->assign("titulo","Resultado del Registro");
        $smarty->assign("menu",$menu);
        $smarty->assign("path",$path);
        $smarty->assign("user",$_SESSION['usuario']);
        $smarty->assign("body",$content);
        $smarty->display('bienvenido.html');      
    } break;

    case 2: { // Mostrar
        $cod = $_REQUEST['per_cod'];
        $db = ADONewConnection($dbdriver);
        $db->debug = false;
        $db->Connect($dbserver, $dbuser, $dbpassword, $dbname);
        $result = $db->Execute("SELECT * FROM persona WHERE per_cod='$cod';");
        $persona = trim_array($result->GetArray());
        $db->Close();

        if (count($persona) > 0) {
            $smarty = new Smarty;
            $smarty->compile_check = true;
            $smarty->debugging = false;
            $smarty->assign("titulo","Ver Detalles del Amigo");
            $smarty->assign("menu",$menu);
            $smarty->assign("path",$path);
            $smarty->assign("user",$_SESSION['usuario']);
            $smarty->assign("persona", $persona[0]);
            $smarty->display('personas-ver.html');
        } else {
            echo "Persona no encontrada.";
        }
    } break;

    case 3: { // Mostrar Formulario Editar
        $cod = $_REQUEST['per_cod'];
        
        // Validación de permisos
        if ($_SESSION['nivel'] == 1 && trim($cod) !== trim($_SESSION['ci'])) {
            echo "Acceso denegado. Solo puedes modificar tus propios datos.";
            exit();
        }

        $db = ADONewConnection($dbdriver);
        $db->debug = false;
        $db->Connect($dbserver, $dbuser, $dbpassword, $dbname);
        $result = $db->Execute("SELECT * FROM persona WHERE per_cod='$cod';");
        $persona = trim_array($result->GetArray());
        $db->Close();

        if (count($persona) > 0) {
            $smarty = new Smarty;
            $smarty->compile_check = true;
            $smarty->debugging = false;
            $smarty->assign("titulo","Modificar Amigo");
            $smarty->assign("menu",$menu);
            $smarty->assign("path",$path);
            $smarty->assign("user",$_SESSION['usuario']);
            $smarty->assign("ps","personas.php");
            $smarty->assign("persona", $persona[0]);
            $smarty->display('personas-modificar.html');
        } else {
            echo "Persona no encontrada.";
        }
    } break;

    case 30: { // Procesar Edición
        $cod=$_POST['cod'];
        
        // Validación de permisos
        if ($_SESSION['nivel'] == 1 && trim($cod) !== trim($_SESSION['ci'])) {
            echo "Acceso denegado. Solo puedes modificar tus propios datos.";
            exit();
        }

        $nom=$_POST['nom'];
        $appm=$_POST['appm'];
        $prof=$_POST['prof'];
        $tel=$_POST['tel'];
        $cel=$_POST['cel'];
        $email=$_POST['email'];
        $dir=$_POST['dir'];
        
        $db = ADONewConnection($dbdriver);
        $db->debug = false;
        $db->Connect($dbserver, $dbuser, $dbpassword, $dbname);
        
        $sqlper="UPDATE persona SET 
            per_nom='$nom', per_appm='$appm', per_prof='$prof', 
            per_telf='$tel', per_cel='$cel', per_email='$email', 
            per_dir='$dir', per_update=now() 
            WHERE per_cod='$cod';";
        
        $rs = $db->Execute($sqlper);
        
        // Manejo seguro y robusto de la subida de la foto
        $foto_mensaje = "";
        if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES['foto']['tmp_name'];
            $fileName = $_FILES['foto']['name'];
            $fileSize = $_FILES['foto']['size'];
            
            $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            $allowedfileExtensions = array('jpg', 'jpeg', 'png');
            
            if (in_array($fileExtension, $allowedfileExtensions)) {
                // Verificar que el archivo realmente sea una imagen
                $check = @getimagesize($fileTmpPath);
                if ($check !== false) {
                    $uploadFileDir = './fotos/';
                    if (!is_dir($uploadFileDir)) {
                        mkdir($uploadFileDir, 0777, true);
                    }
                    // Guardar como .jpg para que coincida con la plantilla de listado
                    $dest_path = $uploadFileDir . trim($cod) . '.jpg';
                    
                    if (move_uploaded_file($fileTmpPath, $dest_path)) {
                        $foto_mensaje = "Y la fotografía se subió correctamente.";
                    } else {
                        $foto_mensaje = "Pero hubo un error al mover la foto al directorio de destino. Verifica los permisos.";
                    }
                } else {
                    $foto_mensaje = "Pero el archivo subido no es una imagen válida.";
                }
            } else {
                $foto_mensaje = "Pero la foto no se subió porque la extensión no es válida. Usa JPG, JPEG o PNG.";
            }
        }
        
        $content = "<h1>Actualización completada</h1>";
        if ($rs) {
            $content .= "<p>Los datos se actualizaron con éxito. $foto_mensaje</p>";
        } else {
            $content .= "<p>Ocurrió un error en la base de datos al actualizar.</p>";
        }
        $db->Close();
        
        $smarty = new Smarty;
        $smarty->compile_check = true;
        $smarty->debugging = false;
        $smarty->assign("titulo","Resultado de Modificación");
        $smarty->assign("menu",$menu);
        $smarty->assign("path",$path);
        $smarty->assign("user",$_SESSION['usuario']);
        $smarty->assign("body",$content);
        $smarty->display('bienvenido.html');
    } break;

    case 4: { // Eliminar
        echo "Eliminar <br> Cod:".$_REQUEST['per_cod'];
    } break;            

    default: { // Listar
        $db = ADONewConnection($dbdriver);
        $db->debug = false;
        $db->Connect($dbserver, $dbuser, $dbpassword, $dbname);

        if ($_SESSION['nivel'] == 2) { // Es el Propietario
            $result = $db->Execute("SELECT * FROM persona;");
            $titulo2="Listado de Amigos";
        } else { // Es el Amigo
            $result = $db->Execute("SELECT * FROM persona WHERE per_cod='".$_SESSION['ci']."';");
            $titulo2="Listado de Amigos";
            $menu = array_filter($menu, function($item) {
                return !in_array($item['name'], ['Aniversarios', 'Reporte']);
            });
        }
        $amigos = trim_array($result->GetArray());
        $db->Close();
           
        $smarty = new Smarty;
        $smarty->compile_check = true;
        $smarty->debugging = false;
        $smarty->assign("titulo","Agenda Personal (tres capas)");
        $smarty->assign("menu",$menu);
        $smarty->assign("path",$path);
        $smarty->assign("user",$_SESSION['usuario']);
        $smarty->assign("titulo2",$titulo2);
        $smarty->assign("amigos",$amigos);
        $smarty->display('personas-listar.html');
    } break;
}   
?>
