<?php
 // Conectando ao banco de dados:
 include_once("conexaodb.php");
//pegando os inputs do FORM Edita e armazenando em variaveis via post
$id = $_POST['contem_id'];
$produtos = $_POST['produtos'];
$preco = $_POST['preco'];

     $result = "UPDATE produtotitan  SET produtos ='$produtos', preco='$preco' WHERE produto_id = '$id'";
    //fazendo uma query com a variavel $result e conectando ao banco de dados com mensagem caso o processo seja um sucesso
     if (mysqli_query($strcon, $result)) {
      echo "Conteudo editado com sucesso";
    } else {
        echo "Error: " . $result . "<br>" . mysqli_error($strcon);
    }
    mysqli_close($strcon);
    
header("location: insereproduto.php");
die();

?>