<?php

function autload($class)
{
  $file = __DIR__ . '/src/class/' . $class . '.php';
  $file = str_replace('\\', DIRECTORY_SEPARATOR, $file);
  if (is_file($file)) {
    require_once($file);
  }
  spl_autoload_register('autoload');
}
