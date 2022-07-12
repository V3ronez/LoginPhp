<?php

class Validade
{
  public static function validate($value): string
  {
    $value = trim($value);
    $value = htmlspecialchars($value);
    $value = stripslashes($value);
    return $value;
  }
}
