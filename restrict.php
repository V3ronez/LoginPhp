<?php
require_once('./config/DB.php');
require_once('./src/class/Login.php');

$login = new Login();
$login->isAuth($_SESSION['TOKEN']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Area restrita</title>
</head>
<body>
<?php echo "<h1>Bem vindo $login->name!</h1><br><h2>Email:$login->email</h2>"; ?>
</body>
</html>