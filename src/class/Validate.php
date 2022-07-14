<?php

class Validade
{
  public static function validate($value)
  {
    $value = trim($value);
    $value = htmlspecialchars($value);
    $value = stripslashes($value);
    return $value;
  }
}
