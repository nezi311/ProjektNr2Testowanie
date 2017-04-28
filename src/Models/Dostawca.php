<?php
	namespace Models;
	use \PDO;
	class Dostawca extends Model
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
              $stmt = $this->pdo->query("SELECT * FROM Dostawca");
              $Dostawcas = $stmt->fetchAll();
              $stmt->closeCursor();
              if($Dostawcas && !empty($Dostawcas))
                  $data['Dostawca'] = $Dostawcas;
              else
                  $data['Dostawca'] = array();
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
							$stmt = $this->pdo->prepare("SELECT * FROM pracownicy WHERE id=:id");
							$stmt -> bindValue(':id',$id,PDO::PARAM_INT);
							$stmt -> execute();
							$pracownik = $stmt -> fetchAll();
							$liczba_wierszy = $stmt->rowCount();
							$stmt->closeCursor();
							if($pracownik && !empty($pracownik))
									$data['pracownik'] = $pracownik;
							else
									$data['pracownik'] = array();

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
						$stmt = $this->pdo->prepare('DELETE FROM `pracownicy` WHERE id=:id');
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
		public function insert($pelnanazwa,$imie,$nazwisko,$Telefon1,$Adres,$KodPocztowy,$Poczta,$Email)
		{
			$blad=false;
			$data = array();
			$data['error']="";
			if(!$this->pdo)
			{
					$data['error'] = 'Połączenie z bazą nie powidoło się!';
					$blad=true;
			}
			if($pelnanazwa == null || $pelnanazwa == "")
			{
				$data['error'] .= 'Nieokreślon pełna nazwa! <br>';
				$blad=true;
			}
			if($imie == null || $imie == "")
			{
				$data['error'] .= 'Nieokreślone imię! <br>';
				$blad=true;
			}
			if($nazwisko == null || $nazwisko == "")
			{
				$data['error'] .='Nieokreślone nazwisko! <br>';
				$blad=true;
			}
			if($Telefon1 == null || $Telefon1 == "")
			{
				$data['error'] .= 'Nieokreślony telefon! <br>';
				$blad=true;
			}
			if($Adres == null || $Adres == "")
			{
				$data['error'] .= 'Nieokreślony adres! <br>';
				$blad=true;
			}
			if($KodPocztowy == null || $KodPocztowy == "")
			{
				$data['error'] .= 'Nieokreślony kod pocztowy! <br>';
				$blad=true;
			}
			if($Poczta == null || $Poczta == "")
			{
				$data['error'] .= 'Nieokreślona poczta! <br>';
				$blad=true;
			}
			if($Email == null || $Email == "")
			{
				$data['error'] .= 'Nieokreślony Email! <br>';
				$blad=true;
			}
			if(!$blad)
			{
				try
				{
					$stmt = $this->pdo->prepare('INSERT INTO `Dostawca`(`NazwaPelna`,`Telefon1`,`Email`,`Imie`,`Nazwisko`,`Adres`,`KodPocztowy`,`Poczta`) VALUES (:NazwaPelna,:Telefon1,:Email,:Imie,:Nazwisko,:Adres,:KodPocztowy,:Poczta)');
			    $stmt -> bindValue(':NazwaPelna',$pelnanazwa,PDO::PARAM_STR);
			    $stmt -> bindValue(':Telefon1',$Telefon1,PDO::PARAM_INT);
			    $stmt -> bindValue(':Email',$Email,PDO::PARAM_STR);
			    $stmt -> bindValue(':Imie',$imie,PDO::PARAM_STR);
			    $stmt -> bindValue(':Nazwisko',$nazwisko,PDO::PARAM_STR);
			    $stmt -> bindValue(':Adres',$Adres,PDO::PARAM_STR);
			    $stmt -> bindValue(':KodPocztowy',$KodPocztowy,PDO::PARAM_STR);
			    $stmt -> bindValue(':Poczta',$Poczta,PDO::PARAM_STR);
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


		// ** Dawid Dominiak **//
		public function update($id,$imie,$nazwisko,$dzial,$stanowisko,$telefon,$uprawnienia)
		{
			$blad=false;
			$data = array();
			$data['error']="";
			if($id == null || $id == "")
			{
				$data['error'] .= 'Nieokreślone id! <br>';
				$blad=true;
			}
			if($imie == null || $imie == "")
			{
					$data['error'] .= 'Nieokreślone imię! <br>';
					$blad=true;
			}
			if($nazwisko == null || $nazwisko == "")
			{
				$data['error'] .='Nieokreślone nazwisko! <br>';
				$blad=true;
			}
			if($dzial == null || $dzial == "")
			{
				$data['error'] .= 'Nieokreślony dział! <br>';
				$blad=true;
			}
			if($stanowisko == null || $stanowisko == "")
			{
				$data['error'] .= 'Nieokreślone stanowisko! <br>';
				$blad=true;
			}
			if($telefon == null || $telefon == "")
			{
				$data['error'] .= 'Nieokreślony nr telefonu! <br>';
				$blad=true;
			}
			if($uprawnienia == null || $uprawnienia == "")
			{
				$data['error'] .= 'Nieokreślone uprawnienia! <br>';
				$blad=true;
			}
				if(!$blad)
				{
					try
					{
						$stmt = $this->pdo->prepare('UPDATE `pracownicy` SET `imie`=:imie,`nazwisko`=:nazwisko,`dzial`=:dzial,`stanowisko`=:stanowisko,`telefon`=:telefon,`uprawnienia`=:role WHERE `id`=:id');
						$stmt -> bindValue(':id',$id,PDO::PARAM_INT);
						$stmt -> bindValue(':role',$uprawnienia,PDO::PARAM_INT);
						$stmt -> bindValue(':imie',$imie,PDO::PARAM_STR);
						$stmt -> bindValue(':nazwisko',$nazwisko,PDO::PARAM_STR);
						$stmt -> bindValue(':dzial',$dzial,PDO::PARAM_STR);
						$stmt -> bindValue(':stanowisko',$stanowisko,PDO::PARAM_STR);
						$stmt -> bindValue(':telefon',$telefon,PDO::PARAM_STR);
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


		// ** Dawid Dominiak **//
		public function reset($id ,$pass1, $pass2)
		{
			$blad=false;
			$data = array();
			$data['error']="";
			if($id == NULL || $id == "")
				{
					$data['error'] .= 'Nieokreślone id! <br>';
					$blad=true;
				}
			if($pass1 == NULL || $pass1 == "")
					{
						$data['error'] .= 'Nieokreślone hasło nr. 1! <br>';
						$blad=true;
					}
				if($pass2 == NULL || $pass2 == "")
				{
					$data['error'] .= 'Nieokreślone hasło nr. 2! <br>';
					$blad=true;
				}
			if(strcmp($pass1,$pass2)!==0)
				{
					$data['error'] .= 'Hasło nr.1 i hasło nr. 2 są różne! <br>';
					$blad=true;
				}
			if(!$blad)
			{

				try
				{
					$stmt = $this->pdo->prepare('UPDATE `pracownicy` SET `haslo`= :haslo WHERE `id`=:id');
					$stmt -> bindValue(':id',$id,PDO::PARAM_INT);
					$md5password = md5($pass1);
					$stmt -> bindValue(':haslo',$md5password,PDO::PARAM_STR);
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

		// ** Dawid Dominiak **//
		public function zmienAktywnosc($id)
		{
			$data = array();
			if($id == NULL || $id == "")
					$data['error'] = 'Nieokreślone id!';
				else
				{

						try
						{
							$tempArray=array();
							$tempArray=$this->getOne($id);

							//d($tempArray['pracownik'][0]['aktywny']);

							$stmt = $this->pdo->prepare('UPDATE `pracownicy` SET `aktywny`= :aktywny WHERE `id`=:id');
							$stmt -> bindValue(':id',$id,PDO::PARAM_INT);
							if($tempArray['pracownik'][0]['aktywny']==0)
							{
								$stmt -> bindValue(':aktywny',1,PDO::PARAM_INT);
							}
							else
							{
								$stmt -> bindValue(':aktywny',0,PDO::PARAM_INT);
							}
							$wynik_zapytania = $stmt -> execute();
						}
						catch(\PDOException $e)
						{
							if(isset($data['error']))
								$data['error'] =$data['error'].'<br> Błąd zapisu danych do bazy!';
							else
								$data['error'] ='<br> Błąd zapisu danych do bazy!';
						}

				}
				return $data;
		}

  }

?>
