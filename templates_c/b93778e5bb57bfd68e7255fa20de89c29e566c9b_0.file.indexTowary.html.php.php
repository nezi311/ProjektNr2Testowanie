<?php
/* Smarty version 3.1.31, created on 2017-04-28 13:46:43
  from "/opt/lampp/htdocs/TOProjekt2/templates/indexTowary.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_59032ba3782cd1_89836358',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b93778e5bb57bfd68e7255fa20de89c29e566c9b' => 
    array (
      0 => '/opt/lampp/htdocs/TOProjekt2/templates/indexTowary.html.php',
      1 => 1493379435,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html.php' => 1,
    'file:footer.html.php' => 1,
  ),
),false)) {
function content_59032ba3782cd1_89836358 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div class="page-header">
	<h2>Lista Towarów</h2>
</div>


<form class="form" action="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Towar/insert" method="POST">
	<div class="form-group">
	    <label for="Nazwa">Nazwa:</label>
	    <input
	           type="text"
	           class="form-control"
	           placeholder="Pełna"
						 id="Nazwa"
						 name="Nazwa"
	           required>
	</div>
	<div class="form-group">
			<label for="Kategorietowar">Rodzaj towaru:</label>
			<select name="Kategorietowar" class="form-control">
			 <?php if (isset($_smarty_tpl->tpl_vars['tablicaKategoriaProdukt']->value)) {?>
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tablicaKategoriaProdukt']->value, 'kategoria');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['kategoria']->value) {
?>
				<option value="<?php echo $_smarty_tpl->tpl_vars['kategoria']->value['IdRodzaj'];?>
"><?php echo $_smarty_tpl->tpl_vars['kategoria']->value['Nazwa'];?>
</option>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

			 <?php }?>
			<select>
	</div>
	<div class="form-group">
			<label for="Opakowanie">Opakowanie:</label>
			<input
	           type="text"
	           class="form-control"
	           placeholder="Opakowanie"
						 id="Opakowanie"
						 name="Opakowanie"
	           required>
	</div>
<div class="form-group">
    <span class="form-group-btn">
    <button type="submit" class="btn btn-success">Dodaj</button>
    </span>
</div>
</form>



<table class="table">
  <thead>
    <tr>
      <th>Nazwa Towaru</th>
			<th>Stan Magazynowy</th>
			<th>Rodzaj Towaru</th>
			<th>Opakowanie</th>
			<th>Edytuj</th>
			<th>usun</th>
    </tr>
  </thead>
<?php if (isset($_smarty_tpl->tpl_vars['tablicaTowarow']->value)) {?>
  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tablicaTowarow']->value, 'towar');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['towar']->value) {
?>
  <tr>
		<td><?php echo $_smarty_tpl->tpl_vars['towar']->value['IdTowar'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['towar']->value['NazwaTowaru'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['towar']->value['RodzajTowaru'];?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['towar']->value['Opakowanie'];?>
</td>
    <td><a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Pracownicy/edit/<?php echo $_smarty_tpl->tpl_vars['pracownik']->value['id'];?>
" role="button">Edytuj</a></td>
    <td><a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Pracownicy/passReset/<?php echo $_smarty_tpl->tpl_vars['pracownik']->value['id'];?>
" role="button">Usuń</a></td>
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
