<?php
/* Smarty version 3.1.48, created on 2026-06-05 13:22:21
  from '/home/grupo13sc/practica5/axelmamani/templates/pc_menu.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6a22cd8d8426f4_10860501',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bc5f441f17cad4eec8117225f33773520cf3db3c' => 
    array (
      0 => '/home/grupo13sc/practica5/axelmamani/templates/pc_menu.html',
      1 => 1780665422,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a22cd8d8426f4_10860501 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_971805016a22cd8d840602_80197485', "usuario");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_667814416a22cd8d841f47_69954945', "cuerpo");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.html");
}
/* {block "usuario"} */
class Block_971805016a22cd8d840602_80197485 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'usuario' => 
  array (
    0 => 'Block_971805016a22cd8d840602_80197485',
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
class Block_667814416a22cd8d841f47_69954945 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'cuerpo' => 
  array (
    0 => 'Block_667814416a22cd8d841f47_69954945',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php echo $_smarty_tpl->tpl_vars['body']->value;?>

<?php
}
}
/* {/block "cuerpo"} */
}
