<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbnix";

try {
    // Tenta criar a conexão com o banco de dados
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Verifica se há um erro de conexão
    if ($conn->connect_error) {
        throw new Exception("Falha na conexão: " . $conn->connect_error);
    }
    //conexão bem sucedida!
} catch (Exception $e) {
    // Exibe a mensagem de erro
    echo $e->getMessage();
}
?>