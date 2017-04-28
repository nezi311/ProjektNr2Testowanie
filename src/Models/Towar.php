<?php
	namespace Models;
	use \PDO;
	class Towar extends Model
	{

    public function getAll()
    {
      $data = array();
      if(!$this->pdo)
          $data['error'] = 'Połączenie z bazą nie powidoło się!';
      else
          try
          {
<<<<<<< HEAD
              $stmt = $this->pdo->query("SELECT * FROM Towar");
=======
              $stmt = $this->pdo->query("SELECT * FROM produkt");
>>>>>>> 1e2cca542a5533c4344d756e593c6db717e79437
              $towary = $stmt->fetchAll();
              $stmt->closeCursor();
              if($towary && !empty($towary))
                  $data['towary'] = $towary;
              else
                  $data['towary'] = array();
          }
          catch(\PDOException $e)
          {
              $data['error'] = 'Błąd odczytu danych z bazy! ';
          }
      return $data;
    }

    public function getFreeze()
    {
      $data = array();
      if(!$this->pdo)
          $data['error'] = 'Połączenie z bazą nie powidoło się!';
      else
          try
          {
              $stmt = $this->pdo->query("SELECT * FROM `towar` WHERE freeze=1;");
              $towary = $stmt->fetchAll();
              $stmt->closeCursor();
              if($towary && !empty($towary))
                  $data['towary'] = $towary;
              else
                  $data['towary'] = array();
          }
          catch(\PDOException $e)
          {
              $data['error'] = 'Błąd odczytu danych z bazy! ';
          }
      return $data;
    }

    public function getNotFreeze()
    {
      $data = array();
      if(!$this->pdo)
          $data['error'] = 'Połączenie z bazą nie powidoło się!';
      else
          try
          {
              $stmt = $this->pdo->query("SELECT * FROM towar WHERE freeze=0;");
              $towary = $stmt->fetchAll();
              $stmt->closeCursor();
              if($towary && !empty($towary))
                  $data['towary'] = $towary;
              else
                  $data['towary'] = array();
          }
          catch(\PDOException $e)
          {
              $data['error'] = 'Błąd odczytu danych z bazy! ';
          }
      return $data;
    }

		public function getZamowienia()
    {
      $data = array();
      if(!$this->pdo)
          $data['error'] = 'Połączenie z bazą nie powidoło się!';
      else
          try
          {
              $stmt = $this->pdo->query("SELECT * FROM zamowienia ;");
              $towary = $stmt->fetchAll();
              $stmt->closeCursor();
              if($towary && !empty($towary))
                  $data['towary'] = $towary;
              else
                  $data['towary'] = array();
          }
          catch(\PDOException $e)
          {
              $data['error'] = 'Błąd odczytu danych z bazy! ';
          }
      return $data;
    }

		public function getOne($id)
		{
			$data = array();
			if($id === NULL || $id === "")
				$data['error'] = 'Nieokreślone ID!';
			else
			if(!$this->pdo)
					$data['error'] = 'Połączenie z bazą nie powidoło się!';
			else
					try
					{
							$stmt = $this->pdo->prepare("SELECT * FROM towar WHERE IdTowar=:id");
							$stmt -> bindValue(':id',$id,PDO::PARAM_INT);
							$stmt -> execute();
							$towar = $stmt -> fetchAll();
							$liczba_wierszy = $stmt->rowCount();
							$stmt->closeCursor();
							if($towar && !empty($towar))
									$data['towar'] = $towar;
							else
									$data['towar'] = array();

							if($liczba_wierszy===0)
								$data['error']="Brak podanego id w bazie danych";
					}
					catch(\PDOException $e)
					{
							$data['error'] = 'Błąd odczytu danych z bazy! ';
					}
			return $data;
		}


		public function delete($id)
		{
			$data = array();
				if($id === NULL || $id === "")
					$data['error'] = 'Nieokreślone ID!';
				else
					try
					{
						$stmt = $this->pdo->prepare('DELETE FROM `towar` WHERE IdTowar=:id');
				    $stmt -> bindValue(':id',$id,PDO::PARAM_INT);
				    $wynik_zapytania = $stmt -> execute();
					}
					catch(\PDOException $e)
					{
						$data['error'] =$data['error'].'<br> Błąd wykonywania operacji usunięcia';
					}
				return $data;

		}

		public function insert($NazwaTowaru,$Kategoria,$Opakowanie)
		{
			$blad=false;
			$data = array();
			$data['error']="";
			if($NazwaTowaru === null || $NazwaTowaru === "")
			{
				$data['error'] .= 'Nieokreślona $Nazwa Towaru! <br>';
				$blad=true;
			}
			if($Kategoria === null || $Kategoria === "")
			{
				$data['error'] .='Nieokreślona kategoria! <br>';
				$blad=true;
			}
			if($Opakowanie === null || $Opakowanie === "")
			{
				$data['error'] .= 'Nieokreślone opakowanie! <br>';
				$blad=true;
			}

			if(!$blad)
			{
				try
				{
					$status=1;
					$stmt = $this->pdo->prepare('INSERT INTO `Towar`(`NazwaTowaru`,`RodzajTowaru`,`Opakowanie`) VALUES (:NazwaTowaru,:RodzajTowaru,:Opakowanie)');
			    $stmt -> bindValue(':NazwaTowaru',$NazwaTowaru,PDO::PARAM_STR);
			    $stmt -> bindValue(':RodzajTowaru',$Kategoria,PDO::PARAM_INT);
			    $stmt -> bindValue(':Opakowanie',$Opakowanie,PDO::PARAM_STR);
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

		public function Zamroz()
		{

		}

		public function odmroz($id)
		{

		}

  }

?>
