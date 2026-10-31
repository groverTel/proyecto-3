<?php
/* Smarty version 3.1.48, created on 2026-06-05 13:57:03
  from '/home/grupo13sc/practica5/axelmamani/templates/personas-nuevo.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6a22d5af9f0c22_92307505',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bcbe7183c0981169a42b0fbaeece774283e94f3c' => 
    array (
      0 => '/home/grupo13sc/practica5/axelmamani/templates/personas-nuevo.html',
      1 => 1780665424,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a22d5af9f0c22_92307505 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11939621136a22d5af9ee7b1_69534113', "usuario");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3258393966a22d5af9f0249_82603223', "cuerpo");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.html");
}
/* {block "usuario"} */
class Block_11939621136a22d5af9ee7b1_69534113 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'usuario' => 
  array (
    0 => 'Block_11939621136a22d5af9ee7b1_69534113',
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
class Block_3258393966a22d5af9f0249_82603223 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'cuerpo' => 
  array (
    0 => 'Block_3258393966a22d5af9f0249_82603223',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['ps']->value;?>
" enctype="multipart/form-data">
    <input type="hidden" name="opcion" value="10">
    <h2><?php echo $_smarty_tpl->tpl_vars['titulo']->value;?>
 - Nuevo Registro<br></h2>
    <table>
    <tr>
      <td><div align="left">C.I. :</div></td>
      <td><input type="text" name="cod" required></td>
    </tr>
    <tr>
      <td>Contraseña :</td>
      <td><input type="password" name="pass" required></td>
    </tr>
    <tr>
      <td>Nombre :</td>
      <td><input type="text" name="nom" required></td>
    </tr>
    <tr>
      <td>Apellidos :</td>
      <td><input type="text" name="appm" required></td>
    </tr>
    <tr>
      <td>Profesión :</td>
      <td><input type="text" name="prof" required></td>
    </tr>
    <tr>
      <td>Teléfono:</td>
      <td><input type="text" name="tel" required></td>
    </tr>
    <tr>
      <td>Celular :</td>
      <td><input type="text" name="cel" required></td>
    </tr>
    <tr>
      <td>E-Mail :</td>
      <td><input type="email" name="email" required></td>
    </tr>
    <tr>
      <td>Dirección :</td>
      <td><input type="text" name="dir" required></td>
    </tr>
    <tr>
      <td>Fecha Nac. :</td>
      <td><input type="date" name="fnac" required></td>
    </tr>
    <tr>
      <td>Lugar Nac. :</td>
      <td><input type="text" name="lnac" required></td>
    </tr>   
    <tr>
      <td colspan="2" align="center">
        <input type="submit" name="Submit" value="Registrar">
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
