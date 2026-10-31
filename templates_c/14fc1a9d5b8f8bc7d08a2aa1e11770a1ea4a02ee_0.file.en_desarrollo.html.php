<?php
/* Smarty version 3.1.48, created on 2026-06-05 13:26:16
  from '/home/grupo13sc/practica5/axelmamani/templates/en_desarrollo.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6a22ce78511d94_60900468',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '14fc1a9d5b8f8bc7d08a2aa1e11770a1ea4a02ee' => 
    array (
      0 => '/home/grupo13sc/practica5/axelmamani/templates/en_desarrollo.html',
      1 => 1780665953,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a22ce78511d94_60900468 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19490875466a22ce785104d2_78679736', "cuerpo");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.html");
}
/* {block "cuerpo"} */
class Block_19490875466a22ce785104d2_78679736 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'cuerpo' => 
  array (
    0 => 'Block_19490875466a22ce785104d2_78679736',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div style="text-align: center; padding: 50px 20px;">
    <i class="fa-solid fa-person-digging" style="font-size: 3.5em; color: var(--primary); margin-bottom: 20px; display: block;"></i>
    <h2>Módulo en Desarrollo</h2>
    <p style="color: var(--text-light); font-size: 1.1em; max-width: 500px; margin: 0 auto 30px;">
        Esta sección de <b><?php echo $_smarty_tpl->tpl_vars['modulo']->value;?>
</b> está programada para la siguiente fase del proyecto. Por ahora concéntrate en probar la gestión de Personas y Fotografías.
    </p>
    <a href="pc_menu.php" class="btn">Volver al Inicio</a>
</div>
<?php
}
}
/* {/block "cuerpo"} */
}
