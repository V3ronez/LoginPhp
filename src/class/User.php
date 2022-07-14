<?php
require_once('Crud.php');

class User extends Crud
{
  protected string $table = 'users';


  function __construct(
    public string $name,
    private string $email,
    private string $password,
    private string $passwordRepeated = '',
    private string $passwordRescue = '',
    private string $token = '',
    private string $codConfirm = '',
    private string $status = '',
    public array $erro = []
  ) {
  }

  public function setPassowrdRepeated($passwordRepeated):void
  {
    $this->passwordRepeated = $passwordRepeated;
  }

  public function ValidateRegister():void
  {
    if (!preg_match("/^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ'\s]+$/", $this->name)) {
      $this->erro['nameErr'] = 'Somente permitido letras e espaços em branco!';
    }
    if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
      $this->erro['emailErr'] = 'Formato de e-mail inválido!';
    }
    if (strlen($this->password) < 6) {
      $this->erro['passwordErr'] = 'Senha deve ter pelo menos 6 caracteres.';
    }
    if ($this->password !== $this->passwordRepeated) {
      $this->erro['passwordRepeatedErr'] = 'As senhas devem ser iguais. Tente novamente.';
    }
  }

  public function insert(): mixed
  {
    $query = "SELECT * FROM $this->table WHERE email=? LIMIT 1";
    $query = DB::prepare($query);
    $query->execute(array($this->email));
    $user = $query->fetch();

    if (!$user) {

      $dataRegistration = date('Y-m-d H:i:s');
      $passwordCrypt = sha1($this->password);

      $query = "INSERT INTO $this->table VALUES (NULL, ?,?,?,?,?,?,?,?)";
      $query = DB::prepare($query);
      return $query->execute(array(
        $this->name, $this->email, $passwordCrypt, $this->passwordRescue,
        $this->token, $this->codConfirm, $this->status, $dataRegistration
      ));
    } else {
      $this->erro['errorInsert'] = 'Usuário já cadastrado';
    }
  }

  public function update($id)
  {
    // $query = "UPDATE $this->table SET token=? WHERE id=?";
    // $query = DB::prepare($query);
    // return $query->execute(array($token, $id));
  }
}