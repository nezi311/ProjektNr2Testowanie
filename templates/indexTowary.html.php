{include file="header.html.php"}

<div class="page-header">
	<h2>Lista Towarów</h2>
</div>


<form class="form" action="http://{$smarty.server.HTTP_HOST}{$subdir}Towar/insert" method="POST">
	<div class="form-group">
	    <label for="Nazwa">Nazwa:</label>
	    <input
	           type="text"
	           class="form-control"
	           placeholder="Pełna"
						 id="Nazwa"
						 name="Nazwa"
	           required>
	</div>
	<div class="form-group">
			<label for="Kategorietowar">Rodzaj towaru:</label>
			<select name="Kategorietowar" class="form-control">
			 {if isset($tablicaKategoriaProdukt)}
				{foreach $tablicaKategoriaProdukt as $kategoria}
				<option value="{$kategoria['IdRodzaj']}">{$kategoria['Nazwa']}</option>
				{/foreach}
			 {/if}
			<select>
	</div>
	<div class="form-group">
			<label for="Opakowanie">Opakowanie:</label>
			<input
	           type="text"
	           class="form-control"
	           placeholder="Opakowanie"
						 id="Opakowanie"
						 name="Opakowanie"
	           required>
	</div>
<div class="form-group">
    <span class="form-group-btn">
    <button type="submit" class="btn btn-success">Dodaj</button>
    </span>
</div>
</form>



<table class="table">
  <thead>
    <tr>
<<<<<<< HEAD
      <th>Nazwa Towaru</th>
			<th>Stan Magazynowy</th>
			<th>Rodzaj Towaru</th>
			<th>Opakowanie</th>
			<th>Edytuj</th>
			<th>usun</th>
=======
      <th>Nazwa Towaru</th><th>Rodzaj Towaru</th><th>Opakowanie</th><th>Typ</th><th>Edytuj</th><th>Zamroz </th><th>usun</th>
>>>>>>> 1e2cca542a5533c4344d756e593c6db717e79437
    </tr>
  </thead>
{if isset($tablicaTowarow)}
  {foreach $tablicaTowarow as $towar}
  <tr>
<<<<<<< HEAD
		<td>{$towar['IdTowar']}</td>
    <td>{$towar['NazwaTowaru']}</td>
    <td>{$towar['RodzajTowaru']}</td>
    <td>{$towar['Opakowanie']}</td>
=======
    <td>{$towar['Nazwa']}</td>
    <td>{$towar['RodzajId']}</td>
    <td>{$towar['Opakowanie']}</td>
    <td>{$towar['Typ']}</td>
>>>>>>> 1e2cca542a5533c4344d756e593c6db717e79437
    <td><a href="http://{$smarty.server.HTTP_HOST}{$subdir}Pracownicy/edit/{$pracownik['id']}" role="button">Edytuj</a></td>
    <td><a href="http://{$smarty.server.HTTP_HOST}{$subdir}Pracownicy/passReset/{$pracownik['id']}" role="button">Usuń</a></td>
  </tr>
  {/foreach}
{/if}
</table>
{if isset($error)}
<strong>{$error}</strong>
{/if}

{include file="footer.html.php"}
