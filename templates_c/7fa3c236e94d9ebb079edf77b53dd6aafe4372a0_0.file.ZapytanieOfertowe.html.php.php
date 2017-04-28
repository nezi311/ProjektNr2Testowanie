<?php
/* Smarty version 3.1.31, created on 2017-04-29 00:22:48
  from "E:\xampp\htdocs\TOProjekt2\templates\ZapytanieOfertowe.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5903c0b85b6315_98831261',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7fa3c236e94d9ebb079edf77b53dd6aafe4372a0' => 
    array (
      0 => 'E:\\xampp\\htdocs\\TOProjekt2\\templates\\ZapytanieOfertowe.html.php',
      1 => 1493410366,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html.php' => 1,
    'file:footer.html.php' => 1,
  ),
),false)) {
function content_5903c0b85b6315_98831261 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div class="page-header">
	<h2></h2>
</div>
<div class="container">
<h1>zapytanie ofertowe</h1>
<div ng-app="myApp" ng-controller="myController" >

<!-- formularz dodawania nowej kategorii -->
<form class="form" ng-submit="insertO()">
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
		<input ng-model="newProdukt"
           type="text"
           class="form-control"
           placeholder="produkt"
					 id="produkt"
           required>
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
 <label for="dostawca">dostawca(email):</label>
 <input ng-model="newDostawca"
				 type="text"
				 class="form-control"
				 placeholder="dostawca"
				 id="dostawca"
				 required>
</div>

<div class="form-group">
 <label for="data">Data:</label>
 <input ng-model="newData"
				 type="text"
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

<?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
<strong><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</strong>
<?php }?>

<?php $_smarty_tpl->_subTemplateRender("file:footer.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
