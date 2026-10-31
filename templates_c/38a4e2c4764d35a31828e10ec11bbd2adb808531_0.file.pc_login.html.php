<?php
/* Smarty version 3.1.48, created on 2026-06-05 13:22:17
  from '/home/grupo13sc/practica5/axelmamani/templates/pc_login.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6a22cd89b57ce6_71720585',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '38a4e2c4764d35a31828e10ec11bbd2adb808531' => 
    array (
      0 => '/home/grupo13sc/practica5/axelmamani/templates/pc_login.html',
      1 => 1780665421,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a22cd89b57ce6_71720585 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10290757216a22cd89b562c5_68580121', "cuerpo");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.html");
}
/* {block "cuerpo"} */
class Block_10290757216a22cd89b562c5_68580121 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'cuerpo' => 
  array (
    0 => 'Block_10290757216a22cd89b562c5_68580121',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div style="max-width: 400px; margin: 0 auto; text-align: center; padding: 10px;">
    <h2><?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
</h2>
    <p style="color: var(--text-light); margin-bottom: 25px;">Ingresa tus credenciales para continuar</p>
    
    <form method="get" action="<?php echo $_smarty_tpl->tpl_vars['pslogin']->value;?>
">
        <div style="text-align: left; margin-bottom: 15px;">
            <label style="font-weight: 600; margin-bottom: 8px; display: block; color: var(--primary);">Usuario (C.I.):</label>
            <input name="user" type="text" required placeholder="Ej: 3924689">
        </div>
        
        <div style="text-align: left; margin-bottom: 25px;">
            <label style="font-weight: 600; margin-bottom: 8px; display: block; color: var(--primary);">Contraseña:</label>
            <input name="password" type="password" required placeholder="••••••••">
        </div>
        
        <div style="display: flex; justify-content: space-between; gap: 15px;">
            <input type="reset" name="Reset" value="Limpiar" style="flex: 1;">
            <input type="submit" name="Submit" value="Ingresar" style="flex: 1;">
        </div>
    </form>
</div>
<?php
}
}
/* {/block "cuerpo"} */
}
