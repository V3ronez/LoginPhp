<?php
session_start();
require_once('./config/DB.php');
class Login
{
  protected string $table = 'users';
  public string $name;
  public string $email;
  private string $password;
  private string $token;
  public array $erro = [];
  public function auth($email, $password)
  {
    $passwordCrypt = sha1($password);

    $query = "SELECT * FROM $this->table WHERE email=? AND password=? LIMIT 1";
    $query = DB::prepare($query);
    $query->execute(array($email, $passwordCrypt));

    $user = $query->fetch(PDO::FETCH_ASSOC);
    if ($user)
    {
      $this->token = sha1(uniqid() . date('d-m-Y-H-i-s'));

      $query = "UPDATE $this->table SET token=? WHERE email=? AND password=? LIMIT 1";
      $query = DB::prepare($query);
      if ($query->execute(array($this->token, $email, $passwordCrypt)))
      {
        $_SESSION['TOKEN'] = $this->token;
        header('location: restrict.php');
      }
      else
      {
        $this->erro['errorLogin'] = 'Falha ao se conectar ao servidor!';
      }
    }
    else
    {
      $this->erro['errorLogin'] = 'Email ou senha incorretos!';

    }
  }

  public function isAuth($token)
  {
    $query = "SELECT * FROM $this->table WHERE token=? LIMIT 1";
    $query = DB::prepare($query);
    $query->execute(array($token));
    $user = $query->fetch(PDO::FETCH_ASSOC);
    if ($user)
    {
      $this->name = $user['name'];
      $this->email = $user['email'];
    }
    else
    {
      header('location: index.php');
    }
  }
}