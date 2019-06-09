<?php
abstract class DataBase {
  abstract public function save(array $registro);
  abstract public function read();
  abstract public function delete();
  abstract public function update();

}

 ?>
