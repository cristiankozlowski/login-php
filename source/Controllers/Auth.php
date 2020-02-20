<?php

namespace Source\Controllers;

use Source\Models\User;

class Auth extends Controller 
{
  public function __construct($router) 
  {
    parent::__construct($router);
  }

  public function login($data): void
  {
    $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

    if(in_array("", $data)) {
      echo $this->ajaxResponse("message", [
        "type" => "error",
        "message" => "Favor preencher todos os campos"
      ]);
      return;
    }


    $model = new User();
    $user = $model->verifyUserExists($data["email"]);

    if(!$user || !password_verify($data["passwd"], $user->passwd)) {
      echo $this->ajaxResponse("message", [
        "type" => "error",
        "message" => "E-mail ou senha não conferem"
      ]);
      return;
    }

    $_SESSION["user"] = $user->id;
    echo $this->ajaxResponse("redirect", [
      "url" => $this->router->route("app.home")
    ]);
  }

  public function register($data): void
  {
    $first_name = filter_var($data["first_name"], FILTER_DEFAULT);
    $last_name = filter_var($data["last_name"], FILTER_DEFAULT);
    $email = filter_var($data["email"], FILTER_VALIDATE_EMAIL);
    $passwd = filter_var($data["passwd"], FILTER_DEFAULT);

    if(in_array("", $data)) {
      echo $this->ajaxResponse("message", [
        "type" => "error",
        "message" => "Favor preencher todos os campos"
      ]);
      return;
    }


    $model = new User();
    $verifyEmail = $model->verifyUserExists($email);

    if($verifyEmail) {
      echo $this->ajaxResponse("message", [
        "type" => "error",
        "message" => "E-mail já cadastrado, favor inserir outro e-mail"
      ]);
      return;
    }

    $user = new User();

    $user->first_name = $first_name;
    $user->last_name = $last_name;
    $user->email = $email;

    if(strlen($passwd) <= 5) {
      echo $this->ajaxResponse("message", [
        "type" => "error",
        "message" => "Favor inserir ao menos 6 caracteres na sua senha"
      ]);
      return;
    } 

    $user->passwd = password_hash($passwd, PASSWORD_DEFAULT);
    $user->save();

    $_SESSION["user"] = $user->id;
    echo $this->ajaxResponse("redirect", [
      "url" => $this->router->route("app.home")
    ]);
  }
}