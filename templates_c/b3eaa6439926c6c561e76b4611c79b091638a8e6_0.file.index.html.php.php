<?php
/* Smarty version 3.1.31, created on 2017-05-05 09:01:12
  from "/opt/lampp/htdocs/TOProjekt2/templates/index.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_590c2338335085_88252062',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b3eaa6439926c6c561e76b4611c79b091638a8e6' => 
    array (
      0 => '/opt/lampp/htdocs/TOProjekt2/templates/index.html.php',
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
function content_590c2338335085_88252062 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="page-header">
	<h1>Szybka nawigacja</h1>
	</div>
		<div class="row">
		  <div class="col-sm-6 col-md-4">
		    <div class="thumbnail">
		      <div class="caption">
		        <h3>Kategorie</h3>
		        <p><a href="#" class="btn btn-info" role="button">Lista kategorii</a>
							<a href="#" class="btn btn-primary" role="button">Dodaj nową kategorię</a></p>
		      </div>
		    </div>

		  </div>
			  <div class="col-sm-6 col-md-4">
			    <div class="thumbnail">
			      <div class="caption">
			        <h3>Towary</h3>
			        <p><a href="#" class="btn btn-info" role="button">Lista towarów</a>
								<a href="#" class="btn btn-primary" role="button">Dodaj nowy towar</a></p>
			      </div>
			    </div>
			  </div>

				  <div class="col-sm-6 col-md-4">
				    <div class="thumbnail">
				      <div class="caption">
				        <h3>Handel</h3>
				        <p><a href="#" class="btn btn-default" role="button">Bieżące zamówienie</a>
									<a href="#" class="btn btn-success" role="button">Historia handlu</a></p>
				      </div>
				    </div>
				  </div>

					  <div class="col-sm-6 col-md-4">
					    <div class="thumbnail">
					      <div class="caption">
					        <h3>Statystyka</h3>
					        <p><a href="#" class="btn btn-warning" role="button">Zestawienia sprzedaży</a></p>
					      </div>
					    </div>
					  </div>
			</div>

	<h1>To jest index</h1>
	<h2><?php echo d($_SESSION);?>
</h2>
</div>
<?php $_smarty_tpl->_subTemplateRender("file:footer.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
