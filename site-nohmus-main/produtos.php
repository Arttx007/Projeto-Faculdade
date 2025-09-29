<?php
require_once 'includes/conection.php'; // você já deve ter isso configurado

// Verifica se o ID foi enviado
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die('Produto inválido.');
}

$id = (int)$_GET['id'];

// Consulta o produto
$stmt = $pdo->prepare("SELECT * FROM produtos WHERE id = ?");
$stmt->execute([$id]);
$produto = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$produto) {
    die('Produto não encontrado.');
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($produto['nome']) ?> | Nohmus</title>
    <link rel="stylesheet" href="src/styles/reset.css">
    <link rel="stylesheet" href="src/styles/header-nav.css">
    <link rel="stylesheet" href="src/styles/buttons.css">
    <link rel="stylesheet" href="src/styles/produtos.css">
    <link rel="stylesheet" href="src/styles/footer.css">
    <link rel="shortcut icon" href="src/imgs/icon.png" type="image/x-icon">
    <style>
        .produto-detalhe {
            display: flex;
            flex-wrap: wrap;
            padding: 40px;
            gap: 40px;
            align-items: flex-start;
        }

        .produto-detalhe img {
            max-width: 500px;
            width: 100%;
            border-radius: 10px;
        }

        .produto-info {
            max-width: 600px;
            flex: 1;
        }

        .produto-info h1 {
            font-size: 2rem;
            margin-bottom: 20px;
            text-transform: uppercase;
        }

        .produto-info p {
            font-size: 1.1rem;
            margin-bottom: 20px;
        }

        .btn-primario {
            background-color: #f46600;
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
        }

        .btn-primario:hover {
            background-color: #d45600;
        }

        @media (max-width: 768px) {
            .produto-detalhe {
                flex-direction: column;
                align-items: center;
            }

            .produto-info {
                max-width: 100%;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="left-space"></div>
        <div class="wrapper-img">
            <a href="index.php">
                <img class="logo-img" src="src/imgs/logonohmus.png" alt="logo-inicial">
            </a>
        </div>
        <div class="login-btn-wrapper">
            <a href="admin/login.php" class="login-btn">Login</a>
        </div>
    </header>

    <!-- Navegação -->
    <nav class="nav">
        <a href="pages/quemsomos.html">Quem somos</a><span>|</span>
        <a href="Item-Aquecedores.html">Trocador de Calor</a><span>|</span>
        <a href="Item-Pneis.html">Painéis</a><span>|</span>
        <a href="#">Serviços</a><span>|</span>
        <a href="Item-ArCond.html">Ar condicionados</a>
    </nav>

    <!-- Conteúdo do Produto -->
    <section class="produto-detalhe">
        <img src="src/imgs/<?= htmlspecialchars($produto['imagem']) ?>" alt="<?= htmlspecialchars($produto['nome']) ?>">
        
        <div class="produto-info">
            <h1><?= htmlspecialchars($produto['nome']) ?></h1>
            <p><?= nl2br(htmlspecialchars($produto['descricao'])) ?></p>
            <?php if (!empty($produto['preco'])): ?>
                <p><strong>Preço:</strong> R$ <?= number_format($produto['preco'], 2, ',', '.') ?></p>
            <?php endif; ?>
            <br>
            <button class="btn-primario" onclick="window.location.href='contato.html'">Solicitar Orçamento</button>
        </div>
    </section>

    <!-- Rodapé -->
    <footer class="footer">
        <!-- Conteúdo igual ao seu rodapé padrão -->
    </footer>
</body>
</html>