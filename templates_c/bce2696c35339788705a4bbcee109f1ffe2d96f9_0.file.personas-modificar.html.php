<?php
/* Smarty version 3.1.48, created on 2026-06-05 13:22:55
  from '/home/grupo13sc/practica5/axelmamani/templates/personas-modificar.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6a22cdaf89b9d2_52981160',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bce2696c35339788705a4bbcee109f1ffe2d96f9' => 
    array (
      0 => '/home/grupo13sc/practica5/axelmamani/templates/personas-modificar.html',
      1 => 1780665424,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a22cdaf89b9d2_52981160 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17957996556a22cdaf8967d0_32051035', "usuario");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11453523416a22cdaf8984b5_24524200', "cuerpo");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.html");
}
/* {block "usuario"} */
class Block_17957996556a22cdaf8967d0_32051035 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'usuario' => 
  array (
    0 => 'Block_17957996556a22cdaf8967d0_32051035',
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
class Block_11453523416a22cdaf8984b5_24524200 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'cuerpo' => 
  array (
    0 => 'Block_11453523416a22cdaf8984b5_24524200',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['ps']->value;?>
" enctype="multipart/form-data">
    <input type="hidden" name="opcion" value="30">
    <input type="hidden" name="cod" value="<?php echo $_smarty_tpl->tpl_vars['persona']->value['per_cod'];?>
">
    <h2>Modificar Amigo: <?php echo $_smarty_tpl->tpl_vars['persona']->value['per_nom'];?>
 <?php echo $_smarty_tpl->tpl_vars['persona']->value['per_appm'];?>
<br></h2>
    <table>
    <tr>
      <td><div align="left">C.I. :</div></td>
      <td><input type="text" value="<?php echo $_smarty_tpl->tpl_vars['persona']->value['per_cod'];?>
" disabled></td>
    </tr>
    <tr>
      <td>Nombre :</td>
      <td><input type="text" name="nom" value="<?php echo $_smarty_tpl->tpl_vars['persona']->value['per_nom'];?>
" required></td>
    </tr>
    <tr>
      <td>Apellidos :</td>
      <td><input type="text" name="appm" value="<?php echo $_smarty_tpl->tpl_vars['persona']->value['per_appm'];?>
" required></td>
    </tr>
    <tr>
      <td>Profesión :</td>
      <td><input type="text" name="prof" value="<?php echo $_smarty_tpl->tpl_vars['persona']->value['per_prof'];?>
" required></td>
    </tr>
    <tr>
      <td>Teléfono:</td>
      <td><input type="text" name="tel" value="<?php echo $_smarty_tpl->tpl_vars['persona']->value['per_telf'];?>
" required></td>
    </tr>
    <tr>
      <td>Celular :</td>
      <td><input type="text" name="cel" value="<?php echo $_smarty_tpl->tpl_vars['persona']->value['per_cel'];?>
" required></td>
    </tr>
    <tr>
      <td>E-Mail :</td>
      <td><input type="email" name="email" value="<?php echo $_smarty_tpl->tpl_vars['persona']->value['per_email'];?>
" required></td>
    </tr>
    <tr>
      <td>Dirección :</td>
      <td><input type="text" name="dir" value="<?php echo $_smarty_tpl->tpl_vars['persona']->value['per_dir'];?>
" required></td>
    </tr>
    <tr>
      <td>Fotografía (Opcional) :</td>
      <td>
        <img src="fotos/<?php echo $_smarty_tpl->tpl_vars['persona']->value['per_cod'];?>
.jpg" width="100" onerror="this.src='fotos/default.png'" alt="Foto Actual"><br>
        <input type="file" name="foto" accept="image/jpeg, image/png">
        <small>Sube una nueva foto para reemplazar la actual.</small>
      </td>
    </tr>
    <tr>
      <td colspan="2" align="center">
        <input type="submit" name="Submit" value="Actualizar Datos">
      </td>
    </tr>
    </table>
</form>
<br>

<?php
}
}
/* {/block "cuerpo"} */
}
