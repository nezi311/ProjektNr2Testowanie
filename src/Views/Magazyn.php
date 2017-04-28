<?php
	namespace Views;

	class Magazyn extends View
	{
			// ** Dawid Dominiak **//
      public function index($data)
      {
          $model = $this->getModel('Magazyn');
          if($model)
          {
              $data = $model->getAll();

              if(isset($data['Magazyn']))
                   $this->set('tablicaMagazyn', $data['Magazyn']);
          }
          if(isset($data['error']))
              $this->set('error', $data['error']);
          $this->render('indexMagazyn');
      }

  }
?>
