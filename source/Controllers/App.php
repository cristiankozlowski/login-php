<?php

namespace Source\Controllers;

use Source\Models\User;

class App extends Controller 
{
  private $user;

  public function __construct($router)
  {
    parent::__construct($router);

    if(empty($_SESSION["user"]) || !$this->user = (new User())->findById($_SESSION["user"])) {
      return $this->router->redirect("web.login");
    } 
  }

  public function home(): void
  {
    echo $this->view->render("theme/app", [
      'user' => $this->user
    ]);
  }

  public function logoff(): void 
  {
    unset($_SESSION["user"]);

    $this->router->redirect("web.login");
  }
}