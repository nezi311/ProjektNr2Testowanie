<?php
	namespace Controllers;
	class Zapytania extends Controller
	{
		public function Oferta($data=null)
		{
			$view=$this->getView('Zapytania');
			$view->Oferta($data);
		}
		public function Sprzedaz($data=null)
		{
			$view=$this->getView('Zapytania');
			$view->Sprzedaz($data);
		}

		public function updateO()
		{
			if($_SESSION['role']<=1)
			{

				$view = $this->getView('Zapytania');
				$model=$this->getModel('Zapytania');
							$data = $model->updateO($_POST['id'],$_POST['wiadomosc'],$_POST['produkt'],$_POST['ilosc'],$_POST['dostawca'],$_POST['data'],$_POST['status'],$_POST['komentarz']);
			}
			else
				$this->redirect('index/');

		}


		public function updateS()
		{
			if($_SESSION['role']<=1)
			{

				$view = $this->getView('Zapytania');
				$model=$this->getModel('Zapytania');
							$data = $model->updateS($_POST['id'],$_POST['wiadomosc'],$_POST['produkt'],$_POST['ilosc'],$_POST['cena'],$_POST['klient'],$_POST['data'],$_POST['Status'],$_POST['Komentarz']);
			}
			else
				$this->redirect('index/');

		}


		public function insertO()
    {
      if($_SESSION['role']<=1)
      {

        $view = $this->getView('Zapytania');
        $model=$this->getModel('Zapytania');
              $data = $model->insertO($_POST['wiadomosc'],$_POST['produkt'],$_POST['ilosc'],$_POST['dostawca'],$_POST['data'],$_POST['status'],$_POST['komentarz']);
      }
      else
        $this->redirect('index/');

    }
		public function insertS()
    {
      if($_SESSION['role']<=1)
      {

        $view = $this->getView('Zapytania');
        $model=$this->getModel('Zapytania');
              $data = $model->insertS($_POST['wiadomosc'],$_POST['produkt'],$_POST['ilosc'],$_POST['cena'],$_POST['klient'],$_POST['data'],$_POST['Status'],$_POST['Komentarz']);
      }
      else
        $this->redirect('index/');

    }
	}
	?>
