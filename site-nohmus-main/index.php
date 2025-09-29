<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nohmus</title>
    <link rel="stylesheet" href="src/styles/reset.css">
    <link rel="stylesheet" href="src/styles/header-nav.css">
    <link rel="stylesheet" href="src/styles/buttons.css">
    <link rel="stylesheet" href="src/styles/logincontainer.css">
    <link rel="stylesheet" href="src/styles/slideshow.css">
    <link rel="stylesheet" href="src/styles/produtos.css">
    <link rel="stylesheet" href="src/styles/modal.css">
    <link rel="stylesheet" href="src/styles/form.css">
    <link rel="stylesheet" href="src/styles/footer.css">
    <link rel="shortcut icon" href="src/imgs/icon.png" type="image/x-icon">

</head>

<body>
    <header class="header">
        <div class="left-space"></div>
        <div class="wrapper-img">
            <a href="index.php">
              <img class="logo-img" src="src/imgs/logonohmus.png" alt="logo-inicial">
            </a>
        </div>
        <style>
  .login-btn-wrapper {
    text-align: right;
    margin: 20px;
  }

  .login-btn {
    background-color: #f46600;
    color: white;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 5px;
    font-weight: bold;
  }

  .login-btn:hover {
    background-color: #d45600;
  }
</style>
        <div class="login-btn-wrapper">
          <a href="admin/login.php" class="login-btn">Login</a>
        </div>
    </header>
    <?php
session_start();
?>

<nav class="nav">
    <a style="text-transform: uppercase;" href="pages/quemsomos.html">Quem somos</a>
    <span>|</span>
    <a style="text-transform: uppercase;" href="Item-Aquecedores.html">Trocador de Calor</a>
    <span>|</span>
    <a style="text-transform: uppercase;" href="Item-Pneis.html">Painéis</a>
    <span>|</span>
    <a style="text-transform: uppercase;" href="pages/servicos.html">Serviços</a>
    <span>|</span>
    <a style="text-transform: uppercase;" href="Item-ArCond.html">Ar condicionados</a>
    <span>|</span>
    <a style="text-transform: uppercase;" href="pages/formulario.html">contato</a>
    <span>|</span>

</nav>
<div class="nav-info" id="nav-info">
    <div class="content" id="quemsomos">
        <p>A Nohmus é especialista em automação, climatização e soluções térmicas.</p>
    </div>
    <div class="content" id="trocadores">
        <p><strong>Marcas:</strong> Sodramar, GDA, Nautilus, Pentair.</p>
    </div>
    <div class="content" id="arcondicionados">
        <p><strong>Marcas:</strong> LG, Samsung, Daikin, Gree.</p>
    </div>
    <div class="content" id="servicos">
        <p>Instalação, manutenção preventiva, assistência técnica e consultoria técnica.</p>
    </div>
