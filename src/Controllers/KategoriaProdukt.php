<?php
namespace Controllers;
class KategoriaProdukt extends Controller
{


  public function index($data = null)
  {
    if($_SESSION['role']<=1)
    {
      //tworzy obiekt widoku i zleca wyświetlenie wszystkich kategorii
      //w widoku
      $view = $this->getView('KategoriaProdukt');
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
      $view = $this->getView('KategoriaProdukt');
      $view->showone($id);
    }
    else
      $this->redirect('KategoriaProdukt/');
  }

  // ** Dawid Dominiak **//
  public function update()
  {
    if($_SESSION['role']<=1)
    {
      $model=$this->getModel('KategoriaProdukt');
          if($model)
          {
            $data = $model->update($_POST['id'],$_POST['Nazwa']);
          }
          if($data['error']==="")
          {
            $this->redirect('KategoriaProdukt/');
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

          $model=$this->getModel('KategoriaProdukt');
                  if($model)
                  {
                    $data = $model->delete($_GET['id']);
                      //nie przekazano komunikatów o błędzie
                  }
          //powiadamiamy odpowiedni widok, że nastąpiła aktualizacja bazy
          $this->redirect('KategoriaProdukt/');
        }
        else
          $this->redirect('KategoriaProdukt/');
      }
      else
        $this->redirect('index/');
    }
  // ** Dawid Dominiak **//
    public function insert()
    {
      if($_SESSION['role']<=1)
      {

            $model=$this->getModel('KategoriaProdukt');
            if($model)
            {

              $data = $model->insert($_POST['Nazwa']);
              //pobranie komunikatów o bledach
            }
            if($data['error'] === "") // jeśli bledy nie istnieją, przechodzimy do zakladnki "KategoriaProdukt"
              {
                $this->redirect('KategoriaProdukt/');
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
