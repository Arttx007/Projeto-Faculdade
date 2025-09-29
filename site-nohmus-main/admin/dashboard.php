<?php
session_start();

// Verificar se o admin está autenticado
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");  // Redireciona para o login se não estiver autenticado
    exit();
}

// Exibir o nome do admin
echo "Bem-vindo, " . $_SESSION['nome_usuario'] . "!";

// Conexão com o banco de dados
$servername = "localhost"; // Endereço do servidor do banco de dados
$username = "root";        // Usuário do banco de dados
$password = "";            // Senha do banco de dados
$dbname = "dbnix";     // Nome do banco de dados

// Criando a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificando a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Consultas para contar os registros
$sql_usuarios = "SELECT COUNT(*) AS total_usuarios FROM usuarios";
$sql_produtos = "SELECT COUNT(*) AS total_produtos FROM produtos";
$sql_categorias = "SELECT COUNT(*) AS total_categorias FROM categorias";

// Executando as consultas
$result_usuarios = $conn->query($sql_usuarios);
$result_produtos = $conn->query($sql_produtos);
$result_categorias = $conn->query($sql_categorias);

// Recuperando os resultados
$total_usuarios = $result_usuarios->fetch_assoc()['total_usuarios'];
$total_produtos = $result_produtos->fetch_assoc()['total_produtos'];
$total_categorias = $result_categorias->fetch_assoc()['total_categorias'];

// Fechando a conexão com o banco de dados
$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../src/styles/dashboard.css">
</head>
<body>

    <!-- Barra lateral -->
    <div class="sidebar">
        <div class="logo">
            <h2>Meu Dashboard</h2>
        </div>
        <ul class="menu">
            <li><a href="#">Início</a></li>
            <li><a href="#">Usuários</a></li>
            <li><a href="produto.php">Produtos</a></li>
            <li><a href="categoria.php">Categorias</a></li>
            <li><a href="#">Configurações</a></li>
            <li><a href="logout.php">Sair</a></li>
        </ul>
    </div>

    <!-- Conteúdo principal -->
    <div class="main-content">
        <!-- Cabeçalho -->
        <header>
            <div class="header-content">
              <span>Olá, <?php echo $_SESSION['nome_usuario']; ?>!</span>
                <div class="user-info">
                    <img src="../src/imgs/icon.png" alt="Usuário">
                </div>
            </div>
        </header>

        <!-- Conteúdo do Dashboard -->
        <section class="dashboard">
            <div class="card">
                <h3>Total de Usuários</h3>
                <p><?php echo $total_usuarios; ?></p>
            </div>
            <div class="card">
                <h3>Total de Produtos</h3>
                <p><?php echo $total_produtos; ?></p>
            </div>
            <div class="card">
                <h3>Total de Categorias</h3>
                <p><?php echo $total_categorias; ?></p>
            </div>
        </section>
    </div>

</body>
</html>