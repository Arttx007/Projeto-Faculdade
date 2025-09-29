<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbnix";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Variável para mensagens de erro ou sucesso
$mensagem = "";

// Verificar se o formulário foi enviado para cadastrar categoria
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nome_categoria'])) {
    $nome_categoria = $_POST['nome_categoria'];

    // Verificar se o nome da categoria não está vazio
    if (empty($nome_categoria)) {
        $mensagem = "O nome da categoria não pode ser vazio.";
    } else {
        // Inserir a nova categoria no banco de dados
        $sql = "INSERT INTO categorias (nome) VALUES ('$nome_categoria')";

        if ($conn->query($sql) === TRUE) {
            $mensagem = "Categoria cadastrada com sucesso!";
        } else {
            $mensagem = "Erro ao cadastrar a categoria: " . $conn->error;
        }
    }
}

// Consultar todas as categorias para exibir na lista
$sql = "SELECT * FROM categorias";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/styles/categoria.css">
    
    <title>Cadastrar e Listar Categorias</title>
   
</head>
<body>

    <h1>Cadastrar Categoria</h1>

    <!-- Exibir mensagem de sucesso ou erro -->
    <?php if (!empty($mensagem)) : ?>
        <p class="<?php echo (strpos($mensagem, 'sucesso') !== false) ? 'success' : 'error'; ?>"><?php echo $mensagem; ?></p>
    <?php endif; ?>

    <!-- Formulário para cadastrar a categoria -->
    <form action="" method="POST">
        <label for="nome_categoria">Nome da Categoria:</label><br>
        <input type="text" name="nome_categoria" required><br><br>
        <button type="submit">Cadastrar Categoria</button>
    </form>

    <!-- Lista de Categorias -->
    <h1>Lista de Categorias</h1>
    <table>
        <caption>Categorias Cadastradas</caption>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome da Categoria</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Exibir todas as categorias cadastradas
            while ($categoria = $result->fetch_assoc()) {
                echo "<tr><td>" . $categoria['id'] . "</td><td>" . $categoria['nome'] . "</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- Botão para cadastrar nova categoria -->
    <a href="" class="btn-cadastrar">Cadastrar Nova Categoria</a>

</body>
</html>

<?php
$conn->close();
?>