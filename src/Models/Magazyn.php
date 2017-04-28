<?php
	namespace Models;
	use \PDO;
	class Magazyn extends Model
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
              $stmt = $this->pdo->query("SELECT * FROM Magazyn");
              $Magazyns = $stmt->fetchAll();
              $stmt->closeCursor();
              if($Magazyns && !empty($Magazyns))
                  $data['Magazyn'] = $Magazyns;
              else
                  $data['Magazyn'] = array();
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
							$stmt = $this->pdo->prepare("SELECT * FROM Magazyn WHERE IdMagazyn=:id");
							$stmt -> bindValue(':id',$id,PDO::PARAM_INT);
							$stmt -> execute();
							$Magazyn = $stmt -> fetchAll();
							$liczba_wierszy = $stmt->rowCount();
							$stmt->closeCursor();
							if($Magazyn && !empty($Magazyn))
									$data['Magazyn'] = $Magazyn;
							else
									$data['Magazyn'] = array();

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
						$stmt = $this->pdo->prepare('DELETE FROM `Magazyn` WHERE IdMagazyn=:id');
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
		public function insert($pelnanazwa)
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
			if(!$blad)
			{
				try
				{
					$stmt = $this->pdo->prepare('INSERT INTO `Magazyn`(`Nazwa`) VALUES (:NazwaPelna)');
			    $stmt -> bindValue(':NazwaPelna',$pelnanazwa,PDO::PARAM_STR);
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
		public function update($id,$nazwa)
		{
			$blad=false;
			$data = array();
			$data['error']="";
			if($id == null || $id == "")
			{
				$data['error'] .= 'Nieokreślone id! <br>';
				$blad=true;
			}
			if($nazwa == null || $nazwa == "")
			{
					$data['error'] .= 'Nieokreślone imię! <br>';
					$blad=true;
			}
				if(!$blad)
				{
					try
					{
						$stmt = $this->pdo->prepare('UPDATE `Magazyn` SET `Nazwa`=:nazwa WHERE `IdMagazyn`=:id');
						$stmt -> bindValue(':id',$id,PDO::PARAM_INT);
						$stmt -> bindValue(':nazwa',$nazwa,PDO::PARAM_STR);

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
