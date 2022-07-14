<?php
session_start();
require_once('./config/DB.php');
require_once('./src/class/Login.php');
require_once('./src/class/Validate.php');

if (isset($_POST['email']) && isset($_POST['password']) && !empty($_POST['email']) && !empty($_POST['password']))
{
  $email = Validade::validate($_POST['email']);
  $password = Validade::validate($_POST['password']);
  $login = new Login();
  $login->auth($email, $password);
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="public/assets/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <title>Login</title>
</head>

<body>
  <h1>Login daora do V3 (emote feliz)</h1>
  <form method="post" action="#">
    <h2>Login</h2>
    <div class="input-group">
      <img class="input-icon" src="public/assets/images/perto.png" alt="login-image">
      <input type="email" name="email" placeholder="Digite seu email: exemplo@contato.com.br" id="">
    </div>
    <div class="input-group">
      <img class="input-icon" src="public/assets/images/chave.png" alt="login-image">
      <input type="password" name="password" placeholder="Digite sua senha" id="">
    </div>
    <button class="btn-login" type="submit">Login</button>
    <p>Ainda não tem cadastro? <a href="register.php">Inscreva-se</a></p>
  </form>
</body>

</html>