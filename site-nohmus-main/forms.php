<?php
//banco de dados
include_once ("includes/conection.php");
// Recebe dados do formulário
$nome = $_POST['nome'];
$email = $_POST['email'];
$assunto = $_POST['assunto'];
$mensagem = $_POST['mensagem'];

echo $nome .'  '. $email .' '.$assunto .' '. $mensagem;

// Prepara e executa o comando INSERT
$stmt = $conn->prepare("INSERT INTO mensagens (nome, email, assunto, mensagem) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $nome, $email, $assunto, $mensagem);

if ($stmt->execute()) {
    echo "Mensagem enviada com sucesso!";
} else {
    echo "Erro ao enviar mensagem: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>