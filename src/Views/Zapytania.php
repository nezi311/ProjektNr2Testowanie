<?php
	namespace Views;
	class Zapytania extends View {
		public function Oferta($data)
		{
			$model = $this->getModel('Zapytania');
			if($model)
			{
				$data = $model->getOferta();
				if(isset($data['oferta']))
					$this->set('tablicaOferta',$data['oferta']);
			}

			$model = $this->getModel('Dostawca');
			if($model)
			{
				$data = $model->getAll();
				if(isset($data['Dostawca']))
					$this->set('tablicaDostawca',$data['Dostawca']);
			}


			$model = $this->getModel('Towar');
			if($model)
			{
				$data = $model->getAll();
				if(isset($data['towary']))
					$this->set('tablicaTowar',$data['towary']);
			}

			if(isset($data['error']))
					$this->set('error', $data['error']);

			$this->render('ZapytanieOfertowe');
		}
		public function Sprzedaz($data)
		{
			$model = $this->getModel('Zapytania');
			if($model)
			{
				$data = $model->getSprzedaz();
				if(isset($data['oferta']))
					$this->set('tablicaSprzedaz',$data['oferta']);
			}

			$model = $this->getModel('Klient');
			if($model)
			{
				$data = $model->getAll();
				if(isset($data['Klient']))
					$this->set('tablicaKlient',$data['Klient']);
			}


			$model = $this->getModel('Towar');
			if($model)
			{
				$data = $model->getAll();
				if(isset($data['towary']))
					$this->set('tablicaTowar',$data['towary']);
			}

			if(isset($data['error']))
					$this->set('error', $data['error']);

			$this->render('ZapytanieSprzedazowe');
		}
	}
