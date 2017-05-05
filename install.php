<?php
require_once('vendor/autoload.php');
\Config\Database\DBConfig::setDBConfig();
 $pdo=\Config\Database\DBConfig::getHandle();

try{
  $stmt = $pdo->query("
  DROP TABLE IF EXISTS
 `ZapytanieOfertoweDoDostawcy`,
 `ZapytanieSprzedazoweDoKlienta`
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
 /*******************Magazyn********************/
 /*************************************************/
 $stmt = $pdo->query("DROP TABLE IF EXISTS `Magazyn`");
 $stmt->execute();
 $stmt = $pdo->query("CREATE TABLE IF NOT EXISTS `Magazyn`
 (
   `IdMagazyn` INT AUTO_INCREMENT,
   `Nazwa` VARCHAR(100) NOT NULL,
   PRIMARY KEY (IdMagazyn)
 )ENGINE = InnoDB;");
 $stmt->execute();

 $kategorie = array();
 $kategorie[]=array('Nazwa'=>'Magazyn1');
 $kategorie[]=array('Nazwa'=>'Magazyn2');
 $kategorie[]=array('Nazwa'=>'Magazyn3');
 $kategorie[]=array('Nazwa'=>'Magazyn4');
 foreach($kategorie as $element_kategoria)
 {
   $stmt = $pdo->prepare('INSERT INTO `Magazyn`(`Nazwa`) VALUES (:Nazwa)');
   $stmt -> bindValue(':Nazwa',$element_kategoria['Nazwa'],PDO::PARAM_STR);
   $wynik_zapytania = $stmt -> execute();
 }
 /*************************************************/
 /****************RuchMagazynowyPrzyjecie**********/
 /*************************************************/
 $stmt = $pdo->query("DROP TABLE IF EXISTS `RuchMagazynowyPrzyjecie`");
 $stmt->execute();
 $stmt = $pdo->query("CREATE TABLE IF NOT EXISTS `RuchMagazynowyPrzyjecie`
 (
   `Id` INT AUTO_INCREMENT,
   `Produkt` INT NOT NULL,
   `Dostawca` INT NOT NULL,
   `DataDostawy` DATE NOT NULL,
   `IdZakupu` INT NOT NULL,
   PRIMARY KEY (Id)
 )ENGINE = InnoDB;");

 $stmt->execute();
/*
 $kategorie = array();
 $kategorie[]=array('Nazwa'=>'Magazyn1');
 $kategorie[]=array('Nazwa'=>'Magazyn2');
 $kategorie[]=array('Nazwa'=>'Magazyn3');
 $kategorie[]=array('Nazwa'=>'Magazyn4');
 foreach($kategorie as $element_kategoria)
 {
   $stmt = $pdo->prepare('INSERT INTO `Magazyn`(`Nazwa`) VALUES (:Nazwa)');
   $stmt -> bindValue(':Nazwa',$element_kategoria['Nazwa'],PDO::PARAM_STR);
   $wynik_zapytania = $stmt -> execute();
 }
 */

 /*************************************************/
 /*******************RuchMagazynowyWydanie*********/
 /*************************************************/


 /*************************************************/
 /*******************StanyMagazynowe********************/
 /*************************************************/

 $stmt = $pdo->query("DROP TABLE IF EXISTS `StanyMagazynowe`");
 $stmt->execute();
 $stmt = $pdo->query("CREATE TABLE IF NOT EXISTS `StanyMagazynowe`
 (
   `Id` INT AUTO_INCREMENT,
   `Produkt` INT NOT NULL,
   `NrPartii` VARCHAR(20) NOT NULL,
   `DataWaznosci` DATE NOT NULL,
   `CenaZakupu` DECIMAL(10,2) NOT NULL,
   `CenaSprzedazy` DECIMAL(10,2) NOT NULL,
   `Dostawca` INT NOT NULL,
   `IloscNaMagazynie` INT NOT NULL,
   `NumerArtykulu` VARCHAR(20) NOT NULL,
   `IdPrzyjecia` INT NOT NULL,
   `DataDostawy` DATE NOT NULL,
   `NrZamowienia` INT NOT NULL,
   PRIMARY KEY (Id)
 )ENGINE = InnoDB;");

 $stmt->execute();
/*
 $kategorie = array();
 $kategorie[]=array('Nazwa'=>'Magazyn1');
 $kategorie[]=array('Nazwa'=>'Magazyn2');
 $kategorie[]=array('Nazwa'=>'Magazyn3');
 $kategorie[]=array('Nazwa'=>'Magazyn4');
 foreach($kategorie as $element_kategoria)
 {
   $stmt = $pdo->prepare('INSERT INTO `Magazyn`(`Nazwa`) VALUES (:Nazwa)');
   $stmt -> bindValue(':Nazwa',$element_kategoria['Nazwa'],PDO::PARAM_STR);
   $wynik_zapytania = $stmt -> execute();
 }

*/

 /*************************************************/
 /*******************Kategoria klient********************/
 /*************************************************/
 $stmt = $pdo->query("DROP TABLE IF EXISTS `KategoriaKlient`");
 $stmt->execute();
 $stmt = $pdo->query("CREATE TABLE IF NOT EXISTS `KategoriaKlient`
 (
   `IdKategoria` INT AUTO_INCREMENT,
   `Nazwa` VARCHAR(100) NOT NULL,
   PRIMARY KEY (IdKategoria)
 )ENGINE = InnoDB;");
 $stmt->execute();

 $kategorie = array();
 $kategorie[]=array('Nazwa'=>'Klient typu 1');
 $kategorie[]=array('Nazwa'=>'Klient typu 2');
 $kategorie[]=array('Nazwa'=>'Klient typu 3');
 $kategorie[]=array('Nazwa'=>'Klient typu 4');
 foreach($kategorie as $element_kategoria)
 {
   $stmt = $pdo->prepare('INSERT INTO `KategoriaKlient`(`Nazwa`) VALUES (:Nazwa)');
   $stmt -> bindValue(':Nazwa',$element_kategoria['Nazwa'],PDO::PARAM_STR);
   $wynik_zapytania = $stmt -> execute();
 }

 /*************************************************/
 /*******************Rodzaj********************/
 /*************************************************/
 $stmt = $pdo->query("DROP TABLE IF EXISTS `Rodzaj`");
 $stmt->execute();
 $stmt = $pdo->query("CREATE TABLE IF NOT EXISTS `Rodzaj`
 (
   `IdRodzaj` INT AUTO_INCREMENT,
   `Nazwa` VARCHAR(100) NOT NULL,
   PRIMARY KEY (IdRodzaj)
 )ENGINE = InnoDB;");
 $stmt->execute();

 $kategorie = array();
 $kategorie[]=array('Nazwa'=>'susze');
 $kategorie[]=array('Nazwa'=>'olejki');
 $kategorie[]=array('Nazwa'=>'oleje');
 $kategorie[]=array('Nazwa'=>'oberezyny');
 foreach($kategorie as $element_kategoria)
 {
   $stmt = $pdo->prepare('INSERT INTO `Rodzaj`(`Nazwa`) VALUES (:Nazwa)');
   $stmt -> bindValue(':Nazwa',$element_kategoria['Nazwa'],PDO::PARAM_STR);
   $wynik_zapytania = $stmt -> execute();
 }


/*************************************************/
/*******************DOSTAWCA********************/
/*************************************************/
 $stmt = $pdo->query("DROP TABLE IF EXISTS `Dostawca`");
 $stmt->execute();
 $stmt = $pdo->query("CREATE TABLE IF NOT EXISTS `Dostawca`
 (
   `IdDostawca` INT AUTO_INCREMENT,
   `NazwaPelna` varchar(100) NOT NULL,
   `Imie` varchar(50) NOT NULL,
   `Nazwisko` varchar(100) NOT NULL,
   `Telefon1` varchar(20) DEFAULT NULL,
   `Email` varchar(200) NOT NULL,
   `Adres` varchar(100) NOT NULL,
   `KodPocztowy` varchar(6) NOT NULL,
   `Poczta` varchar(30) NOT NULL,
   PRIMARY KEY (IdDostawca)
 );");
 $stmt->execute();

 $dostawcy = array();
 $dostawcy[]=array(
 'NazwaPelna'=>'DPD',
 'Telefon1'=>'123456789',
 'Email'=>'DPD@dpd.com',
 'Imie'=>'Maciej',
 'Nazwisko'=>'Kobra',
 'Adres'=>'Kalisz, Jasna 21',
 'KodPocztowy'=>'11-666',
 'Poczta'=>'Kalisz',);

 foreach($dostawcy as $dostawca)
 {
   $stmt = $pdo->prepare('INSERT INTO `Dostawca`(`NazwaPelna`,`Telefon1`,`Email`,`Imie`,`Nazwisko`,`Adres`,`KodPocztowy`,`Poczta`) VALUES (:NazwaPelna,:Telefon1,:Email,:Imie,:Nazwisko,:Adres,:KodPocztowy,:Poczta)');
   $stmt -> bindValue(':NazwaPelna',$dostawca['NazwaPelna'],PDO::PARAM_STR);
   $stmt -> bindValue(':Telefon1',$dostawca['Telefon1'],PDO::PARAM_INT);
   $stmt -> bindValue(':Email',$dostawca['Email'],PDO::PARAM_STR);
   $stmt -> bindValue(':Imie',$dostawca['Imie'],PDO::PARAM_STR);
   $stmt -> bindValue(':Nazwisko',$dostawca['Nazwisko'],PDO::PARAM_STR);
   $stmt -> bindValue(':Adres',$dostawca['Adres'],PDO::PARAM_STR);
   $stmt -> bindValue(':KodPocztowy',$dostawca['KodPocztowy'],PDO::PARAM_STR);
   $stmt -> bindValue(':Poczta',$dostawca['Poczta'],PDO::PARAM_STR);
   $wynik_zapytania = $stmt -> execute();
 }





 /*************************************************/
 /*******************KLIENT************************/
 /*************************************************/
  $stmt = $pdo->query("DROP TABLE IF EXISTS `Klient`");
  $stmt->execute();
  $stmt = $pdo->query("CREATE TABLE IF NOT EXISTS `Klient`
  (
    `IdKlient` INT AUTO_INCREMENT,
    `OsobaKontaktowa` varchar(100) NOT NULL,
    `Telefon` varchar(20) NOT NULL,
    `NazwaFirmy` varchar(100) NOT NULL,
    `NIP` varchar(10) NOT NULL,
    `Adres` varchar(200) NOT NULL,
    `EMail` varchar(30) NOT NULL,
    `KategorieKlientow` INT NOT NULL,
    `ProponowaneProdukty` varchar(200) NOT NULL,
    PRIMARY KEY (IdKlient),
    FOREIGN KEY (KategorieKlientow) REFERENCES KategoriaKlient(IdKategoria)
  );");
  $stmt->execute();

  $klienci = array();
  $klienci[]=array('OsobaKontaktowa'=>'Michal Gwiazdowski',
  'NazwaFirmy'=>'KowalSky',
  'NIP'=>'0123456789',
  'Telefon'=>'666-666-666',
  'Adres'=>'62-800 Kalisz WałMAtejki 14/76a',
  'EMail'=>'michal123@wp.pl',
  'KategorieKlientow'=>1,
  'ProponowaneProdukty'=>'Cukier, Mąka, Słodycze, Bita śmietana');


  foreach($klienci as $klient)
  {
    $stmt = $pdo->prepare('INSERT INTO `Klient`(`OsobaKontaktowa`,`NazwaFirmy`,`NIP`,`Adres`,`Telefon`,`EMail`,`KategorieKlientow`,`ProponowaneProdukty`)
    VALUES (:OsobaKontaktowa,:NazwaFirmy,:NIP,:Adres,:Telefon,:EMail,:KategorieKlientow,:ProponowaneProdukty)');
    $stmt -> bindValue(':OsobaKontaktowa',$klient['OsobaKontaktowa'],PDO::PARAM_STR);
    $stmt -> bindValue(':NazwaFirmy',$klient['NazwaFirmy'],PDO::PARAM_STR);
    $stmt -> bindValue(':NIP',$klient['NIP'],PDO::PARAM_INT);
    $stmt -> bindValue(':Adres',$klient['Adres'],PDO::PARAM_STR);
    $stmt -> bindValue(':Telefon',$klient['Telefon'],PDO::PARAM_STR);
    $stmt -> bindValue(':EMail',$klient['EMail'],PDO::PARAM_STR);
    $stmt -> bindValue(':KategorieKlientow',$klient['KategorieKlientow'],PDO::PARAM_INT);
    $stmt -> bindValue(':ProponowaneProdukty',$klient['ProponowaneProdukty'],PDO::PARAM_STR);
    $wynik_zapytania = $stmt -> execute();
  }


  /*************************************************/
  /*******************TOWAR*************************/
  /*************************************************/
  $stmt = $pdo->query("DROP TABLE IF EXISTS `Towar`");
  $stmt->execute();
  $stmt = $pdo->query("CREATE TABLE IF NOT EXISTS `Towar`
  (
    `IdTowar` INT AUTO_INCREMENT,
    `NazwaTowaru` VARCHAR(100) NOT NULL,
    `RodzajTowaru` INT NOT NULL,
    `Opakowanie` VARCHAR(100) NOT NULL,
    PRIMARY KEY (IdTowar),
    FOREIGN KEY (RodzajTowaru)
    REFERENCES Rodzaj(IdRodzaj)
  )ENGINE = InnoDB;");
  $stmt->execute();

  $towary = array();
  $towary[]=array('NazwaTowaru'=>'klawiatura','RodzajTowaru'=>1,'Opakowanie'=>'sztuka');
  $towary[]=array('NazwaTowaru'=>'mysz','RodzajTowaru'=>1,'Opakowanie'=>'sztuka');
  foreach($towary as $element_towar)
  {
    $stmt = $pdo->prepare('INSERT INTO `Towar`(`NazwaTowaru`,`RodzajTowaru`,`Opakowanie`) VALUES (:NazwaTowaru,:RodzajTowaru,:Opakowanie)');
    $stmt -> bindValue(':NazwaTowaru',$element_towar['NazwaTowaru'],PDO::PARAM_STR);
    $stmt -> bindValue(':RodzajTowaru',$element_towar['RodzajTowaru'],PDO::PARAM_INT);
    $stmt -> bindValue(':Opakowanie',$element_towar['Opakowanie'],PDO::PARAM_STR);
    $wynik_zapytania = $stmt -> execute();
  }

  $stmt = $pdo->query("CREATE TABLE IF NOT EXISTS `ZapytanieOfertoweDoDostawcy`
  (
    `Id` INT AUTO_INCREMENT,
    `Towar` INT NOT NULL,
    `Wiadomosc` VARCHAR(100) NOT NULL,
    `Ilosc` INT NOT NULL,
    `Dostawca` INT NOT NULL,
    `DataPrzypomnienia` INT NOT NULL,
    `Status` VARCHAR(100) NOT NULL,
    `Komentarz` VARCHAR(100) NOT NULL,
    PRIMARY KEY (Id),
    FOREIGN KEY (Towar)
    REFERENCES Towar(IdTowar),
    FOREIGN KEY (Dostawca)
    REFERENCES Dostawca(IdDostawca)
  )ENGINE = InnoDB;");
  $stmt->execute();
   $kategorie = array();
  $kategorie[]=array('Towar'=>'1','Wiadomosc'=>'1','Ilosc'=>'8','Dostawca' =>'1','DataPrzypomnienia'=>'2017-04-02','Status'=>'Oczekujący','Komentarz'=>'1');
  $kategorie[]=array(
 	'Towar'=>'1',
 	'Wiadomosc'=>'1',
 	'Ilosc'=>'15',
 	'Dostawca' =>'1',
 	'DataPrzypomnienia'=>'2017-04-26',
 	'Status'=>'Potwierdzony',
 	'Komentarz'=>'1'
);
  foreach($kategorie as $element_kategoria)
  {
    $stmt = $pdo->prepare('INSERT INTO `ZapytanieOfertoweDoDostawcy`(
    Towar,
    Wiadomosc,
    Ilosc,
    Dostawca,
    DataPrzypomnienia,
    Status,
    Komentarz
 )
  VALUES
  (
    :Towar,
    :Wiadomosc,
    :Ilosc,
    :Dostawca,
    :DataPrzypomnienia,
    :Status,
    :Komentarz
  )');
    $stmt -> bindValue(':Towar',$element_kategoria['Towar'],PDO::PARAM_INT);
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
    `Towar` INT NOT NULL,
    `Wiadomosc` VARCHAR(100) NOT NULL,
    `Ilosc` INT  NULL,
    `Cena` float  NULL,
    `Klient` INT NOT NULL,
    `DataPrzypomnienia` INT NOT NULL,
    `Status` VARCHAR(100) NOT NULL,
    `Komentarz` VARCHAR(100) NOT NULL,
    PRIMARY KEY (Id),
    FOREIGN KEY (Towar)
    REFERENCES Towar(IdTowar),
    FOREIGN KEY (Klient)
    REFERENCES Klient(IdKlient)
  )ENGINE = InnoDB;");
  $stmt->execute();
  $kategorie = array();
  $kategorie[]=array(
 	'Towar'=>'1',
 	'Wiadomosc'=>'1',
 	'Ilosc'=>'8',
 	'Cena'=>'8',
 	'Klient' =>'1',
 	'DataPrzypomnienia'=>'2017-04-02',
 	'Status'=>'Oczekujący',
 	'Komentarz'=>'1'
 );
  $kategorie[]=array(
 	'Towar'=>'1',
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
    Towar,
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
    :Towar,
    :Wiadomosc,
    :Ilosc,
    :Cena,
    :Klient,
    :DataPrzypomnienia,
    :Status,
    :Komentarz
  )');
    $stmt -> bindValue(':Towar',$element_kategoria['Towar'],PDO::PARAM_INT);
    $stmt -> bindValue(':Ilosc',$element_kategoria['Ilosc'],PDO::PARAM_INT);
    $stmt -> bindValue(':Cena',$element_kategoria['Cena'],PDO::PARAM_STR);
    $stmt -> bindValue(':Wiadomosc',$element_kategoria['Wiadomosc'],PDO::PARAM_STR);
    $stmt -> bindValue(':Klient',$element_kategoria['Klient'],PDO::PARAM_INT);
    $stmt -> bindValue(':DataPrzypomnienia',$element_kategoria['DataPrzypomnienia'],PDO::PARAM_STR);
    $stmt -> bindValue(':Status',$element_kategoria['Status'],PDO::PARAM_STR);
    $stmt -> bindValue(':Komentarz',$element_kategoria['Komentarz'],PDO::PARAM_STR);
    $wynik_zapytania = $stmt -> execute();
  }

 return true;
}
catch (PDOException $e)
{
 echo ('Wystąpił błąd biblioteki PDO: ' .$e->getMessage());
 return false;
}

echo ("Baza została zainstalowana.");
?>
