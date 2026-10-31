<?php
/* Smarty version 3.1.48, created on 2026-06-05 13:26:09
  from '/home/grupo13sc/practica5/axelmamani/templates/personas-ver.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.48',
  'unifunc' => 'content_6a22ce719d7b22_48320642',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6f7c3ca0db20fcb413123e145b9f4c154c78438b' => 
    array (
      0 => '/home/grupo13sc/practica5/axelmamani/templates/personas-ver.html',
      1 => 1780665941,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6a22ce719d7b22_48320642 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19432920346a22ce719d2225_15168646', "usuario");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11156536536a22ce719d4817_14038497', "cuerpo");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layout.html");
}
/* {block "usuario"} */
class Block_19432920346a22ce719d2225_15168646 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'usuario' => 
  array (
    0 => 'Block_19432920346a22ce719d2225_15168646',
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
class Block_11156536536a22ce719d4817_14038497 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'cuerpo' => 
  array (
    0 => 'Block_11156536536a22ce719d4817_14038497',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div style="max-width: 600px; margin: 0 auto;">
    <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 2px solid var(--primary); padding-bottom: 15px; margin-bottom: 25px;">
        <h2 style="margin: 0;">Detalles de Amigo</h2>
        <a href="personas.php" class="btn" style="background: var(--text-light); padding: 8px 15px;">&larr; Volver</a>
    </div>

    <div style="text-align: center; margin-bottom: 30px;">
        <img src="fotos/<?php echo $_smarty_tpl->tpl_vars['persona']->value['per_cod'];?>
.jpg" onerror="this.src='fotos/default.png'" alt="Foto de Perfil" style="width: 150px; height: 150px; border-radius: 50%; object-fit: cover; border: 4px solid white; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
        <h3 style="margin-top: 15px; color: var(--text-dark); font-size: 1.5em;"><?php echo $_smarty_tpl->tpl_vars['persona']->value['per_nom'];?>
 <?php echo $_smarty_tpl->tpl_vars['persona']->value['per_appm'];?>
</h3>
        <p style="color: var(--primary); font-weight: 600;"><?php echo $_smarty_tpl->tpl_vars['persona']->value['per_prof'];?>
</p>
    </div>

    <table style="background: rgba(255,255,255,0.7); border-radius: 15px; margin-top: 0; box-shadow: none;">
        <tr>
            <td style="width: 40%; font-weight: 600; color: var(--text-dark);"><i class="fa-solid fa-id-card" style="color: var(--primary); width: 20px; margin-right: 8px;"></i> C.I.:</td>
            <td><?php echo $_smarty_tpl->tpl_vars['persona']->value['per_cod'];?>
</td>
        </tr>
        <tr>
            <td style="font-weight: 600; color: var(--text-dark);"><i class="fa-solid fa-phone" style="color: var(--primary); width: 20px; margin-right: 8px;"></i> Teléfono:</td>
            <td><?php echo $_smarty_tpl->tpl_vars['persona']->value['per_telf'];?>
</td>
        </tr>
        <tr>
            <td style="font-weight: 600; color: var(--text-dark);"><i class="fa-solid fa-mobile-screen-button" style="color: var(--primary); width: 20px; margin-right: 8px;"></i> Celular:</td>
            <td><?php echo $_smarty_tpl->tpl_vars['persona']->value['per_cel'];?>
</td>
        </tr>
        <tr>
            <td style="font-weight: 600; color: var(--text-dark);"><i class="fa-solid fa-envelope" style="color: var(--primary); width: 20px; margin-right: 8px;"></i> Correo Electrónico:</td>
            <td><?php echo $_smarty_tpl->tpl_vars['persona']->value['per_email'];?>
</td>
        </tr>
        <tr>
            <td style="font-weight: 600; color: var(--text-dark);"><i class="fa-solid fa-location-dot" style="color: var(--primary); width: 20px; margin-right: 8px;"></i> Dirección:</td>
            <td><?php echo $_smarty_tpl->tpl_vars['persona']->value['per_dir'];?>
</td>
        </tr>
        <tr>
            <td style="font-weight: 600; color: var(--text-dark);"><i class="fa-solid fa-cake-candles" style="color: var(--primary); width: 20px; margin-right: 8px;"></i> Fecha de Nacimiento:</td>
            <td><?php echo $_smarty_tpl->tpl_vars['persona']->value['per_fnac'];?>
</td>
        </tr>
        <tr>
            <td style="font-weight: 600; color: var(--text-dark);"><i class="fa-solid fa-earth-americas" style="color: var(--primary); width: 20px; margin-right: 8px;"></i> Lugar de Nacimiento:</td>
            <td><?php echo $_smarty_tpl->tpl_vars['persona']->value['per_lnac'];?>
</td>
        </tr>
    </table>
    
    <div style="text-align: center; margin-top: 30px;">
        <a href="personas.php?opcion=3&per_cod=<?php echo $_smarty_tpl->tpl_vars['persona']->value['per_cod'];?>
" class="btn" style="width: 100%;">Editar Perfil</a>
    </div>
</div>
<?php
}
}
/* {/block "cuerpo"} */
}
