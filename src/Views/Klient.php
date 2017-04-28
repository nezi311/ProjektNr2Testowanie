<?php
	namespace Views;

	class Klient extends View
	{
			// ** Dawid Dominiak **//
      public function index($data)
      {
          $model = $this->getModel('Klient');
          if($model)
          {
              $data = $model->getAll();

              if(isset($data['Klient']))
                   $this->set('tablicaKlient', $data['Klient']);
          }

					$model2 = $this->getModel('KategoriaKlient');
					if($model2)
					{
							$data2 = $model2->getAll();

							if(isset($data2['KategoriaKlient']))
									 $this->set('tablicaKategoriaKlient', $data2['KategoriaKlient']);
					}

          if(isset($data['error']))
              $this->set('error', $data['error']);
          //przetworzenie szablonu do wyświetlania listy pracowników
          $this->render('indexKlient');
      }






  }
?>
