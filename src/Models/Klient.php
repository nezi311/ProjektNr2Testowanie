<?php
	namespace Models;
	use \PDO;
	class Klient extends Model
	{
		// ** Dawid Dominiak **//
    public function getAll()
    {
      $data = array();
			$data['error']="";
      if(!$this->pdo)
          $data['error'] .= 'Połączenie z bazą nie powidoło się! <br>';
      else
          try
          {
<<<<<<< HEAD
              $stmt = $this->pdo->query("SELECT * FROM klient");
              $pracownicy = $stmt->fetchAll();
              $stmt->closeCursor();
              if($pracownicy && !empty($pracownicy))
                  $data['Klient'] = $pracownicy;
=======
              $stmt = $this->pdo->query("SELECT * FROM Klient");
              $Klients = $stmt->fetchAll();
              $stmt->closeCursor();
              if($Klients && !empty($Klients))
                  $data['Klient'] = $Klients;
>>>>>>> 4c502afa0669aff160e8ca51b1ee00e04c2571ad
              else
                  $data['Klient'] = array();
          }
          catch(\PDOException $e)
          {
              $data['error'] .= 'Błąd odczytu danych z bazy! <br>';
          }
					$data['error'] .= ' ';

      return $data;
    }


		// ** Dawid Dominiak **//
		public function getOne($id)
		{
			$data = array();
			if($id == NULL || $id == "")
				$data['error'] = 'Nieokreślone ID!';
			else
			if(!$this->pdo)
					$data['error'] = 'Połączenie z bazą nie powidoło się!';
			else
					try
					{
							$stmt = $this->pdo->prepare("SELECT * FROM Klient WHERE idKlient=:id");
							$stmt -> bindValue(':id',$id,PDO::PARAM_INT);
							$stmt -> execute();
							$pracownik = $stmt -> fetchAll();
							$liczba_wierszy = $stmt->rowCount();
							$stmt->closeCursor();
							if($kient && !empty($kient))
									$data['klient'] = $kient;
							else
									$data['klient'] = array();

							if($liczba_wierszy==0)
								$data['error']="Brak podanego id w bazie danych";
					}
					catch(\PDOException $e)
					{
							$data['error'] = 'Błąd odczytu danych z bazy! ';
					}
			return $data;
		}


		// ** Dawid Dominiak **//
		public function delete($id)
		{
			$data = array();
				if($id == NULL || $id == "")
					$data['error'] = 'Nieokreślone ID!';
				else
					try
					{
						$stmt = $this->pdo->prepare('DELETE FROM `Klient` WHERE idKlient=:id');
				    $stmt -> bindValue(':id',$id,PDO::PARAM_INT);
				    $wynik_zapytania = $stmt -> execute();
					}
					catch(\PDOException $e)
					{
						$data['error'] =$data['error'].'<br> Błąd wykonywania operacji usunięcia';
					}
				return $data;

		}


		// ** Dawid Dominiak **//
		public function insert($osobakontaktowa,$telefon,$NazwaFirmy,$NIP,$adres,$Email,$KategorieKlientow,$ProponowaneProdukty)
		{
			$blad=false;
			$data = array();
			$data['error']="";
			if(!$this->pdo)
			{
					$data['error'] = 'Połączenie z bazą nie powidoło się!';
					$blad=true;
			}
			if($osobakontaktowa == null || $osobakontaktowa == "")
			{
				$data['error'] .= 'Nieokreślona osoba kontaktowa! <br>';
				$blad=true;
			}
			if($telefon == null || $telefon == "")
			{
				$data['error'] .='Nieokreślony telefon! <br>';
				$blad=true;
			}
			if($NazwaFirmy == null || $NazwaFirmy == "")
			{
				$data['error'] .= 'Nieokreślona nazwa firmy! <br>';
				$blad=true;
			}
			if($NIP == null || $NIP == "")
			{
				$data['error'] .= 'Nieokreślony NIP! <br>';
				$blad=true;
			}
			if($adres == null || $adres == "")
			{
				$data['error'] .= 'Nieokreślony adres <br>';
				$blad=true;
			}
			if($Email == null || $Email == "")
			{
				$data['error'] .= 'Nieokreślony Email! <br>';
				$blad=true;
			}
			if($KategorieKlientow == null || $KategorieKlientow == "")
			{
				$data['error'] .= 'Nieokreślona kategoria klienta! <br>';
				$blad=true;
			}
			if($ProponowaneProdukty == null || $ProponowaneProdukty == "")
			{
				$data['error'] .= 'Nieokreślone proponowane produkty! <br>';
				$blad=true;
			}
			if(!$blad)
			{
				try
				{
					$stmt = $this->pdo->prepare('INSERT INTO `Klient`(`OsobaKontaktowa`,`NazwaFirmy`,`NIP`,`Adres`,`Telefon`,`EMail`,`KategorieKlientow`,`ProponowaneProdukty`) VALUES (:osobaKontaktowa,:nazwaFirmy,:nIP,:adres,:telefon,:eMail,:kategorieKlientow,:proponowaneProdukty)');
					$stmt -> bindValue(':osobaKontaktowa',$osobakontaktowa,PDO::PARAM_STR);
			    $stmt -> bindValue(':nazwaFirmy',$NazwaFirmy,PDO::PARAM_STR);
			    $stmt -> bindValue(':nIP',$NIP,PDO::PARAM_INT);
			    $stmt -> bindValue(':adres',$adres,PDO::PARAM_STR);
			    $stmt -> bindValue(':telefon',$telefon,PDO::PARAM_STR);
			    $stmt -> bindValue(':eMail',$Email,PDO::PARAM_STR);
			    $stmt -> bindValue(':kategorieKlientow',$KategorieKlientow,PDO::PARAM_INT);
			    $stmt -> bindValue(':proponowaneProdukty',$ProponowaneProdukty,PDO::PARAM_STR);
			    $wynik_zapytania = $stmt -> execute();
				}
				catch(\PDOException $e)
				{
					$data['error'] .='Błąd zapisu danych do bazy! <br> '.$e;
					return $data;
				}
		}
			return $data;
		}


		// ** Dawid Dominiak **//
		public function update($id,$osobakontaktowa,$telefon,$NazwaFirmy,$NIP,$adres,$Email,$KategorieKlientow,$ProponowaneProdukty)
		{
			$blad=false;
			$data = array();
			$data['error']="";
			if(!$this->pdo)
			{
					$data['error'] = 'Połączenie z bazą nie powidoło się!';
					$blad=true;
			}
			if($id == null || $id == "")
			{
				$data['error'] .= 'Nieokreślone id! <br>';
				$blad=true;
			}
			if($osobakontaktowa == null || $osobakontaktowa == "")
			{
				$data['error'] .= 'Nieokreślona osoba kontaktowa! <br>';
				$blad=true;
			}
			if($telefon == null || $telefon == "")
			{
				$data['error'] .='Nieokreślony telefon! <br>';
				$blad=true;
			}
			if($NazwaFirmy == null || $NazwaFirmy == "")
			{
				$data['error'] .= 'Nieokreślona nazwa firmy! <br>';
				$blad=true;
			}
			if($NIP == null || $NIP == "")
			{
				$data['error'] .= 'Nieokreślony NIP! <br>';
				$blad=true;
			}
			if($adres == null || $adres == "")
			{
				$data['error'] .= 'Nieokreślony adres <br>';
				$blad=true;
			}
			if($Email == null || $Email == "")
			{
				$data['error'] .= 'Nieokreślony Email! <br>';
				$blad=true;
			}
			if($KategorieKlientow == null || $KategorieKlientow == "")
			{
				$data['error'] .= 'Nieokreślona kategoria klienta! <br>';
				$blad=true;
			}
			if($ProponowaneProdukty == null || $ProponowaneProdukty == "")
			{
				$data['error'] .= 'Nieokreślone proponowane produkty! <br>';
				$blad=true;
			}
				if(!$blad)
				{
					try
					{
						$stmt = $this->pdo->prepare('UPDATE `Klient` SET `OsobaKontaktowa`=:OsobaKontaktowa,`NazwaFirmy`=:NazwaFirmy,`NIP`=:NIP,`Adres`=:Adres,`Telefon`=:Telefon,`EMail`=:EMail,`KategorieKlientow`=:KategorieKlientow,`ProponowaneProdukty`=:ProponowaneProdukty
						WHERE idKlient=:id');
						$stmt -> bindValue(':id',$id,PDO::PARAM_INT);
						$stmt -> bindValue(':OsobaKontaktowa',$osobakontaktowa,PDO::PARAM_STR);
				    $stmt -> bindValue(':NazwaFirmy',$NazwaFirmy,PDO::PARAM_STR);
				    $stmt -> bindValue(':NIP',$NIP,PDO::PARAM_INT);
				    $stmt -> bindValue(':Adres',$adres,PDO::PARAM_STR);
				    $stmt -> bindValue(':Telefon',$telefon,PDO::PARAM_STR);
				    $stmt -> bindValue(':EMail',$Email,PDO::PARAM_STR);
				    $stmt -> bindValue(':KategorieKlientow',$KategorieKlientow,PDO::PARAM_INT);
				    $stmt -> bindValue(':ProponowaneProdukty',$ProponowaneProdukty,PDO::PARAM_STR);
						$wynik_zapytania = $stmt -> execute();
					}
					catch(\PDOException $e)
					{
						$data['error'].='Błąd zapisu danych do bazy! <br>';
						return $data;
					}
				}

				return $data;
		}

  }

?>
