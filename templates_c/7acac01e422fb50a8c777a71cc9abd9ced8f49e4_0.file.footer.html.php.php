<?php
/* Smarty version 3.1.31, created on 2017-03-31 13:40:40
  from "/opt/lampp/htdocs/TOProjekt2/templates/footer.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_58de4038b9df13_44727415',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7acac01e422fb50a8c777a71cc9abd9ced8f49e4' => 
    array (
      0 => '/opt/lampp/htdocs/TOProjekt2/templates/footer.html.php',
      1 => 1490960438,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58de4038b9df13_44727415 (Smarty_Internal_Template $_smarty_tpl) {
?>
      </div>
    </div>
  </div>
</body>
<div class="panel-footer">
    <?php echo '<script'; ?>
 src="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
js/search_autocomplete.js"><?php echo '</script'; ?>
>
      <?php echo '<script'; ?>
 src="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
js/jquery.cookie.js"><?php echo '</script'; ?>
>
      <?php echo '<script'; ?>
 src="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
js/jquery.validate.min.js"><?php echo '</script'; ?>
>
      <?php echo '<script'; ?>
 src="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
js/angular.min.js"><?php echo '</script'; ?>
>
      <?php echo '<script'; ?>
 src="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
js/angular-animate.js"><?php echo '</script'; ?>
>
      <!-- plik JavaScript do obsługi aplikacji -->
      <?php echo '<script'; ?>
 src="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
js/myApp.js"><?php echo '</script'; ?>
>
      <?php echo '<script'; ?>
 src="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
js/myController.js"><?php echo '</script'; ?>
>
    <p class="text-muted">
    ZEUS - Aplikacja prowadzenia sprzedaży
    </p>
</div>
</html>
<?php }
}
