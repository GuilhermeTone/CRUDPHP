<?php
//Codigo para conexão com banco de dados

$Servidor= 'localhost';
$Usuario= 'root';
$Senha= '';
$nomeBanco= 'titansoftware';

$strcon = mysqli_connect($Servidor, $Usuario, $Senha, $nomeBanco); 
?>