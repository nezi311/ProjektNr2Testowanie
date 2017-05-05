<?php
/* Smarty version 3.1.31, created on 2017-05-05 11:18:07
  from "/opt/lampp/htdocs/TOProjekt2/templates/ZapytanieOfertowe.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_590c434fb2d574_34084817',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b561dcff83a5912c7ed5425d81be2b50856e0113' => 
    array (
      0 => '/opt/lampp/htdocs/TOProjekt2/templates/ZapytanieOfertowe.html.php',
      1 => 1493975886,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html.php' => 1,
    'file:footer.html.php' => 1,
  ),
),false)) {
function content_590c434fb2d574_34084817 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div class="page-header">
	<h2></h2>
</div>
<div class="container">
<h1>zapytanie ofertowe</h1>
<div ng-app="myApp" ng-controller="myController" >

<!-- formularz dodawania nowej kategorii -->
<form class="form" action="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Zapytania/insertO" method="POST">
<div class="form-group">
    <label for="wiadomosc">wiadomosc:</label>
    <input ng-model="newWiadomosc"
           type="textarea"
           class="form-control"
           rows="5"
           placeholder="wiadomosc"
					 id="wiadomosc"
           required>
</div>

  <div class="form-group">
    <label for="produkt">Produkt:</label>
					 <select id="produkt" name="produkt" class="form-control">
	 				 <?php if (isset($_smarty_tpl->tpl_vars['tablicaTowar']->value)) {?>
	 					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tablicaTowar']->value, 'towar');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['towar']->value) {
?>
	 					<option value="<?php echo $_smarty_tpl->tpl_vars['towar']->value['IdTowar'];?>
"><?php echo $_smarty_tpl->tpl_vars['towar']->value['NazwaTowaru'];?>
</option>
	 					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

	 				 <?php }?>
				 </select>
 </div>

 <div class="form-group">
	<label for="ilosc">Ilosc:</label>
	<input ng-model="newIlosc"
					type="number"
					class="form-control"
					placeholder="ilosc"
					id="Ilosc"
					required>
</div>

<div class="form-group">
 <label for="dostawca">dostawca:</label>
				 <select id="dostawca" name="dostawca" class="form-control">
				 <?php if (isset($_smarty_tpl->tpl_vars['tablicaDostawca']->value)) {?>
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tablicaDostawca']->value, 'dostawca');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['dostawca']->value) {
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['dostawca']->value['IdDostawca'];?>
"><?php echo $_smarty_tpl->tpl_vars['dostawca']->value['NazwaPelna'];?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['dostawca']->value['Imie'];?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['dostawca']->value['Nazwisko'];?>
</option>
					<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

				 <?php }?>
			 </select>
</div>

<div class="form-group">
 <label for="data">Data:</label>
 <input ng-model="newData"
				 type="date"
				 class="form-control"
				 placeholder="data"
				 id="data"
				 required>
</div>

<div class="form-group">
 <label for="status">Status:</label>
 <input ng-model="newStatus"
				 type="text"
				 class="form-control"
				 placeholder="status"
				 id="status"
				 required>
</div>

<div class="form-group">
 <label for="komentarz">Komentarz:</label>
 <input ng-model="newKomentarz"
				 type="text"
				 class="form-control"
				 placeholder="komentarz"
				 id="komentarz"
				 required>
</div>

<div class="form-group">
    <span class="form-group-btn">
    <button type="submit" class="btn btn-success"  >Złóż</button>
    </span>
</div>
</form>


<table class="table table-striped">
  <thead>
  <tr>
		<th>Wiadomość</th>
		<th>Produkt</th>
		<th>Ilosc</th>
		<th>Dostawca</th>
		<th>Data Przypomnienia</th>
		<th>Status</th>
		<th>Komentarz</th>
		<th>Edycja</th>


  </tr>
  </thead>
  <tbody>
		<?php if (isset($_smarty_tpl->tpl_vars['tablicaOferta']->value)) {?>
		  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tablicaOferta']->value, 'oferta');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['oferta']->value) {
?>
				<tr>
					<td><?php echo $_smarty_tpl->tpl_vars['oferta']->value['Wiadomosc'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['oferta']->value['DaneTowar'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['oferta']->value['Ilosc'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['oferta']->value['DaneDostawca'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['oferta']->value['DataPrzypomnienia'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['oferta']->value['Status'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['oferta']->value['Komentarz'];?>
</td>
					<td>
						<div class="btn-group" role="group">
							<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal<?php echo $_smarty_tpl->tpl_vars['oferta']->value['Id'];?>
">Edytuj</button>
						</div>

						<div id="myModal<?php echo $_smarty_tpl->tpl_vars['oferta']->value['Id'];?>
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
Zapytania/updateO" method="POST">
											<div class="form-group" style="display:none;">
													<label for="id">Id:</label>
													<input
																 type="text"
																 class="form-control"
																 placeholder="id"
																 id="id"
																 name="id"
																 required
																 readonly="readonly"
																 value="<?php echo $_smarty_tpl->tpl_vars['oferta']->value['Id'];?>
"
																 >
											</div>


											<div class="form-group">
											    <label for="wiadomosc">wiadomosc:</label>
											    <input ng-model="newWiadomosc"
											           type="textarea"
											           class="form-control"
											           rows="5"
											           placeholder="wiadomosc"
																 id="wiadomosc"
																 value="<?php echo $_smarty_tpl->tpl_vars['oferta']->value['Wiadomosc'];?>
"
											           required>
											</div>

											  <div class="form-group">
											    <label for="produkt">Produkt:</label>
																 <select id="produkt" name="produkt" class="form-control">
												 				 <?php if (isset($_smarty_tpl->tpl_vars['tablicaTowar']->value)) {?>
												 					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tablicaTowar']->value, 'towar');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['towar']->value) {
?>
																		<?php if ($_smarty_tpl->tpl_vars['oferta']->value['towar'] == $_smarty_tpl->tpl_vars['towar']->value['IdTowar']) {?>
																		<option value="<?php echo $_smarty_tpl->tpl_vars['towar']->value['IdTowar'];?>
" selected="selected"><?php echo $_smarty_tpl->tpl_vars['towar']->value['NazwaTowaru'];?>
</option>
																		<?php } else { ?>
																		<option value="<?php echo $_smarty_tpl->tpl_vars['towar']->value['IdTowar'];?>
"><?php echo $_smarty_tpl->tpl_vars['towar']->value['NazwaTowaru'];?>
</option>

																		<?php }?>
																	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

												 				 <?php }?>
															 </select>
											 </div>

											 <div class="form-group">
												<label for="ilosc">Ilosc:</label>
												<input ng-model="newIlosc"
																type="number"
																class="form-control"
																placeholder="ilosc"
																id="Ilosc"
																value="<?php echo $_smarty_tpl->tpl_vars['oferta']->value['Ilosc'];?>
"
																required>
											</div>

											<div class="form-group">
											 <label for="dostawca">dostawca:</label>
															 <select id="dostawca" name="dostawca" class="form-control">
															 <?php if (isset($_smarty_tpl->tpl_vars['tablicaDostawca']->value)) {?>
																<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tablicaDostawca']->value, 'dostawca');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['dostawca']->value) {
?>
																<?php if ($_smarty_tpl->tpl_vars['oferta']->value['Dostawca'] == $_smarty_tpl->tpl_vars['dostawca']->value['IdDostawca']) {?>
																	<option value="<?php echo $_smarty_tpl->tpl_vars['dostawca']->value['IdDostawca'];?>
" selected="selected"><?php echo $_smarty_tpl->tpl_vars['dostawca']->value['NazwaPelna'];?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['dostawca']->value['Imie'];?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['dostawca']->value['Nazwisko'];?>
</option>
																<?php } else { ?>
																	<option value="<?php echo $_smarty_tpl->tpl_vars['dostawca']->value['IdDostawca'];?>
" selected="selected"><?php echo $_smarty_tpl->tpl_vars['dostawca']->value['NazwaPelna'];?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['dostawca']->value['Imie'];?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['dostawca']->value['Nazwisko'];?>
</option>

																<?php }?>
																<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

															 <?php }?>
														 </select>
											</div>

											<div class="form-group">
											 <label for="data">Data:</label>
											 <input ng-model="newData"
															 type="date"
															 class="form-control"
															 placeholder="data"
															 id="data"
															 value="<?php echo $_smarty_tpl->tpl_vars['oferta']->value['DataPrzypomnienia'];?>
"
															 required>
											</div>

											<div class="form-group">
											 <label for="status">Status:</label>
											 <input ng-model="newStatus"
															 type="text"
															 class="form-control"
															 placeholder="status"
															 value="<?php echo $_smarty_tpl->tpl_vars['oferta']->value['Status'];?>
"
															 id="status"
															 required>
											</div>

											<div class="form-group">
											 <label for="komentarz">Komentarz:</label>
											 <input ng-model="newKomentarz"
															 type="text"
															 class="form-control"
															 placeholder="komentarz"
															 value="<?php echo $_smarty_tpl->tpl_vars['oferta']->value['Komentarz'];?>
"
															 id="komentarz"

															 required>
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




<?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
<strong><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</strong>
<?php }?>

<?php $_smarty_tpl->_subTemplateRender("file:footer.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
