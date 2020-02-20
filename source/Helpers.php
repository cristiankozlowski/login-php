<?php


function asset(string $param = null): string
{
  if(!empty($param)) {

    return ROOT . "/views/assets" . $param;
  }
  
  return ROOT;

}