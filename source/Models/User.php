<?php

namespace Source\Models;

use Exception;
use CoffeeCode\DataLayer\DataLayer;

class User extends DataLayer 
{
  public function __construct()
  {
    parent::__construct("users", ["first_name", "last_name", "email", "passwd"]);
  }
  
  public function verifyUserExists($email): ?object
  {
    return (new User())->find("email = :e", "e={$email}")->fetch();
  }
}