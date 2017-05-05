{include file="header.html.php"}

<div class="page-header">
	<h2></h2>
</div>
<div class="container">
<h1>zapytanie ofertowe</h1>
<div ng-app="myApp" ng-controller="myController" >

<!-- formularz dodawania nowej kategorii -->
<form class="form" action="http://{$smarty.server.HTTP_HOST}{$subdir}Zapytania/insertO" method="POST">
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
					 <select id="produkt" name="produkt" class="form-control">
	 				 {if isset($tablicaTowar)}
	 					{foreach $tablicaTowar as $towar}
	 					<option value="{$towar['IdTowar']}">{$towar['NazwaTowaru']}</option>
	 					{/foreach}
	 				 {/if}
				 </select>
 </div>

 <div class="form-group">
	<label for="ilosc">Ilosc:</label>
	<input ng-model="newIlosc"
					type="number"
					min="1"
					class="form-control"
					placeholder="ilosc"
					id="Ilosc"
					required>
</div>

<div class="form-group">
 <label for="dostawca">dostawca:</label>
				 <select id="dostawca" name="dostawca" class="form-control">
				 {if isset($tablicaDostawca)}
					{foreach $tablicaDostawca as $dostawca}
					<option value="{$dostawca['IdDostawca']}">{$dostawca['NazwaPelna']}&nbsp;{$dostawca['Imie']}&nbsp;{$dostawca['Nazwisko']}</option>
					{/foreach}
				 {/if}
			 </select>
</div>

<div class="form-group">
 <label for="data">Data:</label>
 <input ng-model="newData"
				 type="date"
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


<table class="table table-striped">
  <thead>
  <tr>
		<th>Wiadomość</th>
		<th>Produkt</th>
		<th>Ilosc</th>
		<th>Dostawca</th>
		<th>Data Przypomnienia</th>
		<th>Status</th>
		<th>Komentarz</th>
		<th>Edycja</th>


  </tr>
  </thead>
  <tbody>
		{if isset($tablicaOferta)}
		  {foreach $tablicaOferta as $oferta}
				<tr>
					<td>{$oferta['Wiadomosc']}</td>
					<td>{$oferta['DaneTowar']}</td>
					<td>{$oferta['Ilosc']}</td>
					<td>{$oferta['DaneDostawca']}</td>
					<td>{$oferta['DataPrzypomnienia']}</td>
					<td>{$oferta['Status']}</td>
					<td>{$oferta['Komentarz']}</td>
					<td>
						<div class="btn-group" role="group">
							<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal{$oferta['Id']}">Edytuj</button>
						</div>

						<div id="myModal{$oferta['Id']}" class="modal fade" role="dialog">
							<div class="modal-dialog">

								<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title">Edycja</h4>
									</div>
									<div class="modal-body">
										<form action="http://{$smarty.server.HTTP_HOST}{$subdir}Zapytania/updateO" method="POST">
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
																 value="{$oferta['Id']}"
																 >
											</div>


											<div class="form-group">
											    <label for="wiadomosc">wiadomosc:</label>
											    <input ng-model="newWiadomosc"
											           type="textarea"
											           class="form-control"
											           rows="5"
											           placeholder="wiadomosc"
																 id="wiadomosc"
																 value="{$oferta['Wiadomosc']}"
											           required>
											</div>

											  <div class="form-group">
											    <label for="produkt">Produkt:</label>
																 <select id="produkt" name="produkt" class="form-control">
												 				 {if isset($tablicaTowar)}
												 					{foreach $tablicaTowar as $towar}
																		{if $oferta['towar'] == $towar['IdTowar']}
																		<option value="{$towar['IdTowar']}" selected="selected">{$towar['NazwaTowaru']}</option>
																		{else}
																		<option value="{$towar['IdTowar']}">{$towar['NazwaTowaru']}</option>

																		{/if}
																	{/foreach}
												 				 {/if}
															 </select>
											 </div>

											 <div class="form-group">
												<label for="ilosc">Ilosc:</label>
												<input ng-model="newIlosc"
																type="number"
																min="1"
																class="form-control"
																placeholder="ilosc"
																id="Ilosc"
																value="{$oferta['Ilosc']}"
																required>
											</div>

											<div class="form-group">
											 <label for="dostawca">dostawca:</label>
															 <select id="dostawca" name="dostawca" class="form-control">
															 {if isset($tablicaDostawca)}
																{foreach $tablicaDostawca as $dostawca}
																{if $oferta['Dostawca'] == $dostawca['IdDostawca']}
																	<option value="{$dostawca['IdDostawca']}" selected="selected">{$dostawca['NazwaPelna']}&nbsp;{$dostawca['Imie']}&nbsp;{$dostawca['Nazwisko']}</option>
																{else}
																	<option value="{$dostawca['IdDostawca']}" selected="selected">{$dostawca['NazwaPelna']}&nbsp;{$dostawca['Imie']}&nbsp;{$dostawca['Nazwisko']}</option>

																{/if}
																{/foreach}
															 {/if}
														 </select>
											</div>

											<div class="form-group">
											 <label for="data">Data:</label>
											 <input ng-model="newData"
															 type="date"
															 class="form-control"
															 placeholder="data"
															 id="data"
															 value="{$oferta['DataPrzypomnienia']}"
															 required>
											</div>

											<div class="form-group">
											 <label for="status">Status:</label>
											 <input ng-model="newStatus"
															 type="text"
															 class="form-control"
															 placeholder="status"
															 value="{$oferta['Status']}"
															 id="status"
															 required>
											</div>

											<div class="form-group">
											 <label for="komentarz">Komentarz:</label>
											 <input ng-model="newKomentarz"
															 type="text"
															 class="form-control"
															 placeholder="komentarz"
															 value="{$oferta['Komentarz']}"
															 id="komentarz"

															 required>
											</div>
											<input type="submit" value="Zmień" class="btn btn-primary" />
											<button type="button" class="btn btn-default" data-dismiss="modal">Anuluj</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</td>
				</tr>
			{/foreach}
		{/if}
  </tbody>
</table>




{if isset($error)}
<strong>{$error}</strong>
{/if}

{include file="footer.html.php"}
