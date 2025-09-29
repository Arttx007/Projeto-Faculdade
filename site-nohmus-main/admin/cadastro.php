<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbnix";  // Substitua pelo nome do seu banco de dados

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coletar os dados do formulário
    $nome_usuario = $_POST['nome_usuario'];
    $email_usuario = $_POST['email_usuario'];
    $senha_usuario = $_POST['senha_usuario'];
    $tipo_usuario = $_POST['tipo_usuario']; // Coletar o tipo de usuário (admin ou usuario)

    // Verificar se o e-mail já está cadastrado
    $sql = "SELECT * FROM usuarios WHERE email_usuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email_usuario);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Erro: O e-mail já está cadastrado!";
    } else {
        // Gerar o hash da senha
        $senha_criptografada = password_hash($senha_usuario, PASSWORD_DEFAULT);

        // Inserir o novo usuário no banco de dados
        $sql = "INSERT INTO usuarios (nome_usuario, email_usuario, senha_usuario, tipo_usuario) 
                VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $nome_usuario, $email_usuario, $senha_criptografada, $tipo_usuario);

        if ($stmt->execute()) {
            echo "Novo usuário cadastrado com sucesso!";
        } else {
            echo "Erro ao cadastrar o usuário: " . $conn->error;
        }
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="style.css">  <!-- Link para o arquivo CSS -->
</head>
<div>

<div class=" cad-container"
   <h2>Cadastro de Usuário</h2>
   <form action="cadastro.php" method="POST">
     <label for="nome_usuario">Nome:</label>
     <input type="text" id="nome_usuario" name="nome_usuario" required>
     <br>

     <label for="email_usuario">E-mail:</label>
     <input type="email" id="email_usuario" name="email_usuario" required>
     <br>

     <label for="senha_usuario">Senha:</label>
     <input type="password" id="senha_usuario" name="senha_usuario" required>
     <br>

     <!-- Campo para o tipo de usuário -->
     <label for="tipo_usuario">Tipo de Usuário:</label>
     <select id="tipo_usuario" name="tipo_usuario" required>
        <option value="usuario">Usuário</option>
        <option value="admin">Admin</option>
     </select>
     <br> <br>

     <button type="submit">Cadastrar</button>
    </form>
</div>

</body>
</html>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Arial', sans-serif;
    background-color: #00213F;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}

h2 {
    text-align: center;
    color: #333;
    margin-bottom: 20px;
}

/* Container do Formulário */
.cad-container {

    background-color: #111111;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(255, 102, 0, 0.5);
    width: 100%;
    max-width: 400px; /* Limita a largura máxima do formulário */
    align-items: center;
    text-align: center;
}

.cad-container:hover {
    box-shadow: 0 0 30px rgba(255, 102, 0, 0.7);
}

label {

    display: block;
    font-size: 14px;
    font-weight: bold;
    margin-bottom: 8px;
    color: #e65c00;
}

input[type="text"],
input[type="email"],
input[type="password"] {
    width: 100%;
    padding: 12px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 14px;
    transition: border-color 0.3s;
}

/* Efeito de foco nos campos */
input[type="text"]:focus,
input[type="email"]:focus,
input[type="password"]:focus {
    border-color: #ff6600;
    outline: none;
}

/* Botão de submit */
button {
    width: 100%;
    padding: 12px;
    background-color: #ff6600;
    color: #fff;
    border: none;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s;
}

/* Efeito de hover no botão */
button:hover {
    background-color: #e65c00;
}

/* Mensagens de erro ou sucesso */
.message {
    text-align: center;
    margin-top: 20px;
    font-size: 16px;
}

.message.success {
    color: green;
}

.message.error {
    color: red;
}

/* Responsividade */
@media (max-width: 480px) {
    form {
        padding: 20px;
    }

    h2 {
        font-size: 18px;
    }
}
</style>