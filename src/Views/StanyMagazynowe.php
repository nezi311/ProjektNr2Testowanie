<?php
	namespace Views;

	class KategoriaKlient extends View
	{
			// ** Dawid Dominiak **//
      public function index($data)
      {
          $model = $this->getModel('KategoriaKlient');
          if($model)
          {
              $data = $model->getAll();

              if(isset($data['KategoriaKlient']))
                   $this->set('tablicaKategoriaKlient', $data['KategoriaKlient']);
          }
          if(isset($data['error']))
              $this->set('error', $data['error']);
          $this->render('indexKategoriaKlient');
      }

  }
?>
