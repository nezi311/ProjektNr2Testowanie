<?php
	namespace Models;
	use \PDO;

	class Zapytania extends Model
	{

		public function getOferta()
		{
			$data = array();
			$data['error']="";
      if(!$this->pdo)
          $data['error'] .= 'Połączenie z bazą nie powidoło się! <br>';
      else
          try
          {

              $stmt = $this->pdo->query("SELECT `Id`, `Towar`, `Wiadomosc`, `Ilosc`, `Dostawca`, `DataPrzypomnienia`, `Status`, `Komentarz`, CONCAT(Dostawca.NazwaPelna,' ',Dostawca.Imie,' ',Dostawca.Nazwisko) AS DaneDostawca, Towar.NazwaTowaru AS DaneTowar
																				FROM ZapytanieOfertoweDoDostawcy
																				INNER JOIN Towar
																				ON ZapytanieOfertoweDoDostawcy.Towar = Towar.IdTowar
																				INNER JOIN Dostawca
																				ON ZapytanieOfertoweDoDostawcy.Dostawca = Dostawca.IdDostawca");
              $zapytanie = $stmt->fetchAll();
              $stmt->closeCursor();
              if($zapytanie && !empty($zapytanie))
                  $data['oferta'] = $zapytanie;
              else
                  $data['oferta'] = array();
          }
          catch(\PDOException $e)
          {
              $data['error'] .= 'Błąd odczytu danych z bazy! <br>';
          }
					$data['error'] .= ' ';

      return $data;
		}


		public function getSprzedaz()
		{
			$data = array();
			$data['error']="";
      if(!$this->pdo)
          $data['error'] .= 'Połączenie z bazą nie powidoło się! <br>';
      else
          try
          {

              $stmt = $this->pdo->query("SELECT `Id`, `Towar`, `Wiadomosc`, `Ilosc`, `Cena`, `Klient`, `DataPrzypomnienia`, `Status`, `Komentarz`, CONCAT(Klient.NazwaFirmy,' ',Klient.OsobaKontaktowa) AS DaneKlient, Towar.NazwaTowaru AS DaneTowar
																				FROM ZapytanieSprzedazoweDoKlienta
																				INNER JOIN Towar
																				ON ZapytanieSprzedazoweDoKlienta.Towar = Towar.IdTowar
																				INNER JOIN Klient
																				ON ZapytanieSprzedazoweDoKlienta.Klient = Klient.IdKlient");
              $zapytanie = $stmt->fetchAll();
              $stmt->closeCursor();
              if($zapytanie && !empty($zapytanie))
                  $data['oferta'] = $zapytanie;
              else
                  $data['oferta'] = array();
          }
          catch(\PDOException $e)
          {
              $data['error'] .= 'Błąd odczytu danych z bazy! <br>';
          }
					$data['error'] .= ' ';

      return $data;
		}


		public function insertO($wiadomosc,$towar,$ilosc,$dostawca,$data,$status,$komentarz)
		{
			$blad=false;
			$data = array();
			$data['error']="";
			if($wiadomosc === null || $wiadomosc === "")
			{
				$data['error'] .= 'Nieokreślone imię! <br>';
				$blad=true;
			}
			if($towar === null || $towar === "")
			{
				$data['error'] .='Nieokreślone towar! <br>';
				$blad=true;
			}
			if($ilosc === null || $ilosc === "")
			{
				$data['error'] .= 'Nieokreślony dział! <br>';
				$blad=true;
			}
			if($dostawca === null || $dostawca === "")
			{
				$data['error'] .= 'Nieokreślone dostawca! <br>';
				$blad=true;
			}
			if($data === null || $data === "")
			{
				$data['error'] .= 'Nieokreślony nr datau! <br>';
				$blad=true;
			}
			if($status === null || $status === "")
			{
				$data['error'] .= 'Nieokreślony status! <br>';
				$blad=true;
			}
			if($komentarz === null || $komentarz === "")
			{
				$data['error'] .= 'Nieokreślone hasło! <br>';
				$blad=true;
			}
			if(!$blad)
			{
				try
				{
					$stmt = $this->pdo->prepare('INSERT INTO `ZapytanieOfertoweDoDostawcy`(`wiadomosc`,`towar`,`ilosc`,`dostawca`,`data`,`status`,`komentarz`) VALUES (:wiadomosc,:towar,:ilosc,:dostawca,:data,:status,:komentarz)');
			    $stmt -> bindValue(':status',$status,PDO::PARAM_STR);
					$stmt -> bindValue(':komentarz',$komentarz,PDO::PARAM_STR);
			    $stmt -> bindValue(':wiadomosc',$wiadomosc,PDO::PARAM_STR);
			    $stmt -> bindValue(':towar',$towar,PDO::PARAM_INT);
			    $stmt -> bindValue(':ilosc',$ilosc,PDO::PARAM_INT);
			    $stmt -> bindValue(':dostawca',$dostawca,PDO::PARAM_INT);
			    $stmt -> bindValue(':data',$data,PDO::PARAM_STR);
			    $stmt -> bindValue(':status',$status,PDO::PARAM_STR);
			    $wynik_zapytania = $stmt -> execute();
				}
				catch(\PDOException $e)
				{
					$data['error'] .='Błąd zapisu danych do bazy! <br>';
					return $data;
				}
		}
			return $data;
		}

		public function updateS($id,$wiadomosc,$towar,$ilosc,$cena,$klient,$data,$status,$komentarz)
		{
			$blad=false;
			$data = array();
			$data['error']="";
			if($wiadomosc === null || $wiadomosc === "")
			{
				$data['error'] .= 'Nieokreślone imię! <br>';
				$blad=true;
			}
			if($towar === null || $towar === "")
			{
				$data['error'] .='Nieokreślone towar! <br>';
				$blad=true;
			}
			if($ilosc === null || $ilosc === "")
			{
				$data['error'] .= 'Nieokreślony dział! <br>';
				$blad=true;
			}
			if($cena === null || $cena === "")
			{
				$data['error'] .= 'Nieokreśla cena! <br>';
				$blad=true;
			}
			if($klient === null || $klient === "")
			{
				$data['error'] .= 'Nieokreślony klient! <br>';
				$blad=true;
			}
			if($data === null || $data === "")
			{
				$data['error'] .= 'Nieokreślony nr datau! <br>';
				$blad=true;
			}
			if($status === null || $status === "")
			{
				$data['error'] .= 'Nieokreślony status! <br>';
				$blad=true;
			}
			if($komentarz === null || $komentarz === "")
			{
				$data['error'] .= 'Nieokreślone hasło! <br>';
				$blad=true;
			}
			if(!$blad)
			{
				try
				{
					$stmt = $this->pdo->prepare('UPDATE  `ZapytanieSprzedazoweDoKlienta` SET `wiadomosc`=:wiadomosc,`towar`=:towar,`ilosc`=:ilosc,`cena`=:cena,`klient`=:klient,`data`=:data,`status`=:status,`komentarz`=:komentarz WHERE Id=:id');
					$stmt -> bindValue(':id',$id,PDO::PARAM_INT);
					$stmt -> bindValue(':status',$status,PDO::PARAM_STR);
					$stmt -> bindValue(':komentarz',$komentarz,PDO::PARAM_STR);
					$stmt -> bindValue(':wiadomosc',$wiadomosc,PDO::PARAM_STR);
					$stmt -> bindValue(':towar',$towar,PDO::PARAM_INT);
					$stmt -> bindValue(':ilosc',$ilosc,PDO::PARAM_INT);
					$stmt -> bindValue(':cena',$cena,PDO::PARAM_INT);
					$stmt -> bindValue(':klient',$klient,PDO::PARAM_INT);
					$stmt -> bindValue(':data',$data,PDO::PARAM_STR);
					$stmt -> bindValue(':status',$status,PDO::PARAM_STR);
					$wynik_zapytania = $stmt -> execute();
				}
				catch(\PDOException $e)
				{
					$data['error'] .='Błąd zapisu danych do bazy! <br>';
					return $data;
				}
		}
			return $data;
		}


		public function updateO($id,$wiadomosc,$towar,$ilosc,$dostawca,$data,$status,$komentarz)
		{
			$blad=false;
			$data = array();
			$data['error']="";
			if($wiadomosc === null || $wiadomosc === "")
			{
				$data['error'] .= 'Nieokreślone imię! <br>';
				$blad=true;
			}
			if($towar === null || $towar === "")
			{
				$data['error'] .='Nieokreślone towar! <br>';
				$blad=true;
			}
			if($ilosc === null || $ilosc === "")
			{
				$data['error'] .= 'Nieokreślony dział! <br>';
				$blad=true;
			}
			if($dostawca === null || $dostawca === "")
			{
				$data['error'] .= 'Nieokreślone dostawca! <br>';
				$blad=true;
			}
			if($data === null || $data === "")
			{
				$data['error'] .= 'Nieokreślony nr datau! <br>';
				$blad=true;
			}
			if($status === null || $status === "")
			{
				$data['error'] .= 'Nieokreślony status! <br>';
				$blad=true;
			}
			if($komentarz === null || $komentarz === "")
			{
				$data['error'] .= 'Nieokreślone hasło! <br>';
				$blad=true;
			}
			if(!$blad)
			{
				try
				{
					$stmt = $this->pdo->prepare('UPDATE  `ZapytanieOfertoweDoDostawcy` SET `wiadomosc`=:wiadomosc,`towar`=:towar,`ilosc`=:ilosc,`dostawca`=:dostawca,`data`=:data,`status`=:status,`komentarz`=:komentarz WHERE Id=:id');
					$stmt -> bindValue(':id',$id,PDO::PARAM_INT);
					$stmt -> bindValue(':status',$status,PDO::PARAM_STR);
					$stmt -> bindValue(':komentarz',$komentarz,PDO::PARAM_STR);
			    $stmt -> bindValue(':wiadomosc',$wiadomosc,PDO::PARAM_STR);
			    $stmt -> bindValue(':towar',$towar,PDO::PARAM_INT);
			    $stmt -> bindValue(':ilosc',$ilosc,PDO::PARAM_INT);
			    $stmt -> bindValue(':dostawca',$dostawca,PDO::PARAM_INT);
			    $stmt -> bindValue(':data',$data,PDO::PARAM_STR);
			    $stmt -> bindValue(':status',$status,PDO::PARAM_STR);
			    $wynik_zapytania = $stmt -> execute();
				}
				catch(\PDOException $e)
				{
					$data['error'] .='Błąd zapisu danych do bazy! <br>';
					return $data;
				}
		}
			return $data;
		}


		public function insertS($wiadomosc,$towar,$ilosc,$cena,$klient,$data,$status,$komentarz)
		{
			$blad=false;
			$data = array();
			$data['error']="";
			if($wiadomosc === null || $wiadomosc === "")
			{
				$data['error'] .= 'Nieokreślone imię! <br>';
				$blad=true;
			}
			if($towar === null || $towar === "")
			{
				$data['error'] .='Nieokreślone towar! <br>';
				$blad=true;
			}
			if($ilosc === null || $ilosc === "")
			{
				$data['error'] .= 'Nieokreślony dział! <br>';
				$blad=true;
			}
			if($klient === null || $klient === "")
			{
				$data['error'] .= 'Nieokreślone klient! <br>';
				$blad=true;
			}
			if($data === null || $data === "")
			{
				$data['error'] .= 'Nieokreślony nr datau! <br>';
				$blad=true;
			}
			if($status === null || $status === "")
			{
				$data['error'] .= 'Nieokreślony status! <br>';
				$blad=true;
			}
			if($komentarz === null || $komentarz === "")
			{
				$data['error'] .= 'Nieokreślony komentarz! <br>';
				$blad=true;
			}
			if(!$blad)
			{
				try
				{
					$stmt = $this->pdo->prepare('INSERT INTO `ZapytanieSprzedazoweDoKlienta`(`towar`,`wiadomosc`,`ilosc`,`cena`,`klient`,`data`,`status`,`komentarz`) VALUES (:wiadomosc,:towar,:ilosc,:cena,:klient,:data,:status,:komentarz)');
			    $stmt -> bindValue(':wiadomosc',$wiadomosc,PDO::PARAM_STR);
			    $stmt -> bindValue(':towar',$towar,PDO::PARAM_INT);
			    $stmt -> bindValue(':ilosc',$ilosc,PDO::PARAM_INT);
			    $stmt -> bindValue(':cena',$cena,PDO::PARAM_STR);
			    $stmt -> bindValue(':klient',$klient,PDO::PARAM_INT);
			    $stmt -> bindValue(':data',$data,PDO::PARAM_INT);
			    $stmt -> bindValue(':status',$status,PDO::PARAM_STR);
					$stmt -> bindValue(':komentarz',$komentarz,PDO::PARAM_STR);
			    $wynik_zapytania = $stmt -> execute();
				}
				catch(\PDOException $e)
				{
					$data['error'] .='Błąd zapisu danych do bazy! <br>';
						return $data;
				}
		}
		return $data;
		}
	}
