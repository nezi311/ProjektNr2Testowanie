<?php
/* Smarty version 3.1.31, created on 2017-04-28 13:50:37
  from "C:\xampp\htdocs\TOProjekt2\templates\ZapytanieSprzedazowe.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_59032c8d77fa23_54540169',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dd92834aab10d693531c592e3855a21bbe92a0a2' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TOProjekt2\\templates\\ZapytanieSprzedazowe.html.php',
      1 => 1493379834,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html.php' => 1,
    'file:footer.html.php' => 1,
  ),
),false)) {
function content_59032c8d77fa23_54540169 (Smarty_Internal_Template $_smarty_tpl) {
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
        <input type="text" class="form-control" id="produkt" name="produkt" placeholder="Wprowadz produkt">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="Ilosc">Ilosc :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="Ilosc" name="Ilosc" placeholder="Wprowadz Ilosc">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="Cena">Cena :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="Cena" name="Cena" placeholder="Wprowadz Cena">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="klient">klient(email): :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="klient" name="klient" placeholder="Wprowadz klient">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="data">data :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="data" name="data" placeholder="Wprowadz  date">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="Status">Status :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="Status" name="Status" placeholder="Wprowadz Status">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="Komentarz">Komentarz :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="Komentarz" name="Komentarz" placeholder="Wprowadz komentarz">
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Złóż</button>
      </div>
    </div>
  </form>
</div>


<?php $_smarty_tpl->_subTemplateRender("file:footer.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
