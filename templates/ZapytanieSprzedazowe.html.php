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
        <input type="text" class="form-control" id="produkt" name="produkt" placeholder="Wprowadz produkt">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="Ilosc">Ilosc :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="Ilosc" name="Ilosc" placeholder="Wprowadz Ilosc">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="Cena">Cena :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="Cena" name="Cena" placeholder="Wprowadz Cena">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="klient">klient(email): :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="klient" name="klient" placeholder="Wprowadz klient">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="data">data :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="data" name="data" placeholder="Wprowadz  date">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="Status">Status :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="Status" name="Status" placeholder="Wprowadz Status">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="Komentarz">Komentarz :</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="Komentarz" name="Komentarz" placeholder="Wprowadz komentarz">
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Złóż</button>
      </div>
    </div>
  </form>
</div>


{include file="footer.html.php"}
