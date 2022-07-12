<?php
require_once('./config/DB.php');
require_once('./autload.php');

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password-repeated'])) {

  $name = Validade::validate($_POST['name']);
  $email = Validade::validate($_POST['email']);
  $password = Validade::validate($_POST['password']);
  $passwordRepeated = Validade::validate($_POST['password-repeated']);

  if (empty($name) || empty($email) || empty($password) || empty($passwordRepeated) || empty($_POST['checkbox'])) {
    $error = "Todos os campos são obrigatórios!";
  } else {
    $user = new User($name, $email, $password);
  }
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
  <title>Cadastrar</title>
</head>

<body>
  <form method="post" action="#">
    <h2>Cadastrar</h2>
    <?php if (isset($error)) { ?><div class="erro-geral animate__animated animate__fadeInDown"><?php echo $error; ?></div> <?php } ?>

    <div class="input-group">
      <img class="input-icon" src="public/assets/images/carteira-de-identidade.png" alt="nome-image">
      <input type="text" name="name" placeholder="Digite seu nome: " id="">
      <div class="erro-input"></div>
    </div>
    <div class="input-group">
      <img class="input-icon" src="public/assets/images/perto.png" alt="email-image">
      <input type="email" name="email" placeholder="Digite seu email: exemplo@contato.com.br" id="">
    </div>
    <div class="input-group">
      <img class="input-icon" src="public/assets/images/chave.png" alt="login-image">
      <input type="password" name="password" placeholder="Digite sua senha" id="">
    </div>
    <div class="input-group">
      <img class="input-icon" src="public/assets/images/chave.png" alt="login-image">
      <input type="password" name="password-repeated" placeholder="Digite sua senha novamente" id="">
    </div>
    <div class="input-group">
      <input type="checkbox" name="checkbox" value="checked" id="terms">
      <label for="terms" class="label-termos">Ao se cadastrar você está concordando com nossos <a href="#">Termos
          de uso </a> e nossa
        <a href="#">Política de privacidade</a>.</label>
    </div>
    <button class="btn-login" type="submit">Cadastrar</button>
    <p>Já tem cadastro? <a href="index.php">Fazer login.</a></p>
  </form>
</body>

</html>