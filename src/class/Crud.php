<?php
require_once('./config/DB.php');

abstract class Crud extends DB
{
  protected string $table;

  abstract public function insert();
  abstract public function update($id);

  public function find($id)
  {
    $query = "SELECT * FROM $this->table WHERE id=?";
    $query = DB::prepare($query);
    $query->execute(array($id));
    $response = $query->fetch();
    return $response;
  }
  public function findAll()
  {
    $query = "SELECT * from $this->table";
    $query = DB::prepare($query);
    $response = $query->fetchAll();
    return $response;
  }

  public function delete($id)
  {
    $query = "DELETE from $this->table WHERE id=?";
    $query = DB::prepare($query);
    return $query->execute(array($id));
  }
}
