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
      <th>Nazwa Towaru</th>
			<th>Stan Magazynowy</th>
			<th>Rodzaj Towaru</th>
			<th>Opakowanie</th>
			<th>Edytuj</th>
			<th>usun</th>
    </tr>
  </thead>
{if isset($tablicaTowarow)}
  {foreach $tablicaTowarow as $towar}
  <tr>
		<td>{$towar['IdTowar']}</td>
    <td>{$towar['NazwaTowaru']}</td>
    <td>{$towar['RodzajTowaru']}</td>
    <td>{$towar['Opakowanie']}</td>
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
