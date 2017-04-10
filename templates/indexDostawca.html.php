{include file="header.html.php"}

<div class="page-header">
	<h2>Lista Dostawców</h2>
</div>


<div class="container">
<h1>Dodaj Dostawcea</h1>
<!-- dyrektywa ng-app definiuje aplikację AngularJS -->
<!-- dyrektywa ng-controller określa kontroler dla tego elemntu HTML -->


<!-- formularz dodawania nowej kategorii -->
<form class="form" action="http://{$smarty.server.HTTP_HOST}{$subdir}Dostawca/insert" method="POST">
	<div class="form-group">
	    <label for="pelnanazwa">Pełna nazwa:</label>
	    <input
	           type="text"
	           class="form-control"
	           placeholder="Pełna nazwa"
						 id="pelnanazwa"
						 name="pelnanazwa"
	           required>
	</div>

<div class="form-group">
    <label for="imie">Imie:</label>
    <input
           type="text"
           class="form-control"
           placeholder="Imie"
					 id="imie"
					 name="imie"
           required>
</div>

  <div class="form-group">
    <label for="nazwisko">Nazwisko:</label>
		<input
           type="text"
           class="form-control"
           placeholder="Nazwisko"
					 id="nazwisko"
					 name="nazwisko"
           required>
 </div>

 <div class="form-group">
	<label for="Telefon1">Telefon1 :</label>
	<input
					type="number"
					class="form-control"
					placeholder="Telefon"
					id="Telefon1"
					name="Telefon1"
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
 <label for="KodPocztowy">Kod Pocztowy:</label>
 <input
				 type="text"

				 class="form-control"
				 placeholder="62-800"
				 name="KodPocztowy"
				 id="KodPocztowy"
				 required>
</div>
<div class="form-group">
 <label for="Poczta">Poczta:</label>
 <input
				 type="text"
				 class="form-control"
				 placeholder="Poczta"
				 name="Poczta"
				 id="Poczta"
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
		<th>Pełna nazwa</th>
		<th>Imie</th>
		<th>nazwisko</th>
		<th>Telefon</th>
		<th>Email</th>
		<th>Adres</th>
		<th>KodPocztowy</th>
		<th>Poczta</th>

  </tr>
  </thead>
  <tbody>
		{if isset($tablicaDostawca)}
		  {foreach $tablicaDostawca as $dostawca}
				<tr>
					<td>{$dostawca['IdDostawca']}</td>
					<td>{$dostawca['NazwaPelna']}</td>
					<td>{$dostawca['Imie']}</td>
						<td>{$dostawca['Nazwisko']}</td>
						<td>{$dostawca['Telefon1']}</td>
						<td>{$dostawca['Email']}</td>
						<td>{$dostawca['Adres']}</td>
						<td>{$dostawca['KodPocztowy']}</td>
						<td>{$dostawca['Poczta']}</td>
				</tr>
			{/foreach}
		{/if}
  </tbody>
</table>




</div>


{if isset($error)}
<strong>{$error}</strong>
{/if}

{include file="footer.html.php"}
