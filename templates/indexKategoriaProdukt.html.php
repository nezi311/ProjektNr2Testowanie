{include file="header.html.php"}

<div class="page-header">
	<h2>Lista Kategorii</h2>
</div>


<div class="container">
<h1>Dodaj Kategorię</h1>
<!-- dyrektywa ng-app definiuje aplikację AngularJS -->
<!-- dyrektywa ng-controller określa kontroler dla tego elemntu HTML -->


<!-- formularz dodawania nowej kategorii -->
<form class="form" action="http://{$smarty.server.HTTP_HOST}{$subdir}KategoriaProdukt/insert" method="POST">
	<div class="form-group">
	    <label for="pelnanazwa">Nazwa:</label>
	    <input
	           type="text"
	           class="form-control"
	           placeholder="Pełna"
						 id="Nazwa"
						 name="Nazwa"
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
		<th>Nazwa</th>
		<th>Edytuj</th>
		<th>Usuń</th>
  </tr>
  </thead>
  <tbody>
		{if isset($tablicaKategoriaProdukt)}
		  {foreach $tablicaKategoriaProdukt as $KategoriaProdukt}
				<tr>
					<td>{$KategoriaProdukt['IdRodzaj']}</td>
					<td>{$KategoriaProdukt['Nazwa']}</td>
					<td>
						<div class="btn-group" role="group">
							<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal{$KategoriaProdukt['IdRodzaj']}">Edytuj</button>
						</div>

						<div id="myModal{$KategoriaProdukt['IdRodzaj']}" class="modal fade" role="dialog">
							<div class="modal-dialog">

								<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title">Edycja</h4>
									</div>
									<div class="modal-body">
										<form action="http://{$smarty.server.HTTP_HOST}{$subdir}KategoriaProdukt/update" method="POST" method="POST">
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
																	 value="{$KategoriaProdukt['IdRodzaj']}"
																	 >
												</div>
												<div class="form-group">
												<label for="Nazwa">Nazwa:</label>
												<input
															 value="{$KategoriaProdukt['Nazwa']}"
															 type="text"
															 class="form-control"
															 placeholder="Nazwa"
															 id="Nazwa"
															 name="Nazwa"
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
							<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModalUsun{$KategoriaProdukt['IdRodzaj']}">Usuń</button>
						</div>

						<div id="myModalUsun{$KategoriaProdukt['IdRodzaj']}" class="modal fade" role="dialog">
							<div class="modal-dialog">

								<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title">Czy na pewno chcesz usunąć kategorię?</h4>
									</div>
									<div class="modal-body">
										Czy na pewno chcesz usunąć kategorię <strong>{$KategoriaProdukt['Nazwa']}</strong>?
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Anuluj</button>
										<a type="button" class="btn btn-warning" href="http://{$smarty.server.HTTP_HOST}{$subdir}KategoriaProdukt/delete/{$KategoriaProdukt['IdRodzaj']}">Usuń</a>
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


{if isset($error)}
<strong>{$error}</strong>
{/if}

{include file="footer.html.php"}
