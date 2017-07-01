<?php

$connect = mysqli_connect("localhost", "root", "", "ejemplo");

if(isset($_POST["user"]) && isset($_POST["pass"]) && isset($_POST["email"]) && isset($_POST["rpass"])){
  $email = mysqli_real_escape_string($connect, $_POST["email"]);
  $user = mysqli_real_escape_string($connect, $_POST["user"]);
  $pass = mysqli_real_escape_string($connect, $_POST["pass"]);
  $rpass = mysqli_real_escape_string($connect, $_POST["rpass"]);
  $result = "";

  if(strlen($pass) > 30) {
    $result .= "<br>-La contraseña supera los 30 caracteres.";
  }
  if ($pass != $rpass) {
    $result .= "<br>-Las contraseñas no coinciden.";
  }

  if(strlen($user) > 30) {
    $result .= "<br>-El usuario supera los 30 caracteres.";
  } else {
    $sql = "SELECT COUNT(*) as cantidad FROM usuario WHERE user='$user'";
    $res = mysqli_query($connect, $sql);
    $data = mysqli_fetch_array($res);
    if ($data["cantidad"] > 0) {
      $result .= "<br>-El usuario ya existe.";
    }
  }

  
      $sql = "SELECT COUNT(*) as cantidad FROM usuario WHERE email='$email'";
      $res = mysqli_query($connect, $sql);
      $data = mysqli_fetch_array($res);
      

  if ($result != "") {
    echo "<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Error</strong><br>$result</div>";
  } else {
    $sql = "INSERT INTO usuario VALUES(NULL, '$user', '$pass', '$email')";
    mysqli_query($connect, $sql);
    echo "<div class='alert alert-dismissible alert-success'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>¡Correcto!</strong><br>Se ha registrado correctamente.</div>";
  }
} else {
  echo "Error";
}

?>
