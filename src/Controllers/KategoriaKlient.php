<?php
namespace Controllers;
class KategoriaKlient extends Controller
{


  public function index($data = null)
  {
    if($_SESSION['role']<=1)
    {
      //tworzy obiekt widoku i zleca wyświetlenie wszystkich kategorii
      //w widoku
      $view = $this->getView('KategoriaKlient');
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
      $view = $this->getView('KategoriaKlient');
      $view->showone($id);
    }
    else
      $this->redirect('KategoriaKlient/');
  }

  // ** Dawid Dominiak **//
  public function update()
  {
    if($_SESSION['role']<=1)
    {
      $model=$this->getModel('KategoriaKlient');
          if($model)
          {
            $data = $model->update($_POST['id'],$_POST['Nazwa']);
          }
          if($data['error']==="")
          {
            $this->redirect('KategoriaKlient/');
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

          $model=$this->getModel('KategoriaKlient');
                  if($model)
                  {
                    $data = $model->delete($_GET['id']);
                      //nie przekazano komunikatów o błędzie
                  }
          //powiadamiamy odpowiedni widok, że nastąpiła aktualizacja bazy
          $this->redirect('KategoriaKlient/');
        }
        else
          $this->redirect('KategoriaKlient/');
      }
      else
        $this->redirect('index/');
    }
  // ** Dawid Dominiak **//
    public function insert()
    {
      if($_SESSION['role']<=1)
      {

            $model=$this->getModel('KategoriaKlient');
            if($model)
            {

              $data = $model->insert($_POST['Nazwa']);
              //pobranie komunikatów o bledach
            }
            if($data['error'] === "") // jeśli bledy nie istnieją, przechodzimy do zakladnki "KategoriaKlient"
              {
                $this->redirect('KategoriaKlient/');
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
