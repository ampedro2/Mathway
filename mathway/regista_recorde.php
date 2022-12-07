<?php

    session_start();
    $nome = $_POST['nome'];
    $numero = $_POST['numero'];
    $pontos = $_POST['pontos'];
    $tempo = $_POST['tempo'];

    $connection = mysqli_connect("localhost", "usr72", "XpR3DbFs", "usr72");
    $sql = "INSERT INTO carcrash_recordes (nome, numero, pontos, tempo) VALUES ('".$nome."', '".$numero."', '".$pontos."', '".$tempo."')";

    if ($connection->query($sql)){
        echo "inserido";
    }
    else{
        echo "erro";
    }

?>