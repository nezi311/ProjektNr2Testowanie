<?php
require_once('vendor/autoload.php');
\Config\Database\DBConfig::setDBConfig();
 $pdo=\Config\Database\DBConfig::getHandle();

try{
 $stmt = $pdo->query("
 DROP TABLE IF EXISTS
`ListaZapytanOfertowych`,
`ListaZapytanSprzedazowych`,
`ZapytanieOfertoweDoDostawcy`,
`ZapytanieSprzedazoweDoKlienta`,
`StanyMagazynowe`,
`Wydania`,
`Przyjecia`,
`Sprzedaz`,
`Zakup`,
`Produkt`,
`Klient`,
`Dostawca`,
`Magazyn`,
`RodzajProduktu`,
`KategoriaKlienta`
");
$stmt->execute();

/*************************************************/
/*******************PRACOWNICY********************/
/*************************************************/
$stmt = $pdo->query("DROP TABLE IF EXISTS `pracownicy`");
$stmt->execute();
$stmt = $pdo->query("CREATE TABLE IF NOT EXISTS `pracownicy`
(
`id` INT AUTO_INCREMENT,
`imie` VARCHAR(100) NOT NULL,
`nazwisko` VARCHAR(100) NOT NULL,
`dzial` VARCHAR(150) NOT NULL,
`stanowisko` VARCHAR(150) NOT NULL,
`telefon` VARCHAR(20) NULL,
`login` VARCHAR(100) NOT NULL UNIQUE,
`haslo` VARCHAR(150) NOT NULL,
`uprawnienia` INT NOT NULL,
`aktywny` INT DEFAULT 1,
PRIMARY KEY (id)
);");
$stmt->execute();

$users = array();
$users[]=array('imie'=>'Dawid','nazwisko'=>'Dominiak','dzial'=>'IT','stanowisko'=>'Administrator','telefon'=>'666666666','login'=>'root','haslo'=>'password','uprawnienia'=>0);
$users[]=array('imie'=>'Marcin','nazwisko'=>'Kornalski','dzial'=>'Obsługa klienta','stanowisko'=>'Pracownik','telefon'=>'777666555','login'=>'pracownik','haslo'=>'password','uprawnienia'=>1);
foreach($users as $element_user)
{
 $stmt = $pdo->prepare('INSERT INTO `pracownicy`(`imie`,`nazwisko`,`dzial`,`stanowisko`,`telefon`,`login`,`haslo`,`uprawnienia`) VALUES (:imie,:nazwisko,:dzial,:stanowisko,:telefon,:login,:password,:role)');
 $stmt -> bindValue(':login',$element_user['login'],PDO::PARAM_STR);
 $md5password = md5($element_user['haslo']);
 $stmt -> bindValue(':password',$md5password,PDO::PARAM_STR);
 $stmt -> bindValue(':role',$element_user['uprawnienia'],PDO::PARAM_INT);
 $stmt -> bindValue(':imie',$element_user['imie'],PDO::PARAM_STR);
 $stmt -> bindValue(':nazwisko',$element_user['nazwisko'],PDO::PARAM_STR);
 $stmt -> bindValue(':dzial',$element_user['dzial'],PDO::PARAM_STR);
 $stmt -> bindValue(':stanowisko',$element_user['stanowisko'],PDO::PARAM_STR);
 $stmt -> bindValue(':telefon',$element_user['telefon'],PDO::PARAM_STR);
 $wynik_zapytania = $stmt -> execute();

}

 /*************************************************/
 /*****************RodzajProduktu******************/
 /*************************************************/
 $stmt = $pdo->query("CREATE TABLE IF NOT EXISTS `RodzajProduktu`
 (
   `Id` INT AUTO_INCREMENT,
   `Nazwa` VARCHAR(100) NOT NULL,
   PRIMARY KEY (Id)
 )ENGINE = InnoDB;");
 $stmt->execute();

 $kategorie = array();
 $kategorie[]=array('Nazwa'=>'oleje');
$kategorie[]=array('Nazwa'=>'płyny');
$kategorie[]=array('Nazwa'=>'sypkie');
 foreach($kategorie as $element_kategoria)
 {
   $stmt = $pdo->prepare('INSERT INTO `RodzajProduktu`(`Nazwa`) VALUES (:Nazwa)');
   $stmt -> bindValue(':Nazwa',$element_kategoria['Nazwa'],PDO::PARAM_STR);
   $wynik_zapytania = $stmt -> execute();
 }
 /*************************************************/
 /****************KategoriaKlienta****************/
 /*************************************************/
 $stmt = $pdo->query("CREATE TABLE IF NOT EXISTS `KategoriaKlienta`
 (
   `Id` INT AUTO_INCREMENT,
   `Nazwa` VARCHAR(100) NOT NULL,
   PRIMARY KEY (Id)
 )ENGINE = InnoDB;");
 $stmt->execute();

 $dane = array();
 $dane[]=array('Nazwa'=>'kosmetyczna');
 $dane[]=array('Nazwa'=>'spożywcza');
 $dane[]=array('Nazwa'=>'budowalana');
 foreach($dane as $dana)
 {
   $stmt = $pdo->prepare('INSERT INTO `KategoriaKlienta`(`Nazwa`) VALUES (:Nazwa)');
   $stmt -> bindValue(':Nazwa',$dana['Nazwa'],PDO::PARAM_STR);
   $wynik_zapytania = $stmt -> execute();
 }

 /*************************************************/
 /******************PRODUKT************************/
 /*************************************************/
 $stmt = $pdo->query("CREATE TABLE IF NOT EXISTS `Produkt`
 (
   `Id` INT AUTO_INCREMENT,
   `Nazwa` VARCHAR(100) NOT NULL,
   `RodzajId` INT NOT NULL,
   `Opakowanie` VARCHAR(100) NOT NULL,
   `Typ` VARCHAR(100) NOT NULL,
   PRIMARY KEY (Id),
   FOREIGN KEY (RodzajId)
   REFERENCES RodzajProduktu(Id)
   ON DELETE CASCADE
 )ENGINE = InnoDB;");
 $stmt->execute();
 $dane = array();
 $dane[]=array(
 'Nazwa'=>'krem',
 'Opakowanie'=>'tubka',
 'RodzajId'=>'1',
 'Typ'=>'OR'
 );
 $dane[]=array(
 'Nazwa'=>'mąka',
 'Opakowanie'=>'worek',
 'RodzajId'=>'3',
 'Typ'=>'OR'
 );

 foreach($dane as $dana)
 {
   $stmt = $pdo->prepare('INSERT INTO `Produkt`(`Nazwa`,`Opakowanie`,`RodzajId`,`Typ`) VALUES (:Nazwa,:Opakowanie,:RodzajId,:Typ)');
   $stmt -> bindValue(':Nazwa',$dana['Nazwa'],PDO::PARAM_STR);
   $stmt -> bindValue(':Opakowanie',$dana['Opakowanie'],PDO::PARAM_STR);
   $stmt -> bindValue(':RodzajId',$dana['RodzajId'],PDO::PARAM_INT);
   $stmt -> bindValue(':Typ',$dana['Typ'],PDO::PARAM_STR);
   $wynik_zapytania = $stmt -> execute();
 }
  /*************************************************/
 /*******************Magazyn********************/
 /*************************************************/
 $stmt = $pdo->query("CREATE TABLE IF NOT EXISTS `Magazyn`
 (
   `Id` INT AUTO_INCREMENT,
   `Nazwa` varchar(50) NOT NULL,
   PRIMARY KEY (Id)
 );");
 $stmt->execute();

 $towary = array();
 $towary[]=array('Nazwa'=>'magazyn1');
 $towary[]=array('Nazwa'=>'magazyn2');
 foreach($towary as $element_towar)
 {
   $stmt = $pdo->prepare('INSERT INTO `Magazyn`(`Nazwa`) VALUES (:Nazwa)');
   $stmt -> bindValue(':Nazwa',$element_towar['Nazwa'],PDO::PARAM_STR);
   $wynik_zapytania = $stmt -> execute();
 }
/*************************************************/
/********************DOSTAWCA*  ******************/
/*************************************************/
 $stmt = $pdo->query("CREATE TABLE IF NOT EXISTS `Dostawca`
 (
   `Id` INT AUTO_INCREMENT,
   `Nazwa` varchar(100) NOT NULL,
   `Adres` varchar(100) NOT NULL,
   `OsobaKontaktowa` varchar(100) NOT NULL,
   `NrTelefonu` INT NOT NULL,
   `NIP` INT NOT NULL,
   `Email` varchar(100) NOT NULL,
   PRIMARY KEY (Id)
 );");
 $stmt->execute();

 $dostawcy = array();
 $dostawcy[]=array('Nazwa'=>'Żwirex',
                   'Adres'=>'63-400 Ostrów Wlkp Matejki 13',
                   'OsobaKontaktowa'=>'Jan Kowalski',
                   'NrTelefonu'=>'122345674',
                   'NIP'=>'1234567890',
                   'Email'=>'jk@wp.pl'
 );
 $dostawcy[]=array('Nazwa'=>'MKD',
                   'Adres'=>'63-666 Poznań Strzelecka 113',
                   'OsobaKontaktowa'=>'Magda Nowak',
                   'NrTelefonu'=>'154345674',
                   'NIP'=>'1286424890',
                   'Email'=>'mag.nowak@wp.pl'
 );
 foreach($dostawcy as $dostawca)
 {
   $stmt = $pdo->prepare('INSERT INTO `Dostawca`(`Nazwa`,`Adres`,`OsobaKontaktowa`,`NrTelefonu`,`NIP`,`Email`) VALUES (:Nazwa,:Adres,:OsobaKontaktowa,:NrTelefonu,:NIP,:Email)');
   $stmt -> bindValue(':Email',$dostawca['Email'],PDO::PARAM_STR);
   $stmt -> bindValue(':Nazwa',$dostawca['Nazwa'],PDO::PARAM_STR);
   $stmt -> bindValue(':Adres',$dostawca['Adres'],PDO::PARAM_STR);
   $stmt -> bindValue(':OsobaKontaktowa',$dostawca['OsobaKontaktowa'],PDO::PARAM_STR);
   $stmt -> bindValue(':NrTelefonu',$dostawca['NrTelefonu'],PDO::PARAM_INT);
   $stmt -> bindValue(':NIP',$dostawca['NIP'],PDO::PARAM_INT);
   $wynik_zapytania = $stmt -> execute();
 }
 /*************************************************/
 /*********************KLIENT**********************/
 /*************************************************/
  $stmt = $pdo->query("CREATE TABLE IF NOT EXISTS `Klient`
  (
   `Id` INT AUTO_INCREMENT,
   `Nazwa` varchar(100) NOT NULL,
   `Adres` varchar(100) NOT NULL,
   `OsobaKontaktowa` varchar(100) NOT NULL,
   `NrTelefonu` INT NOT NULL,
   `KategoriaKlienta` INT NOT NULL,
   `ProduktyKtorychUzywa` INT NOT NULL,
   `NIP` INT NOT NULL,
   `Email` varchar(100) NOT NULL,
   PRIMARY KEY (Id),
   FOREIGN KEY (KategoriaKlienta)
   REFERENCES KategoriaKlienta(Id),
   FOREIGN KEY (ProduktyKtorychUzywa)
   REFERENCES Produkt(Id)
  );");
  $stmt->execute();

  $klienci = array();
 $klienci[]=array('Nazwa'=>'Kwiaciarnia Roza',
                   'Adres'=>'63-400 Ostrów Wlkp Bujna 2',
                   'OsobaKontaktowa'=>'Monika Zontek',
                   'NrTelefonu'=>'122345674',
                   'NIP'=>'1234567890',
                   'Email'=>'mzkroza@wp.pl',
                   'KategoriaKlienta'=>'2',
                   'ProduktyKtorychUzywa'=>'2'
 );
 $klienci[]=array('Nazwa'=>'ZAP',
                   'Adres'=>'63-400 Krotoszyn Jaśminowa 2',
                   'OsobaKontaktowa'=>'Hubert Bera',
                   'NrTelefonu'=>'166745674',
                   'NIP'=>'1234560950',
                   'Email'=>'jumsongay@yahoo.co.uk',
                   'KategoriaKlienta'=>'1',
                   'ProduktyKtorychUzywa'=>'1'
 );

  foreach($klienci as $klient)
  {
    $stmt = $pdo->prepare('INSERT INTO `Klient`(`Nazwa`,`Adres`,`OsobaKontaktowa`,`NrTelefonu`,`NIP`,`Email`,`KategoriaKlienta`,`ProduktyKtorychUzywa`) VALUES (:Nazwa,:Adres,:OsobaKontaktowa,:NrTelefonu,:NIP,:Email,:KategoriaKlienta,:ProduktyKtorychUzywa)');
    $stmt -> bindValue(':Nazwa',$klient['Nazwa'],PDO::PARAM_STR);
    $stmt -> bindValue(':Adres',$klient['Adres'],PDO::PARAM_STR);
    $stmt -> bindValue(':OsobaKontaktowa',$klient['OsobaKontaktowa'],PDO::PARAM_STR);
    $stmt -> bindValue(':NrTelefonu',$klient['NrTelefonu'],PDO::PARAM_INT);
    $stmt -> bindValue(':NIP',$klient['NIP'],PDO::PARAM_INT);
    $stmt -> bindValue(':Email',$klient['Email'],PDO::PARAM_STR);
    $stmt -> bindValue(':KategoriaKlienta',$klient['KategoriaKlienta'],PDO::PARAM_INT);
    $stmt -> bindValue(':ProduktyKtorychUzywa',$klient['ProduktyKtorychUzywa'],PDO::PARAM_INT);
    $wynik_zapytania = $stmt -> execute();
  }
  /*************************************************/
 /*******************ZAKUP********************/
 /*************************************************/
 $stmt = $pdo->query("CREATE TABLE IF NOT EXISTS `Zakup`
 (
   `Id` INT AUTO_INCREMENT,
   `Magazyn` INT  NULL,
   `Klient` INT  NULL,
   `Dostawca` INT not NULL,
   `Produkt` int NOT NULL,
   `Ilosc` INT not NULL,
   `CenaZakupu` float not NULL,
   `DataWaznosci` date not  NULL,
   `NrPartii` INT not NULL,
   `NrArtykulu` INT not NULL,
   `DataDostawy` date not  NULL,

	PRIMARY KEY (Id),
   FOREIGN KEY (Magazyn)
   REFERENCES Magazyn(Id),
   FOREIGN KEY (Klient)
   REFERENCES Klient(Id),
   FOREIGN KEY (Produkt)
   REFERENCES Produkt(Id),
   FOREIGN KEY (Dostawca)
   REFERENCES Dostawca(Id)
 )ENGINE = InnoDB;");
 $stmt->execute();

 $kategorie = array();
 $kategorie[]=array(
 'Magazyn'=>'1',
 'Klient'=>'1',
 'Dostawca'=>'1',
 'Produkt'=>'1',
 'Ilosc'=>'12',
 'CenaZakupu'=>'6.99',
 'DataWaznosci'=>'2019-12-12',
 'NrPartii'=>'1234',
 'NrArtykulu'=>'765',
 'DataDostawy'=>'2017-04-03');

  $kategorie[]=array(
 'Magazyn'=>'2',
 'Klient'=>'2',
 'Dostawca'=>'2',
 'Produkt'=>'2',
 'Ilosc'=>'4',
 'CenaZakupu'=>'12.99',
 'DataWaznosci'=>'2019-02-29',
 'NrPartii'=>'765788',
 'NrArtykulu'=>'66335',
 'DataDostawy'=>'2017-02-23');
 foreach($kategorie as $element_kategoria)
 {
   $stmt = $pdo->prepare('INSERT INTO `Zakup`(
 Magazyn,
 Klient,
 Dostawca,
 Produkt,
 Ilosc,
 CenaZakupu,
 DataWaznosci,
 NrPartii,
 NrArtykulu,
 DataDostawy)
 VALUES
 (
 :Magazyn,
 :Klient,
 :Dostawca,
 :Produkt,
 :Ilosc,
 :CenaZakupu,
 :DataWaznosci,
 :NrPartii,
 :NrArtykulu,
 :DataDostawy
 )');
   $stmt -> bindValue(':Magazyn',$element_kategoria['Magazyn'],PDO::PARAM_INT);
   $stmt -> bindValue(':Klient',$element_kategoria['Klient'],PDO::PARAM_INT);
   $stmt -> bindValue(':Dostawca',$element_kategoria['Dostawca'],PDO::PARAM_INT);
   $stmt -> bindValue(':Produkt',$element_kategoria['Produkt'],PDO::PARAM_INT);
   $stmt -> bindValue(':Ilosc',$element_kategoria['Ilosc'],PDO::PARAM_INT);
   $stmt -> bindValue(':CenaZakupu',$element_kategoria['CenaZakupu'],PDO::PARAM_STR);
   $stmt -> bindValue(':DataWaznosci',$element_kategoria['DataWaznosci'],PDO::PARAM_STR);
   $stmt -> bindValue(':NrPartii',$element_kategoria['NrPartii'],PDO::PARAM_INT);
   $stmt -> bindValue(':NrArtykulu',$element_kategoria['NrArtykulu'],PDO::PARAM_INT);
   $stmt -> bindValue(':DataDostawy',$element_kategoria['DataDostawy'],PDO::PARAM_STR);
   $wynik_zapytania = $stmt -> execute();
 }
 /*************************************************/
 /*******************SPRZEDAZ**********************/
 /*************************************************/
 $stmt = $pdo->query("CREATE TABLE IF NOT EXISTS `Sprzedaz`
 (
   `Id` INT AUTO_INCREMENT,
   `Magazyn` INT  NULL,
   `Klient` INT  not NULL,
   `Dostawca` INT NULL,
   `Produkt` int NOT NULL,
   `Ilosc` INT not NULL,
   `CenaSprzedazy` float not NULL,
   `NrPartii` INT not NULL,
   `NrArtykulu` INT not NULL,
   `DataDostawy` date not  NULL,

	PRIMARY KEY (Id),
   FOREIGN KEY (Magazyn)
   REFERENCES Magazyn(Id),
   FOREIGN KEY (Klient)
   REFERENCES Klient(Id),
   FOREIGN KEY (Produkt)
   REFERENCES Produkt(Id),
   FOREIGN KEY (Dostawca)
   REFERENCES Dostawca(Id)
 )ENGINE = InnoDB;");
 $stmt->execute();
  $kategorie = array();
 $kategorie[]=array(
 'Magazyn'=>'1',
 'Klient'=>'1',
 'Dostawca'=>'1',
 'Produkt'=>'1',
 'Ilosc'=>'12',
 'CenaSprzedazy'=>'6.99',
'NrPartii'=>'1234',
 'NrArtykulu'=>'765',
 'DataDostawy'=>'2017-04-03');

  $kategorie[]=array(
 'Magazyn'=>'2',
 'Klient'=>'2',
 'Dostawca'=>'2',
 'Produkt'=>'2',
 'Ilosc'=>'4',
 'CenaSprzedazy'=>'12.99',
'NrPartii'=>'765788',
 'NrArtykulu'=>'66335',
 'DataDostawy'=>'2017-02-23');
 foreach($kategorie as $element_kategoria)
 {
   $stmt = $pdo->prepare('INSERT INTO `Sprzedaz`(
 Magazyn,
 Klient,
 Dostawca,
 Produkt,
 Ilosc,
 CenaSprzedazy,
 NrPartii,
 NrArtykulu,
 DataDostawy)
 VALUES
 (
 :Magazyn,
 :Klient,
 :Dostawca,
 :Produkt,
 :Ilosc,
 :CenaSprzedazy,
 :NrPartii,
 :NrArtykulu,
 :DataDostawy
 )');
   $stmt -> bindValue(':Magazyn',$element_kategoria['Magazyn'],PDO::PARAM_INT);
   $stmt -> bindValue(':Klient',$element_kategoria['Klient'],PDO::PARAM_INT);
   $stmt -> bindValue(':Dostawca',$element_kategoria['Dostawca'],PDO::PARAM_INT);
   $stmt -> bindValue(':Produkt',$element_kategoria['Produkt'],PDO::PARAM_INT);
   $stmt -> bindValue(':Ilosc',$element_kategoria['Ilosc'],PDO::PARAM_INT);
   $stmt -> bindValue(':CenaSprzedazy',$element_kategoria['CenaSprzedazy'],PDO::PARAM_STR);
   $stmt -> bindValue(':NrPartii',$element_kategoria['NrPartii'],PDO::PARAM_INT);
   $stmt -> bindValue(':NrArtykulu',$element_kategoria['NrArtykulu'],PDO::PARAM_INT);
   $stmt -> bindValue(':DataDostawy',$element_kategoria['DataDostawy'],PDO::PARAM_STR);
   $wynik_zapytania = $stmt -> execute();
 }
/*************************************************/
 /*******************PRZYJECIA********************/
 /*************************************************/
 $stmt = $pdo->query("CREATE TABLE IF NOT EXISTS `Przyjecia`
 (
   `Id` INT AUTO_INCREMENT,
   `Produkt` INT NOT NULL,
   `Dostawca` INT NOT NULL,
   `DataDostawy` DATE NOT NULL,
   `IdZakupu` INT NOT NULL,
   PRIMARY KEY (Id),
   FOREIGN KEY (IdZakupu)
   REFERENCES Zakup(Id),
   FOREIGN KEY (Dostawca)
   REFERENCES Dostawca(Id)
 )ENGINE = InnoDB;");
 $stmt->execute();
  $kategorie = array();
 $kategorie[]=array(
 'Produkt'=>'1',
 'Dostawca'=>'1',
 'DataDostawy'=>'2017-02-02',
 'IdZakupu'=>'1'
);
 $kategorie[]=array(
 'Produkt'=>'2',
 'Dostawca'=>'2',
 'DataDostawy'=>'2017-04-12',
 'IdZakupu'=>'2'
);
 foreach($kategorie as $element_kategoria)
 {
   $stmt = $pdo->prepare('INSERT INTO `Przyjecia`(
 Produkt,
 Dostawca,
 DataDostawy,
 IdZakupu)
 VALUES
 (
 :Produkt,
 :Dostawca,
 :DataDostawy,
 :IdZakupu
 )');
   $stmt -> bindValue(':Produkt',$element_kategoria['Produkt'],PDO::PARAM_INT);
   $stmt -> bindValue(':DataDostawy',$element_kategoria['DataDostawy'],PDO::PARAM_STR);
   $stmt -> bindValue(':Dostawca',$element_kategoria['Dostawca'],PDO::PARAM_INT);
   $stmt -> bindValue(':IdZakupu',$element_kategoria['IdZakupu'],PDO::PARAM_STR);
   $wynik_zapytania = $stmt -> execute();
 }

 /*************************************************/
 /*******************WYDANIA***********************/
 /*************************************************/
 $stmt = $pdo->query("CREATE TABLE IF NOT EXISTS `Wydania`
 (
   `Id` INT AUTO_INCREMENT,
   `Produkt` INT NOT NULL,
   `Klient` INT NOT NULL,
   `DataWydania` DATE NOT NULL,
   `IdSprzedazy` INT NOT NULL,
   PRIMARY KEY (Id),
   FOREIGN KEY (IdSprzedazy)
   REFERENCES Sprzedaz(Id),
   FOREIGN KEY (Klient)
   REFERENCES Klient(Id)
 )ENGINE = InnoDB;");
 $stmt->execute();
   $kategorie = array();
 $kategorie[]=array(
 'Produkt'=>'1',
 'Klient'=>'1',
 'DataWydania'=>'2017-02-02',
 'IdSprzedazy'=>'1'
);
 $kategorie[]=array(
 'Produkt'=>'2',
 'Klient'=>'2',
 'DataWydania'=>'2017-04-12',
 'IdSprzedazy'=>'2'
);
 foreach($kategorie as $element_kategoria)
 {
   $stmt = $pdo->prepare('INSERT INTO `Wydania`(
 Produkt,
 Klient,
 DataWydania,
 IdSprzedazy)
 VALUES
 (
 :Produkt,
 :Klient,
 :DataWydania,
 :IdSprzedazy
 )');
   $stmt -> bindValue(':Produkt',$element_kategoria['Produkt'],PDO::PARAM_INT);
   $stmt -> bindValue(':DataWydania',$element_kategoria['DataWydania'],PDO::PARAM_STR);
   $stmt -> bindValue(':Klient',$element_kategoria['Klient'],PDO::PARAM_INT);
   $stmt -> bindValue(':IdSprzedazy',$element_kategoria['IdSprzedazy'],PDO::PARAM_STR);
   $wynik_zapytania = $stmt -> execute();
 }
 /*************************************************/
 /***************STANY_MAGAZYNOWE******************/
 /*************************************************/
 $stmt = $pdo->query("CREATE TABLE IF NOT EXISTS `StanyMagazynowe`
 (
   `Id` INT AUTO_INCREMENT,
   `Produkt` int NOT NULL,
   `NrPartii` INT NOT NULL,
   `DataWaznosci` date NOT NULL,
   `CenaZakupu` float NOT NULL,
   `CenaSprzedazy` float NOT NULL,
   `Dostawca` int NOT NULL,
   `IloscNaMagazynie` float NOT NULL,
   `NumerArtykulu` int NOT NULL,
   `IdPrzyjecia` INT NOT NULL,
   `DataDostawy` DATE NOT NULL,
   `NrZamowienia` INT NOT NULL,
   PRIMARY KEY (Id),
   FOREIGN KEY (Produkt)
   REFERENCES Produkt(Id),
   FOREIGN KEY (Dostawca)
   REFERENCES Dostawca(Id),
   FOREIGN KEY (IdPrzyjecia)
   REFERENCES Przyjecia(Id),
   FOREIGN KEY (NrZamowienia)
   REFERENCES Zakup(Id)
 )ENGINE = InnoDB;");
 $stmt->execute();
  $kategorie = array();
 $kategorie[]=array(
'Produkt'=>'1',
   'NrPartii'=>'32314124',
   'DataWaznosci'=>'2019-12-12',
   'CenaZakupu'=>'2.16',
   'CenaSprzedazy' =>'3.50',
   'Dostawca' =>'1',
   'IloscNaMagazynie' =>'200',
   'NumerArtykulu' =>'257767',
   'IdPrzyjecia' =>'1',
   'DataDostawy' =>'2017-03-23',
   'NrZamowienia' =>'1');

 $kategorie[]=array(
   'Produkt' =>'2',
   'NrPartii' =>'23535',
   'DataWaznosci' =>'2020-02-22',
   'CenaZakupu' =>'4.99',
   'CenaSprzedazy' =>'6.00',
   'Dostawca' =>'2',
   'IloscNaMagazynie' =>'10',
   'NumerArtykulu' =>'534634',
   'IdPrzyjecia' =>'2',
   'DataDostawy' =>'2017-04-03',
   'NrZamowienia' =>'2');
 foreach($kategorie as $element_kategoria)
 {
   $stmt = $pdo->prepare('INSERT INTO `StanyMagazynowe`(
   Produkt,
   NrPartii,
   DataWaznosci,
   CenaZakupu,
   CenaSprzedazy,
   Dostawca,
   IloscNaMagazynie,
   NumerArtykulu,
   IdPrzyjecia,
   DataDostawy,
   NrZamowienia)
 VALUES
 (
:Produkt,
:NrPartii,
:DataWaznosci,
:CenaZakupu,
:CenaSprzedazy,
:Dostawca,
:IloscNaMagazynie,
:NumerArtykulu,
:IdPrzyjecia,
:DataDostawy,
:NrZamowienia
 )');
   $stmt -> bindValue(':Produkt',$element_kategoria['Produkt'],PDO::PARAM_INT);
   $stmt -> bindValue(':NrPartii',$element_kategoria['NrPartii'],PDO::PARAM_INT);
   $stmt -> bindValue(':DataWaznosci',$element_kategoria['DataWaznosci'],PDO::PARAM_STR);
   $stmt -> bindValue(':CenaZakupu',$element_kategoria['CenaZakupu'],PDO::PARAM_STR);
   $stmt -> bindValue(':CenaSprzedazy',$element_kategoria['CenaSprzedazy'],PDO::PARAM_STR);
   $stmt -> bindValue(':Dostawca',$element_kategoria['Dostawca'],PDO::PARAM_INT);
   $stmt -> bindValue(':IloscNaMagazynie',$element_kategoria['IloscNaMagazynie'],PDO::PARAM_INT);
   $stmt -> bindValue(':NumerArtykulu',$element_kategoria['NumerArtykulu'],PDO::PARAM_INT);
   $stmt -> bindValue(':IdPrzyjecia',$element_kategoria['IdPrzyjecia'],PDO::PARAM_INT);
   $stmt -> bindValue(':DataDostawy',$element_kategoria['DataDostawy'],PDO::PARAM_STR);
   $stmt -> bindValue(':NrZamowienia',$element_kategoria['NrZamowienia'],PDO::PARAM_STR);
   $wynik_zapytania = $stmt -> execute();
 }

 /*************************************************/
 /********Zapytanie_Ofertowe_Do_Dostawcy***********/
 /*************************************************/
 $stmt = $pdo->query("CREATE TABLE IF NOT EXISTS `ZapytanieOfertoweDoDostawcy`
 (
   `Id` INT AUTO_INCREMENT,
   `Produkt` INT NOT NULL,
   `Wiadomosc` VARCHAR(100) NOT NULL,
   `Ilosc` INT NOT NULL,
   `Dostawca` INT NOT NULL,
   `DataPrzypomnienia` INT NOT NULL,
   `Status` VARCHAR(100) NOT NULL,
   `Komentarz` VARCHAR(100) NOT NULL,
   PRIMARY KEY (Id),
   FOREIGN KEY (Produkt)
   REFERENCES Produkt(Id),
   FOREIGN KEY (Dostawca)
   REFERENCES Dostawca(Id)
 )ENGINE = InnoDB;");
 $stmt->execute();
  $kategorie = array();
 $kategorie[]=array('Produkt'=>'1','Wiadomosc'=>'1','Ilosc'=>'8','Dostawca' =>'1','DataPrzypomnienia'=>'2017-04-02','Status'=>'Oczekujący','Komentarz'=>'1');
 $kategorie[]=array(
	'Produkt'=>'2',
	'Wiadomosc'=>'1',
	'Ilosc'=>'15',
	'Dostawca' =>'2',
	'DataPrzypomnienia'=>'2017-04-26',
	'Status'=>'Potwierdzony',
	'Komentarz'=>'1'
);
 foreach($kategorie as $element_kategoria)
 {
   $stmt = $pdo->prepare('INSERT INTO `ZapytanieOfertoweDoDostawcy`(
   Produkt,
   Wiadomosc,
   Ilosc,
   Dostawca,
   DataPrzypomnienia,
   Status,
   Komentarz
)
 VALUES
 (
   :Produkt,
   :Wiadomosc,
   :Ilosc,
   :Dostawca,
   :DataPrzypomnienia,
   :Status,
   :Komentarz
 )');
   $stmt -> bindValue(':Produkt',$element_kategoria['Produkt'],PDO::PARAM_INT);
   $stmt -> bindValue(':Ilosc',$element_kategoria['Ilosc'],PDO::PARAM_INT);
   $stmt -> bindValue(':Wiadomosc',$element_kategoria['Wiadomosc'],PDO::PARAM_STR);
   $stmt -> bindValue(':Dostawca',$element_kategoria['Dostawca'],PDO::PARAM_INT);
   $stmt -> bindValue(':DataPrzypomnienia',$element_kategoria['DataPrzypomnienia'],PDO::PARAM_STR);
   $stmt -> bindValue(':Status',$element_kategoria['Status'],PDO::PARAM_STR);
   $stmt -> bindValue(':Komentarz',$element_kategoria['Komentarz'],PDO::PARAM_STR);
   $wynik_zapytania = $stmt -> execute();
 }
 /*************************************************/
 /*******Zapytanie_Sprzedazowe_Do_Klienta**********/
 /*************************************************/
 $stmt = $pdo->query("CREATE TABLE IF NOT EXISTS `ZapytanieSprzedazoweDoKlienta`
 (
   `Id` INT AUTO_INCREMENT,
   `Produkt` INT NOT NULL,
   `Wiadomosc` VARCHAR(100) NOT NULL,
   `Ilosc` INT  NULL,
   `Cena` float  NULL,
   `Klient` INT NOT NULL,
   `DataPrzypomnienia` INT NOT NULL,
   `Status` VARCHAR(100) NOT NULL,
   `Komentarz` VARCHAR(100) NOT NULL,
   PRIMARY KEY (Id),
   FOREIGN KEY (Produkt)
   REFERENCES Produkt(Id),
   FOREIGN KEY (Klient)
   REFERENCES Klient(Id)
 )ENGINE = InnoDB;");
 $stmt->execute();
 $kategorie = array();
 $kategorie[]=array(
	'Produkt'=>'1',
	'Wiadomosc'=>'1',
	'Ilosc'=>'8',
	'Cena'=>'8',
	'Klient' =>'1',
	'DataPrzypomnienia'=>'2017-04-02',
	'Status'=>'Oczekujący',
	'Komentarz'=>'1'
);
 $kategorie[]=array(
	'Produkt'=>'1',
	'Wiadomosc'=>'1',
	'Ilosc'=>'8',
	'Cena'=>'8',
	'Klient' =>'1',
	'DataPrzypomnienia'=>'2017-04-02',
	'Status'=>'Oczekujący',
	'Komentarz'=>'1'
);
 foreach($kategorie as $element_kategoria)
 {
   $stmt = $pdo->prepare('INSERT INTO `ZapytanieSprzedazoweDoKlienta`(
   Produkt,
   Wiadomosc,
   Ilosc,
   Cena,
   Klient,
   DataPrzypomnienia,
   Status,
   Komentarz
)
 VALUES
 (
   :Produkt,
   :Wiadomosc,
   :Ilosc,
   :Cena,
   :Klient,
   :DataPrzypomnienia,
   :Status,
   :Komentarz
 )');
   $stmt -> bindValue(':Produkt',$element_kategoria['Produkt'],PDO::PARAM_INT);
   $stmt -> bindValue(':Ilosc',$element_kategoria['Ilosc'],PDO::PARAM_INT);
   $stmt -> bindValue(':Cena',$element_kategoria['Cena'],PDO::PARAM_STR);
   $stmt -> bindValue(':Wiadomosc',$element_kategoria['Wiadomosc'],PDO::PARAM_STR);
   $stmt -> bindValue(':Klient',$element_kategoria['Klient'],PDO::PARAM_INT);
   $stmt -> bindValue(':DataPrzypomnienia',$element_kategoria['DataPrzypomnienia'],PDO::PARAM_STR);
   $stmt -> bindValue(':Status',$element_kategoria['Status'],PDO::PARAM_STR);
   $stmt -> bindValue(':Komentarz',$element_kategoria['Komentarz'],PDO::PARAM_STR);
   $wynik_zapytania = $stmt -> execute();
 }
 /*************************************************/
 /*********LISTA_ZAPYTAN_OFERTOWYCH****************/
 /*************************************************/
 $stmt = $pdo->query("CREATE TABLE IF NOT EXISTS `ListaZapytanOfertowych`
 (
   `Id` INT AUTO_INCREMENT,
   `IdZapytanie` INT NOT NULL,
   PRIMARY KEY (Id),
   FOREIGN KEY (IdZapytanie)
   REFERENCES ZapytanieOfertoweDoDostawcy(Id)
 )ENGINE = InnoDB;");
 $stmt->execute();
 $kategorie = array();
 $kategorie[]=array('IdZapytanie'=>'1');
 $kategorie[]=array('IdZapytanie'=>'2');
 foreach($kategorie as $element_kategoria)
 {
   $stmt = $pdo->prepare('INSERT INTO `ListaZapytanOfertowych`(IdZapytanie) VALUES(:IdZapytanie)');
   $stmt -> bindValue(':IdZapytanie',$element_kategoria['IdZapytanie'],PDO::PARAM_INT);
   $wynik_zapytania = $stmt -> execute();
 }
 /*************************************************/
 /*********LISTA_ZAPYTAN_SPRZEDAZOWYCH*************/
 /*************************************************/
 $stmt = $pdo->query("CREATE TABLE IF NOT EXISTS `ListaZapytanSprzedazowych`
 (
   `Id` INT AUTO_INCREMENT,
   `IdZapytanie` INT NOT NULL,
   PRIMARY KEY (Id),
   FOREIGN KEY (IdZapytanie)
   REFERENCES ZapytanieSprzedazoweDoKlienta(Id)
 )ENGINE = InnoDB;");
 $stmt->execute();
 $kategorie = array();
 $kategorie[]=array('IdZapytanie'=>'1');
 $kategorie[]=array('IdZapytanie'=>'2');
 foreach($kategorie as $element_kategoria)
 {
   $stmt = $pdo->prepare('INSERT INTO `ListaZapytanSprzedazowych`(IdZapytanie) VALUES(:IdZapytanie)');
   $stmt -> bindValue(':IdZapytanie',$element_kategoria['IdZapytanie'],PDO::PARAM_INT);
   $wynik_zapytania = $stmt -> execute();
 }

 echo ("Baza została zainstalowana.");
 return true;
}
catch (PDOException $e)
{
 echo ('Wystąpił błąd biblioteki PDO: ' .$e->getMessage());
 return false;
}

?>
