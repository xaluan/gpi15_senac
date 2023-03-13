<?php

require_once("globals.php");
require_once("db.php");
require_once("models/Message.php");
require_once("dao/UserDAO.php");

$message = new Message($BASE_URL);

$flassMessage = $message->getMessage();

if (!empty($flassMessage["msg"])) {
 
  $message->clearMessage();
}

$userDao = new UserDAO($conn, $BASE_URL);

$userData = $userDao->verifyToken(false);

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DB MAX</title>
  
  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.css" integrity="sha512-bR79Bg78Wmn33N5nvkEyg66hNg+xF/Q8NA8YABbj+4sBngYhv9P8eum19hdjYcY7vXk/vRkhM3v/ZndtgEXRWw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- CSS -->

  <link rel="stylesheet" href="<?= $BASE_URL ?>css/styles.css">
</head>

<body>
  <header>
    <nav id="main-navbar" class="navbar navbar-expand-lg">
      <a href="<?= $BASE_URL ?>" class="navbar-brand">
        <span id="dbmax-title">DB MAX</span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>      
      <div class="collapse navbar-collapse" id="navbar">
        <ul class="navbar-nav">
          <?php if ($userData) : ?>
            <li class="nav-item">
              <a href="<?= $BASE_URL ?>newcandidato.php" class="nav-link">
                <i class="far fa-plus-square"></i> Cadastrar Currículo 
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= $BASE_URL ?>pesquisa.php" class="nav-link">Pesquisar</a>
            </li>
            <li class="nav-item">
              <a href="<?= $BASE_URL ?>editprofile.php" class="nav-link bold">
                <?= $userData->name ?>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= $BASE_URL ?>suporte.php" class="nav-link">Contato</a>
            </li>
            <li class="nav-item">
              <a href="<?= $BASE_URL ?>suporte_busca.php" class="nav-link">Suporte</a>
            </li>
            <li class="nav-item">
              <a href="<?= $BASE_URL ?>logout.php" class="nav-link">Sair</a>
            </li>
          <?php else : ?>
            <li class="nav-item">
              <a href="<?= $BASE_URL ?>planos.php" class="nav-link">Planos</a>
            </li>
            <li class="nav-item">
              <a href="<?= $BASE_URL ?>suporte.php" class="nav-link">Contato</a>
            </li>
            <li class="nav-item">
              <a href="<?= $BASE_URL ?>auth.php" class="nav-link">Entrar / Cadastrar</a>
            </li>
          <?php endif; ?>
        </ul>
      </div>
    </nav>
  </header>
  <?php if (!empty($flassMessage["msg"])) : ?>
    <div class="msg-container">
      <p class="msg <?= $flassMessage["type"] ?>"><?= $flassMessage["msg"] ?></p>
    </div>
  <?php endif; ?>