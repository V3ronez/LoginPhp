<?php

class DB
{
  private static $pdo;

  public static function instanceDb()
  {
    if (!isset(self::$pdo)) {
      try {
        $env = parse_ini_file('.env');
        self::$pdo = new PDO($env["DB_CONNECTION"] . ":host=" . $env["DB_HOST"] . ";dbname=" . $env["DB_DATABASE"], $env["DB_USERNAME"], $env["DB_PASSWORD"]);
        // self::$pdo = new PDO('mysql:host=localhost;dbname=login_php', 'root', '@V3ronez261602317');
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        self::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

      } catch (PDOException $error) {
        echo "falha ao conectar ao banco" . $error->getMessage();
      }
    }
    return self::$pdo;
  }

  public static function prepare($query)
  {
    return self::instanceDb()->prepare($query);
  }
}
