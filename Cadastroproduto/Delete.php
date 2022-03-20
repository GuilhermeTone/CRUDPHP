<?php
 // Conectando ao banco de dados:
 include_once("conexaodb.php");
 //pegando o input do RADIO do FORM Delete para pegar o ID do produto
 $id = $_POST['contem_id'];

     $result = "DELETE FROM produtotitan WHERE produto_id = '$id'";
    //fazendo uma query com a variavel $result e conectando ao banco de dados com mensagem caso o processo seja um sucesso
     if (mysqli_query($strcon, $result)) {
      echo "Conteudo deletado com sucesso";
    } else {
        echo "Error: " . $result . "<br>" . mysqli_error($strcon);
    }
    mysqli_close($strcon);

header("location: insereproduto.php");
die();

?>