<?php
namespace Controllers;
class Towar extends Controller
{


  public function index()
  {
    if($_SESSION['role']<=1)
    {
      //tworzy obiekt widoku i zleca wyświetlenie wszystkich kategorii
      //w widoku
      $view = $this->getView('Towar');
      $view->index();
    }
    else
      $this->redirect('index/');
  }

  public function Zamowienia()
  {
    if($_SESSION['role']<=1)
    {
      //tworzy obiekt widoku i zleca wyświetlenie wszystkich kategorii
      //w widoku
      $view = $this->getView('Towar');
      $view->index();
    }
    else
      $this->redirect('index/');
  }


  public function insert()
  {
    if($_SESSION['role']<=1)
    {
      $model=$this->getModel('Towar');
          if($model)
          {
            $data = $model->insert($_POST['Nazwa'],$_POST['Kategorietowar'],$_POST['Opakowanie']);
            //pobranie komunikatów o bledach
          }
          if($data['error'] === "") // jeśli bledy nie istnieją, przechodzimy do zakladnki "pracownicy"
            {
              $this->redirect('Towar/');
            }
            else // jeśli błędy istnieją wyświetlamy je w formularzu
            {
              $this->index($data);
            }

    }
    else
      $this->redirect('index/');

  }

  public function showone($id=null)
  {
    if($id !== null)
    {
      $view = $this->getView('Towar');
      $view->showone($id);
    }
    else
      $this->redirect('Towar/');
  }


  public function delete($id)
  {

      if($_SESSION['role']<=1)
      {
        if($id !== null)
        {

          $model=$this->getModel('Towar');
                  if($model)
                  {
                    $data = $model->delete($id);
                      //nie przekazano komunikatów o błędzie
                  }
          //powiadamiamy odpowiedni widok, że nastąpiła aktualizacja bazy
          $this->redirect('Towar/');
        }
        else
          $this->redirect('Towar/');
      }
      else
        $this->redirect('index/');
    }


}
?>
