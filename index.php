<?php
session_start();

if(!empty($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
}
require 'config.php';
require 'language.class.php';
$lang = new Language();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Projeto MultLinguagem</title>
</head>
<body>
    <div>
    <hr/>
        <a class="btn1" href="index.php?lang=en">English</a>
        <a class="btn2" href="index.php?lang=pt-br">Português</a>
        <hr/><br><br>
        

        <button class="btn3"><?php $lang->get('BUY'); ?></button><br><br>

        <?php $lang->get('NAME'); ?>:Alessandro <br><br>

        <a class="btn4" href=""><?php $lang->get('LOGOUT'); ?></a><br><br><br>

        Categoria:<?php $lang->get('CATEGORIA_PHOTO'); ?><br><br>
        <?php

        $sql = "SELECT id, (select valor from lang where lang.lang = :lang and lang.nome = categorias.lang_item) as nome FROM categorias";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(":lang", $lang->getLanguage());
        $sql->execute();

        if($sql->rowCount() > 0) {
            foreach($sql->fetchAll() as $categoria) {
                echo $categoria['nome'].'<br/>';
            }
        }
        ?>
    </div>
</body>
</html>

