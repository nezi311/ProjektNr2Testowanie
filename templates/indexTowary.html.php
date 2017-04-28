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
    <td>{$towar['NazwaRodzaju']}</td>
    <td>{$towar['Opakowanie']}</td>
    <td>
			<div class="btn-group" role="group">
				<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal{$towar['IdTowar']}">Edytuj</button>
			</div>

			<div id="myModal{$towar['IdTowar']}" class="modal fade" role="dialog">
				<div class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Edycja</h4>
						</div>
						<div class="modal-body">
							<form action="http://{$smarty.server.HTTP_HOST}{$subdir}Towar/update" method="POST">
								<div class="form-group">

									<div class="form-group" style="display:none;">
											<label for="id">Id:</label>
											<input
														 type="text"
														 class="form-control"
														 placeholder="id"
														 id="id"
														 name="id"
														 required
														 readonly="readonly"
														 value="{$towar['IdTowar']}"
														 >
									</div>
									<div class="form-group">
											<label for="Nazwa">Nazwa:</label>
											<input
														 type="text"
														 class="form-control"
														 placeholder="Pełna"
														 id="Nazwa"
														 name="Nazwa"
														 value="{$towar['NazwaTowaru']}"
														 required>
									</div>
									<div class="form-group">
											<label for="Kategorietowar">Rodzaj towaru:</label>
											<select name="Kategorietowar" class="form-control">
											 {if isset($tablicaKategoriaProdukt)}
												{foreach $tablicaKategoriaProdukt as $kategoria}
													{if $towar['RodzajTowaru']}
														<option value="{$kategoria['IdRodzaj']}" checked="checked">{$kategoria['Nazwa']}</option>
													{else}
														<option value="{$kategoria['IdRodzaj']}">{$kategoria['Nazwa']}</option>
													{/if}
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
														 value="{$towar['Opakowanie']}"
														 required>
									</div>
								</div>
								<input type="submit" value="Zmień" class="btn btn-primary" />
								<button type="button" class="btn btn-default" data-dismiss="modal">Anuluj</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</td>
    <td>
			<div class="btn-group" role="group">
				<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModalUsun{$towar['IdTowar']}">Usuń</button>
			</div>

			<div id="myModalUsun{$towar['IdTowar']}" class="modal fade" role="dialog">
				<div class="modal-dialog">

					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Czy aby na pewno?</h4>
						</div>
						<div class="modal-body">
							Czy na pewno chcesz usunąć towar <strong>{$towar['NazwaTowaru']}</strong>?
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Anuluj</button>
							<a type="button" class="btn btn-warning" href="http://{$smarty.server.HTTP_HOST}{$subdir}Towar/delete/{$towar['IdTowar']}">Usuń</a>
						</div>
					</div>
				</div>
			</div>
		</td>
  </tr>
  {/foreach}
{/if}
</table>
{if isset($error)}
<strong>{$error}</strong>
{/if}

{include file="footer.html.php"}
