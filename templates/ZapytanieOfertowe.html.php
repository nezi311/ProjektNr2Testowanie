{include file="header.html.php"}

<div class="page-header">
	<h2></h2>
</div>
<div class="container">
<h1>zapytanie ofertowe</h1>
<div ng-app="myApp" ng-controller="myController" >

<!-- formularz dodawania nowej kategorii -->
<form class="form" ng-submit="insertO()">
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
		<input ng-model="newProdukt"
           type="text"
           class="form-control"
           placeholder="produkt"
					 id="produkt"
           required>
 </div>

 <div class="form-group">
	<label for="ilosc">Ilosc:</label>
	<input ng-model="newIlosc"
					type="number"
					class="form-control"
					placeholder="ilosc"
					id="Ilosc"
					required>
</div>

<div class="form-group">
 <label for="dostawca">dostawca(email):</label>
 <input ng-model="newDostawca"
				 type="text"
				 class="form-control"
				 placeholder="dostawca"
				 id="dostawca"
				 required>
</div>

<div class="form-group">
 <label for="data">Data:</label>
 <input ng-model="newData"
				 type="text"
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

{if isset($error)}
<strong>{$error}</strong>
{/if}

{include file="footer.html.php"}
