{include file="header.html.php"}

<div class="page-header">
	<h2>Lista Klientów</h2>
</div>


<div class="container">
<h1>Dodaj Klienta</h1>

{if isset($error)}
<strong>{$error}</strong>
{/if}
<!-- dyrektywa ng-app definiuje aplikację AngularJS -->
<!-- dyrektywa ng-controller określa kontroler dla tego elemntu HTML -->


<!-- formularz dodawania nowej kategorii -->
<form class="form" action="http://{$smarty.server.HTTP_HOST}{$subdir}Klient/insert" method="POST">
<div class="form-group">
    <label for="OsobaKontaktowa">OsobaKontaktowa:</label>
    <input
           type="text"
           class="form-control"
           placeholder="OsobaKontaktowa"
					 id="OsobaKontaktowa"
					 name="OsobaKontaktowa"
           required>
</div>

  <div class="form-group">
    <label for="Telefon">Telefon:</label>
		<input
           type="number"
           class="form-control"
           placeholder="Telefon"
					 id="Telefon"
					 name="Telefon"
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
 <label for="KategorieKlientow">KategorieKlientow:</label>
 <select name="KategorieKlientow" class="form-control">
	 {if isset($tablicaKategoriaKlient)}
	 	{foreach $tablicaKategoriaKlient as $kategoria}
		<option value="{$kategoria['idKategoria']}">{$kategoria['Nazwa']}</option>
		{/foreach}
	 {/if}
 <select>
<div class="form-group">
 <label for="ProponowaneProdukty">Proponowane Produkty:</label>
 <select name="ProponowaneProdukty[]" id="ProponowaneProdukty[]" class="form-control" multiple="multiple">
	 <option value="Susze">Susze</option>
	 <option value="Oleje">Oleje</option>
	 <option value="Oleoreznyny">Oleoreznyny</option>
 </select>

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
		<th>Osoba kontaktowa</th>
		<th>Telefon</th>
		<th>NazwaFirmy</th>
		<th>NIP</th>
		<th>Adres</th>
		<th>Email</th>
		<th>Kategoria klienta</th>
		<th>ProponowaneProdukty</th>
		<th>Edytuj</th>
  </tr>
  </thead>
  <tbody>
		{if isset($tablicaKlient)}
		  {foreach $tablicaKlient as $klient}
				<tr>
					<td>{$klient['IdKlient']}</td>
					<td>{$klient['OsobaKontaktowa']}</td>
						<td>{$klient['Telefon']}</td>
						<td>{$klient['NazwaFirmy']}</td>
						<td>{$klient['NIP']}</td>
						<td>{$klient['Adres']}</td>
						<td>{$klient['EMail']}</td>
						<td>{$klient['KategorieKlientow']}</td>
						<td>{$klient['ProponowaneProdukty']}</td>
						<td>
							<div class="btn-group" role="group">
								<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal{$klient['IdKlient']}">Edytuj</button>
			        </div>

							<div id="myModal{$klient['IdKlient']}" class="modal fade" role="dialog">
								<div class="modal-dialog">

									<!-- Modal content-->
									<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title">Edycja</h4>
										</div>
										<div class="modal-body">
											<form action="http://{$smarty.server.HTTP_HOST}{$subdir}Klient/update" method="POST" method="POST">
												<div class="form-group">

													<div class="form-group" style="display:none;">
													    <label for="id">Id:</label>
													    <input
													           type="text"
													           class="form-control"
													           placeholder="Imie"
																		 id="id"
																		 name="id"
													           required
																		 readonly="readonly"
																		 value="{$klient['IdKlient']}"
																		 >
													</div>
													<div class="form-group" style="display:none;">
													<label for="OsobaKontaktowa">OsobaKontaktowa:</label>
											    <input
																 value="{$klient['OsobaKontaktowa']}"
											           type="text"
											           class="form-control"
											           placeholder="OsobaKontaktowa"
																 id="OsobaKontaktowa"
																 name="OsobaKontaktowa"
											           required>
											</div>
											  <div class="form-group">
											    <label for="Telefon">Telefon:</label>
													<input
											           type="number"
											           class="form-control"
											           placeholder="Telefon"
																 id="Telefon"
																 name="Telefon"
											           required
																 value="{$klient['Telefon']}"
																 >
											 </div>
											 <div class="form-group">
												<label for="NazwaFirmy">Nazwa firmy:</label>
												<input
																type="text"
																class="form-control"
																placeholder="Nazwa firmy"
																id="NazwaFirmy"
																name="NazwaFirmy"
																required
																value="{$klient['NazwaFirmy']}"
																>

											</div>

											<div class="form-group">
											 <label for="NIP">NIP:</label>
											 <input
															 type="number"
															 class="form-control"
															 placeholder="NIP"
															 id="NIP"
															 name="NIP"
															 required
															 value="{$klient['NIP']}"
															 >
											</div>
											<div class="form-group">
											 <label for="Adres">Adres:</label>
											 <input
															 type="text"
															 class="form-control"
															 placeholder="Adres"
															 id="Adres"
															 name="Adres"
															 required
															 value="{$klient['Adres']}"
															 >
											</div>
											<div class="form-group">
											 <label for="Email">Email:</label>
											 <input
															 type="text"
															 class="form-control"
															 placeholder="firma@firma.com"
															 name="Email"
															 id="Email"
															 required
															 value="{$klient['EMail']}"
															 >
											</div>
											<div class="form-group">
											 <label for="KategorieKlientow">KategorieKlientow:</label>
											 <select name="KategorieKlientow" class="form-control">
												 {if isset($tablicaKategoriaKlient)}
												 	{foreach $tablicaKategoriaKlient as $kategoria}
														{if $klient['KategorieKlientow']}
															<option value="{$kategoria['idKategoria']}" selected="selected">{$kategoria['Nazwa']}</option>
														{else}
															<option value="{$kategoria['idKategoria']}">{$kategoria['Nazwa']}</option>
														{/if}
													{/foreach}
												 {/if}
											 <select>
											</div>
											<div class="form-group">
											 <label for="ProponowaneProdukty">Proponowane Produkty:</label>
											 <select name="ProponowaneProdukty[]" id="ProponowaneProdukty[]" class="form-control" multiple="multiple">
												 <option value="Susze">Susze</option>
												 <option value="Oleje">Oleje</option>
												 <option value="Oleoreznyny">Oleoreznyny</option>
											 </select>

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




</div>


{include file="footer.html.php"}
