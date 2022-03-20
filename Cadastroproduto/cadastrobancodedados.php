<?php
//incluindo a conexão com banco de dados
include_once 'conexaodb.php';
//pegando os inputs do FORM Cadastro  e armazenando em variaveis via post
$produtos = $_POST['produtos'];
$cor = $_POST['cor'];
$preco = $_POST['preco'];

    //Comandos de inserção dos inputs no Banco de dados
    $result = "iNSERT INTO produtotitan (produtos, cor, preco) VALUES ('$produtos', '$cor', '$preco')";
    //fazendo uma query com a variavel $result e conectando ao banco de dados com mensagem caso o processo seja um sucesso
   if (mysqli_query($strcon, $result)) {
      echo "New record created successfully";
    } else {
        echo "Error: " . $result . "<br>" . mysqli_error($strcon);
    }
    mysqli_close($strcon);
header("location: insereproduto.php");
die();
?>