</div>
<script src="src/js/nav.js"></script>

    <section class="slideshow-area">
        <div class="slideshow-container">
            <div class="slide fade">
                <img src="src/imgs/slide1.jpg" alt="IMAGEM 1">
            </div>
            <div class="slide fade">
                <img src="src/imgs/slide2.jpg" alt="Imagem 2">
            </div>
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>

        <div style="text-align:center" class="dots-container">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
        </div>
    </section>

    <section class="produtos-secao">
        <h2 style= "text-transform: uppercase;" class="titulo-categoria">ar-condicionado</h2>
        <div class="produtos-linha">
            <div class="card">
                <img src="src/imgs/ar-condicionado-split-hw-lg-inverter-dual-voice-ai(1).jpg" alt="Painel de automação">
                <div class="card-body">
                    <h5 class="card-title">Ar-condicionado</h5>
                    <p class="card-text">Ar Condicionado Split Hi-Wall LG Dual Inverter Voice +AI 12.000 BTU/h Frio 220V | S3-Q12JA31K.</p>
                    <button type="button" class="btn-primario" onclick="abrirModal('modal1')">SAIBA MAIS</button>

                </div>
            </div>

            <div class="card">
                <img src="src/imgs/ar-condicionado-hw-samsung-windfree-connect-9k-12k-poloar(1).png" alt="Painel de automação">
                <div class="card-body">
                    <h5 style= "text-transform: captalize;" class="card-title">Ar-condicionado</h5>
                    <p class="card-text">Ar Condicionado Split Hi-Wall Samsung WindFree Connect Inverter 9.000 Btu/h Frio 220V | AR09CVFAMWKNAZ.</p>
                    <button type="button" class="btn-primario" onclick="abrirModal('modal3')">SAIBA MAIS</button>
                </div>
            </div>
        </div>
    </section>

    <section class="produtos-secao">
        <h2 style="text-transform: uppercase;" class="titulo-categoria">trocador de calor</h2>
        <div class="produtos-linha">

            <div class="card">
                <img src="src/imgs/sodramartrocador.jpg" alt="Painel de automação">
                <div class="card-body">
                    <h5 style= "text-transform: capitalize" class="card-title">trocador de calor</h5>
                    <p class="card-text">Sodramar Full Inverter TIV-25<br><br>Especificações:<br>Painel de Comando Inteligente LCD<br>Condensador de Titânio<br>Silencioso<br>Modo Silence, Boost Automático<br>Função Aquecimento (máximo de 40°)<br>Função Resfriamento (máximo de -10°)<br>Wi-Fi Integrado<br>Comando pelo App</p>
                    <button type="button" class="btn-primario" onclick="abrirModal('modal4')">SAIBA MAIS</button>
                </div>
            </div> <!-- Fechando o primeiro card aqui -->

            <div class="card">
                <img src="src/imgs/trocadordecalor.jpg" alt="trocador de calor">
                <div class="card-body">
                    <h5 style= "text-transform: capitalize" class="card-title">trocador de calor</h5>
                    <p class="card-text">GDA BC-300 Full Inverter Wi-fi <br> <br>ESPECIFICAÇÕES DO PRODUTO <br> Referência GDA: BC-300 <br> Medida disponível: 96x34x65,7 cm <br> Acabamento: ABS <br> Indicação: Aquecimento de Piscinas <br> Garantia do Compreenssor: 2 anos.</p>
                    <button type="button" class="btn-primario" onclick="abrirModal('modal5')">SAIBA MAIS</button>
                </div>
            </div>

        </div>
    </section>


    <div class="linha-laranja"></div>

    <!-- Formulário de Contato -->
    <div class="form-wrapper">
        <div class="form-box">
            <form action="forms.php" method="POST" class="form-contato">
                <h2 style=" text-transform: capitalize">consulte seu orçamento</h2>
                <input type="text" name="nome" placeholder="Nome" required>
                <input type="email" name="email" placeholder="E-mail" required>
                <input type="text" name="telefone" placeholder="Telefone" required>
                <input type="text" name="cidade_estado" placeholder="Cidade / estado" required>
                <input type="text" name="assunto" placeholder="Assunto" required>
                <textarea name="mensagem" placeholder="Mensagem" rows="5" required></textarea>
                <button type="submit">Enviar</button>
            </form>
        </div>
    </div>

    <footer class="footer">
        <div class="footer-container">
            <div class="footer-left">
                <h3 style="text-transform: uppercase;">nohmus</h3>
                <p style="text-transform: uppercase;">mairiporã - são paulo</p>
            </div>
            <div class="footer-center">
                <h4 style="text-transform: capitalize;">links úteis</h4>
                <ul>
                    <li><a href="../index.php">Início</a></li>
                    <li><a href="#">Produtos</a></li>
                    <li><a href="#">Sobre</a></li>
                    <li><a href="#">Contato</a></li>
                </ul>
            </div>
            <div class="footer-right">
                <h4 style="text-transform: capitalize;">nossas redes</h4>
                <div class="social-icons">
                    <a href="#"><img src="src/imgs/facebook.png" alt="Facebook" /></a>
                    <a href="#"><img src="src/imgs/Instagram.png" alt="Instagram" /></a>
                    <a href="#"><img src="src/imgs/Twitter.png" alt="Twitter" /></a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2025 NOHMUS. Todos os direitos reservados.</p>
        </div>
    </footer>
    <script src="src/js/script.js"></script>
</body>

</html>