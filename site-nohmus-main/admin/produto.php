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

// Consultar todas as categorias para usá-las no cadastro do produto
$sql_categorias = "SELECT * FROM categorias";
$result_categorias = $conn->query($sql_categorias);

// Verificar se o formulário foi enviado para cadastrar produto
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nome_produto']) && isset($_POST['descricao_produto']) && isset($_POST['categoria_id'])) {
    $nome_produto = $_POST['nome_produto'];
    $descricao_produto = $_POST['descricao_produto'];
    $categoria_id = $_POST['categoria_id'];

    // Verificar se os campos obrigatórios estão preenchidos
    if (empty($nome_produto) || empty($descricao_produto) || empty($categoria_id)) {
        $mensagem = "Todos os campos são obrigatórios.";
    } else {
        // Inserir o novo produto no banco de dados
        $sql = "INSERT INTO produtos (nome, descricao, categoria_id) VALUES ('$nome_produto', '$descricao_produto', '$categoria_id')";

        if ($conn->query($sql) === TRUE) {
            $mensagem = "Produto cadastrado com sucesso!";
        } else {
            $mensagem = "Erro ao cadastrar o produto: " . $conn->error;
        }
    }
}

// Consultar todos os produtos para exibir na lista
$sql_produtos = "SELECT p.id, p.nome_produto, p.descricao_produto, c.nome_categoria AS categoria_nome FROM produtos p JOIN categorias c ON p.categoria_id = c.id";
$result_produtos = $conn->query($sql_produtos);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar e Listar Produtos</title>
    <style>
        /* Estilos Globais */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f4f7fc;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            height: 100vh;
            flex-direction: column;
            padding: 20px;
        }

        h1 {
            margin-bottom: 20px;
            color: #4CAF50;
        }

        /* Formulário de Cadastro */
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            margin-bottom: 20px;
        }

        label {
            font-size: 14px;
            margin-bottom: 5px;
            display: block;
            color: #555;
        }

        input[type="text"], textarea, select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 15px;
            font-size: 16px;
        }

        textarea {
            resize: vertical;
        }

        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }

        /* Mensagens de Sucesso e Erro */
        p {
            text-align: center;
            font-size: 16px;
            margin-top: 15px;
        }

        p.success {
            color: green;
        }

        p.error {
            color: red;
        }

        /* Estilos para a tabela de produtos */
        table {
            width: 100%;
            margin: 20px 0;
            border-collapse: collapse;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        table th, table td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ccc;
        }

        table th {
            background-color: #4CAF50;
            color: white;
        }

        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        table tr:hover {
            background-color: #ddd;
        }

        table caption {
            font-size: 18px;
            margin-bottom: 10px;
            font-weight: bold;
            color: #333;
        }

        /* Botão de Cadastrar Novo Produto */
        a.btn-cadastrar {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            text-decoration: none;
            border-radius: 4px;
            font-size: 16px;
            margin-top: 20px;
            display: inline-block;
            text-align: center;
            transition: background-color 0.3s ease;
        }

        a.btn-cadastrar:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <h1>Cadastrar Produto</h1>

    <!-- Exibir mensagem de sucesso ou erro -->
    <?php if (!empty($mensagem)) : ?>
        <p class="<?php echo (strpos($mensagem, 'sucesso') !== false) ? 'success' : 'error'; ?>"><?php echo $mensagem; ?></p>
    <?php endif; ?>

    <!-- Formulário para cadastrar o produto -->
    <form action="" method="POST">
        <label for="nome_produto">Nome do Produto:</label><br>
        <input type="text" name="nome_produto" required><br><br>

        <label for="descricao_produto">Descrição do Produto:</label><br>
        <textarea name="descricao_produto" required></textarea><br><br>

        <label for="categoria_id">Categoria:</label><br>
        <select name="categoria_id" required>
            <option value="">Selecione uma Categoria</option>
            <?php while ($categoria = $result_categorias->fetch_assoc()) : ?>
                <option value="<?php echo $categoria['id']; ?>"><?php echo $categoria['nome']; ?></option>
            <?php endwhile; ?>
        </select><br><br>

        <button type="submit">Cadastrar Produto</button>
    </form>

    <!-- Lista de Produtos -->
    <h1>Lista de Produtos</h1>
    <table>
        <caption>Produtos Cadastrados</caption>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Categoria</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Exibir todos os produtos cadastrados
            while ($produto = $result_produtos->fetch_assoc()) {
                echo "<tr><td>" . $produto['id'] . "</td><td>" . $produto['nome'] . "</td><td>" . $produto['descricao'] . "</td><td>" . $produto['categoria_nome'] . "</td></tr>";
            }
            ?>
        </tbody>
    </table>

</body>
</html>

<?php
$conn->close();
?>
