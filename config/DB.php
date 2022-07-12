<?php

class DB
{
  private static $pdo;

  public static function instanceDb(): PDO
  {
    if (!isset($pdo)) {
      try {
        self::$pdo =  new PDO('mysql=' . $_ENV["DB_HOST"] . 'dbname=' . $_ENV["DB_DATABASE"] . ',' . $_ENV["DB_USERNAME"] . ',' . $_ENV["DB_PASSWORD"] . '');
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        self::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
      } catch (PDOException $error) {
        echo "falha ao conectar ao banco" . $error->getMessage();
      }
    }
    return self::$pdo;
  }

  public static function prepare($sql): PDOStatement
  {
    return self::instanceDb()->prepare($sql);
  }
}
