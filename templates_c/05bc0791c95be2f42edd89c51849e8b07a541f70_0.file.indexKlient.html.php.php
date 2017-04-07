<?php
/* Smarty version 3.1.31, created on 2017-04-07 13:19:37
  from "/opt/lampp/htdocs/TOProjekt2/templates/indexKlient.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_58e775c9082f51_30144880',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '05bc0791c95be2f42edd89c51849e8b07a541f70' => 
    array (
      0 => '/opt/lampp/htdocs/TOProjekt2/templates/indexKlient.html.php',
      1 => 1491563975,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html.php' => 1,
    'file:footer.html.php' => 1,
  ),
),false)) {
function content_58e775c9082f51_30144880 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div class="page-header">
	<h2>Lista Klientów</h2>
</div>


<div class="container">
<h1>Dodaj Klienta</h1>
<!-- dyrektywa ng-app definiuje aplikację AngularJS -->
<!-- dyrektywa ng-controller określa kontroler dla tego elemntu HTML -->
<div ng-app="myApp" ng-controller="myController" >

<!-- formularz dodawania nowej kategorii -->
<form class="form" ng-submit="insert()">
<div class="form-group">
    <label for="imie">Imie:</label>
    <input ng-model="newImie"
           type="text"
           class="form-control"
           placeholder="Imie"
					 id="imie"
           required>
</div>

  <div class="form-group">
    <label for="nazwisko">Nazwisko:</label>
		<input ng-model="newNazwisko"
           type="text"
           class="form-control"
           placeholder="Nazwisko"
					 id="nazwisko"
           required>
 </div>

 <div class="form-group">
	<label for="NazwaFirmy">Nazwa firmy:</label>
	<input ng-model="newNazwaFirmy"
					type="text"
					class="form-control"
					placeholder="Nazwa firmy"
					id="NazwaFirmy"
					required>
</div>

<div class="form-group">
 <label for="NIP">NIP:</label>
 <input ng-model="newNIP"
				 type="number"
				 class="form-control"
				 placeholder="NIP"
				 id="NIP"
				 required>
</div>

<div class="form-group">
 <label for="Miasto">Miasto:</label>
 <input ng-model="newMiasto"
				 type="text"
				 class="form-control"
				 placeholder="Miasto"
				 id="Miasto"
				 required>
</div>

<div class="form-group">
 <label for="Ulica">Ulica:</label>
 <input ng-model="newUlica"
				 type="text"
				 class="form-control"
				 placeholder="Ulica"
				 id="Ulica"
				 required>
</div>

<div class="form-group">
 <label for="Dom">Nr domu:</label>
 <input ng-model="newDom"
				 type="number"
				 class="form-control"
				 placeholder="Nr domu"
				 id="Dom"
				 required>
</div>

<div class="form-group">
 <label for="Lokal">Nr lokalu:</label>
 <input ng-model="newLokal"
				 type="number"
				 class="form-control"
				 placeholder="Nr lokalu"
				 id="Lokal">
</div>

<div class="form-group">
 <label for="KodPocztowy">Kod Pocztowy:</label>
 <input ng-model="newKodPocztowy"
				 type="text"
				 pattern="[0-9]<?php echo 2;?>
-[0-9]<?php echo 3;?>
"
				 class="form-control"
				 placeholder="62-800"
				 id="KodPocztowy"
				 required>
</div>
<div class="form-group">
 <label for="Poczta">Poczta:</label>
 <input ng-model="newPoczta"
				 type="text"
				 class="form-control"
				 placeholder="Poczta"
				 id="Poczta"
				 required>
</div>
<div class="form-group">
 <label for="Email">Email:</label>
 <input ng-model="newEmail"
				 type="text"
				 class="form-control"
				 placeholder="firma@firma.com"
				 id="Email"
				 required>
</div>
<div class="form-group">
 <label for="Branza">Branza:</label>
 <input ng-model="newNIP"
				 type="text"
				 class="form-control"
				 placeholder="Branza"
				 id="Branza"
				 required>
</div>
<div class="form-group">
 <label for="ProponowaneProdukty">Proponowane Produkty:</label>
 <input ng-model="newProponowaneProdukty"
				 type="text"
				 class="form-control"
				 placeholder="Olejki, sól, itd..."
				 id="ProponowaneProdukty"
				 required>
</div>
<div class="form-group">
    <span class="form-group-btn">
    <button type="submit" class="btn btn-success"  >dodaj</button>
    </span>
</div>
</form>

<!-- tabela z kategoriami -->
<!-- dyrektywa ng-init inicjalizuje tabele -->
<table ng-init='getAll()' class="table table-striped">
  <thead>
  <tr>
     <th ng-click="sortType = 'id'; sortReverse = !sortReverse;"
         style="width: 10%">Id
     <!-- dyrektywa ng-show nakłada warunek na pokazanie elementu -->
     <span ng-show="sortType === 'id' && !sortReverse"
           class="glyphicon glyphicon-menu-down"></span>
     <span ng-show="sortType === 'id' && sortReverse"
           class="glyphicon glyphicon-menu-up"></span>
     </th>
     <th ng-click="sortType = 'tytul'; sortReverse = !sortReverse;"
         style="width: 20%">Tytuł
     <span ng-show="sortType === 'tytul' && !sortReverse"
           class="glyphicon glyphicon-menu-down"></span>
     <span ng-show="sortType === 'tytul' && sortReverse"
           class="glyphicon glyphicon-menu-up"></span>
     </th>
     <th ng-click="sortType = 'imie'; sortReverse = !sortReverse;"
         style="width: 20%">Autor
     <span ng-show="sortType === 'imie' && !sortReverse"
           class="glyphicon glyphicon-menu-down"></span>
     <span ng-show="sortType === 'imie' && sortReverse"
           class="glyphicon glyphicon-menu-up"></span>
     </th>
      <th ng-click="sortType = 'rok_wydania'; sortReverse = !sortReverse;"
         style="width: 20%">Rok wydania
     <span ng-show="sortType === 'rok_wydania' && !sortReverse"
           class="glyphicon glyphicon-menu-down"></span>
     <span ng-show="sortType === 'rok_wydania' && sortReverse"
           class="glyphicon glyphicon-menu-up"></span>
     </th>
			<th ng-click="sortType = 'nazwa'; sortReverse = !sortReverse;"
         style="width: 20%">Kategoria
     <span ng-show="sortType === 'nazwa' && !sortReverse"
           class="glyphicon glyphicon-menu-down"></span>
     <span ng-show="sortType === 'nazwa' && sortReverse"
           class="glyphicon glyphicon-menu-up"></span>
     </th>
     <th style="width: 30%">Operacje</th>
  </tr>
  </thead>
  <tbody>
  <!-- dyrektywa ng-repeat odpowiada za pętlę -->
  <tr ng-repeat="book in books | orderBy:sortType:sortReverse">
    <td>
        [[ book.id ]]
    </td>
    <td>
        <span ng-hide="book.editMode">[[ book.tytul ]]</span>
        <input class="form-control" ng-model="book.tytul"
               ng-show="book.editMode"
               type="text" />
    </td>
    <td>
        <span ng-hide="book.editMode">[[ book.imie ]] [[ book.nazwisko ]]</span>
        <select class="form-control" ng-show="book.editMode" ng-model="book.id_autor" >
           <option ng-repeat="autor in authors"
                value=[[autor.id]]>[[autor.imie]] [[autor.nazwisko]]</option>
           </select>
    </td>
    <td>
        <span ng-hide="book.editMode">[[ book.rok_wydania ]]</span>
        <input class="form-control" ng-model="book.rok_wydania"
               ng-show="book.editMode"
               type="text" />
    </td>
   <td>
        <span ng-hide="book.editMode">[[ book.nazwa ]]</span>
           <select class="form-control" ng-show="book.editMode" ng-model="book.id_kategoria" >
           <option ng-repeat="kategoria in categories"
                value=[[kategoria.id]]>[[kategoria.nazwa]]</option>
           </select>
    </td>
    <td>
        <button ng-click="book.editMode = true;"
                ng-hide="book.editMode"
                type="submit"
                class="btn btn-xs btn-primary">edytuj</button>
        <button ng-click="book.editMode = false; update(book)"
                ng-show="book.editMode"
                type="submit"
                class="btn btn-xs btn-success">zapisz</button>

        <button ng-click="delete(book)"
                type="submit"
                class="btn btn-xs btn-danger">usuń</button>
    </td>
  </tr>
  </tbody>
</table>

<div ng-hide="msg === 'OK'" class="alert alert-danger" role="alert">[[ msg ]]</div>
</div>

</div>


<?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
<strong><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</strong>
<?php }?>

<?php $_smarty_tpl->_subTemplateRender("file:footer.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
