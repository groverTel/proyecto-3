<?php
/* Smarty version 3.1.48, created on 2026-06-05 13:22:27
  from '/home/grupo13sc/practica5/axelmamani/templates/reporte.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6a22cd93734ef9_33143565',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7ae499bbe5f717fac9a08409f982aa3cab1f07c0' => 
    array (
      0 => '/home/grupo13sc/practica5/axelmamani/templates/reporte.html',
      1 => 1780665425,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a22cd93734ef9_33143565 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_21405073496a22cd93732b96_32811376', "usuario");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15396942436a22cd93734628_78610821', "cuerpo");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.html");
}
/* {block "usuario"} */
class Block_21405073496a22cd93732b96_32811376 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'usuario' => 
  array (
    0 => 'Block_21405073496a22cd93732b96_32811376',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php echo $_smarty_tpl->tpl_vars['user']->value;?>

<?php
}
}
/* {/block "usuario"} */
/* {block "cuerpo"} */
class Block_15396942436a22cd93734628_78610821 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'cuerpo' => 
  array (
    0 => 'Block_15396942436a22cd93734628_78610821',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div style="padding: 20px; line-height: 1.6;">
    <h2 style="border-bottom: 2px solid var(--primary); padding-bottom: 10px; margin-bottom: 20px;">
        Reporte: Caso de Uso Modificar Amigos (Práctica U4-4 SC)
    </h2>
    
    <h3 style="color: var(--secondary); margin-top: 25px; margin-bottom: 10px;">Introducción</h3>
    <p style="margin-bottom: 15px;">
        El desarrollo de aplicaciones web estructurado bajo la arquitectura de tres capas (Presentación, Negocio y Datos) proporciona una clara separación de responsabilidades, facilitando el mantenimiento y la escalabilidad del sistema. En esta <strong>Práctica U4-4 SC</strong>, se ha consolidado el caso de uso <strong>"Modificar Amigos"</strong> dentro del sistema de menú dinámico <strong>MENU3C</strong>, incorporando subida segura de imágenes y garantizando que los menús se mantengan consistentes de acuerdo a los roles de los usuarios autenticados.
    </p>

    <h3 style="color: var(--secondary); margin-top: 25px; margin-bottom: 15px;">Implementación Realizada</h3>
    
    <div style="background: rgba(255,255,255,0.5); padding: 15px; border-radius: 10px; margin-bottom: 15px;">
        <h4 style="color: var(--primary); margin-bottom: 5px;">1. Capa de Presentación (Plantillas Smarty)</h4>
        <ul style="margin-left: 20px; color: var(--text-dark);">
            <li style="margin-bottom: 5px;"><strong><code>personas-modificar.html</code></strong>: Se estructuró un formulario HTML que contiene los campos requeridos (nombre, apellidos, profesión, teléfono, celular, correo electrónico, dirección y fotografía de perfil) utilizando el atributo <code>enctype="multipart/form-data"</code> para la transferencia de archivos al servidor. El campo de C.I. se mantiene de solo lectura para preservar la integridad referencial.</li>
            <li style="margin-bottom: 5px;"><strong><code>personas-listar.html</code></strong>: Se modificó el listado para renderizar la columna "Foto" mostrando el avatar correspondiente de cada amigo. Se añadió un fallback por defecto (<code>onerror</code>) que apunta a <code>fotos/default.png</code> si no hay foto cargada, evitando enlaces rotos.</li>
            <li><strong>Visualización Dinámica</strong>: Se ajustaron las acciones visibles de la tabla según el nivel de privilegios. Los amigos regulares (<code>nivel == 1</code>) no pueden ver la opción de "Eliminar", que queda reservada únicamente para el propietario.</li>
        </ul>
    </div>

    <div style="background: rgba(255,255,255,0.5); padding: 15px; border-radius: 10px; margin-bottom: 15px;">
        <h4 style="color: var(--primary); margin-bottom: 5px;">2. Capa de Negocio (Controlador PHP - <code>personas.php</code>)</h4>
        <ul style="margin-left: 20px; color: var(--text-dark);">
            <li style="margin-bottom: 5px;"><strong>Consistencia del Menú</strong>: Se refactorizó la inicialización del menú al inicio del script según el nivel de sesión (<code>$_SESSION['nivel']</code>). De esta forma, el menú lateral no desaparece ni se encoje al entrar a los formularios de visualización o edición, resolviendo problemas de usabilidad presentes en la versión anterior.</li>
            <li style="margin-bottom: 5px;"><strong>Validación de Archivos (Subida Segura de Fotografía)</strong>:
                <ul style="margin-left: 20px; margin-top: 5px;">
                    <li>Se implementó la verificación de extensión de archivos (restringido a <code>.jpg</code>, <code>.jpeg</code>, <code>.png</code>).</li>
                    <li>Se incorporó la función nativa <code>getimagesize()</code> para validar que el contenido subido sea realmente una estructura de imagen legítima, previniendo ciberataques por inyección de scripts PHP maliciosos a través de extensiones falsas.</li>
                    <li>Se implementó la creación automática de la carpeta <code>./fotos/</code> con permisos de lectura/escritura (<code>0777</code>).</li>
                    <li>Se estandarizó el guardado del archivo bajo el formato <code>[per_cod].jpg</code> haciendo un recorte de espacios en blanco (<code>trim</code>) para solucionar los problemas del padding de tipo <code>CHAR</code> de PostgreSQL.</li>
                </ul>
            </li>
            <li><strong>Control de Acceso y Permisos</strong>: Se agregaron guardias de seguridad en las secciones de edición (<code>case 3</code> y <code>case 30</code>). Si un Amigo común intenta alterar el C.I. de otro contacto a través de la URL o la solicitud HTTP, el sistema denegará la petición inmediatamente.</li>
        </ul>
    </div>

    <div style="background: rgba(255,255,255,0.5); padding: 15px; border-radius: 10px; margin-bottom: 25px;">
        <h4 style="color: var(--primary); margin-bottom: 5px;">3. Capa de Datos (ADOdb y PostgreSQL)</h4>
        <ul style="margin-left: 20px; color: var(--text-dark);">
            <li style="margin-bottom: 5px;">El controlador en la capa de negocio interactúa con PostgreSQL mediante la capa de abstracción <strong>ADOdb</strong>. Se ejecuta la sentencia preparada de actualización <code>UPDATE persona SET ... WHERE per_cod = ...</code> de manera limpia.</li>
            <li>Se aplicó una función recursiva de limpieza de datos en PHP (<code>trim_array</code>) para eliminar los espacios redundantes (padding) generados por el tipo de columna estricto <code>CHAR(150)</code> de la base de datos antes de mandar los datos a Smarty.</li>
        </ul>
    </div>

    <h3 style="color: var(--secondary); margin-bottom: 10px; border-bottom: 1px solid rgba(0,0,0,0.1); padding-bottom: 10px;">Conclusión</h3>
    <p style="font-weight: 500; font-style: italic; background: rgba(67, 97, 238, 0.1); padding: 15px; border-left: 4px solid var(--primary); border-radius: 0 10px 10px 0;">
        La separación en tres capas ha demostrado ser muy efectiva al momento de extender la funcionalidad de la Agenda. Se pudo agregar la visualización y edición de fotografías (modificando la capa de presentación y la lógica de negocio en PHP) sin alterar la capa de datos de forma drástica. El uso de Smarty y ADOdb abstrae la complejidad de la inyección de HTML desde PHP y la redacción de código SQL rígido, respectivamente. La manipulación de archivos y directorios con permisos adecuados es crucial para el buen funcionamiento de la subida de fotografías. Asimismo, aplicar validaciones del lado del servidor (como <code>getimagesize</code> y restricción de modificación por sesión) y proveer interfaces con fallbacks de recursos (como la imagen por defecto <code>default.png</code> y menús estáticos robustos) convierten a la aplicación en un entorno seguro y profesional adecuado para implementarse en plataformas de producción.
    </p>
</div>
<?php
}
}
/* {/block "cuerpo"} */
}
