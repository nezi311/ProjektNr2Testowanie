<?php
	namespace Views;

	class Towar extends View
	{

      public function index()
      {
          $model = $this->getModel('Towar');
          if($model)
          {
              $data = $model->getAll();

              if(isset($data['towary']))
                   $this->set('tablicaTowarow', $data['towary']);
          }

					$model2 = $this->getModel('KategoriaProdukt');
					if($model2)
					{
							$data2 = $model2->getAll();

							if(isset($data2['KategoriaProdukt']))
									 $this->set('tablicaKategoriaProdukt', $data2['KategoriaProdukt']);
					}


          if(isset($data['error']))
              $this->set('error', $data['error']);
          //przetworzenie szablonu do wyświetlania listy pracowników
          $this->render('indexTowary');
      }

			public function freezed()
      {
          $model = $this->getModel('Towar');
          if($model)
          {
              $data = $model->getFreeze();

              if(isset($data['towary']))
                   $this->set('tablicaTowarow2', $data['towary']);
          }
          if(isset($data['error']))
              $this->set('error', $data['error']);
          //przetworzenie szablonu do wyświetlania listy pracowników
          $this->render('freezeTowary');
      }



			public function addZamowienia($data)
			{
				// sprawdzenie czy tablica data, posiada informacje o bledach
				if(isset($data['error']))
						$this->set('error', $data['error']);// jesli tak to przypisujemy je do zmiennej
				$this->render('addZamowienia');
			}


			// public function edit($id, $data=null)
			// {
			// 	$model = $this->getModel('Pracownicy');
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
				if(isset($data['towar']))
					$this->set('tablicaTowar', $data['towar']); // jesli tak przypisujemy je do zmiennej

				// sprawdzenie czy tablica data, posiada informacje o bledach
				if(isset($data['error']))
						$this->set('error', $data['error']);// jesli tak to przypisujemy je do zmiennej

				//przetworzenie szablonu do wyświetlania danych pracowników do edycji
				$this->render('editTowar');
			}



  }
?>
