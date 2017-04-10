<?php
/* Smarty version 3.1.31, created on 2017-04-10 23:11:59
  from "E:\xampp\htdocs\TOProjekt2\templates\indexKlient.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_58ebf51f526ab3_62870367',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c7cdae9814fa41b3c44e42218899e656d455cb06' => 
    array (
      0 => 'E:\\xampp\\htdocs\\TOProjekt2\\templates\\indexKlient.html.php',
      1 => 1491858418,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html.php' => 1,
    'file:footer.html.php' => 1,
  ),
),false)) {
function content_58ebf51f526ab3_62870367 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div class="page-header">
	<h2>Lista Klientów</h2>
</div>


<div class="container">
<h1>Dodaj Klienta</h1>
<!-- dyrektywa ng-app definiuje aplikację AngularJS -->
<!-- dyrektywa ng-controller określa kontroler dla tego elemntu HTML -->


<!-- formularz dodawania nowej kategorii -->
<form class="form" action="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Klient/insert" method="POST">
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
	<label for="NazwaFirmy">Nazwa firmy:</label>
	<input
					type="text"
					class="form-control"
					placeholder="Nazwa firmy"
					id="NazwaFirmy"
					name="NazwaFirmy"
					required>
</div>

<div class="form-group">
 <label for="NIP">NIP:</label>
 <input
				 type="number"
				 class="form-control"
				 placeholder="NIP"
				 id="NIP"
				 name="NIP"
				 required>
</div>

<div class="form-group">
 <label for="Miasto">Miasto:</label>
 <input
				 type="text"
				 class="form-control"
				 placeholder="Miasto"
				 id="Miasto"
				 name="Miasto"
				 required>
</div>

<div class="form-group">
 <label for="Ulica">Ulica:</label>
 <input
				 type="text"
				 class="form-control"
				 placeholder="Ulica"
				 id="Ulica"
				 name="Ulica"
				 required>
</div>

<div class="form-group">
 <label for="Dom">Nr domu:</label>
 <input
				 type="number"
				 class="form-control"
				 placeholder="Nr domu"
				 id="Dom"
				 name="Dom"
				 required>
</div>

<div class="form-group">
 <label for="Lokal">Nr lokalu:</label>
 <input
				 type="number"
				 class="form-control"
				 placeholder="Nr lokalu"
				 name="Lokal"
				 id="Lokal">
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
 <label for="Branza">Branza:</label>
 <input
				 type="text"
				 class="form-control"
				 placeholder="Branza"
				 name="Branza"
				 id="Branza"
				 required>
</div>
<div class="form-group">
 <label for="ProponowaneProdukty">Proponowane Produkty:</label>
 <input
				 type="text"
				 class="form-control"
				 placeholder="Olejki, sól, itd..."
				 name="ProponowaneProdukty"
				 id="ProponowaneProdukty"
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
		<th>Imie</th>
		<th>nazwisko</th>
		<th>NazwaFirmy</th>
		<th>NIP</th>
		<th>Miasto</th>
		<th>Ulica</th>
		<th>Dom</th>
		<th>Lokal</th>
		<th>KodPocztowy</th>
		<th>Poczta</th>
		<th>Email</th>
		<th>Branza</th>
		<th>ProponowaneProdukty<th>
  </tr>
  </thead>
  <tbody>
		<?php if (isset($_smarty_tpl->tpl_vars['tablicaKlient']->value)) {?>
		  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tablicaKlient']->value, 'klient');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['klient']->value) {
?>
				<tr>
					<td><?php echo $_smarty_tpl->tpl_vars['klient']->value['IdKlient'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['klient']->value['Imie'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['klient']->value['Nazwisko'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['klient']->value['NazwaFirmy'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['klient']->value['NIP'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['klient']->value['Miasto'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['klient']->value['Ulica'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['klient']->value['Dom'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['klient']->value['Lokal'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['klient']->value['KodPocztowy'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['klient']->value['Poczta'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['klient']->value['EMail'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['klient']->value['Branza'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['klient']->value['ProponowaneProdukty'];?>
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
