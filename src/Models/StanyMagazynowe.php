<?php
	namespace Models;
	use \PDO;
	class KategoriaKlient extends Model
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
              $stmt = $this->pdo->query("SELECT * FROM KategoriaKlient");
              $KategoriaKlients = $stmt->fetchAll();
              $stmt->closeCursor();
              if($KategoriaKlients && !empty($KategoriaKlients))
                  $data['KategoriaKlient'] = $KategoriaKlients;
              else
                  $data['KategoriaKlient'] = array();
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
							$stmt = $this->pdo->prepare("SELECT * FROM KategoriaKlient WHERE IdKategoria=:id");
							$stmt -> bindValue(':id',$id,PDO::PARAM_INT);
							$stmt -> execute();
							$KategoriaKlient = $stmt -> fetchAll();
							$liczba_wierszy = $stmt->rowCount();
							$stmt->closeCursor();
							if($KategoriaKlient && !empty($KategoriaKlient))
									$data['KategoriaKlient'] = $KategoriaKlient;
							else
									$data['KategoriaKlient'] = array();

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
						$stmt = $this->pdo->prepare('DELETE FROM `KategoriaKlient` WHERE IdKategoria=:id');
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
					$stmt = $this->pdo->prepare('INSERT INTO `KategoriaKlient`(`Nazwa`) VALUES (:NazwaPelna)');
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
						$stmt = $this->pdo->prepare('UPDATE `KategoriaKlient` SET `Nazwa`=:nazwa WHERE `IdKategoria`=:id');
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
