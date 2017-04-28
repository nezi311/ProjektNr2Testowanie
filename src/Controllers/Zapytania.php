<?php
	namespace Controllers;
	class Zapytania extends Controller
	{
		public function Oferta()
		{
			$view=$this->getView('Zapytania');
			$view->Oferta();
		}
		public function Sprzedaz()
		{
			$view=$this->getView('Zapytania');
			$view->Sprzedaz();
		}

		public function insertO()
    {
      if($_SESSION['role']<=1)
      {

        $view = $this->getView('Zapytania');
        $model=$this->getModel('Zapytania');
              $view->renderJSON($data = $model->insertO($_POST['wiadomosc'],$_POST['produkt'],$_POST['ilosc'],$_POST['dostawca'],$_POST['data'],$_POST['status'],$_POST['komentarz']));
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
              $view->renderJSON($data = $model->insertS($_POST['wiadomosc'],$_POST['produkt'],$_POST['Ilosc'],$_POST['Cena'],$_POST['klient'],$_POST['data'],$_POST['Status'],$_POST['Komentarz']));
      }
      else
        $this->redirect('index/');

    }
	}
	?>
