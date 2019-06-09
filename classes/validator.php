<?php
class Validador {

    public function validacionUsuario($usuario) {

        $errores = [];

        $nombre = trim($usuario->getNombre());
        $email = trim($usuario->getEmail());
        $password = trim($usuario->getPassword());
        $repassword = trim($usuario->getRepassword());

          if (empty($nombre)) {
            $errores["nombre"] = "El campo nombre no puede estar vacío";
          } elseif (strlen($nombre) < 3) {
            $errores["nombre"] = "El campo nombre debe tener un mínimo de 3 caracteres";
          } elseif (!ctype_alpha($nombre)) {
            $errores["nombre"] = "El campo nombre no puede contener números";
          }

          if (empty($email)) {
            $errores["email"] = "El campo email no puede estar vacío";
          }
          if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errores["email"] = "Debe ingresar un email válido";
          }

          if (empty($password)) {
            $errores["password"] = "El campo password no puede estar vacío";
          } elseif (strlen($password) < 6) {
            $errores["password"] = "El password debe tener un mínimo de 6 caracteres";
          }

          if (empty($repassword)) {
            $errores["repassword"] = "Debe confirmar su contraseña";
          } elseif ($password != $repassword) {
            $errores["repassword"] = "Las contraseñas no coinciden";
          }

          if ($usuario->getAvatar() != null) {
            if ($_FILES["avatar"]["error"] != 0) {
              $errores["avatar"] = "El archivo no es válido";
            } else {
              $nombre = $_FILES["avatar"]["name"];
              $ext = pathinfo($nombre, PATHINFO_EXTENSION);
              if ($ext != "png" && $ext != "jpg" && $ext != "jpeg" && $ext != "JPG" && $ext != "JPEG" && $ext != "PNG") {
              $errores["avatar"] = "Debe subir una imagen .jpg o .png";
            }
          }
        }
      return $errores;
    }

    //Metodo creado para validar el login del usuario
    public function validacionLogin($usuario) {

        $errores = array();

        $email = trim($usuario->getEmail());
        $password = trim($usuario->getPassword());

        if (empty($email)) {
          $errores["email"] = "El campo email no puede estar vacío";
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $errores["email"] = "Debe ingresar un email válido";
        }

        if (empty($password)) {
          $errores["password"] = "El campo password no puede estar vacío";
        } elseif (strlen($password) < 6) {
          $errores["password"] = "El password debe tener un mínimo de 6 caracteres";
        }
        return $errores;
    }

    //Método para validar si el usuario desea recuperar su contraseña
    public function validacionOlvide($usuario) {

        $errores = [];

        $email = trim($usuario->getEmail());
        $nombre = trim($usuario->getNombre());

        if (empty($nombre)) {
          $errores["nombre"] = "El campo nombre no puede estar vacío";
        } elseif (strlen($nombre) < 3) {
          $errores["nombre"] = "El campo nombre debe tener un mínimo de 3 caracteres";
        } elseif (!ctype_alpha($nombre)) {
          $errores["nombre"] = "El campo nombre no puede contener números";
        }

        if (empty($email)) {
          $errores["email"] = "El campo email no puede estar vacío";
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $errores["email"] = "Debe ingresar un email válido";
        }
      return $errores;
    }

    public function validacionChangePassword($usuario) {

        $errores = array();

        $email = trim($usuario->getEmail());
        $password = trim($usuario->getPassword());
        $repassword = trim($usuario->getRepassword());

        if (empty($email)) {
          $errores["email"] = "El campo email no puede estar vacío";
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $errores["email"] = "Debe ingresar un email válido";
        }

        if (empty($password)) {
          $errores["password"] = "El campo password no puede estar vacío";
        } elseif (strlen($password) < 6) {
          $errores["password"] = "El password debe tener un mínimo de 6 caracteres";
        }
        if (empty($repassword)) {
          $errores["repassword"] = "Debe confirmar su contraseña";
        } elseif ($password != $repassword) {
          $errores["repassword"] = "Las contraseñas no coinciden";
        }
        return $errores;
    }
}
