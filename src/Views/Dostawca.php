<?php
	namespace Views;

	class Dostawca extends View
	{
			// ** Dawid Dominiak **//
      public function index($data)
      {
          $model = $this->getModel('Dostawca');
          if($model)
          {
              $data = $model->getAll();

              if(isset($data['Dostawca']))
                   $this->set('tablicaDostawca', $data['Dostawca']);
          }
          if(isset($data['error']))
              $this->set('error', $data['error']);
          //przetworzenie szablonu do wyświetlania listy pracowników
          $this->render('indexDostawca');
      }





			// public function edit($id, $data=null)
			// {
			// 	$model = $this->getModel('Dostawca');
			// 	if($model)
			// 	{
			// 			$data = $model->getOne($id);
			// 			if(isset($data['pracownik']))
			// 				$this->set('tablicaPracownik', $data['pracownik']);
			// 	}
			// 	if(isset($data['error']))
			// 			$this->set('error', $data['error']);
			// 	//przetworzenie szablonu do wyświetlania danych pracowników do edycji
			// 	$this->render('editPracownik');
			// }

			// ** Dawid Dominiak **//
			public function edit($data=null)
			{
				//sprawdzenie czy tablica data, posiada dane pracownika
				if(isset($data['pracownik']))
					$this->set('tablicaPracownik', $data['pracownik']); // jesli tak przypisujemy je do zmiennej

				// sprawdzenie czy tablica data, posiada informacje o bledach
				if(isset($data['error']))
						$this->set('error', $data['error']);// jesli tak to przypisujemy je do zmiennej

				//przetworzenie szablonu do wyświetlania danych pracowników do edycji
				$this->render('editPracownik');
			}

			// ** Dawid Dominiak **//
			public function passReset($id, $dane=null)
			{


					if(isset($dane['error']))
					{
						if($dane['error'] !== "" )
						{
							//d($dane);
							$this->set('error',$dane['error']);
						}
					}



				if($id===null) //zmiana hasla przez usera
				{
					$this->set('idPracownik',$_SESSION['id']); //utworzenie zmiennej pomocniczej do formularza
				}
				else //zmiana hasla przez admina lub kierownika
				{
					$this->set('idPracownik',$id);
				}

				$this->render('passResetPracownik'); //utworzenie zmiennej pomocniczej do formularza
			}



  }
?>
