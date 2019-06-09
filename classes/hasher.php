<?php
class Hasher {
    static public function hashData($data) {
        return password_hash($data, PASSWORD_DEFAULT);
    }
}
