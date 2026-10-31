<?php
/* Smarty version 3.1.48, created on 2026-06-05 13:22:14
  from '/home/grupo13sc/practica5/axelmamani/templates/bienvenido.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6a22cd86cfde90_02585394',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b88c7a4a6e1e2ca890d2a32a651f3e7a32e719c7' => 
    array (
      0 => '/home/grupo13sc/practica5/axelmamani/templates/bienvenido.html',
      1 => 1780665418,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a22cd86cfde90_02585394 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13946610626a22cd86cfc487_41616719', "cuerpo");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.html");
}
/* {block "cuerpo"} */
class Block_13946610626a22cd86cfc487_41616719 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'cuerpo' => 
  array (
    0 => 'Block_13946610626a22cd86cfc487_41616719',
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
