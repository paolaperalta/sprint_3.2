<?php

class BaseMYSQL extends database {
    static public function conexion($host,$db_nombre,$usuario,$password,$puerto,$charset){
        try {
            $dsn = "mysql:host=".$host.";"."dbname=".$db_nombre.";"."port=".$puerto.";"."charset=".$charset;
            $baseDatos = new PDO($dsn,$usuario,$password);
            $baseDatos->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $baseDatos;
        } catch (PDOException $errores) {
            echo "No se pudo realizar la conexión a la base de datos ". $errores->getmessage();
            exit;
        }
    }

    static public function buscarPorEmail($email,$pdo,$tabla){
       
        $sql = "select * from $tabla where email = :email";
       
        $query = $pdo->prepare($sql);
        $query->bindValue(':email',$email);
        $query->execute();
        $usuario = $query->fetch(PDO::FETCH_ASSOC);
        return $usuario;
    }

    static public function buscarNombreEmail($email,$nombre,$pdo,$tabla){
       
        $sql = "select * from $tabla where email = :email and name = :nombre";       
        $query = $pdo->prepare($sql);
        $query->bindValue(':email',$email);
        $query->bindValue(':nombre',$nombre);
        $query->execute();
        $usuario = $query->fetch(PDO::FETCH_ASSOC);
        return $usuario;
    }

    static public function guardarUsuario($pdo,$usuario,$tabla,$avatar){
        $sql = "insert into $tabla (name,email,password,avatar,role) values (:name,:email,:password,:avatar,:role )";
        $query = $pdo->prepare($sql);
        $query->bindValue(':name',$usuario->getnombre());
        $query->bindValue(':email',$usuario->getEmail());
        $query->bindValue(':password',Hasher::hashData($usuario->getPassword()));
        $query->bindValue(':avatar',$avatar);
        $query->bindValue('role',1);
        $query->execute();

    }

    static public function mysqlChangePass($email, $password, $pdo, $tabla) {
    
    $sqlId = "select $tabla.id from $tabla where email = :email";
    $query = $pdo->prepare($sqlId);
    $query->bindValue(':email', $email);
    $query->execute();
    $id = implode($query->fetch(PDO::FETCH_ASSOC));
    
    $newPass = Hasher::hashData($password);

    $sql = "update $tabla SET password = '$newPass' WHERE id = '$id'";
    $query = $pdo->prepare($sql);
    $query->execute();

//    $usuarios = $this->abrirBaseDatos();
//
//    foreach ($usuarios as $key=>$usuario) {
//        if ($email == $usuario["email"]) {
//            $usuario["password"] = Hasher::hashData($password);
//            $usuarios[$key] = $usuario;
  //      }
  //      $usuarios[$key] = $usuario;
    //}

   // unlink($this->nombreArchivo);
   // foreach ($usuarios as  $usuario) {
     //   $jsusuario = json_encode($usuario);
       // file_put_contents($this->nombreArchivo,$jsusuario. PHP_EOL,FILE_APPEND);
      //  }
    }
    
  
    public function read(){
     
    }
    public function update(){
        
    }
    public function delete(){
        
    }
    public function save($usuario){
       
    }

}
