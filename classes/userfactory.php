<?php
class UserFactory {

  public function armarAvatar($imagen) {
    $nombre = $imagen["avatar"]["name"];
    $ext = pathinfo($nombre, PATHINFO_EXTENSION);
    $archivoOrigen = $imagen["avatar"]["tmp_name"];
    $archivoDestino = dirname(__DIR__);
    $archivoDestino = $archivoDestino . '/img/';
    $avatarUsuario = uniqid();
    $archivoDestino = $archivoDestino.$avatarUsuario.".".$ext;
    move_uploaded_file($archivoOrigen, $archivoDestino);
    $avatarUsuario = $avatarUsuario.".".$ext;
    return $avatarUsuario;
  }

  public function armarUsuario($datos, $imagen) {
    $usuario = [
      "nombre" => $datos->getNombre(),
      "email" => $datos->getEmail(),
      "password" => Hasher::hashData($datos->getPassword()),
      "avatar" => $imagen,
      "role" => 1
    ];
    return $usuario;
  }
}

 ?>
