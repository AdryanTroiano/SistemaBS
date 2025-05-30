<?php
require_once 'auth.php';

if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit;
}
?>

<!doctype html>
<html lang="pt-br">
<head>
  <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SCBST</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>

<header>
  <nav>
    <a class="navbar-brand" href="?page=dashboard">
      <img class="logo" src="logo.png" alt="Logo">
    </a>

    <!-- Botão do menu -->
    <button id="abrirMenu" class="hamburguer">
      <span class="bar"></span>
      <span class="bar"></span>
      <span class="bar"></span>
    </button>

    <!-- Menu fullscreen -->
    <div id="menuFullscreen" class="menu-fullscreen">
      <button id="fecharMenu" class="fechar">[ × ]</button>
      <a href="?page=dashboard" class="icone-home">
        <i class="fas fa-home"></i>
      </a>
      <ul class="linkshamb">
        <h2 class="menuhamb">Menu</h2>
        <li><a href="?page=info">Informações</a></li>
        <hr class="espacamentomenus">
        <li><a href="?page=help">Ajuda</a></li>
        <hr class="espacamentomenus">

        <h2 class="menuhamb">Menu Doador</h2>
        <li><a href="?page=novo">Cadastrar Doadores</a></li>
        <hr class="espacamentomenus">
        <li><a href="?page=listar">Listar Doadores</a></li>
        <hr class="espacamentomenus">
        <h2 class="menuhamb">Usuários</h2>
        <h2 class="menuhamb"></h2>
        <?php if (isAdmin()): ?>
            <li><a href="cadastrousers.php">Cadastrar Usuário</a></li>
            <hr class="espacamentomenus">
          <?php endif; ?>
          <li><a href="editfun.php?id=<?php echo $_SESSION['usuario_id']; ?>">Editar Cadastro</a></li>
          <hr class="espacamentomenus">
          <li><a href="logout.php">Encerrar sessão</a></li>
          <hr class="espacamentomenus">
          
          

      </ul>
    </div>

    <!-- Menu principal -->
    <div class="navbar-nav">
      <a class="nav-link" href="?page=info">
        <ion-icon class="icones" name="information-circle-outline"></ion-icon> Informações
      </a>

      <div class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button">
          <ion-icon class="icones" name="list-circle-outline"></ion-icon> Doador
        </a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="?page=novo">Cadastrar Doadores</a></li>
          <li><a class="dropdown-item" href="?page=listar">Listar Doadores</a></li>
        </ul>
      </div>

      <a class="nav-link" href="?page=help">
        <ion-icon name="help-circle-outline"></ion-icon> <span>Ajuda</span>
      </a>

      <!-- Menu de usuário -->
      <div class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button">
          <ion-icon class="icones" name="person-circle-outline"></ion-icon> <?php echo htmlspecialchars($_SESSION['usuario'] ?? ''); ?>
        </a>
        <ul class="dropdown-menu">
          <?php if (isAdmin()): ?>
            <li><a class="dropdown-item" href="cadastrousers.php">Cadastrar Usuário</a></li>
          <?php endif; ?>
          <li><a class="dropdown-item" href="editfun.php?id=<?php echo $_SESSION['usuario_id']; ?>">Editar Cadastro</a></li>
          <li><a class="dropdown-item" href="logout.php">Encerrar sessão</a></li>
        </ul>
      </div>
    </div>
  </nav>
</header>

<!-- Espaçamento -->
<br><br>

<!-- Conteúdo dinâmico -->
<div class="container">
  <div class="content">
    <?php
      include("config.php");
      $page = $_REQUEST["page"] ?? 'home';

      switch ($page) {
        case "novo": include("novo-usuario.php"); break;
        case "listar": include("listar-usuarios.php"); break;
        case "salvar": include("salvar-usuario.php"); break;
        case "editar": include("editar-usuario.php"); break;
        case "help": include("help.php"); break;
        case "info": include("info.php"); break;
        case "listar2": include("listar2.php"); break;
        case "mapa": include("mapa.php"); break;
        case "editestoque": include("editar_estoque.php"); break;
        default: include("dashboard.php");
      }
    ?>
  </div>
</div>

<!-- Rodapé -->
<footer>
  <div class="container">
    <div class="footer-content">
      <p>&copy; 2024 Banco de Sangue de Taquaritinga.<br>Todos os direitos reservados</p>

      <div class="footer-address">
        <p><strong>Navegação:</strong></p>
        <a href="?page=info" class="footer-link">Informações</a>
        <a href="?page=help" class="footer-link">Ajuda</a>
        <a href="?page=novo" class="footer-link">Cadastrar</a>
        <a href="?page=listar" class="footer-link">Listar Cadastros</a>
      </div>

      <div class="footer-address">
        <p><strong>Endereço:</strong></p>
        <p>
          <i class="fas fa-map-marker-alt"></i> 
          <a href="https://www.google.com/maps/place/Fatec+Taquaritinga" class="footer-link" target="_blank">
            Av. Dr. Flávio Henrique Lemos, 585
          </a>
        </p>
      </div>

      <div class="footer-contact">
        <p><strong>Contato:</strong></p>
        <p><i class="fas fa-envelope"></i> 
          <a href="mailto:contato@bancodesanguetaq.com" class="footer-link">contato@bancodesanguetaq.com</a>
        </p>
        <p><i class="fas fa-phone"></i> (16) 1234-5678</p>
      </div>
    </div>
  </div>
</footer>

<!-- Scripts -->
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const abrirMenu = document.getElementById('abrirMenu');
    const fecharMenu = document.getElementById('fecharMenu');
    const menuFullscreen = document.getElementById('menuFullscreen');

    abrirMenu.addEventListener('click', function () {
      menuFullscreen.classList.add('ativo');
      abrirMenu.classList.add('esconder');
    });

    fecharMenu.addEventListener('click', function () {
      menuFullscreen.classList.remove('ativo');
      abrirMenu.classList.remove('esconder');
    });
  });
</script>

</body>
</html>
