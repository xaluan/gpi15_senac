<?php
require_once("templates/header.php");

require_once("models/User.php");
require_once("dao/UserDAO.php");
require_once("models/Candidato.php");
require_once("dao/CandidatoDAO.php");


$user = new User();
$userDao = new UserDao($conn, $BASE_URL);
$candidatoDao = new CandidatoDAO($conn, $BASE_URL);


$pesquisa = filter_input(INPUT_GET, "search");

print_r($pesquisa);

$candidatos = $CandidatoDao->findByName($pesquisa);

?>
<div id="main-container" class="container-fluid">
  <h2 class="section-title" id="search-title">Você está buscando por: <span id="search-result"><?= $pesquisa ?></span></h2>
  <p class="section-description">Resultados de busca retornados com base na sua pesquisa.</p>
  <div class="dbmax-container">
    <?php foreach ($candidatos as $candidato) : ?>
      {{ $candidato }}
    <?php endforeach; ?>
    <?php if (count($candidatos) === 0) : ?>
      <p class="empty-list">Curriculos para esta busca<a href="<?= $BASE_URL ?>" class="back-link">voltar</a>.</p>
    <?php endif; ?>
  </div>
</div>
<?php
require_once("templates/footer.php");
?>