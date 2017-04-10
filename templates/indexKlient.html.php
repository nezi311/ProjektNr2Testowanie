{include file="header.html.php"}

<div class="page-header">
	<h2>Lista Klientów</h2>
</div>


<div class="container">
<h1>Dodaj Klienta</h1>
<!-- dyrektywa ng-app definiuje aplikację AngularJS -->
<!-- dyrektywa ng-controller określa kontroler dla tego elemntu HTML -->


<!-- formularz dodawania nowej kategorii -->
<form class="form" action="http://{$smarty.server.HTTP_HOST}{$subdir}Klient/insert" method="POST">
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
	<label for="NazwaFirmy">Nazwa firmy:</label>
	<input
					type="text"
					class="form-control"
					placeholder="Nazwa firmy"
					id="NazwaFirmy"
					name="NazwaFirmy"
					required>
</div>

<div class="form-group">
 <label for="NIP">NIP:</label>
 <input
				 type="number"
				 class="form-control"
				 placeholder="NIP"
				 id="NIP"
				 name="NIP"
				 required>
</div>

<div class="form-group">
 <label for="Miasto">Miasto:</label>
 <input
				 type="text"
				 class="form-control"
				 placeholder="Miasto"
				 id="Miasto"
				 name="Miasto"
				 required>
</div>

<div class="form-group">
 <label for="Ulica">Ulica:</label>
 <input
				 type="text"
				 class="form-control"
				 placeholder="Ulica"
				 id="Ulica"
				 name="Ulica"
				 required>
</div>

<div class="form-group">
 <label for="Dom">Nr domu:</label>
 <input
				 type="number"
				 class="form-control"
				 placeholder="Nr domu"
				 id="Dom"
				 name="Dom"
				 required>
</div>

<div class="form-group">
 <label for="Lokal">Nr lokalu:</label>
 <input
				 type="number"
				 class="form-control"
				 placeholder="Nr lokalu"
				 name="Lokal"
				 id="Lokal">
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
 <label for="Branza">Branza:</label>
 <input
				 type="text"
				 class="form-control"
				 placeholder="Branza"
				 name="Branza"
				 id="Branza"
				 required>
</div>
<div class="form-group">
 <label for="ProponowaneProdukty">Proponowane Produkty:</label>
 <input
				 type="text"
				 class="form-control"
				 placeholder="Olejki, sól, itd..."
				 name="ProponowaneProdukty"
				 id="ProponowaneProdukty"
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
		<th>Imie</th>
		<th>nazwisko</th>
		<th>NazwaFirmy</th>
		<th>NIP</th>
		<th>Miasto</th>
		<th>Ulica</th>
		<th>Dom</th>
		<th>Lokal</th>
		<th>KodPocztowy</th>
		<th>Poczta</th>
		<th>Email</th>
		<th>Branza</th>
		<th>ProponowaneProdukty<th>
  </tr>
  </thead>
  <tbody>
		{if isset($tablicaKlient)}
		  {foreach $tablicaKlient as $klient}
				<tr>
					<td>{$klient['IdKlient']}</td>
					<td>{$klient['Imie']}</td>
						<td>{$klient['Nazwisko']}</td>
						<td>{$klient['NazwaFirmy']}</td>
						<td>{$klient['NIP']}</td>
						<td>{$klient['Miasto']}</td>
						<td>{$klient['Ulica']}</td>
						<td>{$klient['Dom']}</td>
						<td>{$klient['Lokal']}</td>
						<td>{$klient['KodPocztowy']}</td>
						<td>{$klient['Poczta']}</td>
						<td>{$klient['EMail']}</td>
						<td>{$klient['Branza']}</td>
						<td>{$klient['ProponowaneProdukty']}</td>

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
