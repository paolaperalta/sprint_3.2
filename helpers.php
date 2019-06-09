<?php
function dd($valor) {
    echo "<pre>";
        var_dump($valor);
    echo "</pre>";
        exit;
}

function inputUsuario($campo) {
    if(isset($_POST[$campo])){
        return $_POST[$campo];
    }
}

function redirect($destino) {
    header("Location: ".$destino);
    exit;
}

?>
