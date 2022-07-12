<?php
require_once('Crud.php');

class User extends Crud
{
  protected string $table = 'users';
  public string $name;
  private string $email;
  private string $password;
  private string $passwordRepeated = '';
  private string $passwordRescue = '';
  private string $token = '';
  private string $codConfirm = '';
  private string $status = '';
  public array $erro = [];

  function __construct($name, $email, $password, $passwordRepeated, $passwordRescue, $token, $codConfirm, $status, $erro)
  {}
  public function insert()
  {}
  public function update($id)
  {}
}
