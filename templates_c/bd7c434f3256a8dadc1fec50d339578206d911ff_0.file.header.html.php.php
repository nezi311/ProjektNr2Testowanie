<?php
/* Smarty version 3.1.31, created on 2017-05-05 09:17:49
  from "/opt/lampp/htdocs/TOProjekt2/templates/header.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_590c271d05f893_97865934',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bd7c434f3256a8dadc1fec50d339578206d911ff' => 
    array (
      0 => '/opt/lampp/htdocs/TOProjekt2/templates/header.html.php',
      1 => 1493968666,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_590c271d05f893_97865934 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
    <head>
        <title>ZEUS</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <!-- Latest compiled and minified JavaScript -->
        <?php echo '<script'; ?>
 src="http://code.jquery.com/jquery-latest.js"><?php echo '</script'; ?>
>
          <?php echo '<script'; ?>
 src="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
/js/jquery.min.js"><?php echo '</script'; ?>
>
          <?php echo '<script'; ?>
 src="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
/js/jquery-ui.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"><?php echo '</script'; ?>
>
        <!-- css -->
          <!-- Custom css -->
          <link rel="stylesheet" href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
css/custom.css">
          <link rel="stylesheet" href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
css/jquery-ui.min.css">
        <link href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
css/bootstrap.css" rel="stylesheet">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    </head>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Jakieś logo</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
<!-- To co ma Bartek -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">

        <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Magazyn">Magazyn</a></li>

        <li class="dropdown">
              <a href="#" class="dropdown-toggle glyphicon glyphicon-book" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Kategorie<span class="caret"></span></a>
              <ul class="dropdown-menu">
                  <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
KategoriaProdukt">Kategorie Produktów</a></li>
                  <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
KategoriaKlient">Kategorie Klientów</a></li>
              </ul>
            </li>


<!-- To co ma Bartek -->



            <li class="dropdown">
                  <a href="#" class="dropdown-toggle glyphicon glyphicon-book" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Zarządzanie Towarami<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Towar" class="glyphicon glyphicon-list-alt"> Lista Towarów</a></li>
                  </ul>
                </li>

                <?php if ($_SESSION['role'] <= 1) {?>
                  <li class="dropdown">
                      <a href="#" class="dropdown-toggle glyphicon glyphicon-list-alt" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Zapytania<span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Zapytania/ZapytanieOfertowe" class="glyphicon glyphicon-plus"> Zapytanie Ofertowe</a></li>
                        <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Zapytania/ZapytanieSprzedazowe" class="glyphicon glyphicon-plus"> Zapytanie Sprzedażowe</a></li>
                      </ul>
                    </li>
                <?php }?>

          <?php if ($_SESSION['role'] <= 1) {?>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle glyphicon glyphicon-user" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Pracownicy<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Pracownicy" class="glyphicon glyphicon-user"> Pracownicy</a></li>
                  <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Pracownicy/add" class="glyphicon glyphicon-plus"> Dodaj pracownika</a></li>

                </ul>
              </li>
          <?php }?>
          <?php if ($_SESSION['role'] <= 1) {?>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle glyphicon glyphicon-user" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Klienci<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Klient" class="glyphicon glyphicon-user"> Klienci</a></li>
                </ul>
              </li>
          <?php }?>
          <?php if ($_SESSION['role'] <= 1) {?>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle glyphicon glyphicon-user" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Dostawcy<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Dostawca" class="glyphicon glyphicon-user"> Dostawcy</a></li>
                </ul>
              </li>
          <?php }?>

      </ul>

      <ul class="nav navbar-nav navbar-right">
        <?php if (!isset($_SESSION['login'])) {?>
          <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
AccessRoles/logform">Zaloguj</a></li>
        <?php } else { ?>

          <li><a href='http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
Pracownicy/passReset'><?php echo $_SESSION['login'];?>
</a></li>
          <li><a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
AccessRoles/logout">Wyloguj</a></li>
        <?php }?>
      </ul>


    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<body>
<div id="wrap">
  <div class="row center-block">
    <div class="col-md-12">
<?php }
}
