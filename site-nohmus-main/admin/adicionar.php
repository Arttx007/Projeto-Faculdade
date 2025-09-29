<?php
include '../includes/conection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $imagem = $_POST['imagem']; 

    $sql = "INSERT INTO produtos (nome, descricao, preco, imagem) 
            VALUES ('$nome', '$descricao', '$preco', '$imagem')";

    if ($conn->query( $sql)) {
        header("Location: dashboard.php");
    } else {
        echo "Erro: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Produto</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        /* Base */
        body {
    background-color: #00213F;
    background-color: ;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 20px;
        }

        /* Card principal */
        .card {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 400px;
            max-width: 100%;
        }

        /* Título */
        h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }

        /* Campos de entrada (inputs) */
        input[type="text"],
        textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
        }

        /* Descrição */
        textarea {
            height: 100px;
            resize: vertical;
        }

        /* Botão de submit */
        button[type="submit"] {
            background-color: #f46600;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        /* Efeito no botão */
        button[type="submit"]:hover {
            background-color: #e55b00;
        }

        /* Mensagens de erro ou sucesso */
        .error-message,
        .success-message {
            color: red;
            font-size: 14px;
            margin-top: 10px;
            text-align: center;
        }

        .success-message {
            color: green;
        }
    </style>
</head>
<body>
    <div class="card">
        <h2>Adicionar Produto</h2>
        <form method="POST">
            <input type="text" name="nome" placeholder="Nome do produto" required><br>
            <textarea name="descricao" placeholder="Descrição"></textarea><br>
            <input type="text" name="preco" placeholder="Preço" required><br>
            <input type="text" name="imagem" placeholder="URL da imagem"><br>
            <button type="submit">Adicionar</button>
        </form>
    </div>

    <?php
    include '../includes/conection.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $preco = $_POST['preco'];
        $imagem = $_POST['imagem'];

        $sql = "INSERT INTO produtos (nome, descricao, preco, imagem) 
                VALUES ('$nome', '$descricao', '$preco', '$imagem')";

        if ($conn->query($sql)) {
            echo "<p class='success-message'>Produto adicionado com sucesso!</p>";
            // Redireciona após o sucesso (opcional)
             header ("Location: dashboard.php");
        } else {
            echo "<p class='error-message'>Erro: " . $conn->error . "</p>";
        }
    }
    ?>
</body>
</html>