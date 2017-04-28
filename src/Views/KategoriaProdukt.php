<?php
	namespace Views;

	class KategoriaProdukt extends View
	{
			// ** Dawid Dominiak **//
      public function index($data)
      {
          $model = $this->getModel('KategoriaProdukt');
          if($model)
          {
              $data = $model->getAll();

              if(isset($data['KategoriaProdukt']))
                   $this->set('tablicaKategoriaProdukt', $data['KategoriaProdukt']);
          }
          if(isset($data['error']))
              $this->set('error', $data['error']);
          $this->render('indexKategoriaProdukt');
      }

  }
?>
