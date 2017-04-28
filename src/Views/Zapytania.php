<?php
	namespace Views;
	class Zapytania extends View {
		public function Oferta()
		{
			$this->render('ZapytanieOfertowe');
		}
		public function Sprzedaz()
		{
			$this->render('ZapytanieSprzedazowe');
		}
	}
