<?php
/* Smarty version 3.1.31, created on 2017-04-10 23:14:41
  from "E:\xampp\htdocs\TOProjekt2\templates\zamowioneTowary.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_58ebf5c19a70d9_14553933',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5157a504537332d3efe79f25164f977c9d8d9a77' => 
    array (
      0 => 'E:\\xampp\\htdocs\\TOProjekt2\\templates\\zamowioneTowary.html.php',
      1 => 1491851245,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html.php' => 1,
    'file:footer.html.php' => 1,
  ),
),false)) {
function content_58ebf5c19a70d9_14553933 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div class="page-header">
	<h2>Lista Towarów</h2>
</div>
<table class="table">
  <thead>
    <tr>
      <th>Nazwa Towaru</th><th>Min Stan Magazynowy</th><th>Max Stan Magazynowy</th><th>Stawka Vat</th><th>Kategoria</th><th>Jednostka Miary</th><th>Status</th><th>Edytuj</th><th>Anuluj</th>
    </tr>
  </thead>
<?php if (isset($_smarty_tpl->tpl_vars['tablicaTowarow']->value)) {?>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tablicaTowarow']->value, 'towar');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['towar']->value) {
?>
  <tr>
    <td><?php echo $_smarty_tpl->tpl_vars['towar']->value['NazwaTowaru'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['towar']->value['MinStanMagazynowy'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['towar']->value['MaxStanMagazynowy'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['towar']->value['StawkaVat'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['towar']->value['IdKategoria'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['towar']->value['IdJednostkaMiary'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['towar']->value['Status'];?>
</td>
    <td><a href="" role="button">Edytuj</a></td>
    <td><a href="" role="button">Anuluj</a></td>
  </tr>
  <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

<?php }?>
</table>
<?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
<strong><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</strong>
<?php }?>

<?php $_smarty_tpl->_subTemplateRender("file:footer.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
