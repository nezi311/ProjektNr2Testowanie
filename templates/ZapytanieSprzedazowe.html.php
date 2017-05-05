{include file="header.html.php"}
<div class="page-header">
  <h1>zapytanie sprzedarzowe</h1>
</div>

  {if isset($error)}
    <div class="alert alert-danger" id="alert" role="alert">{$error}</div>
  {/if}
<div class="container">
  <form class="form-horizontal" action="http://{$smarty.server.HTTP_HOST}{$subdir}Zapytania/insertS" method="POST" id="inserts">
    <div class="form-group">
      <label class="control-label col-sm-2" for="wiadomosc">wiadomosc :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="wiadomosc" name="wiadomosc" placeholder="Wprowadz wiadomosc">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="produkt">produkt :</label>
      <div class="col-sm-10">
        <select id="produkt" name="produkt" class="form-control">
        {if isset($tablicaTowar)}
         {foreach $tablicaTowar as $towar}
           <option value="{$towar['IdTowar']}">{$towar['NazwaTowaru']}</option>
         {/foreach}
        {/if}
      </select>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="Ilosc">Ilosc :</label>
      <div class="col-sm-10">
        <input type="number" min="1" max="1000" class="form-control" id="ilosc" name="ilosc" placeholder="Wprowadz Ilosc">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="Cena">Cena :</label>
      <div class="col-sm-10">
        <input type="number" step="0.01" min="0.01" class="form-control" id="cena" name="cena" placeholder="Wprowadz Cena">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="klient">klient: :</label>
      <div class="col-sm-10">
        <select id="klient" name="klent" class="form-control">
        {if isset($tablicaKlient)}
         {foreach $tablicaKlient as $klient}
           <option value="{$klient['IdKlient']}" selected="selected">{$klient['NazwaFirmy']}&nbsp;{$klient['OsobaKontaktowa']}</option>
         {/foreach}
        {/if}
      </select>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="data">data :</label>
      <div class="col-sm-10">
        <input type="date" class="form-control" id="data" name="data" placeholder="Wprowadz  date">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="Status">Status :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="status" name="status" placeholder="Wprowadz Status">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="Komentarz">Komentarz :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="komentarz" name="komentarz" placeholder="Wprowadz komentarz">
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Złóż</button>
      </div>
    </div>
  </form>
</div>


<table class="table table-striped">
  <thead>
  <tr>
		<th>Wiadomość</th>
		<th>Produkt</th>
		<th>Ilosc</th>
		<th>Klient</th>
    <th>Cena</th>
		<th>Data Przypomnienia</th>
		<th>Status</th>
		<th>Komentarz</th>
		<th>Edycja</th>


  </tr>
  </thead>
  <tbody>
		{if isset($tablicaSprzedaz)}
		  {foreach $tablicaSprzedaz as $sprzedaz}
				<tr>
					<td>{$sprzedaz['Wiadomosc']}</td>
					<td>{$sprzedaz['DaneTowar']}</td>
					<td>{$sprzedaz['Ilosc']}</td>
					<td>{$sprzedaz['DaneKlient']}</td>
          <td>{$sprzedaz['Cena']}</td>
					<td>{$sprzedaz['DataPrzypomnienia']}</td>
					<td>{$sprzedaz['Status']}</td>
					<td>{$sprzedaz['Komentarz']}</td>
					<td>
						<div class="btn-group" role="group">
							<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal{$sprzedaz['Id']}">Edytuj</button>
						</div>

						<div id="myModal{$sprzedaz['Id']}" class="modal fade" role="dialog">
							<div class="modal-dialog">

								<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title">Edycja</h4>
									</div>
									<div class="modal-body">
										<form action="http://{$smarty.server.HTTP_HOST}{$subdir}Zapytania/updateS" method="POST">
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
																 value="{$sprzedaz['Id']}"
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
                                 name="wiadomosc"
																 value="{$sprzedaz['Wiadomosc']}"
											           required>
											</div>

											  <div class="form-group">
											    <label for="produkt">Produkt:</label>
																 <select id="produkt" name="produkt" class="form-control">
												 				 {if isset($tablicaTowar)}
												 					{foreach $tablicaTowar as $towar}
																		{if $sprzedaz['towar'] == $towar['IdTowar']}
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
                                max="1000"
																class="form-control"
																placeholder="ilosc"
																id="ilosc"
                                name="ilosc"
																value="{$sprzedaz['Ilosc']}"
																required>
											</div>

											<div class="form-group">
											 <label for="klient">Klient:</label>
															 <select id="klient" name="klent" class="form-control">
															 {if isset($tablicaKlient)}
																{foreach $tablicaKlient as $klient}
																{if $sprzedaz['Klient'] == $klient['IdKlient']}
																	<option value="{$klient['IdKlient']}" selected="selected">{$klient['NazwaFirmy']}&nbsp;{$klient['OsobaKontaktowa']}</option>
																{else}
																	<option value="{$klient['IdKlient']}" selected="selected">{$klient['NazwaFirmy']}&nbsp;{$klient['OsobaKontaktowa']}</option>

																{/if}
																{/foreach}
															 {/if}
														 </select>
											</div>

                      <div class="form-group">
                       <label for="data">Cena:</label>
                       <input ng-model="newCena"
                               type="number" step="0.01"
                               min="0.01"
                               class="form-control"
                               placeholder="cena"
                               id="cena"
                               name="cena"
                               value="{$sprzedaz['Cena']}"
                               required>
                      </div>

											<div class="form-group">
											 <label for="data">Data:</label>
											 <input ng-model="newData"
															 type="date"
															 class="form-control"
															 placeholder="data"
															 id="data"
                               name="data"
															 value="{$sprzedaz['DataPrzypomnienia']}"
															 required>
											</div>

											<div class="form-group">
											 <label for="status">Status:</label>
											 <input ng-model="newStatus"
															 type="text"
															 class="form-control"
															 placeholder="status"
															 value="{$sprzedaz['Status']}"
															 id="status"
                               name="status"
															 required>
											</div>

											<div class="form-group">
											 <label for="komentarz">Komentarz:</label>
											 <input ng-model="newKomentarz"
															 type="text"
															 class="form-control"
															 placeholder="komentarz"
															 value="{$sprzedaz['Komentarz']}"
															 id="komentarz"
                               name="komentarz"

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



{include file="footer.html.php"}
