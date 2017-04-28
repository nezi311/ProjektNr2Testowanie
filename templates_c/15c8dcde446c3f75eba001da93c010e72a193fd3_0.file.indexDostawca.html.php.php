<?php
/* Smarty version 3.1.31, created on 2017-04-28 12:18:03
  from "/opt/lampp/htdocs/TOProjekt2/templates/indexDostawca.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_590316db0d5c30_65427533',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '15c8dcde446c3f75eba001da93c010e72a193fd3' => 
    array (
      0 => '/opt/lampp/htdocs/TOProjekt2/templates/indexDostawca.html.php',
      1 => 1491917737,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html.php' => 1,
    'file:footer.html.php' => 1,
  ),
),false)) {
function content_590316db0d5c30_65427533 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div class="page-header">
	<h2>Lista Dostawców</h2>
</div>


<div class="container">
<h1>Dodaj Dostawcea</h1>
<!-- dyrektywa ng-app definiuje aplikację AngularJS -->
<!-- dyrektywa ng-controller określa kontroler dla tego elemntu HTML -->


<!-- formularz dodawania nowej kategorii -->
<form class="form" action="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Dostawca/insert" method="POST">
	<div class="form-group">
	    <label for="pelnanazwa">Pełna nazwa:</label>
	    <input
	           type="text"
	           class="form-control"
	           placeholder="Pełna nazwa"
						 id="pelnanazwa"
						 name="pelnanazwa"
	           required>
	</div>

<div class="form-group">
    <label for="imie">Imie:</label>
    <input
           type="text"
           class="form-control"
           placeholder="Imie"
					 id="imie"
					 name="imie"
           required>
</div>

  <div class="form-group">
    <label for="nazwisko">Nazwisko:</label>
		<input
           type="text"
           class="form-control"
           placeholder="Nazwisko"
					 id="nazwisko"
					 name="nazwisko"
           required>
 </div>

 <div class="form-group">
	<label for="Telefon1">Telefon1 :</label>
	<input
					type="number"
					class="form-control"
					placeholder="Telefon"
					id="Telefon1"
					name="Telefon1"
					required>
</div>



<div class="form-group">
 <label for="Adres">Adres:</label>
 <input
				 type="text"
				 class="form-control"
				 placeholder="Adres"
				 id="Adres"
				 name="Adres"
				 required>
</div>

<div class="form-group">
 <label for="KodPocztowy">Kod Pocztowy:</label>
 <input
				 type="text"

				 class="form-control"
				 placeholder="62-800"
				 name="KodPocztowy"
				 id="KodPocztowy"
				 required>
</div>
<div class="form-group">
 <label for="Poczta">Poczta:</label>
 <input
				 type="text"
				 class="form-control"
				 placeholder="Poczta"
				 name="Poczta"
				 id="Poczta"
				 required>
</div>
<div class="form-group">
 <label for="Email">Email:</label>
 <input
				 type="text"
				 class="form-control"
				 placeholder="firma@firma.com"
				 name="Email"
				 id="Email"
				 required>
</div>

<div class="form-group">
    <span class="form-group-btn">
    <button type="submit" class="btn btn-success"  >Dodaj</button>
    </span>
</div>
</form>

<!-- tabela z kategoriami -->
<!-- dyrektywa ng-init inicjalizuje tabele -->
<table class="table table-striped">
  <thead>
  <tr>
		<th>Id</th>
		<th>Pełna nazwa</th>
		<th>Imie</th>
		<th>nazwisko</th>
		<th>Telefon</th>
		<th>Email</th>
		<th>Adres</th>
		<th>KodPocztowy</th>
		<th>Poczta</th>

  </tr>
  </thead>
  <tbody>
		<?php if (isset($_smarty_tpl->tpl_vars['tablicaDostawca']->value)) {?>
		  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tablicaDostawca']->value, 'dostawca');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['dostawca']->value) {
?>
				<tr>
					<td><?php echo $_smarty_tpl->tpl_vars['dostawca']->value['IdDostawca'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['dostawca']->value['NazwaPelna'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['dostawca']->value['Imie'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['dostawca']->value['Nazwisko'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['dostawca']->value['Telefon1'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['dostawca']->value['Email'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['dostawca']->value['Adres'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['dostawca']->value['KodPocztowy'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['dostawca']->value['Poczta'];?>
</td>
				</tr>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

		<?php }?>
  </tbody>
</table>




</div>


<?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
<strong><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</strong>
<?php }?>

<?php $_smarty_tpl->_subTemplateRender("file:footer.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
