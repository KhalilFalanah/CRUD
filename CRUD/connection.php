<?php
    define( 'MYSQL_HOST','localhost');
    define( 'MYSQL_USER','root');
    define( 'MYSQL_PASSWORD','');
    define( 'MYSQL_DB_NAME','imovel');
try{
    $conn = new PDO('mysql:host=' .MYSQL_HOST.';dbname='.MYSQL_DB_NAME,MYSQL_USER,MYSQL_PASSWORD);
}
catch (PDOExeption $e) { 
    echo 'Erro ao conectar com o MySQL: ' . $e->getMessage();
}
$conn->exec("set names utf8");
?>
