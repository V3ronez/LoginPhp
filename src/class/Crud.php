<?php
require_once('./config/DB.php');

abstract class Crud extends DB
{
  protected string $table;

  abstract public function insert();
  abstract public function update($id);

  public function find($id)
  {
    $sql = "SELECT * FROM $this->table WHERE id=?";
    $sql = DB::prepare($sql);
    $sql->execute(array($id));
    $response = $sql->fetch();
    return $response;
  }
  public function findAll()
  {
    $sql = "SELECT * from $this->table";
    $sql = DB::prepare($sql);
    $response = $sql->fetchAll();
    return $response;
  }

  public function delete($id)
  {
    $sql = "DELETE from $this->table WHERE id=?";
    $sql = DB::prepare($sql);
    return $sql->execute(array($id));
  }
}
