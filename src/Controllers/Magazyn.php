<?php
namespace Controllers;
class Magazyn extends Controller
{


  public function index($data = null)
  {
    if($_SESSION['role']<=1)
    {
      //tworzy obiekt widoku i zleca wyświetlenie wszystkich kategorii
      //w widoku
      $view = $this->getView('Magazyn');
      $view->index($data);
    }
    else
      $this->redirect('index/');
  }

  // ** Dawid Dominiak **//
  public function showone($id=null)
  {
    if($id !== null)
    {
      $view = $this->getView('Magazyn');
      $view->showone($id);
    }
    else
      $this->redirect('Magazyn/');
  }

  // ** Dawid Dominiak **//
  public function update()
  {
    if($_SESSION['role']<=1)
    {
      $model=$this->getModel('Magazyn');
          if($model)
          {
            $data = $model->update($_POST['id'],$_POST['Nazwa']);
          }
          if($data['error']==="")
          {
            $this->redirect('Magazyn/');
          }
          else
          {
            $this->index($data);
          }
    }
    else
      $this->redirect('index/');
  }


  // ** Dawid Dominiak **//
  public function delete()
  {

      if($_SESSION['role']<=1)
      {
        if($id !== null)
        {

          $model=$this->getModel('Magazyn');
                  if($model)
                  {
                    $data = $model->delete($_GET['id']);
                      //nie przekazano komunikatów o błędzie
                  }
          //powiadamiamy odpowiedni widok, że nastąpiła aktualizacja bazy
          $this->redirect('Magazyn/');
        }
        else
          $this->redirect('Magazyn/');
      }
      else
        $this->redirect('index/');
    }
  // ** Dawid Dominiak **//
    public function insert()
    {
      if($_SESSION['role']<=1)
      {

            $model=$this->getModel('Magazyn');
            if($model)
            {

              $data = $model->insert($_POST['Nazwa']);
              //pobranie komunikatów o bledach
            }
            if($data['error'] === "") // jeśli bledy nie istnieją, przechodzimy do zakladnki "Magazyn"
              {
                $this->redirect('Magazyn/');
              }
              else // jeśli błędy istnieją wyświetlamy je w formularzu
              {
                $this->index($data);
              }

      }
      else
        $this->redirect('index/');

    }


}
?>
