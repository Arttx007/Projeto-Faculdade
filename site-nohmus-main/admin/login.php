<?php
session_start();

// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbnix";  // Substitua pelo nome do seu banco de dados

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pegar os dados do formulário
    $email_usuario = $_POST['email_usuario'];
    $senha_usuario = $_POST['senha_usuario'];

    // Consulta para pegar o usuário pelo e-mail
    $sql = "SELECT * FROM usuarios WHERE email_usuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email_usuario); // Prevenção contra injeção SQL
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $usuario = $result->fetch_assoc();

        // Verificar se a senha está correta (usando password_verify para senhas com hash)
        if (password_verify($senha_usuario, $usuario['senha_usuario'])) {
            // Verificar o tipo de usuário
            if ($usuario['tipo_usuario'] == 'admin') {
                // Criar sessão para o admin
                $_SESSION['admin_id'] = $usuario['id'];
                $_SESSION['nome_usuario'] = $usuario['nome_usuario'];
                header("Location: dashboard.php"); // Redireciona para o painel de administração
                exit();
            } elseif ($usuario['tipo_usuario'] == 'usuario') {
                // Criar sessão para o usuário comum
                $_SESSION['usuario_id'] = $usuario['id'];
                $_SESSION['nome_usuario'] = $usuario['nome_usuario'];
                header("Location: dashboard.php"); // Redireciona para a página do usuário comum
                exit();
            } else {
                echo "Tipo de usuário inválido!";
            }
        } else {
            echo "Senha incorreta!";
        }
    } else {
        echo "Usuário não encontrado!";
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
    <title>Login Admin - Nohmus</title>
    <link rel="stylesheet" href="../src/styles/login.css">
    <link rel="shortcut icon" href="../src/imgs/icon.png" type="image/x-icon">
    <style>
        .btn-voltar {
            display: block;
            text-align: center;
            margin: 20px auto 0;
            padding: 10px 20px;
            background-color: #f4f4f4;
            color: #333;
            text-decoration: none;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .btn-voltar:hover {
            background-color: #ddd;
            color: #000;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <h2>Área Administrativa</h2>

        <?php if (isset($erro)): ?>
            <p style="color:red; text-align:center;"><?= $erro ?></p>
        <?php endif; ?>

        <form action="" method="POST">
            <label for="email_usuario">E-mail</label>
            <input type="text" id="usuario" name="email_usuario" required>
            <label for="senha">Senha</label>
            <input type="password" id="senha" name="senha_usuario" required>

            <button type="submit">Entrar</button>
        </form>

        <!-- Botão de voltar -->
        <a href="../index.php" class="btn-voltar">← Voltar para o Início</a>
    </div>

</body>
</html>