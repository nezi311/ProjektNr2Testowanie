<?php
/* Smarty version 3.1.31, created on 2017-04-28 12:56:24
  from "/opt/lampp/htdocs/TOProjekt2/templates/indexMagazyn.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_59031fd8a5d5c6_60676321',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9e9efcaf161a1c19e372407fd7ca610379597d13' => 
    array (
      0 => '/opt/lampp/htdocs/TOProjekt2/templates/indexMagazyn.html.php',
      1 => 1493376793,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html.php' => 1,
    'file:footer.html.php' => 1,
  ),
),false)) {
function content_59031fd8a5d5c6_60676321 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div class="page-header">
	<h2>Lista Kategorii</h2>
</div>


<div class="container">
<h1>Dodaj Kategorię</h1>
<!-- dyrektywa ng-app definiuje aplikację AngularJS -->
<!-- dyrektywa ng-controller określa kontroler dla tego elemntu HTML -->


<!-- formularz dodawania nowej kategorii -->
<form class="form" action="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Magazyn/insert" method="POST">
	<div class="form-group">
	    <label for="pelnanazwa">Nazwa:</label>
	    <input
	           type="text"
	           class="form-control"
	           placeholder="Pełna"
						 id="Nazwa"
						 name="Nazwa"
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
		<th>Nazwa</th>
		<th>Edytuj</th>
		<th>Usuń</th>
  </tr>
  </thead>
  <tbody>
		<?php if (isset($_smarty_tpl->tpl_vars['tablicaMagazyn']->value)) {?>
		  <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tablicaMagazyn']->value, 'Magazyn');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['Magazyn']->value) {
?>
				<tr>
					<td><?php echo $_smarty_tpl->tpl_vars['Magazyn']->value['IdMagazyn'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['Magazyn']->value['Nazwa'];?>
</td>
					<td>
						<div class="btn-group" role="group">
							<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal<?php echo $_smarty_tpl->tpl_vars['Magazyn']->value['IdMagazyn'];?>
">Edytuj</button>
						</div>

						<div id="myModal<?php echo $_smarty_tpl->tpl_vars['Magazyn']->value['IdMagazyn'];?>
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
Magazyn/update" method="POST" method="POST">
											<div class="form-group">

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
																	 value="<?php echo $_smarty_tpl->tpl_vars['Magazyn']->value['IdMagazyn'];?>
"
																	 >
												</div>
												<div class="form-group">
												<label for="Nazwa">Nazwa:</label>
												<input
															 value="<?php echo $_smarty_tpl->tpl_vars['Magazyn']->value['Nazwa'];?>
"
															 type="text"
															 class="form-control"
															 placeholder="Nazwa"
															 id="Nazwa"
															 name="Nazwa"
															 required>
										</div>
											</div>
											<input type="submit" value="Zmień" class="btn btn-primary" />
											<button type="button" class="btn btn-default" data-dismiss="modal">Anuluj</button>
										</form>
									</div>
								</div>
							</div>
						</div>

					</td>
					<td>
						<div class="btn-group" role="group">
							<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModalUsun<?php echo $_smarty_tpl->tpl_vars['Magazyn']->value['IdMagazyn'];?>
">Usuń</button>
						</div>

						<div id="myModalUsun<?php echo $_smarty_tpl->tpl_vars['Magazyn']->value['IdMagazyn'];?>
" class="modal fade" role="dialog">
							<div class="modal-dialog">

								<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title">Czy na pewno chcesz usunąć kategorię?</h4>
									</div>
									<div class="modal-body">
										Czy na pewno chcesz usunąć kategorię <strong><?php echo $_smarty_tpl->tpl_vars['Magazyn']->value['Nazwa'];?>
</strong>?
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Anuluj</button>
										<a type="button" class="btn btn-warning" href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Magazyn/delete/<?php echo $_smarty_tpl->tpl_vars['Magazyn']->value['IdMagazyn'];?>
">Usuń</a>
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


<?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
<strong><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</strong>
<?php }?>

<?php $_smarty_tpl->_subTemplateRender("file:footer.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}