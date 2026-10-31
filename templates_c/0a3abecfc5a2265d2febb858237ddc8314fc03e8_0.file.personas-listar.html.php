<?php
/* Smarty version 3.1.48, created on 2026-06-05 13:22:46
  from '/home/grupo13sc/practica5/axelmamani/templates/personas-listar.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6a22cda6715dd2_72491818',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0a3abecfc5a2265d2febb858237ddc8314fc03e8' => 
    array (
      0 => '/home/grupo13sc/practica5/axelmamani/templates/personas-listar.html',
      1 => 1780665422,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a22cda6715dd2_72491818 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10686111386a22cda670af49_44101447', "usuario");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4501369056a22cda670c8e5_98279647', "cuerpo");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.html");
}
/* {block "usuario"} */
class Block_10686111386a22cda670af49_44101447 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'usuario' => 
  array (
    0 => 'Block_10686111386a22cda670af49_44101447',
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
class Block_4501369056a22cda670c8e5_98279647 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'cuerpo' => 
  array (
    0 => 'Block_4501369056a22cda670c8e5_98279647',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

 <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
     <h2 style="margin: 0;"><?php echo $_smarty_tpl->tpl_vars['titulo2']->value;?>
</h2>
     <?php if ($_SESSION['nivel'] == 2) {?>
     <a href="personas.php?opcion=1" class="btn" style="text-decoration: none;">+ Nuevo Amigo</a>
     <?php }?>
 </div>
 
 <div style="overflow-x: auto;">
     <table>
      <tr>
        <th style="text-align: center;">Foto</th>
        <th>C.I.</th>
        <th>Nombres Completo</th>
        <th>Teléfono</th>
        <?php if ($_SESSION['nivel'] == 2) {?>
        <th colspan="3" style="text-align: center;">Acciones</th>
        <?php } else { ?>
        <th colspan="2" style="text-align: center;">Acciones</th>
        <?php }?>
      </tr>
      <?php
$__section_pos_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['amigos']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_pos_0_total = $__section_pos_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_pos'] = new Smarty_Variable(array());
if ($__section_pos_0_total !== 0) {
for ($__section_pos_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_pos']->value['index'] = 0; $__section_pos_0_iteration <= $__section_pos_0_total; $__section_pos_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_pos']->value['index']++){
?>
      <tr>
        <td align="center">
            <img src="fotos/<?php echo $_smarty_tpl->tpl_vars['amigos']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_pos']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_pos']->value['index'] : null)]['per_cod'];?>
.jpg" class="avatar" width="45" height="45" onerror="this.src='fotos/default.png'" alt="Foto">
        </td>
        <td style="font-weight: 600;"><?php echo $_smarty_tpl->tpl_vars['amigos']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_pos']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_pos']->value['index'] : null)]['per_cod'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['amigos']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_pos']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_pos']->value['index'] : null)]['per_appm'];?>
 <?php echo $_smarty_tpl->tpl_vars['amigos']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_pos']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_pos']->value['index'] : null)]['per_nom'];?>
</td>    
        <td><?php echo $_smarty_tpl->tpl_vars['amigos']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_pos']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_pos']->value['index'] : null)]['per_telf'];?>
</td>    
        <td align="center"><a class="action-link" href="personas.php?opcion=2&per_cod=<?php echo $_smarty_tpl->tpl_vars['amigos']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_pos']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_pos']->value['index'] : null)]['per_cod'];?>
">Ver</a></td>
        <td align="center"><a class="action-link" href="personas.php?opcion=3&per_cod=<?php echo $_smarty_tpl->tpl_vars['amigos']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_pos']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_pos']->value['index'] : null)]['per_cod'];?>
">Editar</a></td>
        <?php if ($_SESSION['nivel'] == 2) {?>
        <td align="center"><a class="action-link" style="color: #ef233c;" href="personas.php?opcion=4&per_cod=<?php echo $_smarty_tpl->tpl_vars['amigos']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_pos']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_pos']->value['index'] : null)]['per_cod'];?>
">Eliminar</a></td>
        <?php }?>
      </tr>
      <?php
}
}
?>
    </table>
</div>
<?php
}
}
/* {/block "cuerpo"} */
}
