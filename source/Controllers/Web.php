<?php 

namespace Source\Controllers;

class Web extends Controller
{
  public function __construct($router)
  {
    parent::__construct($router);
  }

  public function login(): void 
  {
    echo $this->view->render("theme/login");
  }

  public function register(): void 
  {
    echo $this->view->render("theme/register");
  }

  public function error($data)
  {
    echo "<h1>Ooops, ocorreu um erro!</h1><p>Erro: {$data["errcode"]}</p>";
  }
}