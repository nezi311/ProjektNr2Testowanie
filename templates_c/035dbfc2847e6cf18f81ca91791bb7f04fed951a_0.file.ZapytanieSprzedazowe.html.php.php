<?php
/* Smarty version 3.1.31, created on 2017-05-05 11:45:15
  from "/opt/lampp/htdocs/TOProjekt2/templates/ZapytanieSprzedazowe.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_590c49ab99cb66_96848859',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '035dbfc2847e6cf18f81ca91791bb7f04fed951a' => 
    array (
      0 => '/opt/lampp/htdocs/TOProjekt2/templates/ZapytanieSprzedazowe.html.php',
      1 => 1493977514,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html.php' => 1,
    'file:footer.html.php' => 1,
  ),
),false)) {
function content_590c49ab99cb66_96848859 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="page-header">
  <h1>zapytanie sprzedarzowe</h1>
</div>

  <?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
    <div class="alert alert-danger" id="alert" role="alert"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</div>
  <?php }?>
<div class="container">
  <form class="form-horizontal" action="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Zapytania/insertS" method="POST" id="inserts">
    <div class="form-group">
      <label class="control-label col-sm-2" for="wiadomosc">wiadomosc :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="wiadomosc" name="wiadomosc" placeholder="Wprowadz wiadomosc">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="produkt">produkt :</label>
      <div class="col-sm-10">
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
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="Ilosc">Ilosc :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="ilosc" name="ilosc" placeholder="Wprowadz Ilosc">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="Cena">Cena :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="cena" name="cena" placeholder="Wprowadz Cena">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="klient">klient: :</label>
      <div class="col-sm-10">
        <select id="klient" name="klent" class="form-control">
        <?php if (isset($_smarty_tpl->tpl_vars['tablicaKlient']->value)) {?>
         <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tablicaKlient']->value, 'klient');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['klient']->value) {
?>
           <option value="<?php echo $_smarty_tpl->tpl_vars['klient']->value['IdKlient'];?>
" selected="selected"><?php echo $_smarty_tpl->tpl_vars['klient']->value['NazwaFirmy'];?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['klient']->value['OsobaKontaktowa'];?>
</option>
         <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

        <?php }?>
      </select>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="data">data :</label>
      <div class="col-sm-10">
        <input type="date" class="form-control" id="data" name="data" placeholder="Wprowadz  date">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="Status">Status :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="status" name="status" placeholder="Wprowadz Status">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="Komentarz">Komentarz :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="komentarz" name="komentarz" placeholder="Wprowadz komentarz">
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Złóż</button>
      </div>
    </div>
  </form>
</div>


<table class="table table-striped">
  <thead>
  <tr>
		<th>Wiadomość</th>
		<th>Produkt</th>
		<th>Ilosc</th>
		<th>Klient</th>
    <th>Cena</th>
		<th>Data Przypomnienia</th>
		<th>Status</th>
		<th>Komentarz</th>
		<th>Edycja</th>


  </tr>
  </thead>
  <tbody>
		<?php if (isset($_smarty_tpl->tpl_vars['tablicaSprzedaz']->value)) {?>
		  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tablicaSprzedaz']->value, 'sprzedaz');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['sprzedaz']->value) {
?>
				<tr>
					<td><?php echo $_smarty_tpl->tpl_vars['sprzedaz']->value['Wiadomosc'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['sprzedaz']->value['DaneTowar'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['sprzedaz']->value['Ilosc'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['sprzedaz']->value['DaneKlient'];?>
</td>
          <td><?php echo $_smarty_tpl->tpl_vars['sprzedaz']->value['Cena'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['sprzedaz']->value['DataPrzypomnienia'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['sprzedaz']->value['Status'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['sprzedaz']->value['Komentarz'];?>
</td>
					<td>
						<div class="btn-group" role="group">
							<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal<?php echo $_smarty_tpl->tpl_vars['sprzedaz']->value['Id'];?>
">Edytuj</button>
						</div>

						<div id="myModal<?php echo $_smarty_tpl->tpl_vars['sprzedaz']->value['Id'];?>
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
Zapytania/updateS" method="POST">
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
																 value="<?php echo $_smarty_tpl->tpl_vars['sprzedaz']->value['Id'];?>
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
                                 name="wiadomosc"
																 value="<?php echo $_smarty_tpl->tpl_vars['sprzedaz']->value['Wiadomosc'];?>
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
																		<?php if ($_smarty_tpl->tpl_vars['sprzedaz']->value['towar'] == $_smarty_tpl->tpl_vars['towar']->value['IdTowar']) {?>
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
																id="ilosc"
                                name="ilosc"
																value="<?php echo $_smarty_tpl->tpl_vars['sprzedaz']->value['Ilosc'];?>
"
																required>
											</div>

											<div class="form-group">
											 <label for="klient">Klient:</label>
															 <select id="klient" name="klent" class="form-control">
															 <?php if (isset($_smarty_tpl->tpl_vars['tablicaKlient']->value)) {?>
																<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tablicaKlient']->value, 'klient');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['klient']->value) {
?>
																<?php if ($_smarty_tpl->tpl_vars['sprzedaz']->value['Klient'] == $_smarty_tpl->tpl_vars['klient']->value['IdKlient']) {?>
																	<option value="<?php echo $_smarty_tpl->tpl_vars['klient']->value['IdKlient'];?>
" selected="selected"><?php echo $_smarty_tpl->tpl_vars['klient']->value['NazwaFirmy'];?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['klient']->value['OsobaKontaktowa'];?>
</option>
																<?php } else { ?>
																	<option value="<?php echo $_smarty_tpl->tpl_vars['klient']->value['IdKlient'];?>
" selected="selected"><?php echo $_smarty_tpl->tpl_vars['klient']->value['NazwaFirmy'];?>
&nbsp;<?php echo $_smarty_tpl->tpl_vars['klient']->value['OsobaKontaktowa'];?>
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
                       <label for="data">Cena:</label>
                       <input ng-model="newCena"
                               type="number"
                               class="form-control"
                               placeholder="cena"
                               id="cena"
                               name="cena"
                               value="<?php echo $_smarty_tpl->tpl_vars['sprzedaz']->value['Cena'];?>
"
                               required>
                      </div>

											<div class="form-group">
											 <label for="data">Data:</label>
											 <input ng-model="newData"
															 type="date"
															 class="form-control"
															 placeholder="data"
															 id="data"
                               name="data"
															 value="<?php echo $_smarty_tpl->tpl_vars['sprzedaz']->value['DataPrzypomnienia'];?>
"
															 required>
											</div>

											<div class="form-group">
											 <label for="status">Status:</label>
											 <input ng-model="newStatus"
															 type="text"
															 class="form-control"
															 placeholder="status"
															 value="<?php echo $_smarty_tpl->tpl_vars['sprzedaz']->value['Status'];?>
"
															 id="status"
                               name="status"
															 required>
											</div>

											<div class="form-group">
											 <label for="komentarz">Komentarz:</label>
											 <input ng-model="newKomentarz"
															 type="text"
															 class="form-control"
															 placeholder="komentarz"
															 value="<?php echo $_smarty_tpl->tpl_vars['sprzedaz']->value['Komentarz'];?>
"
															 id="komentarz"
                               name="komentarz"

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



<?php $_smarty_tpl->_subTemplateRender("file:footer.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
