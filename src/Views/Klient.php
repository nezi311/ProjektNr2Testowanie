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
          if(isset($data['error']))
              $this->set('error', $data['error']);
          //przetworzenie szablonu do wyświetlania listy pracowników
          $this->render('indexKlient');
      }






  }
?>
