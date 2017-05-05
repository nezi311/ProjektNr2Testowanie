<?php
/* Smarty version 3.1.31, created on 2017-05-05 09:07:59
  from "/opt/lampp/htdocs/TOProjekt2/templates/indexKlient.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_590c24cf2c2ad2_98393047',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '05bc0791c95be2f42edd89c51849e8b07a541f70' => 
    array (
      0 => '/opt/lampp/htdocs/TOProjekt2/templates/indexKlient.html.php',
      1 => 1493967654,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html.php' => 1,
    'file:footer.html.php' => 1,
  ),
),false)) {
function content_590c24cf2c2ad2_98393047 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div class="page-header">
	<h2>Lista Klientów</h2>
</div>


<div class="container">
<h1>Dodaj Klienta</h1>

<?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
<strong><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</strong>
<?php }?>
<!-- dyrektywa ng-app definiuje aplikację AngularJS -->
<!-- dyrektywa ng-controller określa kontroler dla tego elemntu HTML -->


<!-- formularz dodawania nowej kategorii -->
<form class="form" action="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Klient/insert" method="POST">
<div class="form-group">
    <label for="OsobaKontaktowa">OsobaKontaktowa:</label>
    <input
           type="text"
           class="form-control"
           placeholder="OsobaKontaktowa"
					 id="OsobaKontaktowa"
					 name="OsobaKontaktowa"
           required>
</div>

  <div class="form-group">
    <label for="Telefon">Telefon:</label>
		<input
           type="number"
           class="form-control"
           placeholder="Telefon"
					 id="Telefon"
					 name="Telefon"
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
 <label for="KategorieKlientow">KategorieKlientow:</label>
 <select name="KategorieKlientow" class="form-control">
	 <?php if (isset($_smarty_tpl->tpl_vars['tablicaKategoriaKlient']->value)) {?>
	 	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tablicaKategoriaKlient']->value, 'kategoria');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['kategoria']->value) {
?>
		<option value="<?php echo $_smarty_tpl->tpl_vars['kategoria']->value['idKategoria'];?>
"><?php echo $_smarty_tpl->tpl_vars['kategoria']->value['Nazwa'];?>
</option>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

	 <?php }?>
 <select>
<div class="form-group">
 <label for="ProponowaneProdukty">Proponowane Produkty:</label>
 <select name="ProponowaneProdukty[]" id="ProponowaneProdukty[]" class="form-control" multiple="multiple">
	 <option value="Susze">Susze</option>
	 <option value="Oleje">Oleje</option>
	 <option value="Oleoreznyny">Oleoreznyny</option>
 </select>

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
		<th>Osoba kontaktowa</th>
		<th>Telefon</th>
		<th>NazwaFirmy</th>
		<th>NIP</th>
		<th>Adres</th>
		<th>Email</th>
		<th>Kategoria klienta</th>
		<th>ProponowaneProdukty</th>
		<th>Edytuj</th>
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
					<td><?php echo $_smarty_tpl->tpl_vars['klient']->value['OsobaKontaktowa'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['klient']->value['Telefon'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['klient']->value['NazwaFirmy'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['klient']->value['NIP'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['klient']->value['Adres'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['klient']->value['EMail'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['klient']->value['NazwaKategoriKlienta'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['klient']->value['ProponowaneProdukty'];?>
</td>
						<td>
							<div class="btn-group" role="group">
								<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal<?php echo $_smarty_tpl->tpl_vars['klient']->value['IdKlient'];?>
">Edytuj</button>
			        </div>

							<div id="myModal<?php echo $_smarty_tpl->tpl_vars['klient']->value['IdKlient'];?>
" class="modal fade" role="dialog">
								<div class="modal-dialog">

									<!-- Modal content-->
									<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title">Edycja</h4>
										</div>
										<div class="modal-body">
											<form action="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Klient/update" method="POST" method="POST">
												<div class="form-group">

													<div class="form-group" style="display:none;">
													    <label for="id">Id:</label>
													    <input
													           type="text"
													           class="form-control"
													           placeholder="Imie"
																		 id="id"
																		 name="id"
													           required
																		 readonly="readonly"
																		 value="<?php echo $_smarty_tpl->tpl_vars['klient']->value['IdKlient'];?>
"
																		 >
													</div>
													<div class="form-group" style="display:none;">
													<label for="OsobaKontaktowa">OsobaKontaktowa:</label>
											    <input
																 value="<?php echo $_smarty_tpl->tpl_vars['klient']->value['OsobaKontaktowa'];?>
"
											           type="text"
											           class="form-control"
											           placeholder="OsobaKontaktowa"
																 id="OsobaKontaktowa"
																 name="OsobaKontaktowa"
											           required>
											</div>
											  <div class="form-group">
											    <label for="Telefon">Telefon:</label>
													<input
											           type="number"
											           class="form-control"
											           placeholder="Telefon"
																 id="Telefon"
																 name="Telefon"
											           required
																 value="<?php echo $_smarty_tpl->tpl_vars['klient']->value['Telefon'];?>
"
																 >
											 </div>
											 <div class="form-group">
												<label for="NazwaFirmy">Nazwa firmy:</label>
												<input
																type="text"
																class="form-control"
																placeholder="Nazwa firmy"
																id="NazwaFirmy"
																name="NazwaFirmy"
																required
																value="<?php echo $_smarty_tpl->tpl_vars['klient']->value['NazwaFirmy'];?>
"
																>

											</div>

											<div class="form-group">
											 <label for="NIP">NIP:</label>
											 <input
															 type="number"
															 class="form-control"
															 placeholder="NIP"
															 id="NIP"
															 name="NIP"
															 required
															 value="<?php echo $_smarty_tpl->tpl_vars['klient']->value['NIP'];?>
"
															 >
											</div>
											<div class="form-group">
											 <label for="Adres">Adres:</label>
											 <input
															 type="text"
															 class="form-control"
															 placeholder="Adres"
															 id="Adres"
															 name="Adres"
															 required
															 value="<?php echo $_smarty_tpl->tpl_vars['klient']->value['Adres'];?>
"
															 >
											</div>
											<div class="form-group">
											 <label for="Email">Email:</label>
											 <input
															 type="text"
															 class="form-control"
															 placeholder="firma@firma.com"
															 name="Email"
															 id="Email"
															 required
															 value="<?php echo $_smarty_tpl->tpl_vars['klient']->value['EMail'];?>
"
															 >
											</div>
											<div class="form-group">
											 <label for="KategorieKlientow">KategorieKlientow:</label>
											 <select name="KategorieKlientow" class="form-control">
												 <?php if (isset($_smarty_tpl->tpl_vars['tablicaKategoriaKlient']->value)) {?>
												 	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tablicaKategoriaKlient']->value, 'kategoria');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['kategoria']->value) {
?>
														<?php if ($_smarty_tpl->tpl_vars['klient']->value['KategorieKlientow']) {?>
															<option value="<?php echo $_smarty_tpl->tpl_vars['kategoria']->value['idKategoria'];?>
" selected="selected"><?php echo $_smarty_tpl->tpl_vars['kategoria']->value['Nazwa'];?>
</option>
														<?php } else { ?>
															<option value="<?php echo $_smarty_tpl->tpl_vars['kategoria']->value['idKategoria'];?>
"><?php echo $_smarty_tpl->tpl_vars['kategoria']->value['Nazwa'];?>
</option>
														<?php }?>
													<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

												 <?php }?>
											 <select>
											</div>
											<div class="form-group">
											 <label for="ProponowaneProdukty">Proponowane Produkty:</label>
											 <select name="ProponowaneProdukty[]" id="ProponowaneProdukty[]" class="form-control" multiple="multiple">
												 <option value="Susze">Susze</option>
												 <option value="Oleje">Oleje</option>
												 <option value="Oleoreznyny">Oleoreznyny</option>
											 </select>

												</div>
												<input type="submit" value="Zmień" class="btn btn-primary" />
												<button type="button" class="btn btn-default" data-dismiss="modal">Anuluj</button>
											</form>
										</div>
									</div>
								</div>
							</div>
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


<?php $_smarty_tpl->_subTemplateRender("file:footer.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
