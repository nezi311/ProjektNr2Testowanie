<?php
require_once('vendor/autoload.php');
\Config\Database\DBConfig::setDBConfig();
 $pdo=\Config\Database\DBConfig::getHandle();

try{
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
 /*******************Rodzaj********************/
 /*************************************************/
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
 // /*************************************************/
 // /*******************JEDNOSKA_MIARY****************/
 // /*************************************************/
 // $stmt = $pdo->query("DROP TABLE IF EXISTS `Jednostkamiary`");
 // $stmt->execute();
 // $stmt = $pdo->query("CREATE TABLE IF NOT EXISTS `Jednostkamiary`
 // (
 //   `IdJednostkaMiary` INT AUTO_INCREMENT,
 //   `NazwaJednostki` VARCHAR(100) NOT NULL,
 //   `skrotJednostki` VARCHAR(10)  NULL,
 //   PRIMARY KEY (IdJednostkaMiary)
 // )ENGINE = InnoDB;");
 // $stmt->execute();
 //
 // $jednostki = array();
 // $jednostki[]=array('NazwaJednostki'=>'sztuka','skrotJednostki'=>'szt');
 // $jednostki[]=array('NazwaJednostki'=>'litr','skrotJednostki'=>'l');
 // foreach($jednostki as $element_jednostka)
 // {
 //   $stmt = $pdo->prepare('INSERT INTO `Jednostkamiary`(`NazwaJednostki`,`skrotJednostki`) VALUES (:NazwaJednostki,:skrotJednostki)');
 //   $stmt -> bindValue(':NazwaJednostki',$element_jednostka['NazwaJednostki'],PDO::PARAM_STR);
 //   $stmt -> bindValue(':skrotJednostki',$element_jednostka['skrotJednostki'],PDO::PARAM_STR);
 //   $wynik_zapytania = $stmt -> execute();
 // }

 // /*************************************************/
 // /*******************ZAMÓWIENIA********************/
 // /*************************************************/
 // $stmt = $pdo->query("DROP TABLE IF EXISTS `Zamowienia`");
 // $stmt->execute();
 // $stmt = $pdo->query("CREATE TABLE IF NOT EXISTS `Zamowienia`
 // (
 //   `IdZamowienie` INT AUTO_INCREMENT,
 //   `NazwaTowaru` VARCHAR(100) NOT NULL,
 //   `MinStanMagazynowy` INT NOT NULL,
 //   `MaxStanMagazynowy` INT NOT NULL,
 //   `StawkaVat` INT NOT NULL,
 //   `IdKategoria` INT NOT NULL,
 //   `IdJednostkaMiary` INT NOT NULL,
 //   `Status` INT NOT NULL,
 //   PRIMARY KEY (IdZamowienie),
 //   FOREIGN KEY (IdKategoria)
 //   REFERENCES Kategoria(IdKategoria)
 //   ON DELETE CASCADE,
 //   FOREIGN KEY (IdJednostkaMiary)
 //   REFERENCES Jednostkamiary(IdJednostkaMiary)
 //   ON DELETE CASCADE
 // )ENGINE = InnoDB;");
 // $stmt->execute();
 //
 // $towary = array();
 // $towary[]=array('NazwaTowaru'=>'klawiatura','MinStanMagazynowy'=>1,'MaxStanMagazynowy'=>1,'StawkaVat'=>8,'IdKategoria'=>1,'IdJednostkaMiary'=>1,'Status'=>1);
 // $towary[]=array('NazwaTowaru'=>'mysz','MinStanMagazynowy'=>1,'MaxStanMagazynowy'=>1,'StawkaVat'=>8,'IdKategoria'=>1,'IdJednostkaMiary'=>1,'Status'=>1);
 // foreach($towary as $element_towar)
 // {
 //   $stmt = $pdo->prepare('INSERT INTO `Zamowienia`(`NazwaTowaru`,`MinStanMagazynowy`,`MaxStanMagazynowy`,`StawkaVat`,`IdKategoria`,`IdJednostkaMiary`,`Status`) VALUES (:NazwaTowaru,:MinStanMagazynowy,:MaxStanMagazynowy,:StawkaVat,:IdKategoria,:IdJednostkaMiary,:Status)');
 //   $stmt -> bindValue(':NazwaTowaru',$element_towar['NazwaTowaru'],PDO::PARAM_STR);
 //   $stmt -> bindValue(':MinStanMagazynowy',$element_towar['MinStanMagazynowy'],PDO::PARAM_INT);
 //   $stmt -> bindValue(':MaxStanMagazynowy',$element_towar['MaxStanMagazynowy'],PDO::PARAM_INT);
 //   $stmt -> bindValue(':StawkaVat',$element_towar['StawkaVat'],PDO::PARAM_INT);
 //   $stmt -> bindValue(':IdKategoria',$element_towar['IdKategoria'],PDO::PARAM_INT);
 //   $stmt -> bindValue(':IdJednostkaMiary',$element_towar['IdJednostkaMiary'],PDO::PARAM_INT);
 //   $stmt -> bindValue(':Status',$element_towar['Status'],PDO::PARAM_INT);
 //   $wynik_zapytania = $stmt -> execute();
 // }
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
   $stmt = $pdo->prepare('INSERT INTO `Dostawca`(`NazwaSkrocona`,`NazwaPelna`,`NIP`,`Telefon1`,`Telefon2`,`Telefon3`,`NazwaDzialu`,`NrKonta`,`Adres`,`KodPocztowy`,`Poczta`) VALUES (:NazwaSkrocona,:NazwaPelna,:NIP,:Telefon1,:Telefon2,:Telefon3,:NazwaDzialu,:NrKonta,:Adres,:KodPocztowy,:Poczta)');
   $stmt -> bindValue(':NazwaSkrocona',$dostawca['NazwaSkrocona'],PDO::PARAM_STR);
   $stmt -> bindValue(':NazwaPelna',$dostawca['NazwaPelna'],PDO::PARAM_STR);
   $stmt -> bindValue(':NIP',$dostawca['NIP'],PDO::PARAM_INT);
   $stmt -> bindValue(':Telefon1',$dostawca['Telefon1'],PDO::PARAM_INT);
   $stmt -> bindValue(':Telefon2',$dostawca['Telefon2'],PDO::PARAM_INT);
   $stmt -> bindValue(':Telefon3',$dostawca['Telefon3'],PDO::PARAM_INT);
   $stmt -> bindValue(':NazwaDzialu',$dostawca['NazwaDzialu'],PDO::PARAM_STR);
   $stmt -> bindValue(':NrKonta',$dostawca['NrKonta'],PDO::PARAM_INT);
   $stmt -> bindValue(':Adres',$dostawca['Adres'],PDO::PARAM_STR);
   $stmt -> bindValue(':KodPocztowy',$dostawca['KodPocztowy'],PDO::PARAM_STR);
   $stmt -> bindValue(':Poczta',$dostawca['Poczta'],PDO::PARAM_STR);
   $wynik_zapytania = $stmt -> execute();
 }
 /*************************************************/
 /*******************KLIENT********************/
 /*************************************************/
  $stmt = $pdo->query("DROP TABLE IF EXISTS `Klient`");
  $stmt->execute();
  $stmt = $pdo->query("CREATE TABLE IF NOT EXISTS `Klient`
  (
    `IdKlient` INT AUTO_INCREMENT,
    `Imie` varchar(50) NOT NULL,
    `Nazwisko` varchar(50) NOT NULL,
    `NazwaFirmy` varchar(100) NOT NULL,
    `NIP` varchar(10) NOT NULL,
    `Miasto` varchar(50) NOT NULL,
    `Ulica` varchar(50) NOT NULL,
    `Dom` varchar(50) NOT NULL,
    `Lokal` varchar(50) NULL,
    `KodPocztowy` varchar(6) NOT NULL,
    `Poczta` varchar(30) NOT NULL,
    `EMail` varchar(30) NOT NULL,
    `Branza` varchar(50) NOT NULL,
    `ProponowaneProdukty` varchar(200) NOT NULL,
    PRIMARY KEY (IdKlient)
  );");
  $stmt->execute();

  $klienci = array();
  $klienci[]=array('Imie'=>'Michal',
  'Nazwisko'=>'Kowalski',
  'NazwaFirmy'=>'KowalSky',
  'NIP'=>'0123456789',
  'Miasto'=>'Ostrów Wlkp',
  'Ulica'=>'Matejki',
  'Dom'=>'21',
  'Lokal'=>'',
  'KodPocztowy'=>'63-400',
  'Poczta'=>'Ostrów Wlkp',
  'EMail'=>'michal123@wp.pl',
  'Branza'=>'Cukiernictwo',
  'ProponowaneProdukty'=>'Cukier, Mąka, Słodycze, Bita śmietana');


  foreach($klienci as $klient)
  {
    $stmt = $pdo->prepare('INSERT INTO `Klient`(`Imie`,`Nazwisko`,`NazwaFirmy`,`NIP`,`Miasto`,`Ulica`,`Dom`,`Lokal`,`KodPocztowy`,`Poczta`,`EMail`,`Branza`,`ProponowaneProdukty`) VALUES (:Imie,:Nazwisko,:NazwaFirmy,:NIP,:Miasto,:Ulica,:Dom,:Lokal,:KodPocztowy,:Poczta,:EMail,:Branza,:ProponowaneProdukty)');
    $stmt -> bindValue(':Imie',$klient['Imie'],PDO::PARAM_STR);
    $stmt -> bindValue(':Nazwisko',$klient['Nazwisko'],PDO::PARAM_STR);
    $stmt -> bindValue(':NazwaFirmy',$klient['NazwaFirmy'],PDO::PARAM_STR);
    $stmt -> bindValue(':NIP',$klient['NIP'],PDO::PARAM_INT);
    $stmt -> bindValue(':Miasto',$klient['Miasto'],PDO::PARAM_STR);
    $stmt -> bindValue(':Ulica',$klient['Ulica'],PDO::PARAM_STR);
    $stmt -> bindValue(':Dom',$klient['Dom'],PDO::PARAM_STR);
    $stmt -> bindValue(':Lokal',$klient['Lokal'],PDO::PARAM_STR);
    $stmt -> bindValue(':KodPocztowy',$klient['KodPocztowy'],PDO::PARAM_STR);
    $stmt -> bindValue(':Poczta',$klient['Poczta'],PDO::PARAM_STR);
    $stmt -> bindValue(':EMail',$klient['EMail'],PDO::PARAM_STR);
    $stmt -> bindValue(':Branza',$klient['Branza'],PDO::PARAM_STR);
    $stmt -> bindValue(':ProponowaneProdukty',$klient['ProponowaneProdukty'],PDO::PARAM_STR);
    $wynik_zapytania = $stmt -> execute();
  }

  /*************************************************/
  /*******************Magazyn*************************/
  /*************************************************/
  $stmt = $pdo->query("DROP TABLE IF EXISTS `Magazyn`");
  $stmt->execute();
  $stmt = $pdo->query("CREATE TABLE IF NOT EXISTS `Magazyn`
  (
    `IdMagazyn` INT AUTO_INCREMENT,
    `NazwaMagazyn` VARCHAR(100) NOT NULL,
    `Miasto` varchar(50) NOT NULL,
    `Ulica` varchar(50) NOT NULL,
    `Dom` varchar(50) NOT NULL,
    `Lokal` varchar(50) NULL,
    `KodPocztowy` varchar(6) NOT NULL,
    `Wirtualny` BIT NOT NULL,
    PRIMARY KEY (IdMagazyn),
  )ENGINE = InnoDB;");
  $stmt->execute();

  $towary = array();
  $towary[]=array('NazwaMagazyn'=>'1','Miasto'=>'Błaszki','Ulica'=>'Zlota','Dom'=>'20','Lokal'=>'','KodPocztowy'=>'98-235','Wirtualny'=>0);
  $towary[]=array('NazwaMagazyn'=>'2','Miasto'=>'Błaszki','Ulica'=>'Zlota','Dom'=>'20','Lokal'=>'','KodPocztowy'=>'98-235','Wirtualny'=>0);
  $towary[]=array('NazwaMagazyn'=>'3','Miasto'=>'Błaszki','Ulica'=>'Zlota','Dom'=>'20','Lokal'=>'','KodPocztowy'=>'98-235','Wirtualny'=>1);
  foreach($towary as $element_towar)
  {
    $stmt = $pdo->prepare('INSERT INTO `Magazyn`(`NazwaMagazyn`,`Miasto`,`Ulica`,`Dom`,`Lokal`,`KodPocztowy`,`Wirtualny`) VALUES (:NazwaMagazyn,:Miasto,:Ulica,:Dom,:Lokal,:KodPocztowy,:Wirtualny)');
    $stmt -> bindValue(':NazwaMagazyn',$element_towar['NazwaMagazyn'],PDO::PARAM_STR);
    $stmt -> bindValue(':Miasto',$element_towar['Miasto'],PDO::PARAM_STR);
    $stmt -> bindValue(':Ulica',$element_towar['Ulica'],PDO::PARAM_STR);
    $stmt -> bindValue(':Dom',$element_towar['Dom'],PDO::PARAM_STR);
    $stmt -> bindValue(':Lokal',$element_towar['Lokal'],PDO::PARAM_STR);
    $stmt -> bindValue(':KodPocztowy',$element_towar['KodPocztowy'],PDO::PARAM_STR);
    $stmt -> bindValue(':Wirtualny',$element_towar['Wirtualny'],PDO::PARAM_BIT);
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
    `Dostawca` INT NOT NULL,
    `CenaKupna` numeric(15,2) NOT NULL,
    PRIMARY KEY (IdTowar),
    FOREIGN KEY (RodzajTowaru),
    REFERENCES Rodzaj(IdRodzaj),
    ON DELETE CASCADE,
    FOREIGN KEY (Dostawca),
    REFERENCES Dostaca(IdDostawca),
    ON DELETE CASCADE
  )ENGINE = InnoDB;");
  $stmt->execute();

  $towary = array();
  $towary[]=array('NazwaTowaru'=>'klawiatura','RodzajTowaru'=>1,'Opakowanie'=>'sztuka','Dostawca'=>1,'CenaKupna'=>15.2);
  $towary[]=array('NazwaTowaru'=>'mysz','RodzajTowaru'=>1,'Opakowanie'=>'sztuka','Dostawca'=>1,'CenaKupna'=>15.2);
  foreach($towary as $element_towar)
  {
    $stmt = $pdo->prepare('INSERT INTO `Towar`(`NazwaTowaru`,`RodzajTowaru`,`Opakowanie`,`Dostawca`,`CenaKupna`) VALUES (:NazwaTowaru,:RodzajTowaru,:Opakowanie,:Dostawca,:CenaKupna)');
    $stmt -> bindValue(':NazwaTowaru',$element_towar['NazwaTowaru'],PDO::PARAM_STR);
    $stmt -> bindValue(':RodzajTowaru',$element_towar['RodzajTowaru'],PDO::PARAM_INT);
    $stmt -> bindValue(':Opakowanie',$element_towar['Opakowanie'],PDO::PARAM_STR);
    $stmt -> bindValue(':Dostawca',$element_towar['Dostawca'],PDO::PARAM_INT);
    $stmt -> bindValue(':CenaKupna',$element_towar['CenaKupna'],PDO::PARAM_STR);
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
