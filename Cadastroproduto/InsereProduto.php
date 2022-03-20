<?php
 // Conectando ao banco de dados:
 include_once("conexaodb.php");
 
?>
<html>
    <head>
        <title> Cadastro produto  </title>
    </head>
    <body>
        <h3>Cadastre seu produto</h3><br>
        <!--
            Formulário com inputs para enviar dados ao Banco de dados
        -->
        <form  name="Cadastro" action="cadastrobancodedados.php" method="POST">
            <label>Cadastre o Produto</label>
            <input type = "text" name="produtos" id="produtos">

            <label>Coloque o Preço</label>
            <!--
                Placeholder e pattern no input para orientar o usuario a maneira correta de preecher o campo
            -->
            <input type = "num" name="preco" id="preco" pattern="^\d*(\.\d{0,2})?$" placeholder=0000.00 value=0000.00>

            <label>Coloque a Cor</label>
            <input type = "text" name="cor" id="cor">

            <input type="submit" name="enviar" value="Inserir">
        </form>
        <table border="1" style='width:50%'>
        <!--
            Tabela para organizar as informaçoes que irão ser trazida do Banco de dados
        -->
            <tr>
                <th>ID</th>
                <th>Produto</th>
                <th>Preço</th>
                <th>Cor</th>
                <th>Selecione qual excluir e clique no botão Deletar</th>
            </tr>
         <!--
            formulario para mandar um submit para o Delete.php
        -->
        <form name="Delete" action="Delete.php" method="POST">
        <?php
            //Trazendo dados do banco de dados e organizando eles em linha com uma estrutura while para formar uma tabela
            $sql = "SELECT *  FROM produtotitan";
            $resultado = mysqli_query($strcon,$sql) or die("Erro ao retornar dados");
             while ($registro = mysqli_fetch_array($resultado))
                {
                $id_produto = $registro['produto_id'];
                $produto = $registro['produtos'];
                $preco = $registro['preco'];
                $cor = $registro['cor'];


                echo "<tr>";
                 echo "<td>".$id_produto."</td>";
                echo "<td>".$produto."</td>";
                //$repeticao serve para não ter duas linhas no caso do vermelho
                $repeticao = 0;
                //estrutura de ifs para regra de negocio
                if($cor == "VERMELHO" AND $preco > 50){
                    $calculo= $preco / 100 * 25;
                    $preco = $preco - $calculo;
                    $preco= number_format($preco, 2, ',', '.'); 
                    echo "<td> R$ ".$preco."</td>";
                    $repeticao = 1;
                }
                elseif($cor == "AZUL"){
                    $calculo= $preco / 100 * 20;
                    $preco = $preco - $calculo;
                    $preco= number_format($preco, 2, ',', '.'); 
                    echo "<td>R$ ".$preco."</td>";
                }
                elseif($cor == "VERMELHO" AND $repeticao <> 1){
                    $calculo= $preco / 100 * 20;
                    $preco = $preco - $calculo;
                    $preco= number_format($preco, 2, ',', '.'); 
                    echo "<td>R$ ".$preco."</td>";
                }
                elseif($cor == "AMARELO"){
                    $calculo= $preco / 100 * 10;
                    $preco = $preco - $calculo;
                    $preco= number_format($preco, 2, ',', '.'); 
                    echo "<td>R$ ".$preco."</td>";
                }
                else{
                    $preco= number_format($preco, 2, ',', '.'); 
                    echo "<td>R$ ".$preco."</td>";
                }
                echo "<td>".$cor."</td>";
                echo "<td> <input type = 'radio' id = 'contem_id' name = 'contem_id' value = '$id_produto'></td>";
                echo "</tr>";
                }
                echo "</table>";
        ?>
         <!--
            botão de deletar pega o id do RADIO contendo o id do produto e enviar fazendo um delete
        -->
         <br />
        <input type="submit" name="enviar" value="Deletar">
        </form>
         <!--
            formulario para mandar um submit para o update.php
        -->
        
        <form  name="Edita" action="update.php" method="POST">
            <label>Edite o nome do Produto</label>
            <input type = "text" name="produtos" id="produtos">

            <label>Coloque o Preço</label>
            <!--
                PlaceHolder e pattern no input para orientar o usuario a maneira correta e preecher o campo
            -->
            <input type = "text" name="preco" id="preco" pattern="^\d*(\.\d{0,2})?$" placeholder=0000.00 value=0000.00>
        <!--
            botão de deletar pega o id do RADIO contendo o id do produto e enviar fazendo um delete
        -->
            <input type="submit" name="enviar" value="Editar">
        <table border="1" style='width:50%'>
            <tr>
                <th>ID</th>
                <th>Preecha os campos e selecione qual Editar de acordo com ID da tabela acima</th>
            </tr>
        <form>
        <?php
        //codigo para trazer uma tabela permitindo assim o usuario vizualizar o id do produto que ele ira editar
            $sql = "SELECT * FROM produtotitan";
            $resultado = mysqli_query($strcon,$sql) or die("Erro ao retornar dados");
             while ($registro = mysqli_fetch_array($resultado))
                {
                $id_produto = $registro['produto_id'];
                $produto = $registro['produtos'];
                $preco = $registro['preco'];
                $cor = $registro['cor'];


                echo "<tr>";
                 echo "<td>".$id_produto."</td>";
                echo "<td> <input type = 'radio' id = 'contem_id' name = 'contem_id' value = '$id_produto'></td>";
                echo "</tr>";
                }
                mysqli_close($strcon);
                echo "</table>";
        ?>
        </form>
    </body>
</html>