<?php
try {
    global $pdo;
    $pdo = new PDO("mysql:dbname=projeto_multilinguagem;host=localhost", "root", "P63H65P");
} catch(PDOException $e) {
    echo "ERRO: ".$e->getMessage();
}

?>